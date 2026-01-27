<x-layout.admin>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <div class="flex items-start">
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

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <div class="flex items-start">
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

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <div class="flex items-start">
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

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <div class="flex items-start">
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

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Permohonan</h3>
            <div class="h-64 flex items-end justify-between space-x-2">
                @php
                    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    $maxVal = $monthlyStats->max('total') ?: 1;
                @endphp
                @foreach ($monthlyStats as $stat)
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-full bg-blue-500 rounded-t transition-all duration-300"
                            style="height: {{ ($stat->total / $maxVal) * 200 }}px;"></div>
                        <span class="text-xs text-gray-500 mt-2">{{ $months[$stat->month - 1] }}</span>
                    </div>
                @endforeach
                @if($monthlyStats->isEmpty())
                    <div class="flex-1 flex items-center justify-center text-gray-400">
                        Belum ada data
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Permohonan Terbaru</h3>
                <a href="{{ route('admin.requests.index') }}" class="text-sm text-blue-600 hover:text-blue-700">
                    Lihat Semua →
                </a>
            </div>
            <div class="space-y-3">
                @forelse ($recentRequests as $request)
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-3 bg-gray-50 rounded-lg gap-3 sm:gap-0">
                        <div>
                            <p class="font-medium text-gray-900">{{ $request->user->fullName }}</p>
                            <p class="text-sm text-gray-500">{{ $request->institution }}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full 
                                        @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                        @elseif($request->status === 'diproses') bg-blue-100 text-blue-700
                                        @elseif($request->status === 'disetujui') bg-green-100 text-green-700
                                        @else bg-red-100 text-red-700
                                        @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada permohonan</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Total Pengguna</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
            <p class="text-sm text-gray-500 mt-1">Pengguna terdaftar</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 h-full">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Permohonan Ditolak</h3>
            <p class="text-3xl font-bold text-red-600">{{ $rejectedRequests }}</p>
            <p class="text-sm text-gray-500 mt-1">Total permohonan ditolak</p>
        </div>
    </div>
</x-layout.admin>