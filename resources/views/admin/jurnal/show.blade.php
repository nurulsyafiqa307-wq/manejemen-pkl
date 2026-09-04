<x-app-layout>
    <x-slot:title>Detail Jurnal Harian</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.jurnal.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Detail Jurnal Harian</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Jurnal {{ $jurnal->siswa->nama ?? 'Siswa' }} — {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}</p>
            </div>
        </div>
    </x-slot:header>

    <div class="max-w-2xl mx-auto space-y-4">

        {{-- Info Siswa & Tanggal --}}
        <div class="card overflow-hidden anim">
            <div class="p-6" style="border-bottom: 1px solid var(--border);">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="avatar h-[60px] w-[60px] text-[22px] rounded-2xl shrink-0"
                         style="background: linear-gradient(135deg, #3b6ee8, #6366f1);">
                        {{ strtoupper(substr($jurnal->siswa->nama ?? 'S', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-[17px] font-bold text-white leading-tight">{{ $jurnal->siswa->nama ?? '-' }}</h3>
                        <p class="text-[11px] mt-1 font-mono" style="color: var(--text-muted);">
                            {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}
                        </p>
                    </div>
                    @if($jurnal->status_jurnal == 'Menunggu Review')
                        <span class="badge badge-warning shrink-0">Menunggu Review</span>
                    @elseif($jurnal->status_jurnal == 'Disetujui')
                        <span class="badge badge-success shrink-0">Disetujui</span>
                    @else
                        <span class="badge badge-danger shrink-0">Perlu Revisi</span>
                    @endif
                </div>
            </div>

            {{-- Waktu --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="clock" class="h-3.5 w-3.5" style="color: var(--accent-blue);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-blue);">Waktu</span>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1 p-3 rounded-lg" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                        <p class="text-[10px] font-semibold uppercase tracking-wider" style="color: var(--text-dim);">Jam Masuk</p>
                        <p class="text-[16px] font-bold text-white font-mono">{{ $jurnal->jam_masuk }}</p>
                    </div>
                    <div class="flex flex-col gap-1 p-3 rounded-lg" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                        <p class="text-[10px] font-semibold uppercase tracking-wider" style="color: var(--text-dim);">Jam Pulang</p>
                        <p class="text-[16px] font-bold text-white font-mono">{{ $jurnal->jam_pulang }}</p>
                    </div>
                </div>
            </div>

            {{-- Kegiatan --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-3">
                    <i data-lucide="file-text" class="h-3.5 w-3.5" style="color: var(--accent-green);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-green);">Kegiatan</span>
                </div>
                <p class="text-[12.5px] leading-relaxed whitespace-pre-line" style="color: var(--text-secondary);">{{ $jurnal->kegiatan }}</p>
            </div>

            {{-- Kendala --}}
            @if($jurnal->kon)
                <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                    <div class="flex items-center gap-2 mb-3">
                        <i data-lucide="alert-triangle" class="h-3.5 w-3.5" style="color: var(--accent-amber);"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-amber);">Kendala</span>
                    </div>
                    <p class="text-[12.5px] leading-relaxed whitespace-pre-line" style="color: var(--text-secondary);">{{ $jurnal->kon }}</p>
                </div>
            @endif

            {{-- Solusi --}}
            @if($jurnal->solusi)
                <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                    <div class="flex items-center gap-2 mb-3">
                        <i data-lucide="lightbulb" class="h-3.5 w-3.5" style="color: var(--accent-purple);"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-purple);">Solusi</span>
                    </div>
                    <p class="text-[12.5px] leading-relaxed whitespace-pre-line" style="color: var(--text-secondary);">{{ $jurnal->solusi }}</p>
                </div>
            @endif

            {{-- Foto --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-3">
                    <i data-lucide="image" class="h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Foto Kegiatan</span>
                </div>
                @if($jurnal->foto)
                    <img src="{{ asset('storage/'.$jurnal->foto) }}"
                         alt="Foto Kegiatan"
                         class="rounded-xl max-h-72 w-full object-cover" style="border: 1px solid var(--border);">
                @else
                    <div class="flex items-center gap-2 p-4 rounded-lg" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                        <i data-lucide="image-off" class="h-4 w-4" style="color: var(--text-dim);"></i>
                        <p class="text-[12px]" style="color: var(--text-dim);">Tidak ada foto</p>
                    </div>
                @endif
            </div>

            {{-- Aksi --}}
            <div class="px-6 py-4 flex items-center justify-between">
                <a href="{{ route('admin.jurnal.index') }}" class="btn-ghost flex items-center gap-1.5 px-3 py-2 text-[11px] font-medium">
                    <i data-lucide="arrow-left" class="h-3 w-3"></i>
                    Kembali
                </a>
                <a href="{{ route('admin.jurnal.edit', $jurnal) }}" class="btn-outline flex items-center gap-1.5 text-[11px]">
                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                    Edit Jurnal
                </a>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>lucide.createIcons();</script>
    @endpush
</x-app-layout>