<x-siswa-layout>

    <x-slot name="title">
        Isi Jurnal Harian
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">
            Isi Jurnal Harian
        </h1>

        <p class="text-slate-500 mt-2">
            Catat kegiatan PKL kamu hari ini.
        </p>
    </div>


    {{-- Menambahkan mx-auto agar card berada di tengah --}}
    <div class="max-w-4xl mx-auto">

        <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm">

            <form
                action="{{ route('siswa.jurnal.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf


                {{-- Tanggal --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">

                    @error('tanggal')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Jam --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Jam Masuk
                        </label>

                        <input
                            type="time"
                            name="jam_masuk"
                            value="{{ old('jam_masuk') }}"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">

                        @error('jam_masuk')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Jam Pulang
                        </label>

                        <input
                            type="time"
                            name="jam_pulang"
                            value="{{ old('jam_pulang') }}"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">

                        @error('jam_pulang')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Kegiatan --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kegiatan
                    </label>

                    <textarea
                        name="kegiatan"
                        rows="5"
                        required
                        placeholder="Tuliskan kegiatan yang kamu lakukan selama PKL..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none">{{ old('kegiatan') }}</textarea>

                    @error('kegiatan')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Kendala --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kendala
                    </label>

                    <textarea
                        name="kon"
                        rows="4"
                        placeholder="Tuliskan kendala yang kamu alami, jika ada..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none">{{ old('kon') }}</textarea>

                    @error('kon')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Solusi --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Solusi
                    </label>

                    <textarea
                        name="solusi"
                        rows="4"
                        placeholder="Tuliskan solusi dari kendala tersebut, jika ada..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none">{{ old('solusi') }}</textarea>

                    @error('solusi')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Foto --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Foto Kegiatan
                    </label>

                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-white file:font-medium hover:file:bg-blue-700">

                    <p class="text-xs text-slate-500 mt-2">
                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                    </p>

                    @error('foto')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-4">

                    <a
                        href="{{ route('siswa.jurnal.index') }}"
                        class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 border border-slate-200 hover:bg-slate-200 text-slate-700 font-medium transition">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition shadow-sm">
                        Simpan Jurnal
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-siswa-layout>