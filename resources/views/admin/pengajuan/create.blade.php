<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">
                    Tambah Pengajuan PKL
                </h1>
                <p class="text-sm text-slate-500 mt-0.5">
                    Buat pengajuan PKL baru untuk siswa.
                </p>
            </div>
            <a 
                href="{{ route('admin.pengajuan.index') }}"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-all shadow-sm"
            >
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto py-2 pb-8">

        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 sm:p-8 shadow-xl">

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-500/30 bg-rose-500/10 p-4">
                    <div class="flex items-center gap-2 mb-2 text-rose-400 font-semibold text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Data belum bisa disimpan:
                    </div>
                    <ul class="list-disc list-inside text-xs text-rose-300/90 space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('admin.pengajuan.store') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf

                {{-- SISWA --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                        Siswa
                    </label>
                    <select
                        name="siswa_id"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-sm text-slate-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition cursor-pointer"
                    >
                        <option value="">
                            -- Pilih Siswa --
                        </option>

                        @foreach($siswas as $siswa)
                            <option
                                value="{{ $siswa->id }}"
                                {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}
                            >
                                {{ $siswa->nama }}
                            </option>
                        @endforeach
                    </select>

                    @error('siswa_id')
                        <p class="text-xs text-rose-400 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TEMPAT PKL --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                        Tempat PKL
                    </label>
                    <select
                        name="tempat_pkl_id"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-sm text-slate-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition cursor-pointer"
                    >
                        <option value="">
                            -- Pilih Tempat PKL --
                        </option>

                        @foreach($tempatPkls as $tempat)
                            <option
                                value="{{ $tempat->id }}"
                                {{ old('tempat_pkl_id') == $tempat->id ? 'selected' : '' }}
                            >
                                {{ $tempat->nama_perusahaan }}
                            </option>
                        @endforeach
                    </select>

                    @error('tempat_pkl_id')
                        <p class="text-xs text-rose-400 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TANGGAL PENGAJUAN --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                        Tanggal Pengajuan
                    </label>
                    <input
                        type="date"
                        name="tanggal_pengajuan"
                        value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-sm text-slate-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition [color-scheme:dark]"
                    >

                    @error('tanggal_pengajuan')
                        <p class="text-xs text-rose-400 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                        Status Pengajuan
                    </label>
                    <select
                        name="status"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-sm text-slate-100 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition cursor-pointer"
                    >
                        <option
                            value="Menunggu Seleksi"
                            {{ old('status', 'Menunggu Seleksi') == 'Menunggu Seleksi' ? 'selected' : '' }}
                        >
                            Menunggu Seleksi
                        </option>

                        <option
                            value="Lolos"
                            {{ old('status') === 'Lolos' ? 'selected' : '' }}
                        >
                            Lolos
                        </option>

                        <option
                            value="Tidak Lolos"
                            {{ old('status') === 'Tidak Lolos' ? 'selected' : '' }}
                        >
                            Tidak Lolos
                        </option>
                    </select>

                    @error('status')
                        <p class="text-xs text-rose-400 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TOMBOL AKSIONAL --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-700/50">
                    <a
                        href="{{ route('admin.pengajuan.index') }}"
                        class="px-5 py-2.5 rounded-xl bg-slate-700 hover:bg-slate-600 transition text-slate-200 text-sm font-medium"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 transition text-white text-sm font-semibold shadow-lg shadow-blue-500/25 active:scale-[0.98]"
                    >
                        Simpan Pengajuan
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>