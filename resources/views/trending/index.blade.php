<x-layout>
    <x-layout.section-heading>Trending Discussions</x-layout.section-heading>


    <div class="flex items-center justify-end">
        <x-buttons.tweet-button href="/tweets/create">Confabulate</x-buttons.tweet-button>
    </div>


    @foreach ($tweets as $tweet)
        <x-tweets.tweet-card :$tweet />
    @endforeach
    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

</x-layout>
