<x-layout.app>
    <form action="{{ route('password.email') }}" method="POST"
        class="bg-white p-4 m-5 rounded-xl shadow-lg max-w-md sm:mx-auto">
        @csrf

        <h2 class="text-center text-2xl font-bold mb-2">
            Lupa Password
        </h2>
        <p class="text-center text-xs text-gray-500 mb-4">
            Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
        </p>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100 rounded-lg mb-3">
                @foreach ($errors->all() as $error)
                    <li class="my-1 text-red-500 text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="my-3">
            <label for="email" class="text-sm block text-gray-600 mb-1">Email
            </label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                placeholder="name@example.com"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-500 text-white text-sm font-semibold py-2 rounded-lg transition-colors duration-200 mb-3 cursor-pointer">Kirim
            Link Reset Password
        </button>

        <p class="text-center text-xs text-gray-500">
            Ingat password Anda?
            <span class="text-link font-semibold active:underline hover:underline">
                <a href="{{ route('show.login') }}">
                    Kembali ke Login
                </a>
            </span>
        </p>

    </form>
</x-layout.app>