<x-app-layout>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-white">Detail Penilaian PKL</h1>
            <p class="text-slate-400 mt-1">Hasil penilaian siswa PKL</p>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8">

            <div class="flex items-center justify-between mb-8">

                <div>
                    <h2 class="text-2xl font-bold text-white">
                        {{ $penilaian->siswa->nama }}
                    </h2>
                    <p class="text-slate-400">
                        Penilaian PKL
                    </p>
                </div>

                <div class="text-center">
                    <p class="text-slate-400 text-sm">Rata-rata</p>
                    <h3 class="text-4xl font-bold text-green-400">
                        {{ number_format($penilaian->rata_rata, 2) }}
                    </h3>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div class="bg-slate-900 rounded-xl p-5">
                    <p class="text-slate-400 text-sm">Disiplin</p>
                    <h3 class="text-3xl text-white font-bold">{{ $penilaian->disiplin }}</h3>
                </div>

                <div class="bg-slate-900 rounded-xl p-5">
                    <p class="text-slate-400 text-sm">Komunikasi</p>
                    <h3 class="text-3xl text-white font-bold">{{ $penilaian->komunikasi }}</h3>
                </div>

                <div class="bg-slate-900 rounded-xl p-5">
                    <p class="text-slate-400 text-sm">Kerja Sama</p>
                    <h3 class="text-3xl text-white font-bold">{{ $penilaian->kerjasama }}</h3>
                </div>

                <div class="bg-slate-900 rounded-xl p-5">
                    <p class="text-slate-400 text-sm">Tanggung Jawab</p>
                    <h3 class="text-3xl text-white font-bold">{{ $penilaian->tanggung_jawab }}</h3>
                </div>

                <div class="bg-slate-900 rounded-xl p-5 md:col-span-2">
                    <p class="text-slate-400 text-sm">Keterampilan</p>
                    <h3 class="text-3xl text-white font-bold">{{ $penilaian->keterampilan }}</h3>
                </div>

            </div>

            <div class="mt-8 bg-slate-900 rounded-xl p-5">

                <h3 class="text-white font-semibold mb-3">
                    Catatan Pembimbing
                </h3>

                <p class="text-slate-300 whitespace-pre-line">
                    {{ $penilaian->catatan ?: 'Tidak ada catatan.' }}
                </p>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('admin.penilaian.index') }}"
                   class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 text-white">
                    Kembali
                </a>

                <a href="{{ route('admin.penilaian.edit', $penilaian->id) }}"
                   class="px-5 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white">
                    Edit
                </a>

            </div>

        </div>

    </div>

</x-app-layout>