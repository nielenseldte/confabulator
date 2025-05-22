<nav class="flex flex-wrap items-center justify-between py-4 border-b border-white/10" x-data="{ show: false }">

    <div class="text-blue-700 mb-4 sm:mb-0">
        <h1 class="text-2xl font-ibm-plex-mono italic border-4 py-1 px-2 border-blue-700 rounded-xl">
            Confabulator
        </h1>
    </div>

    <div class="space-x-6 hidden sm:block">
        <x-layout.nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-layout.nav-link>
        @auth
            <x-layout.nav-link href="/users/{{ Auth::user()->id }}/feed" :active="request()->is('users/' . Auth::user()->id . '/feed')">Feed</x-layout.nav-link>
        @endauth
        <x-layout.nav-link href="/trending" :active="request()->is('trending')">Trending</x-layout.nav-link>
        <x-layout.nav-link href="/about" :active="request()->is('about')">About Confabulator</x-layout.nav-link>

    </div>


    <x-buttons.mobile-hamburger @click="show = !show"></x-buttons.mobile-hamburger>

    <!-- Mobile Nav -->
    <div x-cloak x-show="show" x-transition class="space-x-4 w-full mb-8">
        <x-layout.nav-link href="/tweets" :active="request()->is('tweets')">Latest</x-layout.nav-link>
        @auth
            <x-layout.nav-link href="/users/{{ Auth::user()->id }}/feed" :active="request()->is('users/' . Auth::user()->id . '/feed')">Feed</x-layout.nav-link>
        @endauth
        <x-layout.nav-link href="/trending" :active="request()->is('trending')">Trending</x-layout.nav-link>
        <x-layout.nav-link href="/about" :active="request()->is('about')">About</x-layout.nav-link>
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
            <x-layout.nav-link href="/register">Create Account</x-layout.nav-link>
            <x-layout.nav-link href="/login">Log In</x-layout.nav-link>

        </div>
    @endguest


</nav>
