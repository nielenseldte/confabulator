<x-layout>
    <x-section-heading>Your Feed</x-section-heading>


    <div class="flex items-center justify-end">
        <x-tweet-button href="/tweets/create">Confabulate</x-tweet-button>
    </div>


    
       @forelse ($tweets as $tweet) 
         <x-tweet-card :$tweet />
       @empty 
         <div class="mt-5 flex justify-center">
            <div class="text-lg italic">Follow an account to see them appear in your Feed</div>
         </div>
       @endforelse
    
    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

</x-layout>
