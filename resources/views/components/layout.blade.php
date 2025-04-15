<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confabulator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-ibm-plex-mono pb-12 selection:bg-blue-700">

    <div class="px-10">

        <nav class="flex items-center justify-center py-4 border-b border-white/10">
           

            <div class="space-x-6">
                <x-nav-link href="/tweets" :active="request()->is('tweets')">Feed</x-nav-link>
                <x-nav-link href="/trending" :active="request()->is('trending')">Trending</x-nav-link>
                {{-- <x-nav-link href="#" :active="request()->is('trending')">My Twats</x-nav-link> --}}
                <x-nav-link href="/about" :active="request()->is('about')">About Confabulator</x-nav-link>

            </div>

        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>

    </div>
</body>

</html>
