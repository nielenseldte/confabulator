<div x-cloak x-show="showSearchInput" x-transition.opacity.duration.200ms x-trap.inert.noscroll="showSearchInput" x-on:keydown.esc.window="showSearchInput = false" x-on:click.self="showSearchInput = false" class="flex absolute justify-center inset-0 items-center p-4 sm:inset-auto sm:top-7 sm:right-80 sm:h-16 sm:items-end sm:p-8" role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
    <div x-show="showSearchInput" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex justify-between max-w-lg gap-4 overflow-hidden rounded-lg border border-blue-700 bg-black">
            {{ $slot }}
    </div>
</div>
