<x-layout>
    <x-layout.section-heading>Your Feed</x-layout.section-heading>

    <div class="flex items-center justify-end">
        <x-buttons.tweet-button href="/tweets/create">Confabulate</x-buttons.tweet-button>
    </div>
   
       @forelse ($tweets as $tweet) 
         <x-tweets.tweet-card :$tweet />
       @empty 
         <div class="mt-5 flex justify-center">
            <div class="text-lg italic">Follow an account to see them appear in your Feed</div>
         </div>
       @endforelse
    
    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

</x-layout>
