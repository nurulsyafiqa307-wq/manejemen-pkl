<x-app-layout>

    <x-slot:title>Penilaian PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Penilaian PKL
            </h2>
            <p class="text-[11px] mt-0.5" style="color: var(--text-muted);">
                Kelola penilaian siswa PKL
            </p>
        </div>
    </x-slot:header>

    <div class="space-y-5">

        {{-- Alert --}}
        @if(session('success'))
            <div class="flex items-center gap-3 p-4 rounded-xl anim"
                 style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);">

                <div class="flex h-7 w-7 items-center justify-center rounded-lg shrink-0"
                     style="background: rgba(34,197,94,0.12);">

                    <i data-lucide="check-circle"
                       class="h-3.5 w-3.5"
                       style="color: #22c55e;"></i>
                </div>

                <p class="text-[12px]" style="color: #4ade80;">
                    {{ session('success') }}
                </p>
            </div>
        @endif


        {{-- Header + Search + Tombol --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h3 class="text-[16px] font-bold text-white">
                    Daftar Penilaian
                </h3>

                <p class="text-[11px] mt-0.5" style="color: var(--text-dim);">
                    Kelola nilai akhir siswa PKL
                </p>
            </div>


            <div class="flex items-center gap-2">

                {{-- Search --}}
                <form action="{{ route('admin.penilaian.index') }}"
                      method="GET"
                      class="relative w-full max-w-[200px]">

                    <i data-lucide="search"
                       class="absolute left-3 top-1/2 -translate-y-1/2 h-3.5 w-3.5"
                       style="color: var(--text-dim);"></i>

                    <input
                        name="search"
                        value="{{ request('search') }}"
                        type="text"
                        placeholder="Cari siswa..."
                        class="input-dark w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                    >

                    @if(request('search'))
                        <a href="{{ route('admin.penilaian.index') }}"
                           class="absolute right-3 top-1/2 -translate-y-1/2"
                           style="color: var(--text-dim);"
                           title="Reset pencarian">

                            <i data-lucide="x" class="h-3.5 w-3.5"></i>

                        </a>
                    @endif

                </form>


                {{-- Tambah --}}
                <a href="{{ route('admin.penilaian.create') }}"
                   class="btn-primary text-[11px] shrink-0">

                    <i data-lucide="plus" class="h-4 w-4"></i>

                    Tambah Penilaian
                </a>

            </div>

        </div>


        {{-- Statistik --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">

            {{-- Total --}}
            <div class="card p-4 anim"
                 style="animation-delay: 0ms;">

                <p class="text-[10px] font-semibold uppercase tracking-wider"
                   style="color: var(--text-dim);">
                    Total
                </p>

                <p class="text-[24px] font-bold text-white mt-1.5">
                    {{ $penilaians->total() }}
                </p>

            </div>


            {{-- Rata-rata --}}
            <div class="card p-4 anim"
                 style="animation-delay: 40ms;">

                <p class="text-[10px] font-semibold uppercase tracking-wider"
                   style="color: var(--text-dim);">
                    Rata-rata Keseluruhan
                </p>

                <p class="text-[24px] font-bold mt-1.5"
                   style="color: #60a5fa;">

                    {{ $penilaians->avg('rata_rata') ? number_format($penilaians->avg('rata_rata'), 1) : '-' }}

                </p>

            </div>


            {{-- Tertinggi --}}
            <div class="card p-4 anim"
                 style="animation-delay: 80ms;">

                <p class="text-[10px] font-semibold uppercase tracking-wider"
                   style="color: var(--text-dim);">
                    Nilai Tertinggi
                </p>

                <p class="text-[24px] font-bold mt-1.5"
                   style="color: #22c55e;">

                    {{ $penilaians->max('rata_rata') ? number_format($penilaians->max('rata_rata'), 1) : '-' }}

                </p>

            </div>


            {{-- Terendah --}}
            <div class="card p-4 anim"
                 style="animation-delay: 120ms;">

                <p class="text-[10px] font-semibold uppercase tracking-wider"
                   style="color: var(--text-dim);">
                    Nilai Terendah
                </p>

                <p class="text-[24px] font-bold mt-1.5"
                   style="color: #ef4444;">

                    {{ $penilaians->min('rata_rata') ? number_format($penilaians->min('rata_rata'), 1) : '-' }}

                </p>

            </div>

        </div>


        {{-- Tabel --}}
        <div class="card overflow-hidden anim"
             style="animation-delay: 160ms;">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr style="border-bottom: 1px solid var(--border);">

                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);">
                                No
                            </th>

                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);">
                                Siswa
                            </th>

                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);">
                                Rata-rata
                            </th>

                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);">
                                Catatan
                            </th>

                            <th class="px-5 py-3 text-center text-[10px] font-bold uppercase tracking-widest"
                                style="color: var(--text-dim);">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($penilaians as $penilaian)

                            <tr class="transition-colors duration-150"
                                style="border-bottom: 1px solid var(--border);"
                                onmouseenter="this.style.background='rgba(255,255,255,0.02)'"
                                onmouseleave="this.style.background='transparent'">

                                {{-- No --}}
                                <td class="px-5 py-3.5 text-[12px]"
                                    style="color: var(--text-dim);">

                                    {{ $penilaians->firstItem() + $loop->index }}

                                </td>


                                {{-- Siswa --}}
                                <td class="px-5 py-3.5">

                                    <p class="text-[12.5px] font-medium text-white">
                                        {{ $penilaian->siswa->nama ?? '-' }}
                                    </p>

                                    @if($penilaian->siswa)
                                        <p class="text-[10px] mt-0.5"
                                           style="color: var(--text-dim);">
                                            {{ $penilaian->siswa->nis ?? '-' }}
                                        </p>
                                    @endif

                                </td>


                                {{-- Rata-rata --}}
                                <td class="px-5 py-3.5">

                                    @if($penilaian->rata_rata >= 90)

                                        <div class="flex items-center gap-2">

                                            <div class="h-1.5 w-16 rounded-full overflow-hidden"
                                                 style="background: rgba(34,197,94,0.15);">

                                                <div class="h-full rounded-full"
                                                     style="width: {{ min($penilaian->rata_rata, 100) }}%; background: #22c55e;">
                                                </div>

                                            </div>

                                            <span class="text-[12.5px] font-bold"
                                                  style="color: #22c55e;">

                                                {{ number_format($penilaian->rata_rata, 1) }}

                                            </span>

                                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded"
                                                  style="background: rgba(34,197,94,0.12); color: #22c55e;">
                                                A
                                            </span>

                                        </div>

                                    @elseif($penilaian->rata_rata >= 80)

                                        <div class="flex items-center gap-2">

                                            <div class="h-1.5 w-16 rounded-full overflow-hidden"
                                                 style="background: rgba(59,130,246,0.15);">

                                                <div class="h-full rounded-full"
                                                     style="width: {{ min($penilaian->rata_rata, 100) }}%; background: #3b82f6;">
                                                </div>

                                            </div>

                                            <span class="text-[12.5px] font-bold"
                                                  style="color: #60a5fa;">

                                                {{ number_format($penilaian->rata_rata, 1) }}

                                            </span>

                                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded"
                                                  style="background: rgba(59,130,246,0.12); color: #60a5fa;">
                                                B
                                            </span>

                                        </div>

                                    @elseif($penilaian->rata_rata >= 70)

                                        <div class="flex items-center gap-2">

                                            <div class="h-1.5 w-16 rounded-full overflow-hidden"
                                                 style="background: rgba(245,158,11,0.15);">

                                                <div class="h-full rounded-full"
                                                     style="width: {{ min($penilaian->rata_rata, 100) }}%; background: #f59e0b;">
                                                </div>

                                            </div>

                                            <span class="text-[12.5px] font-bold"
                                                  style="color: #fbbf24;">

                                                {{ number_format($penilaian->rata_rata, 1) }}

                                            </span>

                                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded"
                                                  style="background: rgba(245,158,11,0.12); color: #fbbf24;">
                                                C
                                            </span>

                                        </div>

                                    @elseif($penilaian->rata_rata >= 60)

                                        <div class="flex items-center gap-2">

                                            <div class="h-1.5 w-16 rounded-full overflow-hidden"
                                                 style="background: rgba(239,68,68,0.15);">

                                                <div class="h-full rounded-full"
                                                     style="width: {{ min($penilaian->rata_rata, 100) }}%; background: #ef4444;">
                                                </div>

                                            </div>

                                            <span class="text-[12.5px] font-bold"
                                                  style="color: #f87171;">

                                                {{ number_format($penilaian->rata_rata, 1) }}

                                            </span>

                                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded"
                                                  style="background: rgba(239,68,68,0.12); color: #f87171;">
                                                D
                                            </span>

                                        </div>

                                    @else

                                        <div class="flex items-center gap-2">

                                            <div class="h-1.5 w-16 rounded-full overflow-hidden"
                                                 style="background: rgba(239,68,68,0.15);">

                                                <div class="h-full rounded-full"
                                                     style="width: {{ min($penilaian->rata_rata, 100) }}%; background: #ef4444;">
                                                </div>

                                            </div>

                                            <span class="text-[12.5px] font-bold"
                                                  style="color: #f87171;">

                                                {{ number_format($penilaian->rata_rata, 1) }}

                                            </span>

                                            <span class="text-[10px] font-bold px-1.5 py-0.5 rounded"
                                                  style="background: rgba(239,68,68,0.12); color: #f87171;">
                                                E
                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- Catatan --}}
                                <td class="px-5 py-3.5">

                                    <p class="text-[12px] truncate max-w-[180px]"
                                       style="color: var(--text-secondary);">

                                        {{ $penilaian->catatan ?? '-' }}

                                    </p>

                                </td>


                                {{-- Aksi --}}
                                <td class="px-5 py-3.5">

                                    <div class="flex justify-center gap-1.5">

                                        {{-- Lihat --}}
                                        <a href="{{ route('admin.penilaian.show', $penilaian->id) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                           style="background: rgba(59,130,246,0.08); color: #60a5fa;"
                                           onmouseenter="this.style.background='rgba(59,130,246,0.15)'"
                                           onmouseleave="this.style.background='rgba(59,130,246,0.08)'"
                                           title="Lihat">

                                            <i data-lucide="eye"
                                               class="h-3.5 w-3.5"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.penilaian.edit', $penilaian->id) }}"
                                           class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                           style="background: rgba(245,158,11,0.08); color: #fbbf24;"
                                           onmouseenter="this.style.background='rgba(245,158,11,0.15)'"
                                           onmouseleave="this.style.background='rgba(245,158,11,0.08)'"
                                           title="Edit">

                                            <i data-lucide="pencil"
                                               class="h-3.5 w-3.5"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.penilaian.destroy', $penilaian->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus penilaian ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                                    style="background: rgba(239,68,68,0.08); color: #f87171;"
                                                    onmouseenter="this.style.background='rgba(239,68,68,0.15)'"
                                                    onmouseleave="this.style.background='rgba(239,68,68,0.08)'"
                                                    title="Hapus">

                                                <i data-lucide="trash-2"
                                                   class="h-3.5 w-3.5"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="px-5 py-16 text-center">

                                    <div class="flex flex-col items-center gap-3">

                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl"
                                             style="background: rgba(255,255,255,0.03);">

                                            <i data-lucide="award"
                                               class="h-5 w-5"
                                               style="color: var(--text-dim);"></i>

                                        </div>

                                        <p class="text-[12px]"
                                           style="color: var(--text-dim);">

                                            @if(request('search'))
                                                Data penilaian dengan kata "{{ request('search') }}" tidak ditemukan.
                                            @else
                                                Belum ada data penilaian.
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
            @if($penilaians->hasPages())

                <div class="px-5 py-4 border-t"
                     style="border-color: var(--border);">

                    {{ $penilaians->links('partials.pagination-dark') }}

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