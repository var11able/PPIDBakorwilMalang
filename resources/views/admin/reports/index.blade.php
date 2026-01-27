<x-layout.admin>
    <x-slot:title>Laporan</x-slot:title>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Laporan Aktivitas Pengguna</h3>
            <p class="text-sm text-gray-500 mb-4">Pengguna dengan permohonan terbanyak</p>
            <div class="space-y-3">
                @forelse ($userStats as $index => $user)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <span
                                class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-medium">
                                {{ $index + 1 }}
                            </span>
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">{{ $user->fullName }}</p>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                            {{ $user->requests_count }} permohonan
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada aktivitas</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Bulanan</h3>
            <div class="space-y-4">
                @php
                    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                @endphp
                @forelse ($monthlyRequests as $stat)
                    <div class="flex items-center space-x-4">
                        <span class="w-16 text-sm text-gray-600">{{ $months[$stat->month - 1] }} {{ $stat->year }}</span>
                        <div class="flex-1 flex items-center space-x-2">
                            <div class="flex-1 bg-gray-200 rounded-full h-4 overflow-hidden">
                                <div class="h-full bg-blue-500 rounded-full"
                                    style="width: {{ min(($stat->total / max($monthlyRequests->max('total'), 1)) * 100, 100) }}%">
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">{{ $stat->total }}</span>
                        </div>
                        <span class="text-xs text-green-600">✓ {{ $stat->approved }}</span>
                        <span class="text-xs text-red-600">✗ {{ $stat->rejected }}</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada data</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-3">
            @forelse ($recentActivity as $activity)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <span
                                class="text-sm font-semibold text-blue-600">{{ substr($activity->user->fullName, 0, 1) }}</span>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-gray-900">{{ $activity->user->fullName }}</p>
                            <p class="text-sm text-gray-500">{{ ucfirst($activity->request_type) }} -
                                {{ $activity->institution }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                                @if($activity->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($activity->status === 'diproses') bg-blue-100 text-blue-700
                                @elseif($activity->status === 'disetujui') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700
                                @endif">
                            {{ ucfirst($activity->status) }}
                        </span>
                        <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Belum ada aktivitas</p>
            @endforelse
        </div>
    </div>
</x-layout.admin>