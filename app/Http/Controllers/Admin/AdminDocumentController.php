<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use Illuminate\Http\Request;

class AdminDocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = InformationRequest::with('user')
            ->select('id', 'user_id', 'identity_proof', 'proof_institution', 'institution', 'created_at')
            ->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('fullName', 'like', "%{$search}%");
                })->orWhere('institution', 'like', "%{$search}%");
            });
        }

        $documents = $query->paginate(15)->withQueryString();

        return view('admin.documents.index', compact('documents'));
    }
}
