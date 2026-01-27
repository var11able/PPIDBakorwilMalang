<x-layout.admin>
    <x-slot:title>Detail Pengguna</x-slot:title>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl font-bold text-blue-600">{{ substr($user->fullName, 0, 1) }}</span>
                </div>
                <h2 class="text-xl font-semibold text-gray-900">{{ $user->fullName }}</h2>
                <p class="text-gray-500">{{ $user->email }}</p>
                <span class="inline-block mt-2 px-3 py-1 text-sm font-medium rounded-full 
                    @if($user->role === 'admin') bg-purple-100 text-purple-700
                    @elseif($user->role === 'staff') bg-blue-100 text-blue-700
                    @else bg-gray-100 text-gray-700
                    @endif">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            <dl class="space-y-3">
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Total Permohonan</dt>
                    <dd class="text-sm font-medium text-gray-900">{{ $user->requests_count }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Terdaftar</dt>
                    <dd class="text-sm font-medium text-gray-900">{{ $user->created_at->format('d M Y') }}</dd>
                </div>
            </dl>
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center justify-center mt-6 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Permohonan Terbaru</h3>
            <div class="space-y-3">
                @forelse ($user->requests as $request)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">{{ $request->institution }}</p>
                            <p class="text-sm text-gray-500">{{ $request->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($request->status === 'diproses') bg-blue-100 text-blue-700
                                    @elseif($request->status === 'disetujui') bg-green-100 text-green-700
                                    @else bg-red-100 text-red-700
                                    @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                            <a href="{{ route('admin.requests.show', $request->id) }}"
                                class="text-blue-600 hover:text-blue-700 text-sm">
                                Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada permohonan</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout.admin>