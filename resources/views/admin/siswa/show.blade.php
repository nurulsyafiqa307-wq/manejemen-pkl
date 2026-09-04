<x-app-layout>
    <x-slot:title>Detail Siswa</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.siswa.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Detail Siswa</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Profil {{ $siswa->nama }}</p>
            </div>
        </div>
    </x-slot:header>

    {{-- mx-auto buat tengah --}}
    <div class="max-w-2xl mx-auto">
        <div class="card overflow-hidden anim">

            {{-- ===== HEADER ===== --}}
            <div class="p-6" style="border-bottom: 1px solid var(--border);">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="relative shrink-0">
                        <div class="avatar h-[72px] w-[72px] text-[26px] rounded-2xl"
                             style="background: linear-gradient(135deg, #3b6ee8, #6366f1); box-shadow: 0 8px 24px -4px rgba(99,102,241,0.35);">
                            {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                        </div>
                        @php
                            $dotColor = match($siswa->status_pkl ?? '') {
                                'aktif'    => '#22c55e',
                                'selesai'  => '#3b82f6',
                                'menunggu' => '#f59e0b',
                                default    => '#6b7280',
                            };
                        @endphp
                        <span class="absolute -bottom-0.5 -right-0.5 h-4 w-4 rounded-full border-2" style="background: {{ $dotColor }}; border-color: var(--bg-card);"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-[20px] font-bold text-white leading-tight">{{ $siswa->nama }}</h3>
                        <p class="text-[12px] mt-1 font-mono" style="color: var(--text-muted);">NIS: <span style="color: var(--text-secondary);">{{ $siswa->nis }}</span></p>
                        <div class="flex items-center gap-2 mt-2.5 flex-wrap">
                            <span class="badge badge-neutral">{{ $siswa->kelas }}</span>
                            <span class="badge badge-neutral">{{ $siswa->jurusan }}</span>
                            @php
                                $bc = 'badge-danger';
                                $sl = 'Belum PKL';
                                if (isset($siswa->status_pkl)) {
                                    $bc = match($siswa->status_pkl) {
                                        'aktif'    => 'badge-success',
                                        'selesai'  => 'badge-info',
                                        'menunggu' => 'badge-warning',
                                        default    => 'badge-danger',
                                    };
                                    $sl = match($siswa->status_pkl) {
                                        'aktif'    => 'Aktif',
                                        'selesai'  => 'Selesai',
                                        'menunggu' => 'Menunggu',
                                        default    => 'Belum PKL',
                                    };
                                }
                            @endphp
                            <span class="badge {{ $bc }}">{{ $sl }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn-outline text-[11px]">
                            <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                            Edit
                        </a>
                        <a href="{{ route('admin.siswa.index') }}" class="btn-ghost flex items-center gap-1.5 px-2.5 py-1.5 text-[11px] font-medium">
                            <i data-lucide="arrow-left" class="h-3 w-3"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            {{-- ===== DATA PRIBADI ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="user" class="h-3.5 w-3.5" style="color: var(--accent-blue);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-blue);">Data Pribadi</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Nama Lengkap</p>
                        <p class="text-[12.5px] font-medium text-white text-right">{{ $siswa->nama }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">NIS</p>
                        <p class="text-[12.5px] font-mono font-medium text-right" style="color: var(--text-secondary);">{{ $siswa->nis }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">No. HP</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $siswa->no_hp ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== DATA AKADEMIK ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="graduation-cap" class="h-3.5 w-3.5" style="color: var(--accent-green);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-green);">Data Akademik</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Kelas</p>
                        <p class="text-[12.5px] font-medium text-white text-right">{{ $siswa->kelas }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Jurusan</p>
                        <p class="text-[12.5px] font-medium text-white text-right">{{ $siswa->jurusan }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Status PKL</p>
                        <span class="badge {{ $bc }} shrink-0">{{ $sl }}</span>
                    </div>
                    @if($siswa->tempat_pkl)
                        <div class="flex justify-between items-start gap-4">
                            <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Tempat PKL</p>
                            <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $siswa->tempat_pkl }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ===== AKUN LOGIN ===== --}}
            <div class="px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="shield" class="h-3.5 w-3.5" style="color: var(--accent-purple);"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest" style="color: var(--accent-purple);">Akun Login</span>
                </div>
                <div class="space-y-3.5">
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">E-mail</p>
                        <p class="text-[12.5px] font-medium text-right" style="color: var(--text-secondary);">{{ $siswa->user->email ?? '-' }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Role</p>
                        <span class="badge badge-neutral shrink-0">Siswa</span>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Status Akun</p>
                        @if($siswa->user)
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
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">ID Siswa</p>
                        <p class="text-[12.5px] font-mono text-right" style="color: var(--text-dim);">#{{ $siswa->id }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Dibuat</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $siswa->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <p class="text-[12px] shrink-0" style="color: var(--text-dim);">Terakhir diubah</p>
                        <p class="text-[12.5px] text-right" style="color: var(--text-dim);">{{ $siswa->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- ===== DANGER ZONE ===== --}}
            <div class="px-6 py-4 flex items-center justify-between" style="background: rgba(239,68,68,0.03);">
                <div class="flex items-center gap-2.5">
                    <p class="text-[12px]" style="color: var(--text-dim);">Hapus data ini secara permanen</p>
                </div>
                <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $siswa->nama }}?')">
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