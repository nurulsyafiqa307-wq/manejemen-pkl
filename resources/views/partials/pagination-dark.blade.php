@if ($paginator->hasPages())

    <nav
        class="flex items-center justify-between"
        role="navigation"
        aria-label="Pagination Navigation"
    >

        <div class="flex justify-between flex-1 sm:hidden">

            @if ($paginator->onFirstPage())

                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md"
                    style="color: #94a3b8; background: #ffffff; border: 1px solid #e2e8f0;"
                >
                    Previous
                </span>

            @else

                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition hover:bg-slate-50"
                    style="color: #334155; background: #ffffff; border: 1px solid #e2e8f0;"
                >
                    Previous
                </a>

            @endif


            @if ($paginator->hasMorePages())

                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium rounded-md transition hover:bg-slate-50"
                    style="color: #334155; background: #ffffff; border: 1px solid #e2e8f0;"
                >
                    Next
                </a>

            @else

                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium rounded-md"
                    style="color: #94a3b8; background: #ffffff; border: 1px solid #e2e8f0;"
                >
                    Next
                </span>

            @endif

        </div>


        <div class="hidden sm:flex sm:items-center sm:justify-between w-full">

            <div>

                <p
                    class="text-sm"
                    style="color: #64748b;"
                >
                    Showing

                    <span
                        class="font-medium"
                        style="color: #1e293b;"
                    >
                        {{ $paginator->firstItem() }}
                    </span>

                    to

                    <span
                        class="font-medium"
                        style="color: #1e293b;"
                    >
                        {{ $paginator->lastItem() }}
                    </span>

                    of

                    <span
                        class="font-medium"
                        style="color: #1e293b;"
                    >
                        {{ $paginator->total() }}
                    </span>

                    results
                </p>

            </div>


            <div>

                <span
                    class="relative z-0 inline-flex rounded-md shadow-sm"
                >

                    {{-- Previous --}}

                    @if ($paginator->onFirstPage())

                        <span
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-l-md"
                            style="color: #94a3b8; background: #ffffff; border: 1px solid #e2e8f0;"
                        >
                            &laquo;
                        </span>

                    @else

                        <a
                            href="{{ $paginator->previousPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-l-md transition"
                            style="color: #334155; background: #ffffff; border: 1px solid #e2e8f0;"
                            onmouseover="this.style.background='#f8fafc'; this.style.color='#2563eb';"
                            onmouseout="this.style.background='#ffffff'; this.style.color='#334155';"
                        >
                            &laquo;
                        </a>

                    @endif


                    {{-- Page Numbers --}}

                    @foreach ($elements as $element)

                        @if (is_string($element))

                            <span
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium"
                                style="color: #94a3b8; background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"
                            >
                                {{ $element }}
                            </span>

                        @endif


                        @if (is_array($element))

                            @foreach ($element as $page => $url)

                                @if ($page == $paginator->currentPage())

                                    {{-- HALAMAN AKTIF --}}
                                    <span
                                        class="relative inline-flex items-center px-3 py-2 text-sm font-semibold"
                                        style="color: #ffffff !important; background: #2563eb !important; border: 1px solid #2563eb !important; box-shadow: 0 2px 6px rgba(37, 99, 235, 0.20);"
                                    >
                                        {{ $page }}
                                    </span>

                                @else

                                    {{-- HALAMAN TIDAK AKTIF --}}
                                    <a
                                        href="{{ $url }}"
                                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium transition"
                                        style="color: #334155; background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;"
                                        onmouseover="this.style.background='#eff6ff'; this.style.color='#2563eb';"
                                        onmouseout="this.style.background='#ffffff'; this.style.color='#334155';"
                                    >
                                        {{ $page }}
                                    </a>

                                @endif

                            @endforeach

                        @endif

                    @endforeach


                    {{-- Next --}}

                    @if ($paginator->hasMorePages())

                        <a
                            href="{{ $paginator->nextPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-r-md transition"
                            style="color: #334155; background: #ffffff; border: 1px solid #e2e8f0;"
                            onmouseover="this.style.background='#f8fafc'; this.style.color='#2563eb';"
                            onmouseout="this.style.background='#ffffff'; this.style.color='#334155';"
                        >
                            &raquo;
                        </a>

                    @else

                        <span
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-r-md"
                            style="color: #94a3b8; background: #ffffff; border: 1px solid #e2e8f0;"
                        >
                            &raquo;
                        </span>

                    @endif

                </span>

            </div>

        </div>

    </nav>

@endif