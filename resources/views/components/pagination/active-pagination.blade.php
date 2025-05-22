<a {{ $attributes->merge(['rel' => 'prev', 'class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black border border-blue-700 leading-5 rounded-full hover:text-blue-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
