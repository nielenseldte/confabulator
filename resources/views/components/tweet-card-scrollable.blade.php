@props(['tweet'])

<x-tweet-panel-borderless id="tweet-{{ $tweet->id }}">
    <div class="flex items-center justify-between">
        <a href="/users/{{ $tweet->user->id }}" class="text-xl text-blue-600 underline hover:text-white w-fit">
            @php
                echo '@' . $tweet->user->user_name;
            @endphp
        </a>

        <x-standard-button href="/tweets/{{ $tweet->id }}" class="hover:text-white hover:underline">
            Read More
        </x-standard-button>

    </div>
    <p class="break-words">{!! nl2br(clean($tweet->body)) !!}</p>
    <div class="flex items-center justify-between">
        <x-timestamp :$tweet />

        <div class="space-x-1">

            <x-interact-button type="like" form="like-form-{{ $tweet->id }}" :active="Auth::check() && $tweet->likes->isNotEmpty()" />
            <span>{{ $tweet->likes_count }}</span>


            <x-interact-button type="dislike" form="dislike-form-{{ $tweet->id }}" :active="Auth::check() && $tweet->dislikes->isNotEmpty()" />
            <span>{{ $tweet->dislikes_count }}</span>

        </div>
    </div>
    <form action="/tweets/{{ $tweet->id }}/like" method="POST" id="like-form-{{ $tweet->id }}" class="hidden">
        @csrf
    </form>
    <form action="/tweets/{{ $tweet->id }}/dislike" method="POST" id="dislike-form-{{ $tweet->id }}"
        class="hidden">
        @csrf
    </form>
</x-tweet-panel-borderless>
