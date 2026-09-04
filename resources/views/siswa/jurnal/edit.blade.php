<x-siswa-layout>

```
<x-slot name="title">
    Edit Jurnal PKL
</x-slot>

<div class="mb-8">
    <h1 class="text-3xl font-bold text-white">
        Edit Jurnal PKL
    </h1>

    <p class="text-slate-400 mt-2">
        Perbaiki jurnal yang diminta untuk direvisi.
    </p>
</div>

{{-- Pesan error validasi --}}
@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-5 py-4">
        <p class="font-medium text-red-400 mb-2">
            Ada data yang perlu diperbaiki:
        </p>

        <ul class="list-disc list-inside text-sm text-red-300 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-4xl">

    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-6 md:p-8">

        <form
            action="{{ route('siswa.jurnal.update', $jurnal->id_jurnal) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    value="{{ old('tanggal', $jurnal->tanggal) }}"
                    required
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">

                @error('tanggal')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jam --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Jam Masuk
                    </label>

                    <input
                        type="time"
                        name="jam_masuk"
                        value="{{ old('jam_masuk', $jurnal->jam_masuk) }}"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">

                    @error('jam_masuk')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">
                        Jam Pulang
                    </label>

                    <input
                        type="time"
                        name="jam_pulang"
                        value="{{ old('jam_pulang', $jurnal->jam_pulang) }}"
                        required
                        class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">

                    @error('jam_pulang')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Kegiatan --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Kegiatan
                </label>

                <textarea
                    name="kegiatan"
                    rows="5"
                    required
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none resize-none">{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>

                @error('kegiatan')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kendala --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Kendala
                </label>

                <textarea
                    name="kon"
                    rows="4"
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none resize-none"
                    placeholder="Tuliskan kendala yang dialami jika ada...">{{ old('kon', $jurnal->kon) }}</textarea>

                @error('kon')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Solusi --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
                    Solusi
                </label>

                <textarea
                    name="solusi"
                    rows="4"
                    class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none resize-none"
                    placeholder="Tuliskan solusi dari kendala jika ada...">{{ old('solusi', $jurnal->solusi) }}</textarea>

                @error('solusi')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">
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
                            class="w-40 h-40 object-cover rounded-xl border border-slate-700">
                    </div>
                @endif

                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    class="block w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-sm text-slate-300 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-white hover:file:bg-blue-700">

                <p class="text-xs text-slate-500 mt-2">
                    Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.
                </p>

                @error('foto')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Info status --}}
            <div class="rounded-xl border border-yellow-500/20 bg-yellow-500/10 px-4 py-3">
                <p class="text-sm text-yellow-400">
                    Setelah diperbaiki, status jurnal otomatis kembali menjadi
                    <strong>Menunggu Review</strong>.
                </p>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-2">

                <a
                    href="{{ route('siswa.jurnal.index') }}"
                    class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-white font-medium transition">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium transition">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>
```

</x-siswa-layout>
