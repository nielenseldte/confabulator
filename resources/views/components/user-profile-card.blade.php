@props(['user'])
@can('edit-profile', $user)
    <div class="w-full sm:w-3/4 flex justify-end mx-auto mt-10 space-x-2">
        <x-buttons.manage-button href="/users/{{ $user->id }}/edit" type="edit">Edit</x-buttons.manage-button>
        <x-buttons.manage-button type="delete">Delete</x-buttons.manage-button>
    </div>
@endcan

<div class="border border-blue-700 p-5 flex flex-col space-y-5 w-full sm:w-3/4 mx-auto mt-2 rounded-xl">
    @if ($user->profile_pic) 
    <div x-data="{ open: false }" class="flex justify-center">
        <x-profile-picture src="{{ asset('storage/' . $user->profile_pic) }}"  x-on:click="open = true" />
        <div x-cloak x-show="open" x-transition.opacity x-on:click="open = false"
            class="fixed inset-0 flex items-center justify-center bg-black/60">
            <div class="relative">
                <img src="{{ asset('storage/' . $user->profile_pic) }}"
                    class="w-64 h-64 rounded-md object-cover border-4 border-blue-700">
                <button @click="open = false"
                    class="absolute top-2 right-2 cursor-pointer hover:text-red-600 transition-colors duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
            </div>
        </div>
    </div>
    @endif
    <div class="flex-wrap flex items-center justify-between">
        <div>
            <h2 class="text-lg underline decoration-4 decoration-blue-700">
                @php
                    echo 'Username' . ' - @' . $user->user_name;
                @endphp
            </h2>
        </div>
        <div class="flex space-x-3">
            <p class="underline decoration-4 decoration-blue-700">{{ $user->followers_count }} followers</p>
            <p class="underline decoration-4 decoration-blue-700">{{ $user->followed_users_count }} following</p>
            <p class="underline decoration-4 decoration-blue-700">{{ $user->tweets_count }} posts</p>
        </div>
    </div>
    <div>
        <h2 class="text-lg underline decoration-4 decoration-blue-700">Bio:</h2>
        @if ($user->about)
            <p class="italic">{!! nl2br(clean($user->about)) !!}</p>
        @else
            @can('edit-profile', $user)
                <div class="flex justify-start space-x-2">
                    <p class="italic">edit profile to add a bio</p>
                    <a href="/users/{{ $user->id }}/edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-pencil-icon lucide-pencil text-blue-700 hover:text-white">
                            <path
                                d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                            <path d="m15 5 4 4" />
                        </svg>
                    </a>
                </div>
            @endcan
        @endif
    </div>


</div>
