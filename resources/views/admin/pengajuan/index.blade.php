<x-app-layout>

    <x-slot:title>Pengajuan PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Pengajuan PKL
            </h2>

            <p
                class="text-[11px] mt-0.5"
                style="color: var(--text-muted);"
            >
                Kelola pengajuan PKL dari siswa
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

                <p
                    class="text-[12px]"
                    style="color: #4ade80;"
                >
                    {{ session('success') }}
                </p>

            </div>

        @endif


        {{-- Header + Tombol --}}
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3"
        >

            <div>

                <h3 class="text-[16px] font-bold text-white">
                    Daftar Pengajuan
                </h3>

                <p
                    class="text-[11px] mt-0.5"
                    style="color: var(--text-dim);"
                >
                    Kelola data pengajuan PKL siswa
                </p>

            </div>


            <div class="flex items-center gap-2">

                {{-- Search --}}
                <form
                    action="{{ route('admin.pengajuan.index') }}"
                    method="GET"
                    class="relative w-full max-w-[220px]"
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
                        placeholder="Cari siswa atau tempat PKL..."
                        class="input-dark w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                    >

                    @if(request('search'))

                        <a
                            href="{{ route('admin.pengajuan.index') }}"
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


                {{-- Tambah Pengajuan --}}
                <a
                    href="{{ route('admin.pengajuan.create') }}"
                    class="btn-primary text-[11px] shrink-0"
                >

                    <i
                        data-lucide="plus"
                        class="h-4 w-4"
                    ></i>

                    Tambah Pengajuan

                </a>

            </div>

        </div>


        {{-- Statistik --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">

            {{-- Total --}}
            <div
                class="card p-4 anim"
                style="animation-delay: 0ms;"
            >

                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Total Pengajuan
                </p>

                <p class="text-[24px] font-bold text-white mt-1.5">
                    {{ $pengajuans->total() }}
                </p>

            </div>


            {{-- Menunggu --}}
            <div
                class="card p-4 anim"
                style="animation-delay: 40ms;"
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
                    {{ $pengajuans->where('status', 'Menunggu Seleksi')->count() }}
                </p>

            </div>


            {{-- Lolos --}}
            <div
                class="card p-4 anim"
                style="animation-delay: 80ms;"
            >

                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Lolos
                </p>

                <p
                    class="text-[24px] font-bold mt-1.5"
                    style="color: #22c55e;"
                >
                    {{ $pengajuans->where('status', 'Lolos')->count() }}
                </p>

            </div>


            {{-- Tidak Lolos --}}
            <div
                class="card p-4 anim"
                style="animation-delay: 120ms;"
            >

                <p
                    class="text-[10px] font-semibold uppercase tracking-wider"
                    style="color: var(--text-dim);"
                >
                    Tidak Lolos
                </p>

                <p
                    class="text-[24px] font-bold mt-1.5"
                    style="color: #ef4444;"
                >
                    {{ $pengajuans->where('status', 'Tidak Lolos')->count() }}
                </p>

            </div>

        </div>


        {{-- Tabel --}}
        <div
            class="card overflow-hidden anim"
            style="animation-delay: 160ms;"
        >

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr
                            style="border-bottom: 1px solid var(--border);"
                        >

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
                                Tempat PKL
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

                        @forelse($pengajuans as $pengajuan)

                            <tr
                                class="transition-colors duration-150"
                                style="border-bottom: 1px solid var(--border);"
                                onmouseenter="this.style.background='rgba(255,255,255,0.02)'"
                                onmouseleave="this.style.background='transparent'"
                            >

                                {{-- No --}}
                                <td
                                    class="px-5 py-3.5 text-[12px]"
                                    style="color: var(--text-dim);"
                                >
                                    {{ $pengajuans->firstItem() + $loop->index }}
                                </td>


                                {{-- Siswa --}}
                                <td class="px-5 py-3.5">

                                    <p class="text-[12.5px] font-medium text-white">
                                        {{ $pengajuan->siswa->nama ?? '-' }}
                                    </p>

                                    @if($pengajuan->siswa?->nis)

                                        <p
                                            class="text-[10px] mt-0.5 font-mono"
                                            style="color: var(--text-dim);"
                                        >
                                            {{ $pengajuan->siswa->nis }}
                                        </p>

                                    @endif

                                </td>


                                {{-- Tempat PKL --}}
                                <td class="px-5 py-3.5">

                                    <p class="text-[12.5px] font-medium text-white">
                                        {{ $pengajuan->tempatPkl->nama_perusahaan ?? '-' }}
                                    </p>

                                    @if($pengajuan->tempatPkl?->bidang)

                                        <p
                                            class="text-[10px] mt-0.5"
                                            style="color: var(--text-dim);"
                                        >
                                            {{ $pengajuan->tempatPkl->bidang }}
                                        </p>

                                    @endif

                                </td>


                                {{-- Tanggal --}}
                                <td
                                    class="px-5 py-3.5 text-[12px]"
                                    style="color: var(--text-secondary);"
                                >

                                    {{ $pengajuan->tanggal_pengajuan
                                        ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d/m/Y')
                                        : '-'
                                    }}

                                </td>


                                {{-- Status --}}
                                <td class="px-5 py-3.5">

                                    @if($pengajuan->status === 'Menunggu Seleksi')

                                        <span class="badge badge-warning">
                                            Menunggu
                                        </span>

                                    @elseif($pengajuan->status === 'Lolos')

                                        <span class="badge badge-success">
                                            Lolos
                                        </span>

                                    @elseif($pengajuan->status === 'Tidak Lolos')

                                        <span class="badge badge-danger">
                                            Tidak Lolos
                                        </span>

                                    @else

                                        <span class="badge badge-neutral">
                                            {{ $pengajuan->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-5 py-3.5">

                                    <div class="flex justify-center gap-1.5">

                                        {{-- Lihat --}}
                                        <a
                                            href="{{ route('admin.pengajuan.show', $pengajuan) }}"
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
                                            href="{{ route('admin.pengajuan.edit', $pengajuan) }}"
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
                                        <form
    action="{{ route('admin.pengajuan.destroy', $pengajuan) }}"
    method="POST"
    class="form-delete"
    data-confirm-message="Yakin ingin menghapus pengajuan ini?"
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
                                                data-lucide="inbox"
                                                class="h-5 w-5"
                                                style="color: var(--text-dim);"
                                            ></i>
                                        </div>

                                        <p
                                            class="text-[12px]"
                                            style="color: var(--text-dim);"
                                        >

                                            @if(request('search'))
                                                Pengajuan yang dicari tidak ditemukan
                                            @else
                                                Belum ada siswa yang mengajukan PKL
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
            @if($pengajuans->hasPages())

                <div
                    class="px-5 py-4 border-t"
                    style="border-color: var(--border);"
                >
                    {{ $pengajuans->links('partials.pagination-dark') }}
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