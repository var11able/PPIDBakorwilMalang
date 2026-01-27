<x-layout.admin>
    <x-slot:title>Permohonan</x-slot:title>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
        <form action="{{ route('admin.requests.index') }}" method="GET" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama atau instansi..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ request('status') === 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="disetujui" {{ request('status') === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="ditolak" {{ request('status') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            <select name="type" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Tipe</option>
                <option value="permohonan" {{ request('type') === 'permohonan' ? 'selected' : '' }}>Permohonan</option>
                <option value="keberatan" {{ request('type') === 'keberatan' ? 'selected' : '' }}>Keberatan</option>
            </select>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Pemohon</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Data Dimohonkan</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($requests as $index => $request)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $requests->firstItem() + $index }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $request->user->fullName }}</div>
                            <div class="text-sm text-gray-500">{{ $request->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($request->data_request, 50) }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 text-xs font-medium rounded-full {{ $request->request_type === 'permohonan' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ ucfirst($request->request_type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                            @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($request->status === 'diproses') bg-blue-100 text-blue-700
                                            @elseif($request->status === 'disetujui') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $request->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.requests.show', $request->id) }}"
                                class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">Tidak ada permohonan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $requests->links() }}
    </div>
</x-layout.admin>