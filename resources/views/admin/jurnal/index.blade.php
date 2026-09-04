<x-app-layout>

    <x-slot:title>Jurnal Harian PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Jurnal Harian PKL
            </h2>

            <p class="text-[11px] mt-0.5" style="color: var(--text-muted);">
                Kelola jurnal harian siswa PKL
            </p>
        </div>
    </x-slot:header>

    <div class="space-y-5">

        {{-- Alert --}}
        @if(session('success'))
            <div
                class="flex items-center gap-3 p-4 rounded-xl anim"
                style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);"
            >
                <div
                    class="flex h-7 w-7 items-center justify-center rounded-lg shrink-0"
                    style="background: rgba(34,197,94,0.12);"
                >
                    <i
                        data-lucide="check-circle"
                        class="h-3.5 w-3.5"
                        style="color: #22c55e;"
                    ></i>
                </div>

                <p class="text-[12px]" style="color: #4ade80;">
                    {{ session('success') }}
                </p>
            </div>
        @endif


        {{-- Header + Tombol + Search --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h3 class="text-[16px] font-bold text-white">
                    Daftar Jurnal
                </h3>

                <p
                    class="text-[11px] mt-0.5"
                    style="color: var(--text-dim);"
                >
                    Kelola jurnal harian siswa PKL
                </p>
            </div>


            <div class="flex items-center gap-2">

                {{-- Search --}}
                <form
                    action="{{ route('admin.jurnal.index') }}"
                    method="GET"
                    class="relative w-full max-w-[200px]"
                >
                    <i
                        data-lucide="search"
                        class="absolute left-3 top-1/2 -translate-y-1/2 h-3.5 w-3.5"
                        style="color: var(--text-dim);"
                    ></i>

                    <input
                        name="search"
                        value="{{ request('search') }}"
                        type="text"
                        placeholder="Cari jurnal..."
                        class="input-dark w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                    >

                    @if(request('search'))
                        <a
                            href="{{ route('admin.jurnal.index') }}"
                            class="absolute right-3 top-1/2 -translate-y-1/2"
                            style="color: var(--text-dim);"
                            title="Reset pencarian"
                        >
                            <i data-lucide="x" class="h-3.5 w-3.5"></i>
                        </a>
                    @endif
                </form>


                {{-- Tambah Jurnal --}}
                <a
                    href="{{ route('admin.jurnal.create') }}"
                    class="btn-primary text-[11px] shrink-0"
                >
                    <i data-lucide="plus" class="h-4 w-4"></i>
                    Tambah Jurnal
                </a>

            </div>

        </div>


        {{-- Statistik --}}
        <div class="grid grid-cols-3 gap-3">

            <div
                class="card p-4 anim"
                style="animation-delay: 0ms;"
            >
                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Total Jurnal
                </p>

                <p class="text-[24px] font-bold text-white mt-1.5">
                    {{ $jurnals->total() }}
                </p>
            </div>


            <div
                class="card p-4 anim"
                style="animation-delay: 40ms;"
            >
                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Disetujui
                </p>

                <p
                    class="text-[24px] font-bold mt-1.5"
                    style="color: #22c55e;"
                >
                    {{ $jurnals->where('status_jurnal', 'Disetujui')->count() }}
                </p>
            </div>


            <div
                class="card p-4 anim"
                style="animation-delay: 80ms;"
            >
                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Menunggu
                </p>

                <p
                    class="text-[24px] font-bold mt-1.5"
                    style="color: #f59e0b;"
                >
                    {{ $jurnals->where('status_jurnal', 'Menunggu Review')->count() }}
                </p>
            </div>

        </div>


        {{-- Tabel --}}
        <div
            class="card overflow-hidden anim"
            style="animation-delay: 120ms;"
        >

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr style="border-bottom: 1px solid var(--border);">

                            <th
                                class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                No
                            </th>

                            <th
                                class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                Siswa
                            </th>

                            <th
                                class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                Tanggal
                            </th>

                            <th
                                class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                Jam
                            </th>

                            <th
                                class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                Status
                            </th>

                            <th
                                class="px-5 py-3 text-center text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);"
                            >
                                Aksi
                            </th>

                        </tr>
                    </thead>


                    <tbody>

                        @forelse($jurnals as $jurnal)

                            <tr
                                class="transition-colors duration-150"
                                style="border-bottom: 1px solid var(--border);"
                                onmouseenter="this.style.background='rgba(255,255,255,0.02)'"
                                onmouseleave="this.style.background='transparent'"
                            >

                                {{-- Nomor --}}
                                <td
                                    class="px-5 py-3.5 text-[12px]"
                                    style="color: var(--text-dim);"
                                >
                                    {{ $jurnals->firstItem() + $loop->index }}
                                </td>


                                {{-- Siswa --}}
                                <td class="px-5 py-3.5">

                                    <p class="text-[12.5px] font-medium text-white">
                                        {{ $jurnal->siswa->nama ?? '-' }}
                                    </p>

                                </td>


                                {{-- Tanggal --}}
                                <td
                                    class="px-5 py-3.5 text-[12px]"
                                    style="color: var(--text-secondary);"
                                >
                                    {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d/m/Y') }}
                                </td>


                                {{-- Jam --}}
                                <td class="px-5 py-3.5">

                                    <p
                                        class="text-[12px] font-mono"
                                        style="color: var(--text-secondary);"
                                    >
                                        {{ $jurnal->jam_masuk }}
                                    </p>

                                    <p
                                        class="text-[10px] mt-0.5"
                                        style="color: var(--text-dim);"
                                    >
                                        s/d {{ $jurnal->jam_pulang }}
                                    </p>

                                </td>


                                {{-- Status --}}
                                <td class="px-5 py-3.5">

                                    @if($jurnal->status_jurnal == 'Menunggu Review')

                                        <span class="badge badge-warning">
                                            Menunggu
                                        </span>

                                    @elseif($jurnal->status_jurnal == 'Disetujui')

                                        <span class="badge badge-success">
                                            Disetujui
                                        </span>

                                    @else

                                        <span class="badge badge-danger">
                                            Revisi
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-5 py-3.5">

                                    <div class="flex justify-center gap-1.5">

                                        {{-- Lihat --}}
                                        <a
                                            href="{{ route('admin.jurnal.show', $jurnal->id_jurnal) }}"
                                            class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                            style="background: rgba(59,130,246,0.08); color: #60a5fa;"
                                            onmouseenter="this.style.background='rgba(59,130,246,0.15)'"
                                            onmouseleave="this.style.background='rgba(59,130,246,0.08)'"
                                            title="Lihat"
                                        >
                                            <i
                                                data-lucide="eye"
                                                class="h-3.5 w-3.5"
                                            ></i>
                                        </a>


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.jurnal.edit', $jurnal->id_jurnal) }}"
                                            class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                            style="background: rgba(245,158,11,0.08); color: #fbbf24;"
                                            onmouseenter="this.style.background='rgba(245,158,11,0.15)'"
                                            onmouseleave="this.style.background='rgba(245,158,11,0.08)'"
                                            title="Edit"
                                        >
                                            <i
                                                data-lucide="pencil"
                                                class="h-3.5 w-3.5"
                                            ></i>
                                        </a>


                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.jurnal.destroy', $jurnal->id_jurnal) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus jurnal ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                                style="background: rgba(239,68,68,0.08); color: #f87171;"
                                                onmouseenter="this.style.background='rgba(239,68,68,0.15)'"
                                                onmouseleave="this.style.background='rgba(239,68,68,0.08)'"
                                                title="Hapus"
                                            >
                                                <i
                                                    data-lucide="trash-2"
                                                    class="h-3.5 w-3.5"
                                                ></i>
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

                                    <div class="flex flex-col items-center gap-3">

                                        <div
                                            class="flex h-12 w-12 items-center justify-center rounded-xl"
                                            style="background: rgba(255,255,255,0.03);"
                                        >
                                            <i
                                                data-lucide="book-open"
                                                class="h-5 w-5"
                                                style="color: var(--text-dim);"
                                            ></i>
                                        </div>

                                        <p
                                            class="text-[12px]"
                                            style="color: var(--text-dim);"
                                        >
                                            @if(request('search'))
                                                Jurnal yang dicari tidak ditemukan
                                            @else
                                                Belum ada jurnal harian
                                            @endif
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($jurnals->hasPages())

                <div
                    class="px-5 py-4 border-t"
                    style="border-color: var(--border);"
                >
                    {{ $jurnals->links('partials.pagination-dark') }}
                </div>

            @endif

        </div>

    </div>


    @push('scripts')

        <script>
            lucide.createIcons();
        </script>

    @endpush

</x-app-layout>