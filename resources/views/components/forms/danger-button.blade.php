@props(['buttonType' => 'b'])

@if ($buttonType === 'b')
    <button
        {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg px-3 border border-red-600 bg-black text-white hover:border-black hover:text-red-600 transition-all duration-300', 'type' => 'submit']) }}>
        <div class="py-1">{{ $slot }}</div>
    </button>
@elseif ($buttonType === 'a')
    <a
        {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg px-3 border border-red-600 bg-black text-white hover:border-black hover:text-red-600 transition-all duration-300']) }}>
        <div class="py-1">{{ $slot }}</div>
    </a>
@endif
