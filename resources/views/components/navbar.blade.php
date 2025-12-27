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
            <div class="hidden md:flex md:items-center md:space-x-2">
                @foreach(config('navigation.main') as $item)
                    @if($item['type'] === 'link')
                        <x-nav-link href="{{ $item['url'] }}" :active="request()->is($item['url'])">
                            {{ $item['label'] }}
                        </x-nav-link>
                    @elseif($item['type'] === 'dropdown')
                        <div class="relative" x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen" class="text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                                {{ $item['label'] }}
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="isOpen" x-cloak @click.away="isOpen = false" class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10">
                                @foreach($item['items'] as $subItem)
                                    <x-nav-link 
                                        href="{{ url($item['prefix'] . '/' . $subItem['slug']) }}"
                                        :active="request()->is($subItem['slug'])"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    >
                                        {{ $subItem['label'] }}
                                    </x-nav-link>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Sign In Button (Desktop) -->
            <div class="hidden md:block">
                <button type="button" class="bg-[#FFE492] hover:bg-yellow-400 text-blue-600 font-semibold px-6 py-2 rounded-md text-sm cursor-pointer">
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
            @foreach(config('navigation.main') as $item)
                @if($item['type'] === 'link')
                    <x-nav-link href="{{ $item['url'] }}" :active="request()->is('/')">
                        {{ $item['label'] }}
                    </x-nav-link>
                @elseif($item['type'] === 'dropdown')
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" class="text-white hover:bg-white/10 w-full text-left px-3 py-2 rounded-md text-base font-medium flex items-center justify-between">
                            {{ $item['label'] }}
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="isOpen" x-cloak @click.away="isOpen = false" class="pl-4">
                            @foreach($item['items'] as $subItem)
                                <x-nav-link 
                                    href="{{ url('profil/' . $subItem['slug']) }}"
                                    :active="request()->is($subItem['slug'])"
                                    class="text-white hover:bg-white/10 block px-3 py-2 rounded-md text-sm"
                                >
                                    {{ $subItem['label'] }}
                                </x-nav-link>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="pt-4">
                <button class="bg-yellow-300 hover:bg-yellow-400 text-blue-600 font-semibold px-6 py-2 rounded-md text-sm w-full">
                    Sign In
                </button>
            </div>
            
        </div>
    </div>
</nav>