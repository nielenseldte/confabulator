@props(['buttonType' => 'b'])

@if ($buttonType === 'b') 
    <button {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg px-3 py-2 border border-red-600 bg-black text-white hover:border-black hover:text-red-600 transition-all duration-300', 'type' => 'submit']) }}>{{ $slot }}</button>
@elseif ($buttonType === 'a')
    <a {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg px-3 py-2 border border-red-600 bg-black text-white hover:border-black hover:text-red-600 transition-all duration-300']) }}>{{ $slot }}</a>
@endif