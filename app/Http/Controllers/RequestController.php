<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformationRequest;

class RequestController extends Controller
{
    public function create() {
        return view('request.create');
    }

    public function complaint() {
        return view('request.complaint');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'identity_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'institution' => 'required|string|max:255',
            'proof_institution' => 'required|mimes:pdf|max:4096',
            'data_request' => 'required|string|min:30|max:1000',
            'phone_number' => 'required|string|min:13|max:20'
        ]);

        $identityPath = $request->file('identity_proof')
            ->store('ppid/identity', 'public');

        $institutionPath = $request->file('proof_instituion')
            ->store('ppid/instituion', 'public');

        InformationRequest::create([
            'user_id' => auth()->id(),
            'request_type' => $validated['request_type'],
            'identity_proof' => $identityPath,
            'institution' => $validated['institution'],
            'proof_institution' => $institutionPath,
            'data_request' => $validated['data_request'],
            'phone_number' => $validated['phone_number'],
            'complaint' => $validated['complaint'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('request.create');
    }
}
