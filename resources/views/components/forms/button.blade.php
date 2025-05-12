<button
    {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg px-3 border border-blue-700 bg-black text-white hover:border-black hover:text-blue-700 transition-all duration-300', 'type' => 'submit']) }}>
    <div class="py-1">{{ $slot }}</div>
</button>
