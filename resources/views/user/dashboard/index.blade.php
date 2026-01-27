<x-layout.user>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Permohonan</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalRequests }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pending</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $pendingRequests }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Diproses</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $processedRequests }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Disetujui</p>
                    <p class="text-2xl font-bold text-green-600">{{ $approvedRequests }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Permohonan Terbaru</h3>
            <a href="{{ route('user.history') }}" class="text-sm text-blue-600 hover:text-blue-700">
                Lihat Semua →
            </a>
        </div>
        <div class="space-y-3">
            @forelse ($recentRequests as $request)
                <a href="{{ route('user.request.show', $request->id) }}"
                    class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-gray-50 rounded-lg gap-3 sm:gap-0 hover:bg-gray-100 transition">
                    <div class="flex-1">
                        <p class="font-medium text-gray-900">{{ $request->institution }}</p>
                        <p class="text-sm text-gray-500">{{ Str::limit($request->data_request, 50) }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $request->created_at->format('d M Y') }}</p>
                        @if($request->status === 'ditolak' && $request->rejection_reason)
                            <p class="text-xs text-red-600 mt-1">Alasan: {{ Str::limit($request->rejection_reason, 50) }}</p>
                        @endif
                    </div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                        <span class="px-3 py-1 text-sm font-medium rounded-full 
                                            @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($request->status === 'diproses') bg-blue-100 text-blue-700
                                            @elseif($request->status === 'disetujui') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                        @if($request->request_type === 'permohonan' && $request->status === 'ditolak' && !$request->objection)
                            <span
                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-orange-600 text-white rounded-lg">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Ajukan Keberatan
                            </span>
                        @elseif($request->objection)
                            <span class="text-xs text-green-600">Keberatan diajukan</span>
                        @endif
                    </div>
                </a>
            @empty
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 mb-4">Anda belum memiliki permohonan</p>
                    <a href="{{ route('request.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Ajukan Permohonan
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-layout.user>