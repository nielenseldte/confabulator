<nav class="flex flex-wrap items-center justify-between py-4 border-b border-white/10">
    
    <div class="text-blue-700 mb-4 sm:mb-0">
        <h1 class="text-2xl font-ibm-plex-mono italic border-4 py-1 px-2 border-blue-700 rounded-xl">
            Confabulator
        </h1>
    </div>

    <div class="space-x-6 hidden sm:block">
        <x-nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-nav-link>
        @auth
            <x-nav-link href="/users/{{ Auth::user()->id }}/feed" :active="request()->is('users/' . Auth::user()->id . '/feed')">Feed</x-nav-link>
        @endauth
        <x-nav-link href="/trending" :active="request()->is('trending')">Trending</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')">About Confabulator</x-nav-link>

    </div>


    <button id="menu-toggle" class="sm:hidden flex items-center px-3 py-2 border rounded text-blue-700 border-blue-700">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
        </svg>
    </button>

     <!-- Mobile Nav -->
     <div id="mobile-menu" class="space-x-4 hidden sm:hidden w-full mb-8">
        <x-nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-nav-link>
        @auth
            <x-nav-link href="/users/{{ Auth::user()->id }}/feed" :active="request()->is('users/' . Auth::user()->id . '/feed')">Feed</x-nav-link>
        @endauth
        <x-nav-link href="/trending" :active="request()->is('trending')">Trending</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
    </div>

    @auth
        <div class="space-x-6 font-bold flex">
            <a class="hover:text-blue-700 underline" href="/users/{{ Auth::user()->id }}">{{ Auth::user()->user_name }}</a>
            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')

                <button class="hover:text-red-600 cursor-pointer">Log Out</button>
            </form>
        </div>

    @endauth

    @guest
        <div class="space-x-6">
            <x-nav-link href="/register">Create Account</x-nav-link>
            <x-nav-link href="/login">Log In</x-nav-link>

        </div>
    @endguest


</nav>