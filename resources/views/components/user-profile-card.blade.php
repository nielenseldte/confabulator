@props(['user'])
<div class="w-3/4 flex justify-end mx-auto mt-10 space-x-2">
    <x-manage-button href="/users/{{ $user->id }}/edit" type="edit">Edit</x-manage-button>
    <x-manage-button type="delete">Delete</x-manage-button>
</div>
<div class="border border-blue-700 p-5 flex flex-col space-y-5 w-3/4 mx-auto mt-2 rounded-xl">
   <div class="flex items-center justify-between">
        <h2 class="text-lg underline decoration-4 decoration-blue-700">
            @php
                echo "Username" . " - @" . $user->user_name;
            @endphp
        </h2>
        <p class="underline decoration-4 decoration-blue-700">{{ $user->tweets_count }} posts</p>
   </div>
   <div>
    <h2 class="text-lg underline decoration-4 decoration-blue-700">Bio:</h2>
    <p class="italic">{{ $user->about }}</p>
   </div>
    
</div>