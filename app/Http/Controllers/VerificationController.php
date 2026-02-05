<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\VerificationCodeNotification;

class VerificationController extends Controller
{
    public function showVerifyForm()
    {
        $user = Auth::user();

        // If already verified, redirect to dashboard
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.dashboard');
        }

        return view('auth.verify-email', [
            'email' => $user->email,
        ]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ], [
            'code.required' => 'Kode verifikasi wajib diisi.',
            'code.size' => 'Kode verifikasi harus 6 digit.',
        ]);

        $user = Auth::user();

        if ($user->verification_code !== $request->code) {
            return back()->withErrors(['code' => 'Kode verifikasi salah.']);
        }

        if (now()->isAfter($user->verification_code_expires_at)) {
            return back()->withErrors(['code' => 'Kode verifikasi sudah kadaluarsa. Silakan kirim ulang.']);
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Email berhasil diverifikasi!');
    }

    public function resend(Request $request)
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.dashboard');
        }

        $code = $this->generateCode();
        $user->verification_code = $code;
        $user->verification_code_expires_at = now()->addMinutes(5);
        $user->save();

        $user->notify(new VerificationCodeNotification($code));

        return back()->with('success', 'Kode verifikasi baru telah dikirim ke email Anda!');
    }

    public static function generateCode(): string
    {
        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}
