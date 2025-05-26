@props(['user'])
<div
    class="mt-5 px-2 sm:px-4 py-3 bg-black rounded-md border-4 border-blue-700 sm:max-w-2xl mx-auto min-h-30 flex flex-wrap items-center justify-between">
    <div class="flex items-center space-x-4">
        <div>
            <x-profile-picture src="{{ asset('storage/' . $user->profile_pic) }}" />
        </div>
        <div>
            <a href="/users/{{ $user->id }}" class="hover:text-blue-700 transition-all duration-150 hover:underline">
                @php
                    echo '@' . $user->user_name;
                @endphp
            </a>
        </div>
    </div>
    <div>
        @auth
            @if (Auth::user() && Auth::user()->id !== $user->id)
                @if (!Auth::user()->isFollowing($user))
                    <x-forms.button form="follow-form-{{ $user->id }}">Follow</x-forms.button>
                @else
                    <x-forms.danger-button buttonType="b"
                        form="unfollow-form-{{ $user->id }}">Unfollow</x-forms.danger-button>
                @endif
            @endif
        @endauth
    </div>
    @auth
        <form action="/users/{{ $user->id }}/follow" method="POST" class="hidden" id="follow-form-{{ $user->id }}">
            @csrf
        </form>

        <form action="/users/{{ $user->id }}/unfollow" method="POST" class="hidden"
            id="unfollow-form-{{ $user->id }}">
            @csrf
            @method('DELETE')
        </form>
    @endauth
</div>
