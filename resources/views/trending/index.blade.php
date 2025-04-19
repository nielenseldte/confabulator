<x-layout>
    <x-section-heading>Trending Twats</x-section-heading>


    <div class="flex items-center justify-end">
        <x-tweet-button href="/tweets/create">Confabulate</x-tweet-button>
    </div>


    @foreach ($tweets as $tweet)
        <x-tweet-card :$tweet />
    @endforeach
    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

</x-layout>
