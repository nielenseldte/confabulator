<x-layout>
    <div class="mb-5 sm:mb-0 flex justify-between items-center">
        <x-back-button
            href="{{ $previousUrl !== $currentUrl && $previousUrl !== route('users.edit', ['user' => $user->id]) ? $previousUrl : '/tweets' }}"
            class="border">Back</x-back-button>
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

    @if (!Auth::user() || Auth::user()->id !== $user->id)
        <x-section-heading>Viewing Profile Of {{ $user->user_name }}</x-section-heading>
    @else
        <x-section-heading>Your Profile</x-section-heading>
    @endif

    <x-user-profile-card :$user />

    @if (!$tweets->isEmpty())
        <div x-data="{ showTweets: false }">
            <div class="flex justify-center mt-5">
                <x-js-button @click="showTweets = !showTweets" class="cursor-pointer">
                    <span x-text="showTweets ? 'Hide Posts' : 'Show Posts'"></span>
                </x-js-button>
            </div>
            <div class="mt-8" x-cloak x-show="showTweets" x-transition>
                <x-scrollable-tweet-box>
                    @foreach ($tweets as $tweet)
                        <div><x-tweet-card-scrollable :$tweet /></div>
                    @endforeach
                </x-scrollable-tweet-box>
            </div>
        </div>
    @endif

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
