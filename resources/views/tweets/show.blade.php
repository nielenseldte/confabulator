<x-layout>
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
    @endphp
    <x-tweet-card-big :$tweet />
    

    <x-comment-card :$comments :$tweet />

    
    <x-back-button href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}">Back</x-back-button>
</x-layout>
