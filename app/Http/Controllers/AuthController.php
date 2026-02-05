<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\VerificationController;
use App\Notifications\VerificationCodeNotification;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:40',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'agreement' => 'accepted',
        ], [
            'fullName.required' => 'Nama lengkap wajib diisi.',
            'fullName.max' => 'Nama depan maksimal 40 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'agreement.accepted' => 'Anda harus menyetujui persetujuan pemrosesan data.',
        ]);

        $code = VerificationController::generateCode();

        $user = User::create([
            'fullName' => $validated['fullName'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'verification_code' => $code,
            'verification_code_expires_at' => now()->addMinutes(5),
        ]);

        Auth::login($user);

        $user->notify(new VerificationCodeNotification($code));

        $request->session()->regenerate();

        return redirect()->route('verification.notice');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if (!$user->hasVerifiedEmail()) {
                // If no verification code exists or expired, generate new one
                if (!$user->verification_code || now()->isAfter($user->verification_code_expires_at)) {
                    $code = VerificationController::generateCode();
                    $user->verification_code = $code;
                    $user->verification_code_expires_at = now()->addMinutes(5);
                    $user->save();
                    $user->notify(new VerificationCodeNotification($code));
                }
                return redirect()->route('verification.notice');
            }

            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Username atau password salah. Silakan coba lagi.'
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        if ($user instanceof User) {
            $user->setRememberToken(null);
            $user->save();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
