@if ($paginator->hasPages())
    <nav class="flex items-center justify-between" role="navigation" aria-label="Pagination Navigation">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md"
                    style="color: var(--text-muted); background: var(--surface); border: 1px solid var(--border);">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition"
                    style="color: var(--text); background: var(--surface); border: 1px solid var(--border);">
                    Previous
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium rounded-md transition"
                    style="color: var(--text); background: var(--surface); border: 1px solid var(--border);">
                    Next
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium rounded-md"
                    style="color: var(--text-muted); background: var(--surface); border: 1px solid var(--border);">
                    Next
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:items-center sm:justify-between w-full">
            <div>
                <p class="text-sm" style="color: var(--text-muted);">
                    Showing
                    <span class="font-medium" style="color: var(--text);">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-medium" style="color: var(--text);">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-medium" style="color: var(--text);">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-l-md"
                            style="color: var(--text-muted); background: var(--surface); border: 1px solid var(--border);">
                            &laquo;
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-l-md transition"
                            style="color: var(--text); background: var(--surface); border: 1px solid var(--border);">
                            &laquo;
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium"
                                style="color: var(--text-muted); background: var(--surface); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
                                {{ $element }}
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium"
                                        style="color: white; background: var(--primary); border: 1px solid var(--primary);">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium transition"
                                        style="color: var(--text); background: var(--surface); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-r-md transition"
                            style="color: var(--text); background: var(--surface); border: 1px solid var(--border);">
                            &raquo;
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-r-md"
                            style="color: var(--text-muted); background: var(--surface); border: 1px solid var(--border);">
                            &raquo;
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif