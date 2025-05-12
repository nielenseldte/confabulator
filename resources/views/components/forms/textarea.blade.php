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

