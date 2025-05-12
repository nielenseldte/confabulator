<a {{ $attributes->merge(['class' => 'cursor-pointer rounded-lg border border-blue-700 bg-black text-white hover:border-black hover:text-blue-700 transition-all duration-300']) }}>
    <div class="flex justify-between px-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-left-icon lucide-arrow-left">
            <path d="m12 19-7-7 7-7" />
            <path d="M19 12H5" />
        </svg>
        {{ $slot }}
    </div>
</a>
