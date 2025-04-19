@props(['comments', 'tweet'])
<div class="w-1/2 mx-auto space-y-5">
        <div class="flex items-center justify-between">
            <h1>Comments ({{ $comments->count() }})</h1>
            <x-standard-button href="/tweets/{{$tweet->id}}/comments/create" class="border border-blue-700 hover:border-white hover:text-white"> + Comment</x-standard-button>
        </div>
        @forelse ($comments as $comment)
            <div class="mt-3 border-t border-b border-white py-3">
                <a href="/users/{{ $comment->user->id }}" class="text-blue-600 underline hover:text-white w-fit">
                    @php
                        echo '@' . $comment->user->user_name;
                    @endphp
                </a>

                <p class="text-sm">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-sm">No Comments Yet</p>
        @endforelse
        
</div>