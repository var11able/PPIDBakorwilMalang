<x-layout.admin>
    <x-slot:title>Detail Permohonan</x-slot:title>

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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Request Info -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Permohonan</h3>
                <dl class="space-y-4">
                    <div class="grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Tipe</dt>
                        <dd class="col-span-2">
                            <span
                                class="px-2 py-1 text-xs font-medium rounded-full {{ $informationRequest->request_type === 'permohonan' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ ucfirst($informationRequest->request_type) }}
                            </span>
                        </dd>
                    </div>
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
                            <dd class="col-span-2 text-sm text-gray-900">{{ $informationRequest->complaint }}</dd>
                        </div>
                    @endif
                    @if ($informationRequest->rejection_reason)
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Alasan Penolakan</dt>
                            <dd class="col-span-2 text-sm text-red-600 bg-red-50 p-2 rounded">{{ $informationRequest->rejection_reason }}</dd>
                        </div>
                    @endif
                    @if ($informationRequest->parentRequest)
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Permohonan Asal</dt>
                            <dd class="col-span-2">
                                <a href="{{ route('admin.requests.show', $informationRequest->parentRequest->id) }}" 
                                   class="text-sm text-blue-600 hover:underline">
                                    Lihat Permohonan #{{ $informationRequest->parentRequest->id }}
                                </a>
                            </dd>
                        </div>
                    @endif
                    <div class="grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Tanggal Pengajuan</dt>
                        <dd class="col-span-2 text-sm text-gray-900">
                            {{ $informationRequest->created_at->format('d M Y, H:i') }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Dokumen</h3>
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
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Pemohon</h3>
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <span
                            class="text-lg font-semibold text-blue-600">{{ substr($informationRequest->user->fullName, 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-gray-900">{{ $informationRequest->user->fullName }}</p>
                        <p class="text-sm text-gray-500">{{ $informationRequest->user->email }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                <form action="{{ route('admin.requests.update', $informationRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Saat Ini</label>
                            <span class="px-3 py-1 text-sm font-medium rounded-full 
                                @if($informationRequest->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($informationRequest->status === 'diproses') bg-blue-100 text-blue-700
                                @elseif($informationRequest->status === 'disetujui') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700
                                @endif">
                                {{ ucfirst($informationRequest->status) }}
                            </span>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Ubah Status</label>
                            <select name="status" id="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                onchange="toggleRejectionReason()">
                                <option value="pending" {{ $informationRequest->status === 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="diproses" {{ $informationRequest->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="disetujui" {{ $informationRequest->status === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="ditolak" {{ $informationRequest->status === 'ditolak' ? 'selected' : '' }}>
                                    Ditolak</option>
                            </select>
                        </div>
                        <div id="rejection-reason-container"
                            class="{{ $informationRequest->status === 'ditolak' ? '' : 'hidden' }}">
                            <label for="rejection_reason" class="block text-sm font-medium text-gray-700 mb-2">Alasan
                                Penolakan <span class="text-red-500">*</span></label>
                            <textarea name="rejection_reason" id="rejection_reason" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('rejection_reason') border-red-500 @enderror"
                                placeholder="Jelaskan alasan penolakan permohonan ini...">{{ old('rejection_reason', $informationRequest->rejection_reason) }}</textarea>
                            @error('rejection_reason')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function toggleRejectionReason() {
                    const status = document.getElementById('status').value;
                    const container = document.getElementById('rejection-reason-container');
                    if (status === 'ditolak') {
                        container.classList.remove('hidden');
                    } else {
                        container.classList.add('hidden');
                    }
                }
            </script>

            <a href="{{ route('admin.requests.index') }}"
                class="flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>
</x-layout.admin>