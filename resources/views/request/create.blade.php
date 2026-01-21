<x-layout.app>
    <x-slot:title>Ajukan Permohonan Informasi</x-slot:title>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-3xl mx-auto">
            
            {{-- Header --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                    Permohonan Informasi Publik
                </h1>
                <p class="text-white/80 text-base md:text-lg">
                    Isi formulir di bawah ini untuk mengajukan permohonan informasi
                </p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 lg:p-10">
                
                {{-- Info Alert --}}
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Pastikan semua data yang Anda masukkan benar dan lengkap. Dokumen yang diunggah harus sesuai dengan format yang ditentukan.
                            </p>
                        </div>
                    </div>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div class="mb-6">
                        <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="nama_lengkap" 
                            id="nama_lengkap"
                            required
                            value="{{ old('nama_lengkap') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('nama_lengkap') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap sesuai KTP"
                        >
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Bukti Identitas --}}
                    <div class="mb-6">
                        <label for="bukti_identitas" class="block text-sm font-semibold text-gray-700 mb-2">
                            Bukti Identitas (KTP/SIM) <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition duration-200 @error('bukti_identitas') border-red-500 @enderror">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="bukti_identitas" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload file</span>
                                        <input 
                                            id="bukti_identitas" 
                                            name="bukti_identitas" 
                                            type="file" 
                                            class="sr-only"
                                            accept="image/*"
                                            required
                                            onchange="displayFileName(this, 'identitas-name')"
                                        >
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG maksimal 1MB</p>
                                <p id="identitas-name" class="text-sm text-blue-600 font-medium mt-2"></p>
                            </div>
                        </div>
                        @error('bukti_identitas')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Asal Instansi --}}
                    <div class="mb-6">
                        <label for="asal_instansi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Asal Instansi <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="asal_instansi" 
                            id="asal_instansi"
                            required
                            value="{{ old('asal_instansi') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('asal_instansi') border-red-500 @enderror"
                            placeholder="Nama instansi / organisasi"
                        >
                        @error('asal_instansi')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Bukti Keanggotaan Instansi --}}
                    <div class="mb-6">
                        <label for="bukti_keanggotaan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Bukti Keanggotaan Instansi <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition duration-200 @error('bukti_keanggotaan') border-red-500 @enderror">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="bukti_keanggotaan" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload file</span>
                                        <input 
                                            id="bukti_keanggotaan" 
                                            name="bukti_keanggotaan" 
                                            type="file" 
                                            class="sr-only"
                                            required
                                            onchange="displayFileName(this, 'keanggotaan-name')"
                                        >
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF, DOC, DOCX, JPG, PNG maksimal 10MB</p>
                                <p id="keanggotaan-name" class="text-sm text-blue-600 font-medium mt-2"></p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">
                            Contoh: Surat tugas, kartu anggota, atau surat keterangan dari instansi
                        </p>
                        @error('bukti_keanggotaan')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Jenis Data Dimohonkan --}}
                    <div class="mb-6">
                        <label for="jenis_data" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Data Dimohonkan <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="jenis_data" 
                            id="jenis_data"
                            required
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('jenis_data') border-red-500 @enderror"
                            placeholder="Jelaskan secara detail informasi yang Anda butuhkan..."
                        >{{ old('jenis_data') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">
                            Semakin detail informasi yang Anda berikan, semakin cepat kami dapat memproses permohonan Anda
                        </p>
                        @error('jenis_data')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nomor WhatsApp --}}
                    <div class="mb-8">
                        <label for="nomor_wa" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <input 
                                type="tel" 
                                name="nomor_wa" 
                                id="nomor_wa"
                                required
                                value="{{ old('nomor_wa') }}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('nomor_wa') border-red-500 @enderror"
                                placeholder="08xxxxxxxxxx"
                            >
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            Nomor WhatsApp aktif untuk konfirmasi dan pemberitahuan status permohonan
                        </p>
                        @error('nomor_wa')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Terms & Conditions --}}
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input 
                                    id="terms" 
                                    name="terms" 
                                    type="checkbox" 
                                    required
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                >
                            </div>
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan. Saya memahami bahwa penyalahgunaan layanan ini dapat dikenakan sanksi sesuai peraturan yang berlaku.
                            </label>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button 
                            type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center cursor-pointer"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Kirim Permohonan
                        </button>
                        
                        <a 
                            href="{{ route('home') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-4 px-6 rounded-lg transition-all duration-200 flex items-center justify-center"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a>
                    </div>

                </form>

            </div>

            {{-- Help Section --}}
            <div class="mt-8 bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Butuh Bantuan?
                </h3>
                <p class="text-gray-600 text-sm mb-3">
                    Jika Anda mengalami kesulitan dalam mengisi formulir, silakan hubungi kami:
                </p>
                <div class="flex flex-col sm:flex-row gap-3 text-sm">
                    <a href="mailto:ppid@instansi.go.id" class="flex items-center text-blue-600 hover:text-blue-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        ppid@instansi.go.id
                    </a>
                    <a href="tel:+622112345678" class="flex items-center text-blue-600 hover:text-blue-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        (021) 1234-5678
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- JavaScript for file name display --}}
    <script>
        function displayFileName(input, displayId) {
            const display = document.getElementById(displayId);
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2); // MB
                display.textContent = `📄 ${fileName} (${fileSize} MB)`;
            }
        }
    </script>

</x-layout.app>