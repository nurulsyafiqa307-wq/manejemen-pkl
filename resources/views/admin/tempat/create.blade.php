<x-app-layout>
    <x-slot:title>Tambah Tempat PKL</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tempat.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Tambah Tempat PKL</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Tambah perusahaan tempat PKL baru</p>
            </div>
        </div>
    </x-slot:header>

    {{-- ===== ALERT ERROR ===== --}}
    @if($errors->any())
        <div class="max-w-2xl mx-auto flex items-start gap-3 p-4 rounded-xl mb-5 anim" style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.15);">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0 mt-0.5" style="background: rgba(239,68,68,0.12);">
                <i data-lucide="alert-circle" class="h-4 w-4" style="color: #f87171;"></i>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-[12.5px] font-semibold mb-1.5" style="color: #f87171;">Data belum lengkap:</p>
                <ul class="space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li class="text-[11.5px]" style="color: rgba(248,113,113,0.8);">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="this.closest('div').remove()" class="shrink-0" style="color: rgba(239,68,68,0.5);">
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>
        </div>
    @endif

    <form action="{{ route('admin.tempat.store') }}" method="POST" class="max-w-2xl mx-auto">

        @csrf

        {{-- ===== SECTION 1: DATA PERUSAHAAN ===== --}}
        <div class="card p-5 mb-4 anim anim-d1" style="border-color: rgba(16,185,129,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(16,185,129,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(16,185,129,0.1);">
                    <i data-lucide="building-2" class="h-[18px] w-[18px]" style="color: var(--accent-green);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Data Perusahaan</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Informasi perusahaan tempat PKL</p>
                </div>
                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded" style="background: rgba(16,185,129,0.08); color: var(--accent-green);">Langkah 1</span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Nama Perusahaan <span style="color: var(--accent-red);">*</span>
                    </label>
                    <div class="relative">
                        <i data-lucide="building" class="absolute left-3.5 top-3.5 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                        <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                               class="input-dark w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                               placeholder="PT. Contoh Perusahaan" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Bidang <span style="color: var(--accent-red);">*</span>
                        </label>
                        <input type="text" name="bidang" value="{{ old('bidang') }}"
                               class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                               placeholder="IT, Akuntansi, dll" required>
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Kuota <span style="color: var(--accent-red);">*</span>
                        </label>
                        <div class="relative">
                            <i data-lucide="users" class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                            <input type="number" name="kuota" min="0" value="{{ old('kuota') }}"
                                   class="input-dark w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                                   placeholder="0" required>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Alamat
                    </label>
                    <textarea name="alamat" rows="2"
                              class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                              placeholder="Jl. Contoh No. 123, Kota">{{ old('alamat') }}</textarea>
                </div>
            </div>
        </div>

        {{-- ===== DIVIDER ===== --}}
        <div class="flex items-center gap-3 my-5 anim anim-d1">
            <div class="flex-1 h-px" style="background: var(--border);"></div>
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
                <span class="text-[10px] font-semibold uppercase tracking-widest" style="color: var(--text-dim);">Selanjutnya</span>
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
            </div>
            <div class="flex-1 h-px" style="background: var(--border);"></div>
        </div>

        {{-- ===== SECTION 2: KONTAK & CATATAN ===== --}}
        <div class="card p-5 mb-5 anim anim-d2" style="border-color: rgba(79,142,255,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(79,142,255,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(79,142,255,0.1);">
                    <i data-lucide="phone" class="h-[18px] w-[18px]" style="color: var(--accent-blue);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Kontak & Catatan</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Info kontak dan keterangan tambahan</p>
                </div>
                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded" style="background: rgba(79,142,255,0.08); color: var(--accent-blue);">Langkah 2</span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Nomor HP
                    </label>
                    <div class="relative">
                        <i data-lucide="phone" class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                               class="input-dark w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                               placeholder="08123456789">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Keterangan
                    </label>
                    <textarea name="keterangan" rows="2"
                              class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                              placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                </div>
            </div>
        </div>

        {{-- ===== TOMBOL ===== --}}
        <div class="flex items-center justify-end gap-3 anim anim-d3">
            <a href="{{ route('admin.tempat.index') }}" class="btn-outline">
                <i data-lucide="x" class="h-3.5 w-3.5"></i>
                Batal
            </a>
            <button type="submit" class="btn-primary">
                <i data-lucide="check" class="h-4 w-4"></i>
                Simpan Data
            </button>
        </div>
    </form>

    @push('scripts')
        <script>lucide.createIcons();</script>
    @endpush
</x-app-layout>