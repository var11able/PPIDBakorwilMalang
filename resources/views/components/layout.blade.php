<!DOCTYPE html>
<html lang="en" class="h-full bg-[#417BFD]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Home</title>
</head>
<body class="h-full">

    <div class="min-h-full">
        <x-navbar></x-navbar>
    
            <main>
                <div class="grid grid-cols-1 mx-auto max-w-7xl px-5 py-6 sm:grid-cols-2">
                    <div class="sm:p-4">
                        <p class="text-4xl font-bold text-white mb-2 sm:text-5xl">
                            PPID BAKORWIL III <span class="flex flex-col">MALANG</span>
                        </p>
                        <p class="font-light text-white mb-4 text-sm">
                            Temukan layanan kami untuk mengajukan permohonan informasi publik
                        </p>
                    </div>

                    <img src="img/image.png" alt="logo?">
                </div>

                <div class="bg-blue-300 p-5 flex flex-col sm:justify-center items-center">
                    <div class="flex flex-col justify-center items-center px-4 sm:flex-row mb-3 gap-4">
                        <div class="bg-white w-65 h-40 my-3 py-4 px-6 mb-2 rounded-md">
                            <div class="flex items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                <p class="font-bold text-base ml-3">Prosedur<span class="block">Informasi</span></p>
                            </div>
                            
                            <p class="text-sm">
                                Panduan langkah-langkah untuk mengajukan permohonan informasi
                            </p>
                        </div>
                        <div class="bg-white w-65 h-40 my-3 py-4 px-6 mb-2 rounded-md">
                            <div class="flex items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                                <p class="font-bold text-base ml-3">Formulir<span class="block">Online</span></p>
                            </div>
                            
                            <p class="text-sm">
                                Isi formulir untuk melakukan pengajuan informasi
                            </p>
                        </div>
                    </div>

                    <button type="button" class="text-base font-bold bg-blue-700 text-white rounded-md py-4 px-5 active:bg-blue-400">
                        Ajukan Permohonan
                    </button>
                </div>

                <div class="px-5 py-2">
                    <p class="text-3xl font-bold text-white my-3">
                        Galeri PPID
                    </p>
                    <div class="flex flex-wrap justify-center sm:gap-5 sm:px-8">
                        <img src="img/image.png" alt="logo?" class="w-full sm:w-[calc(50%-0.625rem)]">
                        <img src="img/image.png" alt="logo?" class="w-full sm:w-[calc(50%-0.625rem)]">
                        <img src="img/image.png" alt="logo?" class="w-full sm:w-[calc(50%-0.625rem)]">
                        <img src="img/image.png" alt="logo?" class="w-full sm:w-[calc(50%-0.625rem)]">
                        <img src="img/image.png" alt="logo?" class="w-full sm:w-[calc(50%-0.625rem)]">
                    </div>
                </div>


            </main>
        
        
        <x-footer></x-footer>
    </div>

    
</body>
</html>