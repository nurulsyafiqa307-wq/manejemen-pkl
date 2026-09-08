<x-guru-layout>

    <x-slot:title>Detail Penilaian</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                Detail Penilaian
            </h2>
            <p class="text-[11px] hidden sm:block text-slate-500">
                Hasil penilaian siswa selama PKL
            </p>
        </div>
    </x-slot:header>


    <div class="max-w-3xl mx-auto space-y-5">


        {{-- IDENTITAS SISWA --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 shadow-sm">

            <p class="text-[10px] uppercase tracking-wider font-bold text-indigo-600">
                Siswa PKL
            </p>

            <h1 class="text-xl font-bold text-slate-900 mt-1">
                {{ $penilaian->siswa->nama }}
            </h1>

            <p class="text-xs text-slate-500 mt-1 font-medium">
                NIS: {{ $penilaian->siswa->nis ?? '-' }}
                <span class="mx-1 text-slate-300">•</span>
                {{ $penilaian->siswa->kelas ?? '-' }}
                <span class="mx-1 text-slate-300">•</span>
                {{ $penilaian->siswa->jurusan ?? '-' }}
            </p>

        </div>


        {{-- RATA-RATA --}}
        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-6 text-center shadow-sm">

            <p class="text-xs uppercase tracking-wider font-bold text-indigo-600">
                Nilai Rata-rata
            </p>

            <p class="text-5xl font-extrabold text-indigo-950 mt-2">
                {{ number_format($penilaian->rata_rata, 2) }}
            </p>

            <p class="text-xs text-indigo-500 mt-2 font-medium">
                Dari 5 aspek penilaian
            </p>

        </div>


        {{-- DETAIL NILAI --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 shadow-sm">

            <h2 class="text-base font-bold text-slate-800 mb-5">
                Rincian Penilaian
            </h2>


            @php
                $nilai = [
                    'Disiplin' => $penilaian->disiplin,
                    'Komunikasi' => $penilaian->komunikasi,
                    'Kerja Sama' => $penilaian->kerjasama,
                    'Tanggung Jawab' => $penilaian->tanggung_jawab,
                    'Keterampilan' => $penilaian->keterampilan,
                ];
            @endphp


            <div class="space-y-4">

                @foreach($nilai as $label => $value)

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="text-sm font-medium text-slate-600">
                                {{ $label }}
                            </span>

                            <span class="text-sm font-bold text-slate-900">
                                {{ $value }}
                            </span>

                        </div>

                        <div class="h-2 rounded-full bg-slate-100 overflow-hidden">

                            <div
                                class="h-full rounded-full bg-indigo-600"
                                style="width: {{ $value }}%"
                            ></div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        {{-- CATATAN --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 shadow-sm">

            <h2 class="text-base font-bold text-slate-800 mb-3">
                Catatan Guru
            </h2>

            <div class="rounded-xl bg-slate-50 border border-slate-200/80 p-4">

                <p class="text-sm text-slate-700 leading-7 whitespace-pre-line">
                    {{ $penilaian->catatan ?: 'Tidak ada catatan.' }}
                </p>

            </div>

        </div>


        {{-- AKSI --}}
        <div class="flex flex-wrap gap-3">

            <a
                href="{{ route('guru.penilaian.index') }}"
                class="rounded-xl border border-slate-200 bg-white
                    px-5 py-3 text-sm font-semibold
                    text-slate-700 hover:bg-slate-50 hover:text-indigo-600
                    shadow-sm transition-all duration-200"
            >
                Kembali
            </a>

            <a
                href="{{ route('guru.penilaian.edit', $penilaian->id) }}"
                class="rounded-xl bg-indigo-600
                    px-5 py-3 text-sm font-semibold
                    text-white hover:bg-indigo-700
                    shadow-sm active:scale-[0.98] transition-all duration-200"
            >
                Edit Penilaian
            </a>

        </div>

    </div>

</x-guru-layout>