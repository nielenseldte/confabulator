@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <x-inactive-pagination>
                {!! __('pagination.previous') !!}
            </x-inactive-pagination>
        @else
            <x-active-pagination href="{{$paginator->previousPageUrl() }}">
                {!! __('pagination.previous') !!}
            </x-active-pagination>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <x-active-pagination href="{{ $paginator->nextPageUrl() }}">
                {!! __('pagination.next') !!}
            </x-active-pagination>
        @else
            <x-inactive-pagination>
                {!! __('pagination.next') !!}
            </x-inactive-pagination>
        @endif
    </nav>
@endif
