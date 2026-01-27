<x-layout.user>
    <x-slot:title>Profil</x-slot:title>

    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Edit Profil</h3>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Profile Avatar -->
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-blue-600">{{ substr($user->fullName, 0, 1) }}</span>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">{{ $user->fullName }}</p>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>

                    <!-- Name -->
                    <div>
                        <label for="fullName" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="fullName" id="fullName" value="{{ old('fullName', $user->fullName) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fullName') border-red-500 @enderror">
                        @error('fullName')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email (readonly) -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" value="{{ $user->email }}" readonly
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed">
                        <p class="text-sm text-gray-500 mt-1">Email tidak dapat diubah</p>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout.user>