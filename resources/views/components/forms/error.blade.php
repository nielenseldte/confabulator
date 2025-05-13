@props(['error' => false])

@if ($error)
    <p class="mt-2 text-sm text-red-600 bg-black px-2 py-2 border-t border-b border-red-600">OOPS! {{ $error }}
    </p>
@endif
