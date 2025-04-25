@props(['user'])
@can('edit-profile', $user)
    <div class="w-3/4 flex justify-end mx-auto mt-10 space-x-2">
        <x-manage-button href="/users/{{ $user->id }}/edit" type="edit">Edit</x-manage-button>
        <x-manage-button type="delete">Delete</x-manage-button>
    </div>
@endcan
<div class="border border-blue-700 p-5 flex flex-col space-y-5 w-3/4 mx-auto mt-2 rounded-xl">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg underline decoration-4 decoration-blue-700">
                @php
                    echo 'Username' . ' - @' . $user->user_name;
                @endphp
            </h2>
        </div>
        <div class="flex space-x-3">
            <p class="underline decoration-4 decoration-blue-700">{{ $user->followers_count }} followers</p>
            <p class="underline decoration-4 decoration-blue-700">{{ $user->tweets_count }} posts</p>
        </div>
    </div>
    <div>
        <h2 class="text-lg underline decoration-4 decoration-blue-700">Bio:</h2>
        @if ($user->about)
            <p class="italic">{{ $user->about }}</p>
        @endif
        @can('edit-profile', $user)
            <div class="flex justify-start space-x-2">
                <p class="italic">edit profile to add a bio</p><svg xmlns="http://www.w3.org/2000/svg" width="15"
                    height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-pencil-icon lucide-pencil text-blue-700">
                    <path
                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                    <path d="m15 5 4 4" />
                </svg>
            </div>
        @endcan
    </div>


</div>
