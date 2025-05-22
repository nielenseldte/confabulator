@props(['type' => 'like', 'active' => false])

<button {{ $attributes->merge(['class' => 'cursor-pointer group']) }}>
    @if ($type === 'dislike')
        <span class="hidden">Debug: {{ $active ? 'true' : 'false' }}</span>
    @endif
    @if ($type === 'like')
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-thumbs-up-icon lucide-thumbs-up {{ $active ? 'text-blue-700' : 'group-hover:text-blue-700' }}">
            <path d="M7 10v12" />
            <path
                d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z" />
        </svg>
    @elseif ($type === 'dislike')
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-thumbs-down-icon lucide-thumbs-down {{ $active ? 'text-red-600' : 'group-hover:text-red-600' }}">
            <path d="M17 14V2" />
            <path
                d="M9 18.12 10 14H4.17a2 2 0 0 1-1.92-2.56l2.33-8A2 2 0 0 1 6.5 2H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.76a2 2 0 0 0-1.79 1.11L12 22a3.13 3.13 0 0 1-3-3.88Z" />
        </svg>
    @endif
</button>
