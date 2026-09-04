<x-guru-layout>

    <x-slot:title>Detail Penilaian</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Detail Penilaian
            </h2>
            <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">
                Hasil penilaian siswa selama PKL
            </p>
        </div>
    </x-slot:header>


    <div class="max-w-3xl mx-auto space-y-5">


        {{-- IDENTITAS SISWA --}}
        <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 sm:p-6">

            <p class="text-[10px] uppercase tracking-wider font-bold text-indigo-400">
                Siswa PKL
            </p>

            <h1 class="text-xl font-bold text-white mt-1">
                {{ $penilaian->siswa->nama }}
            </h1>

            <p class="text-xs text-slate-500 mt-1">
                NIS: {{ $penilaian->siswa->nis ?? '-' }}
                •
                {{ $penilaian->siswa->kelas ?? '-' }}
                •
                {{ $penilaian->siswa->jurusan ?? '-' }}
            </p>

        </div>


        {{-- RATA-RATA --}}
        <div class="bg-indigo-600/10 border border-indigo-500/15 rounded-2xl p-6 text-center">

            <p class="text-xs uppercase tracking-wider font-bold text-indigo-300">
                Nilai Rata-rata
            </p>

            <p class="text-5xl font-bold text-white mt-2">
                {{ number_format($penilaian->rata_rata, 2) }}
            </p>

            <p class="text-xs text-slate-400 mt-2">
                Dari 5 aspek penilaian
            </p>

        </div>


        {{-- DETAIL NILAI --}}
        <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 sm:p-6">

            <h2 class="text-base font-bold text-white mb-5">
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

                            <span class="text-sm text-slate-300">
                                {{ $label }}
                            </span>

                            <span class="text-sm font-bold text-white">
                                {{ $value }}
                            </span>

                        </div>

                        <div class="h-2 rounded-full bg-white/5 overflow-hidden">

                            <div
                                class="h-full rounded-full bg-indigo-500"
                                style="width: {{ $value }}%"
                            ></div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        {{-- CATATAN --}}
        <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 sm:p-6">

            <h2 class="text-base font-bold text-white mb-3">
                Catatan Guru
            </h2>

            <div class="rounded-xl bg-white/[0.02] border border-white/5 p-4">

                <p class="text-sm text-slate-300 leading-7 whitespace-pre-line">
                    {{ $penilaian->catatan ?: 'Tidak ada catatan.' }}
                </p>

            </div>

        </div>


        {{-- AKSI --}}
        <div class="flex flex-wrap gap-3">

            <a
                href="{{ route('guru.penilaian.index') }}"
                class="rounded-xl border border-white/10
                    px-5 py-3 text-sm font-semibold
                    text-slate-300 hover:bg-white/5 transition"
            >
                Kembali
            </a>

            <a
                href="{{ route('guru.penilaian.edit', $penilaian->id) }}"
                class="rounded-xl bg-indigo-600
                    px-5 py-3 text-sm font-semibold
                    text-white hover:bg-indigo-500 transition"
            >
                Edit Penilaian
            </a>

        </div>

    </div>

</x-guru-layout>