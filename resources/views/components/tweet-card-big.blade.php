@props(['tweet'])
<x-tweet-panel-borderless>
    <div class="flex items-center justify-between">
        <a href="/users/{{ $tweet->user->id }}" class="text-xl text-blue-600 underline hover:text-white w-fit">
            @php
                echo '@' . $tweet->user->name;
            @endphp
        </a>

    </div>
    <p class="break-words">{!! nl2br($tweet->body) !!}</p>
    <div class="flex items-center justify-between">
        <p class="mt-2 text-xs">
            {{ $tweet->created_at->isToday() ? 'Today | ' . $tweet->created_at->format('H:m') : ($tweet->created_at->isYesterday() ? 'Yesterday | ' . $tweet->created_at->format('H:m') : $tweet->created_at->format('d-m-Y | H:m')) }}
        </p>

        <div class="space-x-1">

            <x-interact-button type="like" />
            <span>{{ $tweet->likes_count }}</span>


            <x-interact-button type="dislike" />
            <span>{{ $tweet->dislikes_count }}</span>

        </div>
    </div>
    <div>
        <button>Edit tweet Button</button>
        <button>Delete tweet Button</button>
    </div>
</x-tweet-panel-borderless>

