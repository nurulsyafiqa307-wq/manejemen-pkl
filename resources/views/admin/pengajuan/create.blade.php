<x-app-layout>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-white">
                Tambah Pengajuan PKL
            </h1>

            <p class="text-slate-400 mt-1">
                Buat pengajuan PKL baru
            </p>
        </div>
    </x-slot>


    <div class="max-w-3xl mx-auto">

        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-8">

            <form
                action="{{ route('admin.pengajuan.store') }}"
                method="POST"
                class="space-y-6">

                @csrf


                {{-- Siswa --}}
                <div>

                    <label class="block text-slate-300 mb-2">
                        Siswa
                    </label>

                    <select
                        name="siswa_id"
                        required
                        class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">

                        <option value="">
                            -- Pilih Siswa --
                        </option>

                        @foreach($siswas as $siswa)

                            <option
                                value="{{ $siswa->id }}"
                                {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>

                                {{ $siswa->nama }}

                            </option>

                        @endforeach

                    </select>

                    @error('siswa_id')
                        <p class="text-red-400 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tempat PKL --}}
                <div>

                    <label class="block text-slate-300 mb-2">
                        Tempat PKL
                    </label>

                    <select
                        name="tempat_pkl_id"
                        required
                        class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">

                        <option value="">
                            -- Pilih Tempat PKL --
                        </option>

                        @foreach($tempatPkls as $tempat)

                            <option
                                value="{{ $tempat->id }}"
                                {{ old('tempat_pkl_id') == $tempat->id ? 'selected' : '' }}>

                                {{ $tempat->nama_perusahaan }}

                            </option>

                        @endforeach

                    </select>

                    @error('tempat_pkl_id')
                        <p class="text-red-400 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tanggal Pengajuan --}}
                <div>

                    <label class="block text-slate-300 mb-2">
                        Tanggal Pengajuan
                    </label>

                    <input
                        type="date"
                        name="tanggal_pengajuan"
                        value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">

                    @error('tanggal_pengajuan')
                        <p class="text-red-400 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Status --}}
                <div>

                    <label class="block text-slate-300 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">

                        <option value="Menunggu Seleksi"
                            {{ old('status', 'Menunggu Seleksi') == 'Menunggu Seleksi' ? 'selected' : '' }}>
                            Menunggu Seleksi
                        </option>

                        <option
                            value="Lolos"
                            {{ old('status') === 'Lolos' ? 'selected' : '' }}>
                            Lolos
                        </option>

                        <option
                            value="Tidak Lolos"
                            {{ old('status') === 'Tidak Lolos' ? 'selected' : '' }}>
                            Tidak Lolos
                        </option>

                    </select>

                    @error('status')
                        <p class="text-red-400 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="flex gap-3 pt-4">

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium">

                        Simpan

                    </button>


                    <a
                        href="{{ route('admin.pengajuan.index') }}"
                        class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-white font-medium">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>