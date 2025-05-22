@props(['active'=>false])

<a {{ $attributes->merge(['class' => $active ? 'text-blue-700 sm:text-white sm:border-b-4 sm:border-white sm:py-4'.' sm:hover:text-blue-700' : 'sm:hover:text-blue-700']) }}>{{ $slot }}</a>