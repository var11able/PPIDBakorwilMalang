<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin.settings.index', compact('admin'));
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

        return redirect()->back()->with('success', 'Nama berhasil diperbarui.');
    }
}
