<x-layout>
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
    @endphp

    <x-section-heading>Viewing Profile Of {{ $user->user_name }}</x-section-heading>
    <x-user-profile-card :$user/>
    <div class="mt-10 flex items-center justify-between">
        <x-back-button href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}" class="border">Back</x-back-button>
        <button>Edit Profile button</button>
    </div>
</x-layout>