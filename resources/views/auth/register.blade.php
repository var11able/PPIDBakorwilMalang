<x-layout.app>
    <form action="{{ route('register') }}" method="POST"
        class="bg-white p-4 m-5 rounded-xl shadow-lg max-w-md sm:mx-auto">
        @csrf

        <h2 class="text-center text-2xl font-bold mb-2">
            Register
        </h2>
        <p class="text-center text-xs text-gray-500 mb-3">
            Already have an account?
            <span class="text-link font-semibold active:underline hover:underline">
                <a href="{{ route('show.login') }}">
                    Sign In
                </a>
            </span>
        </p>

        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100 rounded-lg mb-3">
                @foreach ($errors->all() as $error)
                    <li class="my-1 text-red-500 text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="my-3">
            <label for="fullName" class="text-sm block text-gray-600 mb-1">Nama Lengkap
            </label>
            <input type="text" name="fullName" id="fullName" required value="{{ old('fullName') }}"
                placeholder="Masukkan nama lengkap sesuai KTP"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="my-3">
            <label for="email" class="text-sm block text-gray-600 mb-1">Email
            </label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                placeholder="name@example.com"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="my-3" x-data="{
                showPass: false,
                eyePath() {
                    const openPath = 'M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7zm9.542 3a3 3 0 100-6 3 3 0 000 6z';
                    const closedPath = 'M3.98 8.223A10.477 10.477 0 002.458 12C3.645 15.708 7.364 18.5 12 18.5c1.67 0 3.26-.328 4.692-.918M6.228 6.228A10.45 10.45 0 0112 5c4.636 0 8.355 2.792 9.542 6.5a10.523 10.523 0 01-1.33 2.547M3 3l18 18';

                    return this.showPass ? openPath : closedPath;
                }
            }">
            <label for="password" class="text-sm block text-gray-600 mb-1">Password <span class="text-gray-400">(min. 8
                    karakter)</span>
            </label>
            <div class="relative">
                <input :type="showPass ? 'text' : 'password'" name="password" id="password" required minlength="8"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="button"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 cursor-pointer"
                    @click="showPass = !showPass">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" :d="eyePath()" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="my-3">
            <label for="password_confirmation" class="text-sm block text-gray-600 mb-1">Konfirmasi Password
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" required minlength="8"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="my-5 flex items-start space-x-2 mb-7">
            <input type="checkbox" name="agreement" id="agreement" class="cursor-pointer mt-1" {{ old('agreement') ? 'checked' : '' }}>
            <label for="agreement" class="text-sm text-gray-500 leading-relaxed">
                Saya memberikan persetujuan kepada pengelola PPID untuk memproses data pribadi saya terbatas pada tujuan
                layanan informasi publik.
            </label>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-500 text-white text-sm font-semibold py-2 rounded-lg transition-colors duration-200 mb-3 cursor-pointer">Register
            Account
        </button>

    </form>
</x-layout.app>