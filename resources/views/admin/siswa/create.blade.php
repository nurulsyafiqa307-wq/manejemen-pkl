<x-app-layout>
    <x-slot:title>Tambah Siswa</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.siswa.index') }}" class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-white/5" style="color: var(--text-secondary);">
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>
            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-white">Tambah Siswa</h2>
                <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">Buat data siswa & akun login baru</p>
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

    <form action="{{ route('admin.siswa.store') }}" method="POST" class="max-w-2xl mx-auto">

        @csrf

        {{-- ===== SECTION 1: DATA SISWA ===== --}}
        <div class="card p-5 mb-4 anim anim-d1" style="border-color: rgba(79,142,255,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(79,142,255,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(79,142,255,0.1);">
                    <i data-lucide="user-plus" class="h-[18px] w-[18px]" style="color: var(--accent-blue);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Data Siswa</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Informasi pribadi & akademik</p>
                </div>
                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded" style="background: rgba(79,142,255,0.08); color: var(--accent-blue);">Langkah 1</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Nama Lengkap <span style="color: var(--accent-red);">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                           class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                           placeholder="Masukkan nama lengkap" required>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        NIS <span style="color: var(--accent-red);">*</span>
                    </label>
                    <input type="text" name="nis" value="{{ old('nis') }}"
                           class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px] font-mono"
                           placeholder="Nomor Induk Siswa" required>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        No. HP
                    </label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                        class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                        placeholder="08123456789"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        maxlength="15"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Kelas <span style="color: var(--accent-red);">*</span>
                    </label>
                    <input type="text" name="kelas" value="{{ old('kelas') }}"
                           class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                           placeholder="XI PPLG 1" required>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        Jurusan <span style="color: var(--accent-red);">*</span>
                    </label>
                    <input type="text" name="jurusan" value="{{ old('jurusan') }}"
                           class="input-dark w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                           placeholder="PPLG" required>
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

        {{-- ===== SECTION 2: AKUN LOGIN ===== --}}
        <div class="card p-5 mb-5 anim anim-d2" style="border-color: rgba(139,92,246,0.12);">
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 1px solid rgba(139,92,246,0.1);">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg" style="background: rgba(139,92,246,0.1);">
                    <i data-lucide="shield-check" class="h-[18px] w-[18px]" style="color: var(--accent-purple);"></i>
                </div>
                <div>
                    <h3 class="text-[14px] font-bold text-white">Akun Login</h3>
                    <p class="text-[11px]" style="color: var(--text-dim);">Kredensial untuk akses sistem</p>
                </div>
                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded" style="background: rgba(139,92,246,0.08); color: var(--accent-purple);">Langkah 2</span>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                        E-mail <span style="color: var(--accent-red);">*</span>
                    </label>
                    <div class="relative">
                        <i data-lucide="mail" class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="input-dark w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                               placeholder="siswa@email.com" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Kata Sandi <span style="color: var(--accent-red);">*</span>
                        </label>
                        <div class="relative">
                            <i data-lucide="lock" class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                            <input type="password" name="password" id="password"
                                   class="input-dark w-full rounded-lg pl-10 pr-10 py-2.5 text-[12.5px]"
                                   placeholder="Min. 8 karakter" required minlength="8">
                            <button type="button" onclick="togglePw('password', this)"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 p-0.5 rounded" style="color: var(--text-dim);">
                                <i data-lucide="eye-off" class="h-3.5 w-3.5"></i>
                            </button>
                        </div>
                        <div class="flex gap-1 mt-2" id="strBar">
                            <div class="h-1 flex-1 rounded-full transition-all duration-300" style="background: rgba(255,255,255,0.05);"></div>
                            <div class="h-1 flex-1 rounded-full transition-all duration-300" style="background: rgba(255,255,255,0.05);"></div>
                            <div class="h-1 flex-1 rounded-full transition-all duration-300" style="background: rgba(255,255,255,0.05);"></div>
                            <div class="h-1 flex-1 rounded-full transition-all duration-300" style="background: rgba(255,255,255,0.05);"></div>
                        </div>
                        <p class="text-[10px] mt-1" id="strTxt" style="color: var(--text-dim);">Belum diisi</p>
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold mb-1.5" style="color: var(--text-secondary);">
                            Konfirmasi Sandi <span style="color: var(--accent-red);">*</span>
                        </label>
                        <div class="relative">
                            <i data-lucide="lock" class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5" style="color: var(--text-dim);"></i>
                            <input type="password" name="password_confirmation" id="pwConfirm"
                                   class="input-dark w-full rounded-lg pl-10 pr-10 py-2.5 text-[12.5px]"
                                   placeholder="Ulangi sandi" required>
                            <button type="button" onclick="togglePw('pwConfirm', this)"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 p-0.5 rounded" style="color: var(--text-dim);">
                                <i data-lucide="eye-off" class="h-3.5 w-3.5"></i>
                            </button>
                        </div>
                        <p class="text-[10px] mt-2 hidden" id="matchTxt" style="color: var(--accent-red);">
                            ✕ Kata sandi tidak cocok
                        </p>
                        <p class="text-[10px] mt-2 hidden" id="matchOk" style="color: var(--accent-green);">
                            ✓ Kata sandi cocok
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-2.5 p-3 rounded-lg" style="background: rgba(139,92,246,0.06); border: 1px solid rgba(139,92,246,0.1);">
                    <i data-lucide="info" class="h-3.5 w-3.5 shrink-0 mt-0.5" style="color: var(--accent-purple);"></i>
                    <p class="text-[10.5px] leading-relaxed" style="color: var(--text-muted);">
                        Akun login dibuat otomatis setelah data disimpan. Siswa bisa masuk ke sistem menggunakan email dan kata sandi di atas.
                    </p>
                </div>
            </div>
        </div>

        {{-- ===== TOMBOL ===== --}}
        <div class="flex items-center justify-end gap-3 anim anim-d3">
            <a href="{{ route('admin.siswa.index') }}" class="btn-outline">
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
        <script>
            lucide.createIcons();

            function togglePw(id, btn) {
                const inp = document.getElementById(id);
                const ico = btn.querySelector('i, svg');
                if (inp.type === 'password') {
                    inp.type = 'text';
                    ico.setAttribute('data-lucide', 'eye');
                } else {
                    inp.type = 'password';
                    ico.setAttribute('data-lucide', 'eye-off');
                }
                lucide.createIcons();
            }

            const pw = document.getElementById('password');
            const bars = document.querySelectorAll('#strBar > div');
            const stxt = document.getElementById('strTxt');
            const colors = ['#ef4444', '#f59e0b', '#3b82f6', '#22c55e'];
            const labels = ['Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];

            pw.addEventListener('input', function () {
                const v = this.value;
                let s = 0;
                if (v.length >= 8) s++;
                if (/[A-Z]/.test(v)) s++;
                if (/[0-9]/.test(v)) s++;
                if (/[^A-Za-z0-9]/.test(v)) s++;
                bars.forEach((b, i) => {
                    b.style.background = i < s ? colors[s - 1] : 'rgba(255,255,255,0.05)';
                });
                stxt.textContent = v.length === 0 ? 'Belum diisi' : (s > 0 ? labels[s - 1] : 'Terlalu pendek');
                stxt.style.color = v.length === 0 ? 'var(--text-dim)' : (s > 0 ? colors[s - 1] : 'var(--text-dim)');
                checkMatch();
            });

            const pwc = document.getElementById('pwConfirm');
            const mt = document.getElementById('matchTxt');
            const mo = document.getElementById('matchOk');

            function checkMatch() {
                if (pwc.value.length === 0) {
                    mt.classList.add('hidden');
                    mo.classList.add('hidden');
                } else if (pwc.value !== pw.value) {
                    mt.classList.remove('hidden');
                    mo.classList.add('hidden');
                } else {
                    mt.classList.add('hidden');
                    mo.classList.remove('hidden');
                }
            }

            pwc.addEventListener('input', checkMatch);
        </script>
    @endpush
</x-app-layout>