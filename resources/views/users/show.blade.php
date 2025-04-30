<x-layout>
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
        $authenticated_user = Auth::user();
    @endphp

    <div class="flex justify-between items-center">
        <x-back-button href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}" class="border">Back</x-back-button>
        @auth
            @if (Auth::user() && Auth::user()->id !== $user->id) 
                @if (!Auth::user()->isFollowing($user)) 
                    <x-forms.button form="follow-form">Follow</x-forms.button>
                @else
                    <x-forms.danger-button buttonType="b" form="unfollow-form">Unfollow</x-forms.danger-button>
                @endif
            @endif
        @endauth
    </div>

    @if (Auth::user()->id !== $user->id) 
        <x-section-heading>Viewing Profile Of {{ $user->user_name }}</x-section-heading>
    @else
        <x-section-heading>Your Profile</x-section-heading>
    @endif
    <x-user-profile-card :$user/>
    
    @auth
        <form action="/users/{{ $user->id }}/follow" method="POST" class="hidden" id="follow-form">
            @csrf
        </form>
    
        <form action="/users/{{ $user->id }}/unfollow" method="POST" class="hidden" id="unfollow-form">
            @csrf
            @method('DELETE')
        </form>
    @endauth
   
</x-layout>