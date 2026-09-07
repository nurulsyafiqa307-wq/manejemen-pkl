<x-app-layout>

    <x-slot:title>Edit Tempat PKL</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">

            <a
                href="{{ route('admin.tempat.index') }}"
                class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-slate-100 text-slate-600"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>

            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                    Edit Tempat PKL
                </h2>

                <p class="text-[11px] hidden sm:block text-slate-500">
                    Ubah data {{ $tempat->nama_perusahaan }}
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
        action="{{ route('admin.tempat.update', $tempat) }}"
        method="POST"
        class="max-w-2xl mx-auto"
    >

        @csrf
        @method('PUT')


        {{-- ===================================================== --}}
        {{-- SECTION 1: DATA PERUSAHAAN --}}
        {{-- ===================================================== --}}

        <div class="card p-6 mb-5 border border-slate-200 bg-white rounded-2xl shadow-sm">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200/50">

                    <i data-lucide="building-2" class="h-[18px] w-[18px]"></i>

                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Data Perusahaan
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Informasi perusahaan tempat PKL
                    </p>

                </div>

                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-600 border border-emerald-200/50">
                    Edit
                </span>

            </div>


            <div class="space-y-4">


                {{-- NAMA PERUSAHAAN --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">

                        Nama Perusahaan

                        <span class="text-red-500">*</span>

                    </label>

                    <div class="relative">

                        <i
                            data-lucide="building"
                            class="absolute left-3.5 top-3.5 h-3.5 w-3.5 text-slate-400"
                        ></i>

                        <input
                            type="text"
                            name="nama_perusahaan"
                            value="{{ old('nama_perusahaan', $tempat->nama_perusahaan) }}"
                            style="background-color: #ffffff !important; color: #1e293b !important;"
                            class="w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                            placeholder="PT. Contoh Perusahaan"
                            required
                        >

                    </div>

                </div>


                {{-- BIDANG + KUOTA --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                    {{-- BIDANG --}}
                    <div>

                        <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">

                            Bidang

                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="bidang"
                            value="{{ old('bidang', $tempat->bidang) }}"
                            style="background-color: #ffffff !important; color: #1e293b !important;"
                            class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                            placeholder="Contoh: IT, Akuntansi"
                            required
                        >

                    </div>


                    {{-- KUOTA --}}
                    <div>

                        <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">

                            Kuota

                            <span class="text-red-500">*</span>

                        </label>

                        <div class="relative">

                            <i
                                data-lucide="users"
                                class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5 text-slate-400"
                            ></i>

                            <input
                                type="number"
                                name="kuota"
                                min="0"
                                value="{{ old('kuota', $tempat->kuota) }}"
                                style="background-color: #ffffff !important; color: #1e293b !important;"
                                class="w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                                placeholder="0"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- ALAMAT --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="2"
                        style="background-color: #ffffff !important; color: #1e293b !important;"
                        class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none resize-none"
                        placeholder="Jl. Contoh No. 123, Kota"
                    >{{ old('alamat', $tempat->alamat) }}</textarea>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- DIVIDER --}}
        {{-- ===================================================== --}}

        <div class="flex items-center gap-3 my-6">

            <div class="flex-1 h-px bg-slate-200"></div>

            <div class="flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-500">

                <span class="text-[10px] font-semibold uppercase tracking-widest">
                    Kontak & Catatan
                </span>

            </div>

            <div class="flex-1 h-px bg-slate-200"></div>

        </div>


        {{-- ===================================================== --}}
        {{-- SECTION 2: KONTAK & CATATAN --}}
        {{-- ===================================================== --}}

        <div class="card p-6 mb-6 border border-slate-200 bg-white rounded-2xl shadow-sm">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600 border border-blue-200/50">

                    <i data-lucide="phone" class="h-[18px] w-[18px]"></i>

                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Kontak & Catatan
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Info kontak dan keterangan tambahan
                    </p>

                </div>

            </div>


            <div class="space-y-4">


                {{-- NOMOR HP --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Nomor HP
                    </label>

                    <div class="relative">

                        <i
                            data-lucide="phone"
                            class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5 text-slate-400"
                        ></i>

                        <input
                            type="tel"
                            name="no_hp"
                            value="{{ old('no_hp', $tempat->no_hp) }}"
                            style="background-color: #ffffff !important; color: #1e293b !important;"
                            class="w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none"
                            placeholder="08123456789"
                            inputmode="numeric"
                            pattern="[0-9]*"
                            maxlength="15"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        >

                    </div>

                </div>


                {{-- KETERANGAN --}}
                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="2"
                        style="background-color: #ffffff !important; color: #1e293b !important;"
                        class="w-full rounded-lg px-3.5 py-2.5 text-[12.5px] border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 transition-all outline-none resize-none"
                        placeholder="Catatan tambahan (opsional)"
                    >{{ old('keterangan', $tempat->keterangan) }}</textarea>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- TOMBOL ACTION --}}
        {{-- ===================================================== --}}

        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.tempat.index') }}"
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


    @push('scripts')

        <script>
            lucide.createIcons();
        </script>

    @endpush

</x-app-layout>