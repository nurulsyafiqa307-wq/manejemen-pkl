<x-app-layout>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-white">Tambah Penilaian PKL</h1>
            <p class="text-slate-400 mt-1">Isi nilai siswa PKL</p>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8">

            <form action="{{ route('admin.penilaian.store') }}" method="POST" class="space-y-6">

                @csrf

                {{-- Pilih Siswa --}}
                <div>
                    <label class="block text-slate-300 mb-2">Siswa</label>

                    <select name="siswa_id" required
                        class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">

                        <option value="">Pilih Siswa</option>

                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}"
                                {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Nilai --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @foreach([
                        'disiplin' => 'Disiplin',
                        'komunikasi' => 'Komunikasi',
                        'kerjasama' => 'Kerja Sama',
                        'tanggung_jawab' => 'Tanggung Jawab',
                        'keterampilan' => 'Keterampilan'
                    ] as $field => $label)

                        <div>
                            <label class="block text-slate-300 mb-2">{{ $label }}</label>

                            <input type="number"
                                   name="{{ $field }}"
                                   id="{{ $field }}"
                                   min="0"
                                   max="100"
                                   value="{{ old($field) }}"
                                   required
                                   oninput="hitungRata()"
                                   class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">
                        </div>

                    @endforeach

                </div>

                {{-- Rata-rata --}}
                <div>
                    <label class="block text-slate-300 mb-2">Rata-rata</label>

                    <input type="text"
                           id="rata_rata"
                           readonly
                           class="w-full rounded-xl bg-slate-700 border border-slate-600 text-green-400 font-bold px-4 py-3">
                </div>

                {{-- Catatan --}}
                <div>
                    <label class="block text-slate-300 mb-2">Catatan</label>

                    <textarea name="catatan"
                              rows="4"
                              class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3">{{ old('catatan') }}</textarea>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-3">

                    <a href="{{ route('admin.penilaian.index') }}"
                       class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-white">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">
                        Simpan Penilaian
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        function hitungRata() {
            let fields = [
                'disiplin',
                'komunikasi',
                'kerjasama',
                'tanggung_jawab',
                'keterampilan'
            ];

            let total = 0;
            let isi = 0;

            fields.forEach(f => {
                let v = parseFloat(document.getElementById(f).value);

                if (!isNaN(v)) {
                    total += v;
                    isi++;
                }
            });

            document.getElementById('rata_rata').value =
                isi ? (total / isi).toFixed(2) : '';
        }

        hitungRata();
    </script>

</x-app-layout>