<x-app-layout>

    <x-slot:title>Data Guru</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Data Guru
            </h2>

            <p
                class="text-[11px] hidden sm:block"
                style="color: var(--text-muted);"
            >
                Kelola data guru pembimbing PKL
            </p>
        </div>
    </x-slot:header>


    {{-- Alert Sukses --}}
    @if(session('success'))

        <div
            class="flex items-center gap-3 p-4 rounded-xl mb-4 anim"
            style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);"
        >

            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0"
                style="background: rgba(34,197,94,0.12);"
            >
                <i
                    data-lucide="check-circle-2"
                    class="h-4 w-4"
                    style="color: #4ade80;"
                ></i>
            </div>

            <p
                class="text-[12.5px] font-medium"
                style="color: #4ade80;"
            >
                {{ session('success') }}
            </p>

            <button
                onclick="this.closest('div').remove()"
                class="ml-auto shrink-0"
                style="color: rgba(34,197,94,0.5);"
            >
                <i
                    data-lucide="x"
                    class="h-4 w-4"
                ></i>
            </button>

        </div>

    @endif


    {{-- Top Bar --}}
    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 anim"
    >

        <div>

            <h3 class="text-[16px] font-bold text-white">
                Daftar Guru
            </h3>

            <p
                class="text-[11px] mt-0.5"
                style="color: var(--text-dim);"
            >
                Kelola data guru pembimbing PKL
            </p>

        </div>


        <div class="flex items-center gap-2">

            {{-- Search --}}
            <form
                action="{{ route('admin.guru.index') }}"
                method="GET"
                class="relative w-full sm:w-[220px]"
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
                    placeholder="Cari guru..."
                    class="input-dark w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                >

                @if(request('search'))

                    <a
                        href="{{ route('admin.guru.index') }}"
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


            {{-- Tambah --}}
            <a
                href="{{ route('admin.guru.create') }}"
                class="btn-primary text-[11px] px-3 py-2 shrink-0"
            >

                <i
                    data-lucide="plus"
                    class="h-3.5 w-3.5"
                ></i>

                Tambah

            </a>

        </div>

    </div>


    {{-- Info Bar --}}
    <div
        class="flex items-center justify-between mb-3 px-1 anim anim-d1"
    >

        <p
            class="text-[11px]"
            style="color: var(--text-dim);"
        >

            @if(request('search'))

                Hasil pencarian:
                <span class="font-semibold text-white">
                    {{ $gurus->total() }}
                </span>
                data

            @else

                Menampilkan
                <span
                    class="font-semibold text-white"
                >
                    {{ $gurus->total() }}
                </span>
                data

            @endif

        </p>

    </div>


    {{-- Table --}}
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
                            NIP
                        </th>

                        <th class="px-5 py-3">
                            Nama
                        </th>

                        <th class="px-5 py-3 hidden md:table-cell">
                            Email
                        </th>

                        <th class="px-5 py-3 hidden lg:table-cell">
                            No. HP
                        </th>

                        <th class="px-5 py-3 text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($gurus as $guru)

                        <tr>

                            {{-- No --}}
                            <td class="px-5 py-3">

                                <span
                                    class="text-[12px] font-medium"
                                    style="color: var(--text-dim);"
                                >
                                    {{ $gurus->firstItem() + $loop->index }}
                                </span>

                            </td>


                            {{-- NIP --}}
                            <td class="px-5 py-3">

                                <span
                                    class="text-[12px] font-mono"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $guru->nip }}
                                </span>

                            </td>


                            {{-- Nama --}}
                            <td class="px-5 py-3">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="avatar h-8 w-8 text-[10px] rounded-lg"
                                        style="background: linear-gradient(135deg, #8b5cf6, #a855f7);"
                                    >
                                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                    </div>

                                    <span
                                        class="text-[12.5px] font-semibold text-white"
                                    >
                                        {{ $guru->nama }}
                                    </span>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td
                                class="px-5 py-3 hidden md:table-cell"
                            >

                                <span
                                    class="text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $guru->user->email ?? '-' }}
                                </span>

                            </td>


                            {{-- No HP --}}
                            <td
                                class="px-5 py-3 hidden lg:table-cell"
                            >

                                <span
                                    class="text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ $guru->no_hp ?? '-' }}
                                </span>

                            </td>


                            {{-- Aksi --}}
                            <td class="px-5 py-3">

                                <div
                                    class="flex items-center justify-end gap-1.5"
                                >

                                    {{-- Detail --}}
                                    <a
                                        href="{{ route('admin.guru.show', $guru) }}"
                                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                        style="color: var(--accent-blue); background: rgba(79,142,255,0.08);"
                                        onmouseover="this.style.background='rgba(79,142,255,0.15)'"
                                        onmouseout="this.style.background='rgba(79,142,255,0.08)'"
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
                                        href="{{ route('admin.guru.edit', $guru) }}"
                                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                        style="color: #fbbf24; background: rgba(245,158,11,0.08);"
                                        onmouseover="this.style.background='rgba(245,158,11,0.15)'"
                                        onmouseout="this.style.background='rgba(245,158,11,0.08)'"
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
                                        action="{{ route('admin.guru.destroy', $guru) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data guru ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                            style="color: #f87171; background: rgba(239,68,68,0.08);"
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
                                colspan="6"
                                class="px-5 py-16 text-center"
                            >

                                <div
                                    class="flex flex-col items-center gap-2.5"
                                >

                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl"
                                        style="background: rgba(255,255,255,0.03);"
                                    >
                                        <i
                                            data-lucide="users"
                                            class="h-5 w-5"
                                            style="color: var(--text-dim);"
                                        ></i>
                                    </div>

                                    <p
                                        class="text-[12px]"
                                        style="color: var(--text-muted);"
                                    >
                                        @if(request('search'))
                                            Data guru tidak ditemukan
                                        @else
                                            Belum ada data guru
                                        @endif
                                    </p>

                                    @if(!request('search'))

                                        <a
                                            href="{{ route('admin.guru.create') }}"
                                            class="btn-outline text-[11px]"
                                        >

                                            <i
                                                data-lucide="plus"
                                                class="h-3 w-3"
                                            ></i>

                                            Tambah guru pertama

                                        </a>

                                    @else

                                        <p
                                            class="text-[11px]"
                                            style="color: var(--text-dim);"
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


        {{-- Pagination --}}
        @if($gurus->hasPages())

            <div
                class="px-5 py-4 border-t"
                style="border-color: var(--border);"
            >

                {{ $gurus->links('partials.pagination-dark') }}

            </div>

        @endif

    </div>


    @push('scripts')

        <script>
            lucide.createIcons();
        </script>

    @endpush

</x-app-layout>