<x-app-layout>

    {{-- ===== HIDE BROWSER DEFAULT PASSWORD EYE ===== --}}
    <style>
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear,
        input[type="password"]::-webkit-contacts-auto-fill-button,
        input[type="password"]::-webkit-credentials-auto-fill-button {
            display: none !important;
        }
    </style>

    <x-slot:title>Edit Guru</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">

            <a
                href="{{ route('admin.guru.index') }}"
                class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-slate-100 text-slate-600"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>

            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                    Edit Guru
                </h2>

                <p class="text-[11px] hidden sm:block text-slate-500">
                    Ubah data {{ $guru->nama }}
                </p>
            </div>

        </div>
    </x-slot:header>


    {{-- ===== ALERT ERROR ===== --}}
    @if($errors->any())

        <div class="max-w-2xl mx-auto flex items-start gap-3 p-4 rounded-xl mb-5 border border-red-200 bg-red-50">

            <div class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0 mt-0.5 bg-red-100 text-red-600">
                <i data-lucide="alert-circle" class="h-4 w-4"></i>
            </div>

            <div class="min-w-0 flex-1">

                <p class="text-[12.5px] font-semibold mb-1 text-red-700">
                    Data belum lengkap:
                </p>

                <ul class="space-y-0.5">

                    @foreach($errors->all() as $error)

                        <li class="text-[11.5px] text-red-600">
                            • {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

            <button
                type="button"
                onclick="this.closest('div').remove()"
                class="shrink-0 text-red-400 hover:text-red-600"
            >
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>

        </div>

    @endif


    <form
        action="{{ route('admin.guru.update', $guru) }}"
        method="POST"
        class="max-w-2xl mx-auto"
    >

        @csrf
        @method('PUT')


        {{-- ===== SECTION 1: DATA GURU ===== --}}
        <div class="card p-6 mb-5 border border-slate-200 bg-white rounded-2xl shadow-sm">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-50 text-amber-600 border border-amber-200/50">
                    <i data-lucide="user-pen" class="h-[18px] w-[18px]"></i>
                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Data Guru
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Informasi pribadi & akademik
                    </p>

                </div>

                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md bg-amber-50 text-amber-600 border border-amber-200/50">
                    Edit
                </span>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                {{-- NAMA --}}
                <div class="sm:col-span-2">

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Nama Guru
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $guru->nama) }}"
                        style="background-color: #ffffff !important; color: #1e293b !important;"
                        class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                        placeholder="Masukkan nama guru"
                        required
                    >

                </div>


                {{-- NIP --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        NIP
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nip"
                        value="{{ old('nip', $guru->nip) }}"
                        style="background-color: #ffffff !important; color: #1e293b !important;"
                        class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] font-mono border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                        placeholder="Nomor Induk Pegawai"
                        required
                    >

                </div>


                {{-- NO HP --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        No. HP
                    </label>

                    <input
                        type="tel"
                        name="no_hp"
                        value="{{ old('no_hp', $guru->no_hp) }}"
                        style="background-color: #ffffff !important; color: #1e293b !important;"
                        class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                        placeholder="08123456789"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        maxlength="15"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    >

                </div>

            </div>

        </div>


        {{-- ===== DIVIDER ===== --}}
        <div class="flex items-center gap-3 my-6">

            <div class="flex-1 h-px bg-slate-200"></div>

            <div class="flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-500">

                <span class="text-[10px] font-semibold uppercase tracking-widest">
                    Akun Login
                </span>

            </div>

            <div class="flex-1 h-px bg-slate-200"></div>

        </div>


        {{-- ===== SECTION 2: AKUN LOGIN ===== --}}
        <div class="card p-6 mb-6 border border-slate-200 bg-white rounded-2xl shadow-sm">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-purple-50 text-purple-600 border border-purple-200/50">
                    <i data-lucide="shield-check" class="h-[18px] w-[18px]"></i>
                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Akun Login
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Email & kata sandi akses sistem
                    </p>

                </div>

                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md bg-purple-50 text-purple-600 border border-purple-200/50">
                    Edit
                </span>

            </div>


            <div class="space-y-4">


                {{-- EMAIL --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        E-mail
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <i
                            data-lucide="mail"
                            class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400 z-10"
                        ></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $guru->user->email ?? '') }}"
                            style="background-color: #ffffff !important; color: #1e293b !important;"
                            class="w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                            placeholder="guru@email.com"
                            required
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                    {{-- PASSWORD BARU --}}
                    <div>

                        <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                            Kata Sandi Baru
                        </label>

                        <div class="relative">

                            <i
                                data-lucide="lock"
                                class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400 z-10"
                            ></i>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                style="background-color: #ffffff !important; color: #1e293b !important;"
                                class="w-full rounded-lg pl-10 pr-10 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                                placeholder="Kosongkan jika tidak diubah"
                                minlength="8"
                            >

                            <button
                                type="button"
                                onclick="togglePw('password', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-md text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition z-10"
                                aria-label="Lihat kata sandi"
                            >
                                <i data-lucide="eye-off" class="h-4 w-4"></i>
                            </button>

                        </div>


                        {{-- PASSWORD STRENGTH --}}
                        <div
                            class="flex gap-1 mt-2"
                            id="strBar"
                        >

                            <div
                                class="h-1 flex-1 rounded-full transition-all duration-300"
                                style="background: #e2e8f0;"
                            ></div>

                            <div
                                class="h-1 flex-1 rounded-full transition-all duration-300"
                                style="background: #e2e8f0;"
                            ></div>

                            <div
                                class="h-1 flex-1 rounded-full transition-all duration-300"
                                style="background: #e2e8f0;"
                            ></div>

                            <div
                                class="h-1 flex-1 rounded-full transition-all duration-300"
                                style="background: #e2e8f0;"
                            ></div>

                        </div>

                        <p
                            class="text-[10px] mt-1 text-slate-400"
                            id="strTxt"
                        >
                            Kosongkan jika tidak diubah
                        </p>

                    </div>


                    {{-- KONFIRMASI PASSWORD --}}
                    <div>

                        <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                            Konfirmasi Sandi Baru
                        </label>

                        <div class="relative">

                            <i
                                data-lucide="lock"
                                class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400 z-10"
                            ></i>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="pwConfirm"
                                style="background-color: #ffffff !important; color: #1e293b !important;"
                                class="w-full rounded-lg pl-10 pr-10 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                                placeholder="Ulangi sandi baru"
                            >

                            <button
                                type="button"
                                onclick="togglePw('pwConfirm', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-md text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition z-10"
                                aria-label="Lihat kata sandi"
                            >
                                <i data-lucide="eye-off" class="h-4 w-4"></i>
                            </button>

                        </div>

                    </div>

                </div>


                {{-- INFO PASSWORD --}}
                <div class="flex items-start gap-2.5 p-3 rounded-lg bg-purple-50 border border-purple-100">

                    <i
                        data-lucide="info"
                        class="h-3.5 w-3.5 shrink-0 mt-0.5 text-purple-600"
                    ></i>

                    <p class="text-[10.5px] leading-relaxed text-slate-500">
                        Biarkan kolom kata sandi kosong jika tidak ingin mengubahnya.
                        Jika diisi, minimal 8 karakter.
                    </p>

                </div>

            </div>

        </div>


        {{-- ===== TOMBOL ACTION ===== --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.guru.index') }}"
                class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 text-[12px] font-semibold transition"
            >
                Batal
            </a>

            <button
                type="submit"
                class="flex items-center gap-2 px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-[12px] font-semibold shadow-md shadow-indigo-500/20 transition"
            >
                <i data-lucide="check" class="h-4 w-4"></i>
                Simpan Perubahan
            </button>

        </div>

    </form>


    {{-- ===== SCRIPT ===== --}}
    <script>

        function togglePw(inputId, btnElement) {

            var input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            if (input.type === 'password') {

                input.type = 'text';

                btnElement.innerHTML =
                    '<i data-lucide="eye" class="h-4 w-4"></i>';

                btnElement.setAttribute(
                    'aria-label',
                    'Sembunyikan kata sandi'
                );

            } else {

                input.type = 'password';

                btnElement.innerHTML =
                    '<i data-lucide="eye-off" class="h-4 w-4"></i>';

                btnElement.setAttribute(
                    'aria-label',
                    'Lihat kata sandi'
                );

            }

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

        }


        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }


        const pw = document.getElementById('password');
        const bars = document.querySelectorAll('#strBar > div');
        const stxt = document.getElementById('strTxt');

        const colors = [
            '#ef4444',
            '#f59e0b',
            '#3b82f6',
            '#22c55e'
        ];

        const labels = [
            'Lemah',
            'Cukup',
            'Kuat',
            'Sangat Kuat'
        ];


        if (pw) {

            pw.addEventListener('input', function () {

                const v = this.value;

                let s = 0;

                if (v.length >= 8) s++;

                if (/[A-Z]/.test(v)) s++;

                if (/[0-9]/.test(v)) s++;

                if (/[^A-Za-z0-9]/.test(v)) s++;


                bars.forEach((b, i) => {

                    b.style.background =
                        i < s
                            ? colors[s - 1]
                            : '#e2e8f0';

                });


                if (v.length === 0) {

                    stxt.textContent =
                        'Kosongkan jika tidak diubah';

                    stxt.style.color =
                        '#94a3b8';

                } else {

                    stxt.textContent =
                        s > 0
                            ? labels[s - 1]
                            : 'Terlalu pendek';

                    stxt.style.color =
                        s > 0
                            ? colors[s - 1]
                            : '#94a3b8';

                }

            });

        }

    </script>

</x-app-layout>