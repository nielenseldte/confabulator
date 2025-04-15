@props(['error' => false])

@if ($error)
    <p class="text-sm text-red-500 bg-red-300 px-2 py-2 border border-red-500 rounded-md">{{ $error }}</p>
@endif