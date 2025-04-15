<x-layout>
    <x-section-heading>Trending Twats</x-section-heading>

    @foreach ($tweets as $tweet)
        <x-tweet-card :$tweet />
    @endforeach
    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

</x-layout>
