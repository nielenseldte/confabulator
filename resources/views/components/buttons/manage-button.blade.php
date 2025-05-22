@props(['type' => 'edit'])

@if ($type === 'edit')
    <a
        {{ $attributes->merge(['class' => 'text-xs cursor-pointer rounded-lg px-2 border border-blue-700 bg-black text-white hover:border-black hover:text-blue-700 transition-all duration-300']) }}>
        <div class="py-1">{{ $slot }}</div>
    </a>
@elseif ($type === 'delete')
    <button {{ $attributes->merge(['class' => 'text-xs cursor-pointer rounded-lg px-2 border border-red-600 bg-black text-white hover:border-black hover:text-red-600 transition-all duration-300', 'type' => 'submit']) }}><div class="py-1">{{ $slot }}</div></button>
@endif
