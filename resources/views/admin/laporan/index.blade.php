<x-app-layout>
    <x-slot:title>Laporan PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Laporan PKL
            </h2>
            <p class="text-[11px] mt-0.5" style="color: var(--text-muted);">
                Rekap data PKL siswa
            </p>
        </div>
    </x-slot:header>

    <div class="space-y-4">

        {{-- ===== FILTER DAN PENCARIAN ===== --}}
        <form action="{{ route('admin.laporan.index') }}" method="GET" class="anim">
            
            {{-- SEARCH (KIRI ATAS) & FILTER (KANAN ATAS) --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">

                {{-- PENCARIAN (KIRI ATAS) --}}
                <div class="relative w-full md:w-[280px]">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>

                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari siswa atau tempat PKL..." 
                        class="input-dark w-full rounded-lg pl-9 pr-9 py-2 text-[12px]"
                    >

                    @if(request('search'))
                        <a href="{{ route('admin.laporan.index') }}" class="absolute right-3 top-1/2 -translate-y-1/2" style="color: var(--text-dim);" title="Reset pencarian">
                            <i data-lucide="x" class="h-3.5 w-3.5"></i>
                        </a>
                    @endif
                </div>

                {{-- TAHUN, TEMPAT PKL & FILTER (KANAN ATAS) --}}
                <div class="flex flex-wrap items-center gap-2 w-full md:w-auto justify-start md:justify-end">
                    
                    {{-- TAHUN --}}
                    <select name="tahun" class="input-dark rounded-lg px-3 py-2 text-[12px] min-w-[120px]">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>

                    {{-- TEMPAT PKL --}}
                    <select name="tempat_pkl_id" class="input-dark rounded-lg px-3 py-2 text-[12px] min-w-[160px]">
                        <option value="">Semua Tempat PKL</option>
                        @foreach($tempatPkls as $tempat)
                            <option value="{{ $tempat->id }}" {{ request('tempat_pkl_id') == $tempat->id ? 'selected' : '' }}>
                                {{ $tempat->nama_perusahaan }}
                            </option>
                        @endforeach
                    </select>

                    {{-- BUTTON FILTER --}}
                    <button type="submit" class="btn-primary text-[12px] px-4 py-2 shrink-0 flex items-center justify-center gap-1.5">
                        <i data-lucide="filter" class="h-3.5 w-3.5"></i>
                        <span>Filter</span>
                    </button>

                </div>

            </div>
        </form>

        {{-- ===== INFO ===== --}}
        <div class="flex items-center justify-between px-1 pt-1">
            <p class="text-[11px]" style="color: var(--text-dim);">
                Menampilkan <span class="font-semibold text-white">{{ $laporans->count() }}</span> data laporan
                @if(request('tahun'))
                    — Tahun <span class="font-semibold text-white">{{ request('tahun') }}</span>
                @endif
                @if(request('tempat_pkl_id'))
                    @php
                        $tempatTerpilih = $tempatPkls->firstWhere('id', request('tempat_pkl_id'));
                    @endphp
                    @if($tempatTerpilih)
                        — {{ $tempatTerpilih->nama_perusahaan }}
                    @endif
                @endif
            </p>
        </div>

        {{-- ===== TABEL ===== --}}
        <div class="card overflow-hidden anim" style="animation-delay: 60ms;">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">No</th>
                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Tanggal</th>
                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Nama Siswa</th>
                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Tempat PKL</th>
                            <th class="px-5 py-3 text-left text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $laporan)
                            <tr class="transition-colors duration-150" style="border-bottom: 1px solid var(--border);" onmouseenter="this.style.background='rgba(255,255,255,0.02)'" onmouseleave="this.style.background='transparent'">
                                <td class="px-5 py-3.5 text-[12px]" style="color: var(--text-dim);">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-5 py-3.5 text-[12px]" style="color: var(--text-secondary);">
                                    {{ $laporan->tanggal_pengajuan ? \Carbon\Carbon::parse($laporan->tanggal_pengajuan)->format('d F Y') : '-' }}
                                </td>
                                <td class="px-5 py-3.5 text-[12.5px] font-medium text-white">
                                    {{ $laporan->siswa->nama ?? '-' }}
                                </td>
                                <td class="px-5 py-3.5 text-[12px]" style="color: var(--text-secondary);">
                                    {{ $laporan->tempatPkl->nama_perusahaan ?? '-' }}
                                </td>
                                <td class="px-5 py-3.5 text-[12px]">
                                    @if($laporan->status === 'Lolos')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-semibold" style="color: #4ade80; background: rgba(34,197,94,0.10);">
                                            Lolos
                                        </span>
                                    @elseif($laporan->status === 'Menunggu Seleksi')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-semibold" style="color: #fbbf24; background: rgba(245,158,11,0.10);">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-semibold" style="color: #f87171; background: rgba(239,68,68,0.10);">
                                            {{ $laporan->status ?? '-' }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-16 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-xl" style="background: rgba(255,255,255,0.03);">
                                            <i data-lucide="file-bar-chart" class="h-5 w-5" style="color: var(--text-dim);"></i>
                                        </div>
                                        <p class="text-[12px]" style="color: var(--text-dim);">
                                            Data laporan tidak ditemukan
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ===== TOMBOL CETAK PDF ===== --}}
<div class="flex justify-end pt-2">
    <a
        href="{{ route('admin.laporan.pdf', request()->query()) }}"
        target="_blank"
        class="btn-primary text-[12px] px-4 py-2 flex items-center gap-2"
    >
        <i data-lucide="file-text" class="h-3.5 w-3.5"></i>
        <span>Cetak PDF</span>
    </a>
</div>

    @push('scripts')
        <script>
            lucide.createIcons();

            function togglePdfMenu() {
                const menu = document.getElementById('pdfMenu');
                menu.classList.toggle('hidden');
            }

            document.addEventListener('click', function(event) {
                const menu = document.getElementById('pdfMenu');
                const button = event.target.closest('[onclick="togglePdfMenu()"]');
                if (menu && !menu.contains(event.target) && !button) {
                    menu.classList.add('hidden');
                }
            });
        </script>
    @endpush
</x-app-layout>