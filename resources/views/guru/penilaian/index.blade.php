<x-guru-layout>

    <x-slot name="title">
        Penilaian Siswa
    </x-slot>

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-2xl sm:text-3xl font-extrabold header-title tracking-tight">
            Penilaian Siswa
        </h1>

        <p class="text-slate-500 mt-2 text-sm">
            Penilaian siswa selama melaksanakan PKL
        </p>

    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))

        <div class="mb-6 rounded-xl border border-green-500/15 bg-green-500/5 px-5 py-4 text-green-400 text-sm">
            {{ session('success') }}
        </div>

    @endif

    {{-- PESAN ERROR --}}
    @if(session('error'))

        <div class="mb-6 rounded-xl border border-red-500/15 bg-red-500/5 px-5 py-4 text-red-400 text-sm">
            {{ session('error') }}
        </div>

    @endif

    {{-- DAFTAR SISWA --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        @forelse($siswas as $siswa)

            <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 hover:bg-white/[0.04] transition">

                {{-- DATA SISWA --}}
                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <h3 class="text-white font-semibold truncate">
                            {{ $siswa->nama }}
                        </h3>

                        <p class="text-xs text-slate-500 mt-1">
                            NIS: {{ $siswa->nis ?? '-' }}
                        </p>

                        <p class="text-xs text-slate-500">
                            {{ $siswa->kelas ?? '-' }}
                            •
                            {{ $siswa->jurusan ?? '-' }}
                        </p>

                    </div>

                    {{-- STATUS --}}
                    @if($siswa->penilaian)

                        <span class="shrink-0 inline-flex items-center gap-1.5
                            rounded-full bg-emerald-500/10
                            border border-emerald-500/15
                            px-3 py-1.5 text-[11px]
                            font-semibold text-emerald-400">

                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>

                            Sudah Dinilai

                        </span>

                    @else

                        <span class="shrink-0 inline-flex items-center gap-1.5
                            rounded-full bg-amber-500/10
                            border border-amber-500/15
                            px-3 py-1.5 text-[11px]
                            font-semibold text-amber-400">

                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>

                            Belum Dinilai

                        </span>

                    @endif

                </div>


                {{-- JIKA SUDAH DINILAI --}}
                @if($siswa->penilaian)

                    @php
                        $r = $siswa->penilaian->rata_rata;

                        $grade = $r >= 90
                            ? 'A'
                            : ($r >= 80
                                ? 'B'
                                : ($r >= 70
                                    ? 'C'
                                    : ($r >= 60 ? 'D' : 'E')));

                        $gradeColor = $r >= 90
                            ? 'from-emerald-400 to-emerald-600'
                            : ($r >= 80
                                ? 'from-blue-400 to-indigo-600'
                                : ($r >= 70
                                    ? 'from-yellow-400 to-amber-600'
                                    : 'from-red-400 to-red-600'));
                    @endphp

                    <div class="mt-5 p-4 rounded-xl bg-white/[0.02] border border-white/5">

                        <div class="flex items-center justify-between gap-4">

                            {{-- NILAI RATA-RATA --}}
                            <div>

                                <p class="text-[10px] uppercase tracking-wider font-bold text-slate-500">
                                    Rata-rata Nilai
                                </p>

                                <p class="text-2xl font-bold text-white mt-1">
                                    {{ number_format($siswa->penilaian->rata_rata, 2) }}
                                </p>

                            </div>

                            {{-- PREDIKAT --}}
                            <div class="text-center">

                                <p class="text-[10px] uppercase tracking-wider font-bold text-slate-500 mb-1">
                                    Predikat
                                </p>

                                <span class="text-4xl font-extrabold bg-gradient-to-br {{ $gradeColor }} bg-clip-text text-transparent leading-none">
                                    {{ $grade }}
                                </span>

                            </div>

                            {{-- AKSI --}}
                            <div class="flex flex-wrap justify-end gap-2">

                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('guru.penilaian.show', $siswa->penilaian->id) }}"
                                    class="inline-flex items-center rounded-lg
                                        bg-indigo-500/10
                                        border border-indigo-500/15
                                        px-3 py-2
                                        text-xs font-semibold text-indigo-400
                                        hover:bg-indigo-500/20
                                        transition"
                                >
                                    Lihat Detail
                                </a>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('guru.penilaian.edit', $siswa->penilaian->id) }}"
                                    class="inline-flex items-center rounded-lg
                                        bg-yellow-500/10
                                        border border-yellow-500/15
                                        px-3 py-2
                                        text-xs font-semibold text-yellow-400
                                        hover:bg-yellow-500/20
                                        transition"
                                >
                                    Edit
                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('guru.penilaian.destroy', $siswa->penilaian->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus penilaian siswa ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-lg
                                            bg-red-500/10
                                            border border-red-500/15
                                            px-3 py-2
                                            text-xs font-semibold text-red-400
                                            hover:bg-red-500/20
                                            transition"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                {{-- JIKA BELUM DINILAI --}}
                @else

                    <div class="mt-5">

                        <a
                            href="{{ route('guru.penilaian.create', $siswa->id) }}"
                            class="inline-flex items-center gap-2 rounded-xl
                                bg-indigo-600
                                px-4 py-2.5
                                text-xs font-semibold text-white
                                hover:bg-indigo-500
                                transition"
                        >
                            + Beri Penilaian
                        </a>

                    </div>

                @endif

            </div>

        @empty

            <div class="lg:col-span-2
                bg-white/[0.02]
                border border-white/5
                rounded-2xl
                p-10
                text-center">

                <p class="text-slate-400 text-sm">
                    Belum ada siswa yang menjadi bimbingan Anda.
                </p>

            </div>

        @endforelse

    </div>

</x-guru-layout>