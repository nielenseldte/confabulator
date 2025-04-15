@props(['user'])
<div class="border border-blue-700 p-5 flex flex-col space-y-5 w-3/4 mx-auto mt-20 rounded-xl">
   <div class="flex items-center justify-between">
        <h2 class="text-lg underline decoration-4 decoration-blue-700">
            @php
                echo "Username" . " - @" . $user->name;
            @endphp
        </h2>
        <p class="underline decoration-4 decoration-blue-700">{{ $user->tweets_count }} posts</p>
   </div>
   <div>
    <h2 class="text-lg underline decoration-4 decoration-blue-700">Bio:</h2>
    <p class="italic">{{ $user->about }}</p>
   </div>
    
</div>