<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = InformationRequest::with(['user', 'objection', 'parentRequest'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('request_type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('fullName', 'like', "%{$search}%");
                })->orWhere('institution', 'like', "%{$search}%");
            });
        }

        $requests = $query->paginate(10)->withQueryString();

        return view('admin.requests.index', compact('requests'));
    }

    public function show($id)
    {
        $informationRequest = InformationRequest::with(['user', 'objection', 'parentRequest'])->findOrFail($id);

        return view('admin.requests.show', compact('informationRequest'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diproses,disetujui,ditolak',
            'rejection_reason' => 'required_if:status,ditolak|nullable|string|max:1000',
        ], [
            'rejection_reason.required_if' => 'Alasan penolakan wajib diisi jika status ditolak.',
        ]);

        $informationRequest = InformationRequest::findOrFail($id);

        $updateData = ['status' => $validated['status']];

        if ($validated['status'] === 'ditolak') {
            $updateData['rejection_reason'] = $validated['rejection_reason'];
        } else {
            $updateData['rejection_reason'] = null;
        }

        $informationRequest->update($updateData);

        return redirect()->back()->with('success', 'Status permohonan berhasil diperbarui.');
    }
}
