<!DOCTYPE html>
<html lang="en" class="h-full bg-primary">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Home</title>
</head>
<body class="h-full min-h-screen flex flex-col">

    <x-navbar></x-navbar>
    <main class="flex-1">
        {{ $slot }}
    </main>
    <x-footer />

    
</body>
</html>