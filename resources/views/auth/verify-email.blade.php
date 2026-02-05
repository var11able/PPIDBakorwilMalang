<x-layout.app>
    <div class="bg-white p-6 m-5 rounded-xl shadow-lg max-w-md sm:mx-auto">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold mb-2">Verifikasi Email Anda</h2>
            <p class="text-sm text-gray-500">
                Kami telah mengirim kode verifikasi 6 digit ke <span
                    class="font-semibold text-gray-700">{{ $email }}</span>
            </p>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 px-4 py-3 bg-red-100 border border-red-400 text-red-600 rounded-lg text-sm">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('verification.verify') }}" class="mb-4">
            @csrf

            <div class="mb-4">
                <label class="text-sm block text-gray-600 mb-2 text-center">Masukkan Kode Verifikasi</label>
                <div class="flex justify-center gap-2" x-data="{
                        code: ['', '', '', '', '', ''],
                        focusNext(index) {
                            if (this.code[index] && index < 5) {
                                this.$refs['input' + (index + 1)].focus();
                            }
                        },
                        focusPrev(index, event) {
                            if (event.key === 'Backspace' && !this.code[index] && index > 0) {
                                this.$refs['input' + (index - 1)].focus();
                            }
                        },
                        handlePaste(event) {
                            event.preventDefault();
                            const paste = event.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6);
                            for (let i = 0; i < paste.length; i++) {
                                this.code[i] = paste[i];
                            }
                            if (paste.length === 6) {
                                this.$refs['input5'].focus();
                            }
                        },
                        getFullCode() {
                            return this.code.join('');
                        }
                    }">
                    <input type="hidden" name="code" :value="getFullCode()">
                    @for ($i = 0; $i < 6; $i++)
                        <input type="text" maxlength="1" x-ref="input{{ $i }}" x-model="code[{{ $i }}]"
                            @input="focusNext({{ $i }})" @keydown="focusPrev({{ $i }}, $event)" @paste="handlePaste($event)"
                            class="w-12 h-14 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            inputmode="numeric" pattern="[0-9]*">
                    @endfor
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-500 text-white text-sm font-semibold py-3 rounded-lg transition-colors duration-200 cursor-pointer">Verifikasi
            </button>
        </form>

        <div class="text-center">
            <p class="text-sm text-gray-500 mb-2">Tidak menerima kode?</p>
            <form method="POST" action="{{ route('verification.send') }}" class="inline">
                @csrf
                <button type="submit"
                    class="text-blue-600 hover:text-blue-800 text-sm font-semibold hover:underline cursor-pointer">Kirim
                    Ulang Kode
                </button>
            </form>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold py-2 rounded-lg transition-colors duration-200 cursor-pointer">Logout
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-4">
            Kode verifikasi akan kadaluarsa dalam 5 menit.
        </p>
    </div>
</x-layout.app>