 <x-layout>
     <div class="ml-3 flex justify-start">
         <x-buttons.back-button
             href="{{ $previousUrl !== $currentUrl && $previousUrl !== route('tweets.edit', ['tweet' => $tweet->id]) && $previousUrl !== route('tweets.comments.create', ['tweet' => $tweet->id]) ? $previousUrl : '/tweets' }}">
             Back
         </x-buttons.back-button>
     </div>
     <x-tweets.tweet-card-big :$tweet />


     <x-comment-card :$comments :$tweet />

 </x-layout>
