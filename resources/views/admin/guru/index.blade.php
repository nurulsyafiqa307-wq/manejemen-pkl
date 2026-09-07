<x-app-layout>

    <x-slot:title>Data Guru</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
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
            style="
                background: #f0fdf4;
                border: 1px solid #bbf7d0;
            "
        >

            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0"
                style="background: #dcfce7;"
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
                style="color: #16a34a;"
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

            <h3
                class="text-[16px] font-bold"
                style="color: #1e293b;"
            >
                Daftar Guru
            </h3>

            <p
                class="text-[11px] mt-0.5"
                style="color: #64748b;"
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
                    style="color: #94a3b8;"
                ></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari guru..."
                    class="w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px] bg-white text-slate-800 placeholder-slate-400 border border-slate-300 focus:outline-none focus:border-blue-500"
                    style="background-color: #ffffff !important; color: #1e293b !important;"
                >


                @if(request('search'))

                    <a
                        href="{{ route('admin.guru.index') }}"
                        class="absolute right-3 top-1/2 -translate-y-1/2"
                        style="color: #94a3b8;"
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
                class="inline-flex items-center justify-center gap-1.5 rounded-lg text-[11px] px-3 py-2 font-semibold text-white transition shrink-0"
                style="background: #2563eb;"
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
            style="color: #64748b;"
        >

            @if(request('search'))

                Hasil pencarian:

                <span
                    class="font-semibold"
                    style="color: #1e293b;"
                >
                    {{ $gurus->total() }}
                </span>

                data

            @else

                Menampilkan

                <span
                    class="font-semibold"
                    style="color: #1e293b;"
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
        style="
            background: #ffffff;
            border-color: #e2e8f0;
        "
    >

        <div class="overflow-x-auto">

            <table
                class="w-full text-left"
                style="border-collapse: collapse;"
            >

                <thead>

                    <tr
                        style="
                            background: #f8fafc;
                            border-bottom: 1px solid #e2e8f0;
                        "
                    >

                        <th
                            class="px-5 py-3 w-[50px] text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            No
                        </th>

                        <th
                            class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            NIP
                        </th>

                        <th
                            class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            Nama
                        </th>

                        <th
                            class="px-5 py-3 hidden md:table-cell text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            Email
                        </th>

                        <th
                            class="px-5 py-3 hidden lg:table-cell text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            No. HP
                        </th>

                        <th
                            class="px-5 py-3 text-right text-[10px] font-bold uppercase tracking-wider"
                            style="color: #64748b;"
                        >
                            Aksi
                        </th>

                    </tr>

                </thead>



                <tbody>

                    @forelse($gurus as $guru)

                        <tr
                            class="transition"
                            style="border-bottom: 1px solid #f1f5f9;"
                            onmouseover="this.style.background='#f8fafc'"
                            onmouseout="this.style.background='transparent'"
                        >

                            {{-- No --}}
                            <td class="px-5 py-3">

                                <span
                                    class="text-[12px] font-medium"
                                    style="color: #94a3b8;"
                                >
                                    {{ $gurus->firstItem() + $loop->index }}
                                </span>

                            </td>



                            {{-- NIP --}}
                            <td class="px-5 py-3">

                                <span
                                    class="text-[12px] font-mono"
                                    style="color: #475569;"
                                >
                                    {{ $guru->nip }}
                                </span>

                            </td>



                            {{-- Nama --}}
                            <td class="px-5 py-3">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="h-8 w-8 flex items-center justify-center text-[10px] font-bold rounded-lg text-white shrink-0"
                                        style="
                                            background: linear-gradient(
                                                135deg,
                                                #2563eb,
                                                #1d4ed8
                                            );
                                        "
                                    >
                                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                                    </div>

                                    <span
                                        class="text-[12.5px] font-semibold"
                                        style="color: #1e293b;"
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
                                    style="color: #475569;"
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
                                    style="color: #475569;"
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
                                        style="
                                            color: #2563eb;
                                            background: #eff6ff;
                                        "
                                        onmouseover="this.style.background='#dbeafe'"
                                        onmouseout="this.style.background='#eff6ff'"
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
                                    style="
                                        color: #d97706;
                                        background: #fffbeb;
                                    "
                                    onmouseover="this.style.background='#fef3c7'"
                                    onmouseout="this.style.background='#fffbeb'"
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
                                        class="form-delete"
                                        data-confirm-message="Yakin ingin menghapus data guru ini?"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="flex items-center gap-1 px-2.5 py-1.5 rounded-md text-[11px] font-medium transition"
                                            style="
                                                color: #dc2626;
                                                background: #fef2f2;
                                            "
                                            onmouseover="this.style.background='#fee2e2'"
                                            onmouseout="this.style.background='#fef2f2'"
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
                                        style="color: #64748b;"
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
                                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-2 text-[11px] font-semibold transition"
                                            style="
                                                background: #eff6ff;
                                                color: #2563eb;
                                                border: 1px solid #bfdbfe;
                                            "
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
                                            style="color: #94a3b8;"
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
                style="border-color: #e2e8f0;"
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