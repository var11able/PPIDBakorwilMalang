<x-layout.user>
    <x-slot:title>Detail Permohonan</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('user.history') }}"
                class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Riwayat
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Permohonan</h3>
                        <span class="px-3 py-1 text-sm font-medium rounded-full 
                            @if($informationRequest->request_type === 'permohonan') bg-blue-100 text-blue-700
                            @else bg-orange-100 text-orange-700
                            @endif">
                            {{ ucfirst($informationRequest->request_type) }}
                        </span>
                    </div>
                    <dl class="space-y-4">
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Instansi</dt>
                            <dd class="col-span-2 text-sm text-gray-900">{{ $informationRequest->institution }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">No. WhatsApp</dt>
                            <dd class="col-span-2 text-sm text-gray-900">{{ $informationRequest->phone_number }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Data Dimohonkan</dt>
                            <dd class="col-span-2 text-sm text-gray-900">{{ $informationRequest->data_request }}</dd>
                        </div>
                        @if ($informationRequest->complaint)
                            <div class="grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Alasan Keberatan</dt>
                                <dd class="col-span-2 text-sm text-gray-900 bg-orange-50 p-2 rounded">
                                    {{ $informationRequest->complaint }}</dd>
                            </div>
                        @endif
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Tanggal Pengajuan</dt>
                            <dd class="col-span-2 text-sm text-gray-900">
                                {{ $informationRequest->created_at->format('d M Y, H:i') }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Dokumen yang Diunggah</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ asset('storage/' . $informationRequest->identity_proof) }}" target="_blank"
                            class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="p-2 bg-red-100 rounded-lg">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Bukti Identitas</p>
                                <p class="text-xs text-gray-500">Klik untuk melihat</p>
                            </div>
                        </a>
                        <a href="{{ asset('storage/' . $informationRequest->proof_institution) }}" target="_blank"
                            class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Bukti Instansi</p>
                                <p class="text-xs text-gray-500">Klik untuk melihat (PDF)</p>
                            </div>
                        </a>
                    </div>
                </div>

                @if ($informationRequest->parentRequest)
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Permohonan Asal</h3>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">Keberatan ini diajukan untuk permohonan:</p>
                            <p class="text-sm font-medium text-gray-900">
                                {{ Str::limit($informationRequest->parentRequest->data_request, 100) }}</p>
                            <p class="text-xs text-gray-500 mt-1">Diajukan:
                                {{ $informationRequest->parentRequest->created_at->format('d M Y') }}</p>
                            <a href="{{ route('user.request.show', $informationRequest->parentRequest->id) }}"
                                class="inline-flex items-center mt-2 text-sm text-blue-600 hover:underline">
                                Lihat Detail Permohonan Asal
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Permohonan</h3>
                    <div class="text-center py-4">
                        <span class="px-4 py-2 text-lg font-semibold rounded-full 
                            @if($informationRequest->status === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($informationRequest->status === 'diproses') bg-blue-100 text-blue-700
                            @elseif($informationRequest->status === 'disetujui') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($informationRequest->status) }}
                        </span>
                    </div>
                    @if($informationRequest->status === 'ditolak' && $informationRequest->rejection_reason)
                        <div class="mt-4 p-4 bg-red-50 rounded-lg">
                            <p class="text-sm font-medium text-red-800 mb-1">Alasan Penolakan:</p>
                            <p class="text-sm text-red-700">{{ $informationRequest->rejection_reason }}</p>
                        </div>
                    @endif
                </div>

                @if($informationRequest->request_type === 'permohonan' && $informationRequest->status === 'ditolak' && !$informationRequest->objection)
                    <div class="bg-orange-50 rounded-xl shadow-sm p-6 border border-orange-200">
                        <h3 class="text-lg font-semibold text-orange-800 mb-2">Ajukan Keberatan</h3>
                        <p class="text-sm text-orange-700 mb-4">Permohonan Anda ditolak. Anda dapat mengajukan keberatan
                            jika tidak setuju dengan keputusan ini.</p>
                        <a href="{{ route('request.complaint.form', $informationRequest->id) }}"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Ajukan Keberatan
                        </a>
                    </div>
                @endif

                @if($informationRequest->objection)
                    <div class="bg-green-50 rounded-xl shadow-sm p-6 border border-green-200">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Keberatan Telah Diajukan</h3>
                        <p class="text-sm text-green-700 mb-2">Anda telah mengajukan keberatan untuk permohonan ini.</p>
                        <p class="text-xs text-green-600">Status: {{ ucfirst($informationRequest->objection->status) }}</p>
                        <a href="{{ route('user.request.show', $informationRequest->objection->id) }}"
                            class="inline-flex items-center mt-2 text-sm text-green-700 hover:underline">
                            Lihat Detail Keberatan
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Butuh Bantuan?</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        Jika ada pertanyaan tentang permohonan Anda:
                    </p>
                    <div class="space-y-2 text-sm">
                        <a href="mailto:ppid@bakorwilmalang.go.id"
                            class="flex items-center text-blue-600 hover:text-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            ppid@bakorwilmalang.go.id
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="flex items-center text-green-600 hover:text-green-700">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.user>