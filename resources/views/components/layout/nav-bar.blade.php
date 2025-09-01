<nav class="flex flex-wrap items-center justify-between py-4 border-b border-white/10" x-data="{ show: false }">

    <div class="text-blue-700 mb-4 sm:mb-0">
        <h1 class="text-2xl font-ibm-plex-mono italic border-4 py-1 px-2 border-blue-700 rounded-xl">
            Confabulator
        </h1>
    </div>

    <div class="space-x-6 hidden sm:block">
        <x-layout.nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-layout.nav-link>
        @auth
            <x-layout.nav-link href="/users/{{ Auth::id() }}/feed" :active="request()->is('users/' . Auth::id() . '/feed')">Feed</x-layout.nav-link>
        @endauth
        <x-layout.nav-link href="/trending" :active="request()->is('trending')">Trending</x-layout.nav-link>
        <x-layout.nav-link href="/about" :active="request()->is('about')">About Confabulator</x-layout.nav-link>

    </div>


    <x-buttons.mobile-hamburger @click="show = !show"></x-buttons.mobile-hamburger>

    <!-- Mobile Nav -->
    <div x-cloak x-show="show" x-transition class="space-x-4 w-full mb-8">
        <x-layout.nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-layout.nav-link>
        @auth
            <x-layout.nav-link href="/users/{{ Auth::id() }}/feed" :active="request()->is('users/' . Auth::id() . '/feed')">Feed</x-layout.nav-link>
        @endauth
        <x-layout.nav-link href="/trending" :active="request()->is('trending')">Trending</x-layout.nav-link>
        <x-layout.nav-link href="/about" :active="request()->is('about')">About</x-layout.nav-link>
    </div>


    <div x-data="{ showSearchInput: false }" class="space-x-6 font-bold flex">
        <form action="/search" class="flex gap-1 items-center" method="GET">
            <x-modals.search-modal>
                <input name="q" type="text"
                    class="text-xs tracking-wide text-blue-700 shadow-xl px-4 py-2 w-full" placeholder="search profiles.."
                    @update="showSearchInput = false">
                <button type="submit"
                    class="text-blue-700 mr-3 hover:text-white transition-colors duration-200 text-xs cursor-pointer">Go</button>
            </x-modals.search-modal>
            <svg @click="showSearchInput = !showSearchInput" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                stroke="currentColor"
                class="text-blue-700 w-6 h-6 hover:text-white transition-colors duration-300 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </form>
        @auth
            <a class="hover:text-blue-700 underline" href="/users/{{ Auth::user()->id }}">{{ Auth::user()->user_name }}</a>
            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')

                <button class="hover:text-red-600 cursor-pointer">Log Out</button>
            </form>
        @endauth
        @guest
            <x-layout.nav-link href="/register">Create Account</x-layout.nav-link>
            <x-layout.nav-link href="/login">Log In</x-layout.nav-link>
        @endguest
    </div>




</nav>
