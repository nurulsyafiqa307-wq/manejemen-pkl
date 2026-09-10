<x-siswa-layout>

    <x-slot name="title">
        Edit Jurnal PKL
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">
            Edit Jurnal PKL
        </h1>

        <p class="text-slate-500 mt-2">
            Perbaiki jurnal yang diminta untuk direvisi.
        </p>
    </div>


    {{-- Pesan error validasi --}}
    @if ($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 max-w-4xl mx-auto">

            <p class="font-medium text-red-700 mb-2">
                Ada data yang perlu diperbaiki:
            </p>

            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Menambahkan mx-auto agar posisi card tepat di tengah --}}
    <div class="max-w-4xl mx-auto">

        <div class="rounded-2xl border border-slate-200 bg-white p-6 md:p-8 shadow-sm">

            <form
                action="{{ route('siswa.jurnal.update', $jurnal->id_jurnal) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')


                {{-- Tanggal --}}
                <div>

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $jurnal->tanggal) }}"
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
                            value="{{ old('jam_masuk', $jurnal->jam_masuk) }}"
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
                            value="{{ old('jam_pulang', $jurnal->jam_pulang) }}"
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
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none">{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>

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
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none"
                        placeholder="Tuliskan kendala yang dialami jika ada...">{{ old('kon', $jurnal->kon) }}</textarea>

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
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none"
                        placeholder="Tuliskan solusi dari kendala jika ada...">{{ old('solusi', $jurnal->solusi) }}</textarea>

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

                    @if($jurnal->foto)

                        <div class="mb-4">

                            <p class="text-xs text-slate-500 mb-2">
                                Foto sebelumnya:
                            </p>

                            <img
                                src="{{ asset('storage/' . $jurnal->foto) }}"
                                alt="Foto jurnal"
                                class="w-40 h-40 object-cover rounded-xl border border-slate-200 shadow-sm">

                        </div>

                    @endif


                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-white hover:file:bg-blue-700">

                    <p class="text-xs text-slate-500 mt-2">
                        Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.
                    </p>

                    @error('foto')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Info status --}}
                <div class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-3">

                    <p class="text-sm text-yellow-700">
                        Setelah diperbaiki, status jurnal otomatis kembali menjadi
                        <strong>Menunggu Review</strong>.
                    </p>

                </div>


                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-2">

                    <a
                        href="{{ route('siswa.jurnal.index') }}"
                        class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-slate-100 border border-slate-200 hover:bg-slate-200 text-slate-700 font-medium transition">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium transition shadow-sm">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-siswa-layout>