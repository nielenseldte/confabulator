@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 block w-full placeholder:italic',
        'rows' => '10',
        'name' => $name
    ];
@endphp

<x-forms.field :$label :$name>
 <textarea {{ $attributes->merge($defaults) }}>{{ $slot }}</textarea>
</x-forms.field>


{{-- block w-full rounded-md bg-gradient-to-bl from-yellow-500 to-orange-500 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-orange-600 sm:text-sm/6 --}}