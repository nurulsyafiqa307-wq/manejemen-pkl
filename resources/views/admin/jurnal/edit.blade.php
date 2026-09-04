<x-app-layout>
    <x-slot:title>Edit Jurnal Harian</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.jurnal.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Edit Jurnal Harian</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Ubah jurnal {{ $jurnal->siswa->nama ?? '' }} — {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}</p>
            </div>
        </div>
    </x-slot:header>

    {{-- Alert Error --}}
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

    <form action="{{ route('admin.jurnal.update', $jurnal->id_jurnal) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto space-y-4">

        @csrf
        @method('PUT')

        {{-- Data Jurnal --}}
        <div class="card p-5 anim anim-d1" style="border-color: rgba(245,158,11,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(245,158,11,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(245,158,11,0.1);">
                    <i data-lucide="file-edit" class="h-[18px] w-[18px]" style="color: var(--accent-amber);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Data Jurnal</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Informasi waktu & kegiatan harian</p>
                </div>
                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded" style="background: rgba(245,158,11,0.08); color: var(--accent-amber);">Edit</span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Siswa <span style="color: var(--accent-red);">*</span>
                    </label>
                    <select name="siswa_id" required class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]">
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}" {{ old('siswa_id', $jurnal->siswa_id) == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Tanggal <span style="color: var(--accent-red);">*</span>
                    </label>
                    <input type="date" name="tanggal"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($jurnal->tanggal)->format('Y-m-d')) }}"
                           required class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Jam Masuk <span style="color: var(--accent-red);">*</span>
                        </label>
                        <input type="time" name="jam_masuk"
                               value="{{ old('jam_masuk', $jurnal->jam_masuk) }}"
                               required class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] font-mono">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Jam Pulang <span style="color: var(--accent-red);">*</span>
                        </label>
                        <input type="time" name="jam_pulang"
                               value="{{ old('jam_pulang', $jurnal->jam_pulang) }}"
                               required class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] font-mono">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Kegiatan <span style="color: var(--accent-red);">*</span>
                    </label>
                    <textarea name="kegiatan" rows="4" required
                              class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                              placeholder="Tuliskan kegiatan yang dilakukan...">{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="flex items-center gap-3 my-1 anim anim-d1">
            <div class="flex-1 h-px" style="background: var(--border);"></div>
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
                <span class="text-[10px] font-semibold uppercase tracking-widest" style="color: var(--text-dim);">Selanjutnya</span>
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
            </div>
            <div class="flex-1 h-px" style="background: var(--border);"></div>
        </div>

        {{-- Kendala, Solusi & Lampiran --}}
        <div class="card p-5 mb-4 anim anim-d2" style="border-color: rgba(79,142,255,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(79,142,255,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(79,142,255,0.1);">
                    <i data-lucide="clipboard-list" class="h-[18px] w-[18px]" style="color: var(--accent-blue);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Kendala, Solusi & Lampiran</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Catatan tambahan dan bukti kegiatan</p>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">Kendala</label>
                    <textarea name="kon" rows="3"
                              class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                              placeholder="Kendala yang dihadapi (opsional)">{{ old('kon', $jurnal->kon) }}</textarea>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">Solusi</label>
                    <textarea name="solusi" rows="3"
                              class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                              placeholder="Solusi atas kendala (opsional)">{{ old('solusi', $jurnal->solusi) }}</textarea>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">Foto Kegiatan</label>
                    @if($jurnal->foto)
                        <div class="mb-3">
                            <img src="{{ asset('storage/'.$jurnal->foto) }}" class="h-28 w-28 object-cover rounded-lg" style="border: 1px solid var(--border);">
                            <p class="text-[10px] mt-1.5" style="color: var(--text-dim);">Foto saat ini — upload baru untuk mengganti</p>
                        </div>
                    @endif
                    <input type="file" name="foto" accept="image/*" class="input-dark w-full rounded-lg px-3.5 py-2 text-[12px] file:mr-3 file:py-1 file:px-2.5 file:rounded-md file:text-[10px] file:font-semibold file:transition" style="color: var(--text-secondary);">
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="flex items-center gap-3 my-1 anim anim-d2">
            <div class="flex-1 h-px" style="background: var(--border);"></div>
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border);">
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
                <span class="text-[10px] font-semibold uppercase tracking-widest" style="color: var(--text-dim);">Status</span>
                <i data-lucide="chevron-down" class="h-3 w-3" style="color: var(--text-dim);"></i>
            </div>
            <div class="flex-1 h-px" style="background: var(--border);"></div>
        </div>

        {{-- Status --}}
        <div class="card p-5 mb-5 anim anim-d3" style="border-color: rgba(139,92,246,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(139,92,246,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(139,92,246,0.1);">
                    <i data-lucide="shield-check" class="h-[18px] w-[18px]" style="color: var(--accent-purple);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Status Jurnal</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Tentukan status review jurnal ini</p>
                </div>
            </div>

            <div class="space-y-3">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">Status</label>
                    <select name="status_jurnal" class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]">
                        <option value="Menunggu Review" {{ $jurnal->status_jurnal == 'Menunggu Review' ? 'selected' : '' }}>Menunggu Review</option>
                        <option value="Disetujui" {{ $jurnal->status_jurnal == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Perlu Revisi" {{ $jurnal->status_jurnal == 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
                    </select>
                </div>

                <div class="flex items-start gap-2.5 p-3 rounded-lg" style="background: rgba(139,92,246,0.06); border: 1px solid rgba(139,92,246,0.1);">
                    <i data-lucide="info" class="h-3.5 w-3.5 shrink-0 mt-0.5" style="color: var(--accent-purple);"></i>
                    <p class="text-[10.5px] leading-relaxed" style="color: var(--text-muted);">
                        Ubah status ke "Disetujui" jika jurnal sudah sesuai, atau "Perlu Revisi" jika ada yang perlu diperbaiki.
                    </p>
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center justify-end gap-3 anim anim-d3">
            <a href="{{ route('admin.jurnal.index') }}" class="btn-outline">
                <i data-lucide="x" class="h-3.5 w-3.5"></i>
                Batal
            </a>
            <button type="submit" class="btn-primary">
                <i data-lucide="check" class="h-4 w-4"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>

    @push('scripts')
        <script>lucide.createIcons();</script>
    @endpush
</x-app-layout>