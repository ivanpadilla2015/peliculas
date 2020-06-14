@if ($paginator->hasPages())
    <ul class="pagination flex  mt-3"  role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled w-10 px-1 py-1 text-center rounded border bg-gray-700" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <
            </li>
        @else
            <li class="page-item">
                <button type="button" class="page-link w-10 px-1 py-1 text-center rounded border shadow bg-gray-900 cursor-pointer bg-gray-900" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
                    <
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active d-none d-md-block w-10 px-1 py-1 text-center rounded border shadow bg-gray-600 text-white  cursor-pointer" aria-current="page" wire:click="gotoPage({{$page}})">{{ $page }}</li>
                    @else
                        <li class="page-item d-none d-md-block w-10 px-1 py-1 text-center rounded border shadow bg-gray-900  cursor-pointer" wire:click="gotoPage({{ $page }})" >{{ $page }}</li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <button type="button" class="page-link w-10 px-1 py-1 text-center rounded border shadow bg-gray-900 cursor-pointer bg-gray-900" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                    >
                </button>
            </li>
        @else
            <li class="page-item disabled w-10 px-1 py-1 text-center rounded border bg-gray-700" aria-disabled="true" aria-label="@lang('pagination.next')">
                >
            </li>
        @endif
    </ul>
@endif

