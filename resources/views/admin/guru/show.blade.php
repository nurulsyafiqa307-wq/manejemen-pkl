<x-app-layout>
    <x-slot:title>Detail Guru</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.guru.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Detail Guru</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Profil {{ $guru->nama }}</p>
            </div>
        </div>
    </x-slot:header>

    <div class="max-w-2xl mx-auto">
        <div class="card overflow-hidden anim">

            {{-- ===== HEADER ===== --}}
            <div class="p-6" style="border-bottom: 1px solid var(--border);">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="avatar h-[72px] w-[72px] text-[26px] rounded-2xl shrink-0"
                         style="background: linear-gradient(135deg, #8b5cf6, #a855f7);">
                        {{ strtoupper(substr($guru->nama, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-[20px] font-bold text-white leading-tight">{{ $guru->nama }}</h3>
                        <p class="text-[12px] mt-1" style="color: var(--text-muted);">NIP: <span class="font-mono" style="color: var(--text-secondary);">{{ $guru->nip }}</span></p>
                        <div class="flex items-center gap-2 mt-2.5">
                            <span class="badge badge-neutral">Guru</span>
                            @if($guru->user)
                                <span class="badge badge-success">Akun Aktif</span>
                            @else
                                <span class="badge badge-danger">Akun Tidak Tersedia</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('admin.guru.edit', $guru) }}" class="btn-outline text-[11px]">
                            <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                            Edit
                        </a>
                        <a href="{{ route('admin.guru.index') }}" class="btn-ghost flex items-center gap-1.5 px-2.5 py-1.5 text-[11px] font-medium">
                            <i data-lucide="arrow-left" class="h-3 w-3"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            {{-- ===== DATA PRIBADI ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="user" class="h-3.5 w-3.5" style="color: var(--accent-purple);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-purple);">Data Pribadi</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Nama Guru</p>
                        <p class="text-[12.5px] font-medium text-white text-right">{{ $guru->nama }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">NIP</p>
                        <p class="text-[12.5px] font-mono font-medium text-right" style="color: var(--text-secondary);">{{ $guru->nip }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">No. HP</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $guru->no_hp ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== AKUN LOGIN ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="shield" class="h-3.5 w-3.5" style="color: var(--accent-blue);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-blue);">Akun Login</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">E-mail</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $guru->user->email ?? '-' }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Role</p>
                        <span class="badge badge-neutral shrink-0">Guru</span>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Status Akun</p>
                        @if($guru->user)
                            <span class="badge badge-success shrink-0">Aktif</span>
                        @else
                            <span class="badge badge-danger shrink-0">Tidak tersedia</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ===== INFO SISTEM ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="clock" class="h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--text-dim);">Info Sistem</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">ID Guru</p>
                        <p class="text-[12.5px] font-mono text-right" style="color: var(--text-dim);">#{{ $guru->id }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Dibuat</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $guru->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Terakhir diubah</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $guru->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== DANGER ZONE ===== --}}
            <div class="px-6 py-4 flex items-center justify-between" style="background: rgba(239,68,68,0.03);">
                <div class="flex items-center gap-2.5">
                    <p class="text-[12px]" style="color: var(--text-dim);">Hapus data ini secara permanen</p>
                </div>
                <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $guru->nama }}?')">
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