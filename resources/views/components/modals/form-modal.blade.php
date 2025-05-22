<div x-cloak x-show="open" x-transition.opacity.duration.200ms x-trap.inert.noscroll="open"
    x-on:keydown.esc.window="open = false"
    class="fixed inset-0 z-30 flex items-end justify-center p-4 pb-8 backdrop-blur-xs sm:items-center lg:p-8 bg-black/20"
    role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
    <!-- Modal Dialog -->
    <div x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
        x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
        class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-lg border border-blue-700 text-neutral-300 bg-black">
        <!-- Dialog Header -->
        <div class="flex justify-center border-b px-4 py-2 border-blue-700">
            <div class="flex items-center justify-center rounded-full text-blue-700 p-2">
                <h3 class="mb-2 font-semibold tracking-wide">{{ $heading }}</h3>
            </div>

        </div>
        <!-- Dialog Body -->
        <div class="px-4 text-white">
            <div class="flex mx-auto space-y-2">{{ $form }}</div>
        </div>
        <!-- Dialog Footer -->
        <div class="flex items-center justify-between space-x-4 p-4 border-neutral-700">
            {{ $slot }}
        </div>
    </div>
</div>
