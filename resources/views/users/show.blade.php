<x-layout>
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
    @endphp

    <div class="flex justify-start"><x-back-button href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}" class="border">Back</x-back-button></div>

    <x-section-heading>Viewing Profile Of {{ $user->user_name }}</x-section-heading>
    <x-user-profile-card :$user/>
    
    
   
</x-layout>