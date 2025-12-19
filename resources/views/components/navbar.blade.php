<nav class="bg-[#417BFD]" x-data="{isOpen: false}">
    <div class="mx-auto max-w-7xl px-4 sm:px-12 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="shrink-0">
                    <svg class="size-8 mx-2" viewBox="0 0 38 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_575_1133)">
                        <path d="M0.107007 2.36523L0.0798765 9.11813C0.0716134 11.1749 2.5733 12.2818 4.11059 10.8483L11.4472 4.12475C13.0542 2.6572 12.0205 0.0478254 9.82763 0.0390154L2.51818 0.00964897C1.19552 0.00433505 0.11224 1.06264 0.107007 2.36523Z" fill="white"/>
                        <path d="M34.7144 0.138996L27.405 0.10963C25.247 0.10096 24.1575 2.7018 25.7527 4.18222L33.035 10.9645C34.5608 12.3761 37.0712 11.3235 37.0795 9.26678L37.1066 2.51387C37.1118 1.21128 36.0371 0.14431 34.7144 0.138996Z" fill="white"/>
                        <path d="M20.2034 16.569L32.9647 28.4809C34.4905 29.8925 37.0009 28.8399 37.0092 26.7832L37.0366 19.9617C37.0392 19.3104 36.7632 18.6923 36.2777 18.2447L20.2569 3.26886C19.3205 2.40812 17.8934 2.40238 16.9502 3.25557L0.809517 18.1022C0.320431 18.5459 0.0394968 19.1618 0.0368801 19.8131L0.00947422 26.6345C0.00121113 28.6912 2.5029 29.7982 4.04019 28.3647L16.8968 16.5557C17.84 15.7025 19.2671 15.7082 20.2034 16.569Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_575_1133">
                        <rect width="37" height="29" fill="white" transform="translate(0.11651) rotate(0.230191)"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                
                <!-- Dropdown Profil -->
                <div class="relative" x-data="{open: false}">
                    <button @click="open = !open" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                        Profil
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Regulasi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Seputar PPID</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Visi dan Misi PPID</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tugas/Fungsi dan Kewenangan PPID</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Standar Pelayanan PPID</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Standar Pengelolaan Keberatan</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">SOP PPID</a>
                    </div>
                </div>

                <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium">Tata Cara</a>
                <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium">Layanan Informasi</a>
                <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium">Laporan PPID</a>
                <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium">Web Utama</a>
            </div>

            <!-- Sign In Button (Desktop) -->
            <div class="hidden md:block">
                <button class="bg-yellow-300 hover:bg-yellow-400 text-blue-600 font-semibold px-6 py-2 rounded-md text-sm">
                    Sign In
                </button>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none">
                    <svg x-show="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" class="md:hidden bg-[#417BFD]">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
            
            <!-- Mobile Dropdown -->
            <div x-data="{openMobile: false}">
                <button @click="openMobile = !openMobile" class="text-white hover:bg-white/10 w-full text-left px-3 py-2 rounded-md text-base font-medium flex items-center justify-between">
                    Profil
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMobile" class="pl-4">
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Regulasi</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Seputar PPID</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Visi dan Misi PPID</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Tugas/Fungsi dan Kewenangan PPID</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Standar Pelayanan PPID</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">Standar Pengelolaan Keberatan</a>
                    <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">SOP PPID</a>
                </div>
            </div>

            <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Tata Cara</a>
            <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Layanan Informasi</a>
            <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Laporan PPID</a>
            <a href="#" class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-base font-medium">Web Utama</a>
            
            <div class="pt-4">
                <button class="bg-yellow-300 hover:bg-yellow-400 text-blue-600 font-semibold px-6 py-2 rounded-md text-sm w-full">
                    Sign In
                </button>
            </div>
        </div>
    </div>
</nav>