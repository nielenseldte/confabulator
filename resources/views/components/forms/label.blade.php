@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <label class="font-bold mb-2 ml-2" for="{{ $name }}">{{ $label }}</label>
</div>