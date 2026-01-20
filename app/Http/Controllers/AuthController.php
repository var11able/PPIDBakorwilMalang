<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Maaf Salah, Izinnn 🙏'
        ]);
    }

    public function logout(Request $request) {
        $user = Auth::user();

        Auth::logout();

        if($user instanceof \App\Models\User) {
            $user->setRememberToken(null);
            $user->save();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
