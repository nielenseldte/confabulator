@props(['tweet'])
<x-tweet-panel-borderless>
    <div class="flex items-center justify-between">
        <a href="/users/{{ $tweet->user->id }}" class="text-xl text-blue-600 underline hover:text-white w-fit">
            @php
                echo '@' . $tweet->user->user_name;
            @endphp
        </a>

    </div>
    <p class="break-words">{!! nl2br($tweet->body) !!}</p>
    <div class="flex items-center justify-between mb-4">
        <p class="mt-2 text-xs">
            {{ $tweet->created_at->isToday() ? 'Today | ' . $tweet->created_at->format('H:m') : ($tweet->created_at->isYesterday() ? 'Yesterday | ' . $tweet->created_at->format('H:m') : $tweet->created_at->format('d-m-Y | H:m')) }}
        </p>

        <div class="space-x-1">

             <x-interact-button type="like" form="like-form" :active="Auth::check() && $tweet->likes->isNotEmpty()" />
            <span>{{ $tweet->likes_count }}</span>


            <x-interact-button type="dislike" form="dislike-form" :active="Auth::check() && $tweet->dislikes->isNotEmpty()" />
            <span>{{ $tweet->dislikes_count }}</span>

        </div>
    </div>
    @can ('edit-tweet', $tweet) 
        <div class="flex justify-start space-x-2">
            <x-manage-button type="edit" href="/tweets/{{ $tweet->id }}/edit">Edit</x-manage-button>
            <x-manage-button type="delete" form="delete-form">Delete</x-manage-button>
        </div>
    @endcan
    @can ('edit-tweet', $tweet) 
        <form action="/tweets/{{ $tweet->id }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endcan
    <form action="/tweets/{{ $tweet->id }}/like" method="POST" id="like-form" class="hidden">
        @csrf
    </form>
    <form action="/tweets/{{ $tweet->id }}/dislike" method="POST" id="dislike-form" class="hidden">
        @csrf
    </form>
</x-tweet-panel-borderless>
