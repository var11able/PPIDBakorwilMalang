<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformationRequest;

class RequestController extends Controller
{
    public function create()
    {
        return view('request.create');
    }

    public function complaint()
    {
        return view('request.complaint');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'identity_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'institution' => 'required|string|max:255',
            'proof_institution' => 'required|mimes:pdf|max:4096',
            'data_request' => 'required|string|max:1000',
            'phone_number' => 'required|string|min:10|max:20'
        ], [
            'identity_proof.required' => 'Bukti identitas wajib diunggah.',
            'identity_proof.image' => 'Bukti identitas harus berupa gambar.',
            'identity_proof.mimes' => 'Format file harus JPG, JPEG, atau PNG.',
            'identity_proof.max' => 'Ukuran file maksimal 2MB.',
            'institution.required' => 'Asal instansi wajib diisi.',
            'proof_institution.required' => 'Bukti keanggotaan instansi wajib diunggah.',
            'proof_institution.mimes' => 'Format file harus PDF.',
            'proof_institution.max' => 'Ukuran file maksimal 4MB.',
            'data_request.required' => 'Jenis data yang dimohonkan wajib diisi.',
            'data_request.min' => 'Jelaskan data yang dimohonkan minimal 30 karakter.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'phone_number.min' => 'Nomor WhatsApp minimal 10 digit.',
        ]);

        $userId = auth()->id();
        $timestamp = time();

        $identityPath = $request->file('identity_proof')
            ->storeAs('ppid/identity', "{$userId}_{$timestamp}_identity." . $request->file('identity_proof')->extension(), 'public');

        $institutionPath = $request->file('proof_institution')
            ->storeAs('ppid/institution', "{$userId}_{$timestamp}_institution." . $request->file('proof_institution')->extension(), 'public');

        InformationRequest::create([
            'user_id' => $userId,
            'request_type' => 'permohonan',
            'identity_proof' => $identityPath,
            'institution' => $validated['institution'],
            'proof_institution' => $institutionPath,
            'data_request' => $validated['data_request'],
            'phone_number' => $validated['phone_number'],
            'status' => 'pending',
        ]);

        return redirect()->route('request.create')->with('success', 'Permohonan informasi berhasil dikirim! Kami akan memproses dalam 10 hari kerja.');
    }

    public function showComplaint($parentId)
    {
        $parentRequest = InformationRequest::where('id', $parentId)
            ->where('user_id', auth()->id())
            ->where('request_type', 'permohonan')
            ->where('status', 'ditolak')
            ->whereDoesntHave('objection')
            ->firstOrFail();

        return view('request.complaint-form', compact('parentRequest'));
    }

    public function storeComplaint(Request $request, $parentId)
    {
        $parentRequest = InformationRequest::where('id', $parentId)
            ->where('user_id', auth()->id())
            ->where('request_type', 'permohonan')
            ->where('status', 'ditolak')
            ->whereDoesntHave('objection')
            ->firstOrFail();

        $validated = $request->validate([
            'complaint' => 'required|string|min:30|max:1000',
        ], [
            'complaint.required' => 'Alasan keberatan wajib diisi.',
            'complaint.min' => 'Alasan keberatan minimal 30 karakter.',
            'complaint.max' => 'Alasan keberatan maksimal 1000 karakter.',
        ]);

        InformationRequest::create([
            'user_id' => auth()->id(),
            'request_type' => 'keberatan',
            'identity_proof' => $parentRequest->identity_proof,
            'institution' => $parentRequest->institution,
            'proof_institution' => $parentRequest->proof_institution,
            'data_request' => $parentRequest->data_request,
            'phone_number' => $parentRequest->phone_number,
            'complaint' => $validated['complaint'],
            'status' => 'pending',
            'parent_request_id' => $parentRequest->id,
        ]);

        return redirect()->route('user.history')->with('success', 'Keberatan berhasil diajukan! Kami akan memproses dalam 10 hari kerja.');
    }
}
