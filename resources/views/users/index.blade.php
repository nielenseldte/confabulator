<x-layout>
    <x-layout.section-heading>Search Results</x-layout.section-heading>
    <div class="mb-5 sm:mb-0 flex justify-between items-center">
        <x-buttons.back-button href="/tweets" class="border">
            Back
        </x-buttons.back-button>
    </div>
    @forelse ($users as $user)
        <x-user-index-card :$user />
    @empty
        <div class="max-w-2xl mx-auto flex items-center justify-center italic text-red-600">
            No results for "{{ $query }}"
        </div>
    @endforelse
</x-layout>
