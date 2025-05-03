@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6">
        <ul class="flex items-center space-x-2 bg-[#1c1c1c] p-2 rounded-lg shadow-inner">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="opacity-50 cursor-not-allowed" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="text-red-500 px-3 py-1.5 rounded">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="text-red-500 hover:text-red-400 px-3 py-1.5 rounded transition">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="text-white px-3 py-1.5">...</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="bg-red-600 text-white px-3 py-1.5 rounded font-semibold shadow-sm">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="text-white hover:bg-gray-700 px-3 py-1.5 rounded transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="text-red-500 hover:text-red-400 px-3 py-1.5 rounded transition">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li class="opacity-50 cursor-not-allowed" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="text-red-500 px-3 py-1.5 rounded">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
