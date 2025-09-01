<div x-cloak x-show="open" x-transition.opacity.duration.200ms x-trap.inert.noscroll="open" x-on:keydown.esc.window="open = false" x-on:click.self="open = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
    <!-- Modal Dialog -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-lg border border-blue-700 bg-black/20 text-neutral-300">
        <!-- Dialog Header -->
        <div class="flex justify-center border-b px-4 py-2 border-blue-700 bg-black/20">
            <div class="flex items-center justify-center rounded-full bg-red-500/20 text-red-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert-icon lucide-triangle-alert"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
            </div>
            
        </div>
        <!-- Dialog Body -->
        <div class="px-4 text-center text-white"> 
            <h3 id="dangerModalTitle" class="mb-2 font-semibold tracking-wide">{{ $heading }}</h3>
            <p>{{ $message }}</p>
        </div>
        <!-- Dialog Footer -->
        <div class="flex items-center justify-between space-x-4 p-4 border-neutral-700">
            {{ $slot }}
        </div>
    </div>
</div>
