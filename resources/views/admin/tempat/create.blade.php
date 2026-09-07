<x-app-layout>

    {{-- ===== FORCE LIGHT INPUT STYLES ===== --}}
    <style>
        .input-light {
            background-color: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
        }

        .input-light:focus {
            border-color: #2563eb !important;
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2) !important;
        }

        .input-light::placeholder {
            color: #94a3b8 !important;
        }
    </style>

    <x-slot:title>Tambah Tempat PKL</x-slot:title>

    <x-slot:header>

        <div class="flex items-center gap-3">

            <a
                href="{{ route('admin.tempat.index') }}"
                class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-slate-200"
                style="color: #64748b;"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>

            <div>

                <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                    Tambah Tempat PKL
                </h2>

                <p class="text-[11px] hidden sm:block text-slate-500">
                    Tambah perusahaan tempat PKL baru
                </p>

            </div>

        </div>

    </x-slot:header>


    {{-- ===== ALERT ERROR ===== --}}

    @if($errors->any())

        <div class="max-w-2xl mx-auto flex items-start gap-3 p-4 rounded-xl mb-5 bg-red-50 border border-red-200">

            <div class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0 mt-0.5 bg-red-100">

                <i
                    data-lucide="alert-circle"
                    class="h-4 w-4 text-red-600"
                ></i>

            </div>

            <div class="min-w-0 flex-1">

                <p class="text-[12.5px] font-semibold mb-1.5 text-red-600">
                    Data belum lengkap:
                </p>

                <ul class="space-y-0.5">

                    @foreach($errors->all() as $error)

                        <li class="text-[11.5px] text-red-500">
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
        action="{{ route('admin.tempat.store') }}"
        method="POST"
        class="max-w-2xl mx-auto"
    >

        @csrf


        {{-- ===== SECTION 1: DATA PERUSAHAAN ===== --}}

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 mb-4">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50">

                    <i
                        data-lucide="building-2"
                        class="h-[18px] w-[18px] text-blue-600"
                    ></i>

                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Data Perusahaan
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Informasi perusahaan tempat PKL
                    </p>

                </div>

                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-blue-50 text-blue-600">
                    Langkah 1
                </span>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                {{-- Nama Perusahaan --}}

                <div class="sm:col-span-2">

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">

                        Nama Perusahaan
                        <span class="text-red-500">*</span>

                    </label>

                    <div class="relative">

                        <i
                            data-lucide="building"
                            class="absolute left-3.5 top-1/2 -translate-y-1/2 h-3.5 w-3.5 text-slate-400"
                        ></i>

                        <input
                            type="text"
                            name="nama_perusahaan"
                            value="{{ old('nama_perusahaan') }}"
                            class="input-light w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                            placeholder="PT. Contoh Perusahaan"
                            required
                        >

                    </div>

                </div>


                {{-- Bidang --}}

                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">

                        Bidang
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="bidang"
                        value="{{ old('bidang') }}"
                        class="input-light w-full rounded-lg px-3.5 py-2.5 text-[12.5px]"
                        placeholder="IT, Akuntansi, dll"
                        required
                    >

                </div>


                {{-- Kuota --}}

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
                            value="{{ old('kuota') }}"
                            class="input-light w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                            placeholder="0"
                            required
                        >

                    </div>

                </div>


                {{-- Alamat --}}

                <div class="sm:col-span-2">

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="2"
                        class="input-light w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                        placeholder="Jl. Contoh No. 123, Kota"
                    >{{ old('alamat') }}</textarea>

                </div>

            </div>

        </div>


        {{-- ===== DIVIDER ===== --}}

        <div class="flex items-center gap-3 my-5">

            <div class="flex-1 h-px bg-slate-200"></div>

            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100 border border-slate-200">

                <i
                    data-lucide="chevron-down"
                    class="h-3 w-3 text-slate-400"
                ></i>

                <span class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">
                    Selanjutnya
                </span>

                <i
                    data-lucide="chevron-down"
                    class="h-3 w-3 text-slate-400"
                ></i>

            </div>

            <div class="flex-1 h-px bg-slate-200"></div>

        </div>


        {{-- ===== SECTION 2: KONTAK & CATATAN ===== --}}

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 mb-5">

            <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-100">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-50">

                    <i
                        data-lucide="phone"
                        class="h-[18px] w-[18px] text-purple-600"
                    ></i>

                </div>

                <div>

                    <h3 class="text-[14px] font-bold text-slate-800">
                        Kontak & Catatan
                    </h3>

                    <p class="text-[11px] text-slate-500">
                        Info kontak dan keterangan tambahan
                    </p>

                </div>

                <span class="ml-auto text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-purple-50 text-purple-600">
                    Langkah 2
                </span>

            </div>


            <div class="space-y-4">

                {{-- Nomor HP --}}

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
                            value="{{ old('no_hp') }}"
                            class="input-light w-full rounded-lg pl-10 pr-3.5 py-2.5 text-[12.5px]"
                            placeholder="08123456789"
                            inputmode="numeric"
                            pattern="[0-9]*"
                            maxlength="15"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        >

                    </div>

                </div>


                {{-- Keterangan --}}

                <div>

                    <label class="block text-[11px] font-semibold mb-1.5 text-slate-700">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="2"
                        class="input-light w-full rounded-lg px-3.5 py-2.5 text-[12.5px] resize-none"
                        placeholder="Catatan tambahan (opsional)"
                    >{{ old('keterangan') }}</textarea>

                </div>

            </div>

        </div>


        {{-- ===== TOMBOL ===== --}}

        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.tempat.index') }}"
                class="px-4 py-2 text-[12.5px] font-medium rounded-lg text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 transition flex items-center gap-1.5"
            >

                <i data-lucide="x" class="h-3.5 w-3.5"></i>

                Batal

            </a>


            <button
                type="submit"
                class="px-4 py-2 text-[12.5px] font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition flex items-center gap-1.5 shadow-sm"
            >

                <i data-lucide="check" class="h-4 w-4"></i>

                Simpan Data

            </button>

        </div>

    </form>


    {{-- Script diletakkan langsung tanpa @push --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

        });

    </script>

</x-app-layout>