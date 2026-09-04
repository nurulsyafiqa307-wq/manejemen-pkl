<x-app-layout>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-white">
                Edit Pengajuan PKL
            </h1>

            <p class="text-slate-400 mt-1">
                Perbarui data pengajuan PKL siswa.
            </p>
        </div>
    </x-slot>


    <div class="max-w-4xl mx-auto">

        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-8 shadow-xl">

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-5 py-4">

                    <p class="font-semibold text-red-400 mb-2">
                        Data belum bisa disimpan:
                    </p>

                    <ul class="list-disc list-inside text-sm text-red-300 space-y-1">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif


            <form
                action="{{ route('admin.pengajuan.update', $pengajuan) }}"
                method="POST"
                class="space-y-7"
            >

                @csrf
                @method('PUT')


                {{-- SISWA --}}
                <div>

                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Siswa
                    </label>

                    <select
                        name="siswa_id"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition"
                    >

                        @foreach($siswas as $siswa)

                            <option
                                value="{{ $siswa->id }}"
                                {{ old('siswa_id', $pengajuan->siswa_id) == $siswa->id ? 'selected' : '' }}
                            >
                                {{ $siswa->nama }}
                            </option>

                        @endforeach

                    </select>

                    @error('siswa_id')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- TEMPAT PKL --}}
                <div>

                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Tempat PKL
                    </label>

                    <select
                        name="tempat_pkl_id"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition"
                    >

                        @foreach($tempatPkls as $tempat)

                            <option
                                value="{{ $tempat->id }}"
                                {{ old('tempat_pkl_id', $pengajuan->tempat_pkl_id) == $tempat->id ? 'selected' : '' }}
                            >
                                {{ $tempat->nama_perusahaan }}
                            </option>

                        @endforeach

                    </select>

                    @error('tempat_pkl_id')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- TANGGAL PENGAJUAN --}}
                <div>

                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Tanggal Pengajuan
                    </label>

                    <input
                        type="date"
                        name="tanggal_pengajuan"
                        value="{{ old('tanggal_pengajuan', $pengajuan->tanggal_pengajuan) }}"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition"
                    >

                    @error('tanggal_pengajuan')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- STATUS --}}
                <div>

                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Status Pengajuan
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition"
                    >

                        <option
                            value="Menunggu Seleksi"
                            {{ old('status', $pengajuan->status) == 'Menunggu Seleksi' ? 'selected' : '' }}
                        >
                            Menunggu Seleksi
                        </option>

                        <option
                            value="Lolos"
                            {{ old('status', $pengajuan->status) == 'Lolos' ? 'selected' : '' }}
                        >
                            Lolos
                        </option>

                        <option
                            value="Tidak Lolos"
                            {{ old('status', $pengajuan->status) == 'Tidak Lolos' ? 'selected' : '' }}
                        >
                            Tidak Lolos
                        </option>

                    </select>

                    @error('status')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- GURU PEMBIMBING --}}
                <div>

                    <label
                        for="guru_pembimbing_id"
                        class="block text-sm font-medium text-slate-300 mb-2"
                    >
                        Guru Pembimbing
                    </label>

                    <select
                        name="guru_pembimbing_id"
                        id="guru_pembimbing_id"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition"
                    >

                        <option value="">
                            -- Pilih Guru Pembimbing --
                        </option>

                        @foreach($gurus as $guru)

                            <option
                                value="{{ $guru->id }}"
                                {{ old(
                                    'guru_pembimbing_id',
                                    $pengajuan->siswa->guru_pembimbing_id ?? ''
                                ) == $guru->id ? 'selected' : '' }}
                            >
                                {{ $guru->nama }}
                            </option>

                        @endforeach

                    </select>

                    <p class="mt-2 text-xs text-slate-500">
                        Guru pembimbing wajib dipilih jika status pengajuan Lolos.
                    </p>

                    @error('guru_pembimbing_id')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- TOMBOL --}}
                <div class="flex justify-start gap-3 pt-2">

                    <a
                        href="{{ route('admin.pengajuan.index') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition text-white font-medium"
                    >
                        Kembali
                    </a>


                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition text-white font-medium shadow-lg shadow-blue-600/20"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>