<x-app-layout>

    <x-slot:title>Tempat PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                Tempat PKL
            </h2>
            <p
                class="text-[11px] hidden sm:block"
                style="color: var(--text-muted);"
            >
                Kelola data perusahaan tempat PKL
            </p>
        </div>
    </x-slot:header>


    {{-- ===== ALERT SUKSES ===== --}}
    @if(session('success'))
        <div
            class="flex items-center gap-3 p-4 rounded-xl mb-4 anim"
            style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.18);"
        >
            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0"
                style="background: rgba(34,197,94,0.12);"
            >
                <i
                    data-lucide="check-circle-2"
                    class="h-4 w-4"
                    style="color: #16a34a;"
                ></i>
            </div>

            <p
                class="text-[12.5px] font-medium"
                style="color: #15803d;"
            >
                {{ session('success') }}
            </p>

            <button
                type="button"
                onclick="this.closest('div').remove()"
                class="ml-auto shrink-0"
                style="color: rgba(22,101,52,0.55);"
            >
                <i
                    data-lucide="x"
                    class="h-4 w-4"
                ></i>
            </button>
        </div>
    @endif


    {{-- ===== ALERT ERROR ===== --}}
    @if($errors->any())
        <div
            class="flex items-start gap-3 p-4 rounded-xl mb-4 anim"
            style="background: rgba(239,68,68,0.07); border: 1px solid rgba(239,68,68,0.18);"
        >
            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0 mt-0.5"
                style="background: rgba(239,68,68,0.10);"
            >
                <i
                    data-lucide="alert-circle"
                    class="h-4 w-4"
                    style="color: #dc2626;"
                ></i>
            </div>

            <div class="min-w-0 flex-1">
                <p
                    class="text-[12.5px] font-semibold mb-1"
                    style="color: #dc2626;"
                >
                    Ada kesalahan:
                </p>

                <ul class="space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li
                            class="text-[11.5px]"
                            style="color: #b91c1c;"
                        >
                            • {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <button
                type="button"
                onclick="this.closest('div').remove()"
                class="shrink-0"
                style="color: rgba(185,28,28,0.5);"
            >
                <i
                    data-lucide="x"
                    class="h-4 w-4"
                ></i>
            </button>
        </div>
    @endif


    {{-- ===== TOP BAR ===== --}}
    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 anim"
    >
        <div>
            <h3 class="text-[16px] font-bold text-slate-800">
                Daftar Tempat PKL
            </h3>

            <p
                class="text-[11px] mt-0.5"
                style="color: var(--text-muted);"
            >
                Kelola data perusahaan tempat PKL
            </p>
        </div>


        <div class="flex items-center gap-2">

            {{-- ===== SEARCH ===== --}}
            <form
                action="{{ route('admin.tempat.index') }}"
                method="GET"
                class="relative w-[220px]"
            >
                <i
                    data-lucide="search"
                    class="absolute left-3 top-1/2 -translate-y-1/2 h-3.5 w-3.5"
                    style="color: var(--text-dim);"
                ></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari tempat..."
                    class="w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                    style="background-color: #ffffff !important; color: #1e293b !important; border: 1px solid #cbd5e1 !important;"
                >

                @if(request('search'))
                    <a
                        href="{{ route('admin.tempat.index') }}"
                        class="absolute right-3 top-1/2 -translate-y-1/2"
                        style="color: var(--text-dim);"
                        title="Reset pencarian"
                    >
                        <i
                            data-lucide="x"
                            class="h-3.5 w-3.5"
                        ></i>
                    </a>
                @endif
            </form>


            {{-- ===== TAMBAH TEMPAT ===== --}}
            <a
                href="{{ route('admin.tempat.create') }}"
                class="btn-primary text-[11px] px-3 py-2 shrink-0"
            >
                <i
                    data-lucide="plus"
                    class="h-3.5 w-3.5"
                ></i>
                Tambah Tempat
            </a>

        </div>
    </div>


    {{-- ===== INFO BAR ===== --}}
    <div
        class="flex items-center justify-between mb-4 px-1 anim anim-d1"
    >
        <p
            class="text-[11px]"
            style="color: var(--text-muted);"
        >
            @if(request('search'))
                Hasil pencarian:
                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $tempats->total() }}
                </span>
                perusahaan
            @else
                Menampilkan
                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $tempats->total() }}
                </span>
                perusahaan
            @endif
        </p>

        @if($tempats->hasPages())
            <p
                class="text-[11px]"
                style="color: var(--text-muted);"
            >
                Halaman
                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $tempats->currentPage() }}
                </span>
                dari
                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $tempats->lastPage() }}
                </span>
            </p>
        @endif
    </div>


    {{-- ===== CARD GRID ===== --}}
    @if($tempats->count() > 0)

        <div
            class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4"
            id="tempatGrid"
        >

            @foreach($tempats as $tempat)

                <div
                    class="card p-5 anim anim-d1 transition-all duration-200 cursor-pointer hover:-translate-y-0.5"
                    onclick="window.location='{{ route('admin.tempat.show', $tempat) }}'"
                >

                    {{-- ===== HEADER CARD ===== --}}
                    <div class="flex items-start justify-between mb-4">

                        <div class="flex items-center gap-3 min-w-0">

                            <div
                                class="avatar h-11 w-11 text-[14px] rounded-xl flex items-center justify-center shrink-0 font-bold"
                                style="background: linear-gradient(135deg, #059669, #10b981);"
                            >
                                {{ strtoupper(substr($tempat->nama_perusahaan, 0, 1)) }}
                            </div>

                            <div class="min-w-0">

                                <h3
                                    class="text-[13px] font-bold leading-tight truncate"
                                    style="color: var(--text-primary);"
                                >
                                    {{ $tempat->nama_perusahaan }}
                                </h3>

                                <span
                                    class="inline-flex items-center mt-1 px-2 py-0.5 rounded-md text-[9px] font-medium"
                                    style="background: #f1f5f9; color: #475569;"
                                >
                                    {{ $tempat->bidang }}
                                </span>

                            </div>

                        </div>


                        {{-- ===== AKSI ===== --}}
                        <div class="flex items-center gap-1 shrink-0">

                            {{-- Edit --}}
                            <a
                                href="{{ route('admin.tempat.edit', $tempat) }}"
                                onclick="event.stopPropagation()"
                                class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                style="color: #b45309; background: rgba(245,158,11,0.09);"
                                onmouseover="this.style.background='rgba(245,158,11,0.16)'"
                                onmouseout="this.style.background='rgba(245,158,11,0.09)'"
                                title="Edit"
                            >
                                <i
                                    data-lucide="pencil"
                                    class="h-3 w-3"
                                ></i>
                            </a>


                            {{-- Hapus --}}
                            <form
                                action="{{ route('admin.tempat.destroy', $tempat) }}"
                                method="POST"
                                class="form-delete"
                                data-confirm-message="Yakin ingin menghapus {{ $tempat->nama_perusahaan }}?"
                                onclick="event.stopPropagation()"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="event.stopPropagation()"
                                    class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                    style="color: #dc2626; background: rgba(239,68,68,0.08);"
                                    onmouseover="this.style.background='rgba(239,68,68,0.15)'"
                                    onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                    title="Hapus"
                                >
                                    <i
                                        data-lucide="trash-2"
                                        class="h-3 w-3"
                                    ></i>
                                </button>
                            </form>

                        </div>

                    </div>


                    {{-- ===== INFORMASI TEMPAT ===== --}}
                    <div class="space-y-2.5">

                        {{-- Alamat --}}
                        <div class="flex items-center gap-2">

                            <i
                                data-lucide="map-pin"
                                class="h-3 w-3 shrink-0"
                                style="color: #94a3b8;"
                            ></i>

                            <span
                                class="text-[11px] truncate"
                                style="color: var(--text-secondary);"
                            >
                                {{ $tempat->alamat ?? 'Belum ada alamat' }}
                            </span>

                        </div>


                        {{-- No HP --}}
                        <div class="flex items-center gap-2">

                            <i
                                data-lucide="phone"
                                class="h-3 w-3 shrink-0"
                                style="color: #94a3b8;"
                            ></i>

                            <span
                                class="text-[11px]"
                                style="color: var(--text-secondary);"
                            >
                                {{ $tempat->no_hp ?? '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- ===== FOOTER CARD ===== --}}
                    <div
                        class="flex items-center justify-between mt-4 pt-3"
                        style="border-top: 1px solid var(--border);"
                    >

                        <div class="flex items-center gap-1.5">

                            <i
                                data-lucide="users"
                                class="h-3 w-3"
                                style="color: #16a34a;"
                            ></i>

                            <span
                                class="text-[11px] font-semibold"
                                style="color: #16a34a;"
                            >
                                {{ $tempat->kuota }}
                            </span>

                            <span
                                class="text-[10px]"
                                style="color: var(--text-dim);"
                            >
                                kuota
                            </span>

                        </div>

                        <span
                            class="text-[10px] font-medium"
                            style="color: #2563eb;"
                        >
                            Detail

                            <i
                                data-lucide="arrow-right"
                                class="h-2.5 w-2.5 inline-block align-[-1px]"
                            ></i>
                        </span>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- ===== PAGINATION ===== --}}
        @if($tempats->hasPages())
            <div
                class="px-5 py-4 mt-4"
                style="border-top: 1px solid var(--border);"
            >
                {{ $tempats->links('partials.pagination-dark') }}
            </div>
        @endif


    @else

        {{-- ===== EMPTY STATE ===== --}}
        <div class="card p-16 text-center anim anim-d1">

            <div class="flex flex-col items-center gap-3">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl"
                    style="background: #f1f5f9;"
                >
                    <i
                        data-lucide="building-2"
                        class="h-7 w-7"
                        style="color: #94a3b8;"
                    ></i>
                </div>


                <p
                    class="text-[13px] font-medium"
                    style="color: var(--text-secondary);"
                >
                    @if(request('search'))
                        Data tempat PKL tidak ditemukan
                    @else
                        Belum ada data tempat PKL
                    @endif
                </p>


                <p
                    class="text-[11px]"
                    style="color: var(--text-muted);"
                >
                    @if(request('search'))
                        Coba gunakan kata kunci lain
                    @else
                        Tambahkan perusahaan tempat PKL pertama
                    @endif
                </p>


                @if(!request('search'))

                    <a
                        href="{{ route('admin.tempat.create') }}"
                        class="btn-outline text-[11px] mt-1"
                    >
                        <i
                            data-lucide="plus"
                            class="h-3 w-3"
                        ></i>
                        Tambah Tempat
                    </a>

                @endif

            </div>

        </div>

    @endif


    {{-- ===== STYLE PAGINATION ===== --}}
    <style>

        /* Halaman aktif */
        .pagination-active,
        nav[aria-label="Pagination"] [aria-current="page"],
        nav[role="navigation"] [aria-current="page"] {
            background: #2563eb !important;
            color: #ffffff !important;
            border-color: #2563eb !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.20);
        }

        /* Nomor halaman yang tidak aktif */
        nav[aria-label="Pagination"] a,
        nav[role="navigation"] a {
            color: #475569;
            background: #ffffff;
            border-color: #dbe3ef;
            transition: all 0.2s ease;
        }

        nav[aria-label="Pagination"] a:hover,
        nav[role="navigation"] a:hover {
            color: #2563eb;
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        /* Tombol halaman aktif tidak berubah saat hover */
        nav[aria-label="Pagination"] [aria-current="page"]:hover,
        nav[role="navigation"] [aria-current="page"]:hover {
            background: #2563eb !important;
            color: #ffffff !important;
            border-color: #2563eb !important;
        }

        /* Tombol previous / next */
        nav[aria-label="Pagination"] a svg,
        nav[role="navigation"] a svg {
            color: currentColor;
        }

        /* Tombol disabled */
        nav[aria-label="Pagination"] span[aria-disabled="true"],
        nav[role="navigation"] span[aria-disabled="true"] {
            color: #cbd5e1;
            background: #f8fafc;
            border-color: #e2e8f0;
        }

    </style>


    @push('scripts')
        <script>
            lucide.createIcons();
        </script>
    @endpush

</x-app-layout>