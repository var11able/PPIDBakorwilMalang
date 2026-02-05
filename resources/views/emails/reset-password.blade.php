@component('mail::message')
# Halo, {{ $user->fullName ?? 'User' }}!

Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda di **PPID Bakorwil Malang**.

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Reset Password
@endcomponent

⏱️ Link ini akan **kadaluarsa dalam 60 menit**.

Jika Anda tidak meminta reset password, abaikan email ini. Password Anda tidak akan berubah.

Salam hormat,<br>
**Tim PPID Bakorwil Malang**

@component('mail::subcopy')
Jika Anda mengalami masalah dengan tombol "Reset Password", salin dan tempel URL berikut ke browser Anda:
[{{ $url }}]({{ $url }})
@endcomponent
@endcomponent