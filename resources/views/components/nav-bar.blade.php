<nav class="flex flex-wrap items-center justify-between py-4 border-b border-white/10" x-data="{ show: false }">

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


    <x-mobile-hamburger @click="show = !show"></x-mobile-hamburger>

    <!-- Mobile Nav -->
    <div x-cloak x-show="show" x-transition class="space-x-4 w-full mb-8">
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
