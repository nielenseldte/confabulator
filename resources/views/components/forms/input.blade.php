@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'name' => $name,
        'value' => old($name),
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes->merge($defaults) }}>
</x-forms.field>
