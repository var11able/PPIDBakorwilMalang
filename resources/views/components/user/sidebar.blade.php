@php
    $currentRoute = request()->route()->getName();
    
    $menuItems = [
        ['route' => 'user.dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
        ['route' => 'user.history', 'label' => 'Riwayat Permohonan', 'icon' => 'clock'],
        ['route' => 'profile.edit', 'label' => 'Profil', 'icon' => 'user'],
    ];
@endphp

<aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-blue-700 text-white lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
    <!-- Logo / Brand -->
    <div class="p-6 border-b border-blue-600">
        <h2 class="text-xl font-bold">PPID Bakorwil Malang</h2>
        <p class="text-blue-200 text-sm mt-1">Dashboard Pengguna</p>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        @foreach ($menuItems as $item)
            @php
                $isActive = $currentRoute === $item['route'];
            @endphp
            <a href="{{ route($item['route']) }}"
                class="flex items-center px-4 py-3 rounded-lg transition-colors duration-200 {{ $isActive ? 'bg-blue-800 text-white' : 'text-blue-100 hover:bg-blue-600' }}">
                @switch($item['icon'])
                    @case('home')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    @break
                    @case('clock')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @break
                    @case('user')
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    @break
                @endswitch
                {{ $item['label'] }}
            </a>
        @endforeach

        <div class="pt-4 border-t border-blue-600 mt-4">
            <a href="{{ route('request.create') }}"
                onclick="window.location.href=this.href; return true;"
                class="flex items-center px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 transition-colors duration-200 cursor-pointer">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Ajukan Permohonan
            </a>
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
                <p class="text-xs text-blue-200">Pengguna</p>
            </div>
        </div>
    </div>
</aside>
