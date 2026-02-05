@component('mail::message')
# Halo, {{ $user->fullName }}!

Terima kasih telah mendaftar di **PPID Bakorwil Malang**.

Berikut adalah kode verifikasi email Anda:

@component('mail::panel')
<div style="text-align: center;">
    <span
        style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: #ffffff; font-size: 32px; font-weight: bold; letter-spacing: 10px; padding: 16px 32px; border-radius: 12px; display: inline-block;">{{ $code }}</span>
</div>
@endcomponent

⏱️ Kode ini akan **kadaluarsa dalam 5 menit**.

Jika Anda tidak melakukan registrasi di PPID Bakorwil Malang, abaikan email ini.

Salam hormat,<br>
**Tim PPID Bakorwil Malang**
@endcomponent