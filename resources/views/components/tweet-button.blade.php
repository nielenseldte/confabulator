<a
    {{ $attributes->merge(['class' => ' flex items-center space-x-2 py-2 px-2 border rounded-lg border-blue-700 cursor-pointer group']) }}><svg
        xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-message-circle-plus-icon lucide-message-circle-plus group-hover:stroke-blue-700 transition-colors duration-300">
        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
        <path d="M8 12h8" />
        <path d="M12 8v8" />
    </svg><span class="group-hover:text-blue-700 transition-colors duration-300">{{ $slot }}</span> 
</a>
