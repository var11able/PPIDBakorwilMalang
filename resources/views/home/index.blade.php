<x-layout.app>
    <div class="grid grid-cols-1 mx-auto max-w-7xl px-5 py-6 sm:grid-cols-2">
        <div class="sm:p-4 lg:mt-3">
            <p class="text-4xl font-bold text-white mb-2 sm:text-5xl lg:mb-8">
                PPID BAKORWIL III <br>
                MALANG
            </p>
            <p class="font-light text-white mb-4 text-mb">
                Temukan layanan kami untuk mengajukan permohonan informasi publik
            </p>
        </div>

        <img src="https://picsum.photos/id/177/800/600" alt="logo?">
    </div>

    <div class="bg-blue-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 mb-8">
                
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start space-x-4">

                        <div class="shrink-0">
                            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">
                                Prosedur Informasi
                            </h3>
                            <p class="text-gray-600 text-base leading-relaxed">
                                Panduan langkah-langkah untuk mengajukan permohonan informasi
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start space-x-4">
               
                        <div class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">
                                Formulir Online
                            </h3>
                            <p class="text-gray-600 text-base leading-relaxed">
                                Isi formulir untuk melakukan pengajuan informasi
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-center">
                <a 
                    href="{{ route('request') }}" 
                    class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105"
                >
                    Ajukan Permohonan
                </a>
            </div>

        </div>
    </div>

    <div class="px-5 py-2">
        <p class="text-3xl font-bold text-white my-3">
            Galeri PPID
        </p>
        <div class="flex flex-wrap justify-center sm:gap-5 sm:px-8">

            {{-- pr --}}

            {{-- @foreach ( $contents as $content )
                <img src="{{ $content->image_url }}" alt="galeri" class="w-full sm:w-[calc(50%-0.625rem)]">
            @endforeach --}}


        </div>  
    </div>



</x-layout.app>