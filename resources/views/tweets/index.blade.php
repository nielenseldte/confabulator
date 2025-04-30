<x-layout>
    <x-section-heading>Latest Discussions</x-section-heading>
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

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
