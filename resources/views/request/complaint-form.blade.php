<x-layout.app>
    <x-slot:title>Ajukan Keberatan</x-slot:title>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                    Ajukan Keberatan
                </h1>
                <p class="text-white/80 text-base md:text-lg">
                    Ajukan keberatan atas penolakan permohonan informasi Anda
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 lg:p-10">
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Permohonan Ditolak</h3>
                            <p class="text-sm text-red-700 mt-1">{{ $parentRequest->rejection_reason }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Detail Permohonan Awal</h3>
                    <dl class="space-y-2 text-sm">
                        <div class="flex">
                            <dt class="w-32 text-gray-500">Instansi</dt>
                            <dd class="text-gray-900">{{ $parentRequest->institution }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="w-32 text-gray-500">Data Dimohon</dt>
                            <dd class="text-gray-900">{{ $parentRequest->data_request }}</dd>
                        </div>
                        <div class="flex">
                            <dt class="w-32 text-gray-500">Tanggal</dt>
                            <dd class="text-gray-900">{{ $parentRequest->created_at->format('d M Y, H:i') }}</dd>
                        </div>
                    </dl>
                </div>

                <form action="{{ route('request.complaint.store', $parentRequest->id) }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="complaint" class="block text-sm font-semibold text-gray-700 mb-2">
                            Alasan Keberatan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="complaint" id="complaint" required rows="6"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 @error('complaint') border-red-500 @enderror"
                            placeholder="Jelaskan alasan keberatan Anda atas penolakan permohonan ini. Sertakan argumen dan dasar hukum jika ada...">{{ old('complaint') }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">
                            Minimal 30 karakter, maksimal 1000 karakter
                        </p>
                        @error('complaint')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 bg-orange-600 hover:bg-orange-700 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 flex items-center justify-center cursor-pointer">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Kirim Keberatan
                        </button>

                        <a href="{{ route('user.history') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-4 px-6 rounded-lg transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-8 bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Keberatan
                </h3>
                <ul class="text-gray-600 text-sm space-y-2">
                    <li>• Keberatan akan diproses dalam waktu 10 hari kerja</li>
                    <li>• Pastikan alasan keberatan Anda jelas dan terperinci</li>
                    <li>• Anda akan dihubungi melalui WhatsApp untuk pemberitahuan hasil</li>
                </ul>
            </div>
        </div>
    </div>
</x-layout.app>