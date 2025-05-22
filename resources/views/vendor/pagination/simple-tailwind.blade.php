@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <x-pagination.inactive-pagination>
                {!! __('pagination.previous') !!}
            </x-pagination.inactive-pagination>
        @else
            <x-pagination.active-pagination href="{{$paginator->previousPageUrl() }}">
                {!! __('pagination.previous') !!}
            </x-pagination.active-pagination>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <x-pagination.active-pagination href="{{ $paginator->nextPageUrl() }}">
                {!! __('pagination.next') !!}
            </x-pagination.active-pagination>
        @else
            <x-pagination.inactive-pagination>
                {!! __('pagination.next') !!}
            </x-pagination.inactive-pagination>
        @endif
    </nav>
@endif
