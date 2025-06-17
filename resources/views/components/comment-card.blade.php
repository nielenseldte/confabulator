@props(['comments', 'tweet'])
<div class="w-3/4 sm:w-1/2 mx-auto space-y-5">
    <div class="flex items-center justify-between">
        <h1>Comments ({{ $comments->count() }})</h1>
        @auth
            <x-buttons.standard-button href="/tweets/{{ $tweet->id }}/comments/create"
                class="border border-blue-700 hover:border-white hover:text-white"> + Comment</x-buttons.standard-button>
        @endauth
    </div>
    @forelse ($comments as $comment)
        <div class="mt-3 border-t border-b border-white py-3 flex justify-between">
            <div>
                <a href="/users/{{ $comment->user->id }}" class="text-blue-600 underline hover:text-white w-fit">
                    @php
                        echo '@' . $comment->user->user_name;
                    @endphp
                </a>

                <p class="text-sm">{{$comment->content}}</p>
            </div>
            @can('delete', $comment)
                <div class="my-auto">
                    <button class="cursor-pointer" form="delete-comment-form-{{ $comment->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-trash-icon lucide-trash text-red-600 hover:text-white">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                        </svg>
                    </button>
                </div>
            @endcan
        </div>
        <form action="/tweets/{{ $tweet->id }}/comments/{{ $comment->id }}" method="POST"
            id="delete-comment-form-{{ $comment->id }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @empty
        <p class="text-sm">No Comments Yet</p>
    @endforelse

</div>
