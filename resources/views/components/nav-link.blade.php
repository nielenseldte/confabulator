@props(['active'=>false])

<a {{ $attributes->merge(['class' => $active ? 'border-b-4 border-white py-4'.' hover:text-blue-700' : 'hover:text-blue-700']) }}>{{ $slot }}</a>