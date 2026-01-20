<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <title>
        {{-- pr --}}
    </title>
</head>
<body class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 flex items-center justify-center px-4">
    
    <div class="max-w-md w-full text-center">
    {{-- Sad Face SVG with Animation --}}
        <div class="mb-8 float-animation">
            <svg class="w-56 h-56 mx-auto" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                {{-- Shadow --}}
                <ellipse cx="100" cy="190" rx="40" ry="8" fill="#D1D5DB" opacity="0.3"/>
                
                {{-- Face Circle --}}
                <circle cx="100" cy="100" r="80" fill="#F3F4F6" stroke="#9CA3AF" stroke-width="3"/>
                
                {{-- Left Eye (Closed/Sad) --}}
                <path d="M 60 85 Q 70 90 80 85" stroke="#6B7280" stroke-width="4" stroke-linecap="round" fill="none"/>
                
                {{-- Right Eye (Closed/Sad) --}}
                <path d="M 120 85 Q 130 90 140 85" stroke="#6B7280" stroke-width="4" stroke-linecap="round" fill="none"/>
                
                {{-- Sad Mouth (Frown) --}}
                <path d="M 70 135 Q 100 125 130 135" stroke="#6B7280" stroke-width="4" stroke-linecap="round" fill="none"/>
                
                {{-- Tear Drops --}}
                <g class="tear-animation">
                    <ellipse cx="145" cy="100" rx="4" ry="7" fill="#60A5FA" opacity="0.6"/>
                </g>
            </svg>
        </div>

        {{ $slot }}

        {{-- Buttons --}}
        <div class="space-y-3">
            <a 
                href="{{ route('home') }}" 
                class="block w-full px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105"
            >
                Kembali ke Beranda
            </a>
            
            <button 
                onclick="history.back()"
                class="block w-full px-8 py-3 border-2 border-gray-300 hover:border-gray-400 text-gray-700 font-medium rounded-xl transition-all duration-200 hover:bg-gray-50 cursor-pointer"
            >
            <div class="flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                <p>Halaman Sebelumnya</p>
            </div>
            </button>
        </div>

        {{-- Footer Help Text --}}
        <p class="mt-8 text-sm text-gray-500">
            Butuh bantuan? 
            <a href="mailto:support@example.com" class="text-blue-600 hover:underline font-medium">
                Hubungi kami
            </a>
        </p>

    </div>
    
</body>
</html>