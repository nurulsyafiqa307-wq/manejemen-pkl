<x-app-layout>
    <x-slot:title>Detail Tempat PKL</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tempat.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Detail Tempat PKL</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Profil {{ $tempat->nama_perusahaan }}</p>
            </div>
        </div>
    </x-slot:header>

    <div class="max-w-2xl mx-auto">
        <div class="card overflow-hidden anim">

            {{-- ===== HEADER ===== --}}
            <div class="p-6" style="border-bottom: 1px solid var(--border);">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="avatar h-[72px] w-[72px] text-[26px] rounded-2xl shrink-0"
                         style="background: linear-gradient(135deg, #059669, #10b981);">
                        {{ strtoupper(substr($tempat->nama_perusahaan, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-[20px] font-bold text-white leading-tight">{{ $tempat->nama_perusahaan }}</h3>
                        <p class="text-[12px] mt-1" style="color: var(--text-muted);">{{ $tempat->bidang }}</p>
                        <div class="flex items-center gap-2 mt-2.5 flex-wrap">
                            <span class="badge badge-neutral">{{ $tempat->bidang }}</span>
                            <div class="flex items-center gap-1 px-2 py-0.5 rounded-md" style="background: rgba(34,197,94,0.08);">
                                <i data-lucide="users" class="h-2.5 w-2.5" style="color: var(--accent-green);"></i>
                                <span class="text-[10px] font-semibold" style="color: var(--accent-green);">Kuota {{ $tempat->kuota }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('admin.tempat.edit', $tempat) }}" class="btn-outline text-[11px]">
                            <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                            Edit
                        </a>
                        <a href="{{ route('admin.tempat.index') }}" class="btn-ghost flex items-center gap-1.5 px-2.5 py-1.5 text-[11px] font-medium">
                            <i data-lucide="arrow-left" class="h-3 w-3"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            {{-- ===== INFORMASI PERUSAHAAN ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="building" class="h-3.5 w-3.5" style="color: var(--accent-green);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-green);">Informasi Perusahaan</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Nama Perusahaan</p>
                        <p class="text-[12.5px] font-medium text-white text-right">{{ $tempat->nama_perusahaan }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Bidang</p>
                        <span class="badge badge-neutral shrink-0">{{ $tempat->bidang }}</span>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Kuota</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $tempat->kuota }} orang</p>
                    </div>
                </div>
            </div>

            {{-- ===== KONTAK ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="phone" class="h-3.5 w-3.5" style="color: var(--accent-blue);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-blue);">Kontak & Lokasi</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">No. HP</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $tempat->no_hp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[12px] mb-1" style="color: var(--text-dim);">Alamat</p>
                        <p class="text-[12.5px] font-medium" style="color: var(--text-secondary);">{{ $tempat->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== KETERANGAN ===== --}}
            @if($tempat->keterangan)
                <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                    <div class="flex items-center gap-2 mb-4">
                        <i data-lucide="file-text" class="h-3.5 w-3.5" style="color: var(--accent-amber);"></i>
                        <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-amber);">Keterangan</span>
                    </div>
                    <p class="text-[12.5px] leading-relaxed" style="color: var(--text-secondary);">{{ $tempat->keterangan }}</p>
                </div>
            @endif

            {{-- ===== INFO SISTEM ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="clock" class="h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Info Sistem</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">ID</p>
                        <p class="text-[12.5px] font-mono text-right" style="color: var(--text-dim);">#{{ $tempat->id }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Dibuat</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $tempat->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Terakhir diubah</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $tempat->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== DANGER ZONE ===== --}}
            <div class="px-6 py-4 flex items-center justify-between" style="background: rgba(239,68,68,0.03);">
                <div class="flex items-center gap-2.5">
                    <i data-lucide="trash-2" class="h-4 w-4" style="color: #f87171;"></i>
                    <p class="text-[12px]" style="color: var(--text-dim);">Hapus data ini secara permanen</p>
                </div>
                <form action="{{ route('admin.tempat.destroy', $tempat) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $tempat->nama_perusahaan }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger text-[11px]">
                        <i data-lucide="trash-2" class="h-3 w-3"></i>
                        Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>lucide.createIcons();</script>
    @endpush
</x-app-layout>