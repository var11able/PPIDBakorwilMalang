<x-layout.app>
    <div class="max-w-7xl mx-auto">

        <h2 class="text-3xl font-bold text-white text-center mb-8">
            Galeri PPID
        </h2>

        <div class="flex flex-wrap justify-center gap-6 mx-5 xl:m-0">
            @foreach ($contents as $content)
                <div class="overflow-hidden rounded shadow-2xl h-64 sm:h-80 lg:h-96 w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)]">
                    <img 
                        src="{{ asset('img/content/' . $content['image']) }}" 
                        loading="lazy"
                        alt="Galeri PPID {{ $loop->iteration }}" 
                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                    >
                </div>
            @endforeach
        </div>

    </div>
</x-layout.app>