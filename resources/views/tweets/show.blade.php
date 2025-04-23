 @php
     $previousUrl = url()->previous();
     $currentUrl = url()->current();
 @endphp
 <x-layout>
     <div class="ml-3 flex justify-start"><x-back-button
             href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}">Back</x-back-button></div>
     <x-tweet-card-big :$tweet />


     <x-comment-card :$comments :$tweet />




 </x-layout>
