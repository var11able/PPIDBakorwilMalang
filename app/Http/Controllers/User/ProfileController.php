<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:40',
        ], [
            'fullName.required' => 'Nama lengkap wajib diisi.',
            'fullName.max' => 'Nama lengkap maksimal 40 karakter.',
        ]);

        $user = Auth::user();
        $user->fullName = $validated['fullName'];
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
