<x-app-layout>

    <x-slot:title>Data Siswa</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                Data Siswa
            </h2>

            <p
                class="text-[11px] hidden sm:block"
                style="color: var(--text-muted);"
            >
                Kelola data siswa peserta PKL
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
                Daftar Siswa
            </h3>

            <p
                class="text-[11px] mt-0.5"
                style="color: var(--text-muted);"
            >
                Kelola data siswa peserta PKL
            </p>
        </div>


        <div class="flex items-center gap-2">

            {{-- ===== SEARCH ===== --}}
            <form
                action="{{ route('admin.siswa.index') }}"
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
    placeholder="Cari siswa..."
    class="w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
    style="background-color: #ffffff !important; color: #1e293b !important; border: 1px solid #cbd5e1 !important;"
>

                @if(request('search'))
                    <a
                        href="{{ route('admin.siswa.index') }}"
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


            {{-- ===== TAMBAH SISWA ===== --}}
            <a
                href="{{ route('admin.siswa.create') }}"
                class="btn-primary text-[11px] px-3 py-2 shrink-0"
            >
                <i
                    data-lucide="plus"
                    class="h-3.5 w-3.5"
                ></i>

                Tambah Siswa
            </a>
        </div>
    </div>


    {{-- ===== INFO BAR ===== --}}
    <div
        class="flex items-center justify-between mb-3 px-1 anim anim-d1"
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
                    {{ $siswas->total() }}
                </span>

                data
            @else
                Menampilkan

                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $siswas->total() }}
                </span>

                data
            @endif
        </p>


        @if($siswas->hasPages())
            <p
                class="text-[11px]"
                style="color: var(--text-muted);"
            >
                Halaman

                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $siswas->currentPage() }}
                </span>

                dari

                <span
                    class="font-semibold"
                    style="color: var(--text-primary);"
                >
                    {{ $siswas->lastPage() }}
                </span>
            </p>
        @endif
    </div>


    {{-- ===== TABLE ===== --}}
    <div
        class="card overflow-hidden anim anim-d1"
    >
        <div class="overflow-x-auto">

            <table class="table-dark w-full text-left">

                <thead>
                    <tr>

                        <th class="px-5 py-3 w-[50px]">
                            No
                        </th>

                        <th class="px-5 py-3">
                            NIS
                        </th>

                        <th class="px-5 py-3">
                            Nama
                        </th>

                        <th class="px-5 py-3 hidden md:table-cell">
                            Kelas
                        </th>

                        <th class="px-5 py-3 hidden lg:table-cell">
                            Jurusan
                        </th>

                        <th class="px-5 py-3 hidden xl:table-cell">
                            No. HP
                        </th>

                        <th class="px-5 py-3 text-right">
                            Aksi
                        </th>

                    </tr>
                </thead>


                <tbody>

                    @forelse($siswas as $siswa)

                        <tr>

                            {{-- ===== NO ===== --}}
                            <td class="px-5 py-3">
                                <span
                                    class="text-[12px] font-medium"
                                    style="color: var(--text-muted);"
                                >
                                    {{ $siswas->firstItem() + $loop->index }}
                                </span>
                            </td>


                            {{-- ===== NIS ===== --}}
                            <td class="px-5 py-3">
                                <span
                                    class="text-[12px] font-mono"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $siswa->nis }}
                                </span>
                            </td>


                            {{-- ===== NAMA ===== --}}
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="avatar h-8 w-8 text-[10px] rounded-lg"
                                        style="background: linear-gradient(135deg, #2563eb, #4f46e5);"
                                    >
                                        {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                                    </div>

                                    <span
                                        class="text-[12.5px] font-semibold"
                                        style="color: var(--text-primary);"
                                    >
                                        {{ $siswa->nama }}
                                    </span>

                                </div>
                            </td>


                            {{-- ===== KELAS ===== --}}
                            <td
                                class="px-5 py-3 hidden md:table-cell"
                            >
                                <span
                                    class="text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $siswa->kelas }}
                                </span>
                            </td>


                            {{-- ===== JURUSAN ===== --}}
                            <td
                                class="px-5 py-3 hidden lg:table-cell"
                            >
                                <span
                                    class="text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $siswa->jurusan }}
                                </span>
                            </td>


                            {{-- ===== NO HP ===== --}}
                            <td
                                class="px-5 py-3 hidden xl:table-cell"
                            >
                                <span
                                    class="text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $siswa->no_hp ?? '-' }}
                                </span>
                            </td>


                            {{-- ===== AKSI ===== --}}
                            <td class="px-5 py-3">

                                <div
                                    class="flex items-center justify-end gap-1.5"
                                >

                                    {{-- Detail --}}
                                    <a
                                        href="{{ route('admin.siswa.show', $siswa->id) }}"
                                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                        style="color: #2563eb; background: rgba(37,99,235,0.08);"
                                        onmouseover="this.style.background='rgba(37,99,235,0.14)'"
                                        onmouseout="this.style.background='rgba(37,99,235,0.08)'"
                                    >
                                        <i
                                            data-lucide="eye"
                                            class="h-3 w-3"
                                        ></i>

                                        <span class="hidden sm:inline">
                                            Detail
                                        </span>
                                    </a>


                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.siswa.edit', $siswa->id) }}"
                                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                        style="color: #b45309; background: rgba(245,158,11,0.09);"
                                        onmouseover="this.style.background='rgba(245,158,11,0.16)'"
                                        onmouseout="this.style.background='rgba(245,158,11,0.09)'"
                                    >
                                        <i
                                            data-lucide="pencil"
                                            class="h-3 w-3"
                                        ></i>

                                        <span class="hidden sm:inline">
                                            Edit
                                        </span>
                                    </a>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                                        method="POST"
                                        class="form-delete"
                                        data-confirm-message="Yakin ingin menghapus data siswa ini?"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                            style="color: #dc2626; background: rgba(239,68,68,0.08);"
                                            onmouseover="this.style.background='rgba(239,68,68,0.15)'"
                                            onmouseout="this.style.background='rgba(239,68,68,0.08)'"
                                        >
                                            <i
                                                data-lucide="trash-2"
                                                class="h-3 w-3"
                                            ></i>

                                            <span class="hidden sm:inline">
                                                Hapus
                                            </span>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-5 py-16 text-center"
                            >

                                <div
                                    class="flex flex-col items-center gap-2.5"
                                >

                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl"
                                        style="background: #f1f5f9;"
                                    >
                                        <i
                                            data-lucide="users"
                                            class="h-5 w-5"
                                            style="color: #94a3b8;"
                                        ></i>
                                    </div>


                                    <p
                                        class="text-[12px]"
                                        style="color: var(--text-muted);"
                                    >
                                        @if(request('search'))
                                            Data siswa tidak ditemukan
                                        @else
                                            Belum ada data siswa
                                        @endif
                                    </p>


                                    @if(!request('search'))

                                        <a
                                            href="{{ route('admin.siswa.create') }}"
                                            class="btn-outline text-[11px]"
                                        >
                                            <i
                                                data-lucide="plus"
                                                class="h-3 w-3"
                                            ></i>

                                            Tambah siswa pertama
                                        </a>

                                    @else

                                        <p
                                            class="text-[11px]"
                                            style="color: var(--text-muted);"
                                        >
                                            Coba gunakan kata kunci lain
                                        </p>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- ===== PAGINATION ===== --}}
        @if($siswas->hasPages())

            <div
                class="px-5 py-4 border-t"
                style="border-color: var(--border);"
            >
                {{ $siswas->links('partials.pagination-dark') }}
            </div>

        @endif

    </div>


    {{-- ===== PAGINATION STYLE ===== --}}
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