<nav class="bg-primary" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-12 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="shrink-0">
                    <img 
                        src="{{ asset('img/jatim.png') }}" 
                        alt="jatim-logo" 
                        class="w-[38px] mt-2"
                    >
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-2">
                @foreach(config('navigation.main') as $item)
                    @if($item['type'] === 'link')
                        <x-nav-link href="{{ $item['url'] }}" :active="request()->is($item['url'])">
                            {{ $item['label'] }}
                        </x-nav-link>
                    @elseif($item['type'] === 'dropdown')
                        <div class="relative" x-data="{ isOpen: false }">
                            <button 
                                @click="isOpen = !isOpen"
                                class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium flex items-center cursor-pointer"
                            >
                                {{ $item['label'] }}
                                <svg 
                                    class="ml-1 h-4 w-4 transition-transform duration-200" 
                                    fill="none" 
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    :class="{ 'rotate-180': isOpen }"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="isOpen" x-cloak @click.away="isOpen = false"
                                class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10">
                                @foreach($item['items'] as $subItem)
                                    <x-nav-link href="{{ url($item['prefix'] . '/' . $subItem['slug']) }}"
                                        :active="request()->is($subItem['slug'])"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $subItem['label'] }}
                                    </x-nav-link>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Sign In Button (Desktop) -->
            @guest
                <div class="hidden lg:block">
                    <a href="{{ route('login') }}"
                        class="bg-[#FFE492] hover:bg-yellow-300 active:bg-yellow-200 text-blue-600 font-semibold px-6 py-3 rounded-md text-sm cursor-pointer">
                        Sign In
                    </a>
                </div>
            @endguest

            @auth
                <div class="hidden lg:block relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen"
                        class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium flex items-center cursor-pointer">
                        <span class="font-semibold text-sm">
                            SELAMAT DATANG, {{ Auth::user()->fullName }}
                        </span>
                        <svg 
                            class="ml-1 h-4 w-4 transition-transform duration-200" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                            :class="{'rotate-180' : isOpen}"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        x-show="isOpen" 
                        x-cloak 
                        @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-full bg-white rounded-md shadow-lg z-10 py-1"
                    >
                        <x-nav-link 
                            href="#" 
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </x-nav-link>

                        <x-nav-link 
                            href="#" 
                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </x-nav-link>

                        <div class="border-t border-gray-200 my-1"></div>

                        <form 
                            action="{{ route('logout') }}"
                            method="POST"
                        >

                            @csrf

                            <button 
                                type="submit"
                                class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-red-50 transition-colors duration-200 cursor-pointer"
                            >
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            @endauth

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button @click="isOpen = !isOpen" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white/10 focus:outline-none">
                    <svg x-show="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" x-cloak class="lg:hidden bg-primary">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach(config('navigation.main') as $item)
                @if($item['type'] === 'link')
                    <x-nav-link href="{{ $item['url'] }}" :active="request()->is($item['url'])">
                        {{ $item['label'] }}
                    </x-nav-link>
                @elseif($item['type'] === 'dropdown')
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen"
                            class="text-white hover:bg-white/10 w-full text-left px-3 py-2 rounded-md text-base font-medium flex items-center justify-between">
                            {{ $item['label'] }}
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="isOpen" x-cloak @click.away="isOpen = false" class="pl-4">
                            @foreach($item['items'] as $subItem)
                                <x-nav-link href="{{ url($item['prefix'] . '/' . $subItem['slug']) }}"
                                    :active="request()->is($subItem['slug'])"
                                    class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm">
                                    {{ $subItem['label'] }}
                                </x-nav-link>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @guest
                <div class="pt-4">
                    <a href="{{ route('login') }}"
                        class="bg-[#FFE492] active:bg-yellow-300 text-blue-600 font-semibold px-6 py-2 rounded-md text-sm w-full block text-center">
                        Sign In
                    </a>
                </div>
            @endguest

            @auth
                <div class="hidden lg:block relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen"
                        class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium flex items-center cursor-pointer">
                        <span class="font-semibold text-base">
                            SELAMAT DATANG, {{ Auth::user()->firstName }}
                        </span>
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="isOpen" x-cloak @click.away="isOpen = false"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10">
                        <x-nav-link>
                            <form action="{{ route('logout') }}" method="POST"
                                class="px-4 py-2 text-base text-gray-700 hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="text-red-500 cursor-pointer">Logout</button>
                            </form>
                        </x-nav-link>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</nav>