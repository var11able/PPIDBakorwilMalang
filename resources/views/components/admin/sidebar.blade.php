@php
    $currentRoute = request()->route()->getName();
    
    $menuItems = [
        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
        ['route' => 'admin.requests.index', 'label' => 'Permohonan', 'icon' => 'document'],
        ['route' => 'admin.documents.index', 'label' => 'Dokumen', 'icon' => 'folder'],
        ['route' => 'admin.users.index', 'label' => 'Pengguna', 'icon' => 'users'],
        ['route' => 'admin.reports.index', 'label' => 'Laporan', 'icon' => 'chart'],
        ['route' => 'admin.settings.index', 'label' => 'Pengaturan', 'icon' => 'settings'],
    ];
@endphp

<aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-blue-700 text-white lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
    <div class="p-6 border-b border-blue-600">
        <h2 class="text-xl font-bold">PPID Bakorwil Malang</h2>
        <p class="text-blue-200 text-sm mt-1">Panel Admin</p>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        @foreach ($menuItems as $item)
            @php
                $isActive = str_starts_with($currentRoute, explode('.index', $item['route'])[0]);
            @endphp
            <a href="{{ route($item['route']) }}"
                onclick="window.location.href=this.href; return true;"
                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200 cursor-pointer {{ $isActive ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-600' }}">
                @switch($item['icon'])
                    @case('home')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    @break
                    @case('document')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    @break
                    @case('folder')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                    @break
                    @case('users')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    @break
                    @case('chart')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    @break
                    @case('settings')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    @break
                @endswitch
                {{ $item['label'] }}
            </a>
        @endforeach

        <div class="pt-4 border-t border-blue-600 mt-4">
            <a href="{{ route('home') }}"
                onclick="window.location.href=this.href; return true;"
                class="flex items-center px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="p-4 border-t border-blue-600">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                <span class="text-lg font-semibold">{{ substr(auth()->user()->fullName, 0, 1) }}</span>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium">{{ auth()->user()->fullName }}</p>
                <p class="text-xs text-blue-200 capitalize">{{ auth()->user()->role }}</p>
            </div>
        </div>
    </div>
</aside>
