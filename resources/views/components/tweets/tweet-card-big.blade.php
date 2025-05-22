@props(['tweet'])
<x-tweets.tweet-panel-borderless>
    <div class="flex items-center justify-between">
        <a href="/users/{{ $tweet->user->id }}" class="text-xl text-blue-600 underline hover:text-white w-fit">
            @php
                echo '@' . $tweet->user->user_name;
            @endphp
        </a>

    </div>
    <p class="break-words">{!! nl2br(clean($tweet->body)) !!}</p>
    <div class="flex items-center justify-between mb-4">
        <x-timestamp :$tweet />

        <div class="space-x-1">

            <x-buttons.interact-button type="like" form="like-form" :active="Auth::check() && $tweet->likes->isNotEmpty()" />
            <span>{{ $tweet->likes_count }}</span>


            <x-buttons.interact-button type="dislike" form="dislike-form" :active="Auth::check() && $tweet->dislikes->isNotEmpty()" />
            <span>{{ $tweet->dislikes_count }}</span>

        </div>
    </div>
    @can('edit-tweet', $tweet)
        <div x-data="{ open: false }" class="flex justify-start space-x-2">
            <x-buttons.manage-button type="edit" href="/tweets/{{ $tweet->id }}/edit">Edit</x-buttons.manage-button>
            <x-buttons.manage-button x-on:click="open = true" type="delete">Delete</x-buttons.manage-button>
            <x-modals.confirmation-modal>
                <x-slot:heading>Confirmation Required</x-slot>
                <x-slot:message>Are you sure you want to delete this conversation?</x-slot>
                <button x-on:click="open = false" type="button"
                    class="w-full px-4 py-2 text-sm cursor-pointer rounded-lg border border-blue-700 bg-black/20 text-white hover:border-black/20 hover:text-blue-700 transition-all duration-300">Cancel</button>
                <button x-on:click="open = false; $nextTick(() => $refs.deleteForm.submit())" type="button"
                    class="w-full px-4 py-2 text-sm cursor-pointer rounded-lg border border-red-600 bg-black/20 text-white hover:border-black/20 hover:text-red-600 transition-all duration-300">Yes</button>
            </x-modals.confirmation-modal>
            <form x-ref="deleteForm" action="/tweets/{{ $tweet->id }}" method="POST" id="delete-form" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    @endcan
    <form action="/tweets/{{ $tweet->id }}/like" method="POST" id="like-form" class="hidden">
        @csrf
    </form>
    <form action="/tweets/{{ $tweet->id }}/dislike" method="POST" id="dislike-form" class="hidden">
        @csrf
    </form>
</x-tweet-panel-borderless>
