<x-guru-layout>

    <x-slot name="title">
        Penilaian Siswa
    </x-slot>

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Penilaian Siswa
        </h1>

        <p class="text-slate-500 mt-2 text-sm">
            Penilaian siswa selama melaksanakan PKL
        </p>
    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800 text-sm font-medium shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- PESAN ERROR --}}
    @if(session('error'))
        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4 text-rose-800 text-sm font-medium shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- DAFTAR SISWA --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        @forelse($siswas as $siswa)

            <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-slate-300 hover:shadow-md transition-all duration-200">

                {{-- DATA SISWA --}}
                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">
                        <h3 class="text-slate-900 font-bold text-base truncate">
                            {{ $siswa->nama }}
                        </h3>

                        <p class="text-xs text-slate-500 mt-1 font-mono">
                            NIS: {{ $siswa->nis ?? '-' }}
                        </p>

                        <p class="text-xs text-slate-500 mt-0.5 font-medium">
                            {{ $siswa->kelas ?? '-' }}
                            <span class="mx-1 text-slate-300">•</span>
                            {{ $siswa->jurusan ?? '-' }}
                        </p>
                    </div>

                    {{-- STATUS --}}
                    @if($siswa->penilaian)

                        <span class="shrink-0 inline-flex items-center gap-1.5
                            rounded-full bg-emerald-50
                            border border-emerald-200
                            px-3 py-1.5 text-[11px]
                            font-semibold text-emerald-700">

                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                            Sudah Dinilai

                        </span>

                    @else

                        <span class="shrink-0 inline-flex items-center gap-1.5
                            rounded-full bg-amber-50
                            border border-amber-200
                            px-3 py-1.5 text-[11px]
                            font-semibold text-amber-700">

                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

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
                            ? 'from-emerald-600 to-emerald-800'
                            : ($r >= 80
                                ? 'from-blue-600 to-indigo-800'
                                : ($r >= 70
                                    ? 'from-amber-500 to-amber-700'
                                    : 'from-rose-600 to-rose-800'));
                    @endphp

                    <div class="mt-5 p-4 rounded-xl bg-slate-50/80 border border-slate-200/80">

                        <div class="flex items-center justify-between gap-4">

                            {{-- NILAI RATA-RATA --}}
                            <div>
                                <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400">
                                    Rata-rata Nilai
                                </p>

                                <p class="text-2xl font-extrabold text-slate-800 mt-0.5">
                                    {{ number_format($siswa->penilaian->rata_rata, 2) }}
                                </p>
                            </div>

                            {{-- PREDIKAT --}}
                            <div class="text-center">
                                <p class="text-[10px] uppercase tracking-wider font-bold text-slate-400 mb-0.5">
                                    Predikat
                                </p>

                                <span class="text-4xl font-black bg-gradient-to-br {{ $gradeColor }} bg-clip-text text-transparent leading-none">
                                    {{ $grade }}
                                </span>
                            </div>

                            {{-- AKSI --}}
                            <div class="flex flex-wrap justify-end gap-2">

                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('guru.penilaian.show', $siswa->penilaian->id) }}"
                                    class="inline-flex items-center rounded-lg
                                        bg-indigo-50
                                        border border-indigo-200
                                        px-3 py-2
                                        text-xs font-semibold text-indigo-700
                                        hover:bg-indigo-100
                                        transition-colors"
                                >
                                    Lihat Detail
                                </a>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('guru.penilaian.edit', $siswa->penilaian->id) }}"
                                    class="inline-flex items-center rounded-lg
                                        bg-amber-50
                                        border border-amber-200
                                        px-3 py-2
                                        text-xs font-semibold text-amber-700
                                        hover:bg-amber-100
                                        transition-colors"
                                >
                                    Edit
                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('guru.penilaian.destroy', $siswa->penilaian->id) }}"
                                    method="POST"
                                    class="form-delete"
                                    data-confirm-message="Yakin ingin menghapus penilaian siswa ini?"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-lg
                                            bg-rose-50
                                            border border-rose-200
                                            px-3 py-2
                                            text-xs font-semibold text-rose-700
                                            hover:bg-rose-100
                                            transition-colors"
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
                                hover:bg-indigo-700
                                shadow-sm active:scale-[0.98]
                                transition-all duration-200"
                        >
                            + Beri Penilaian
                        </a>
                    </div>

                @endif

            </div>

        @empty

            <div class="lg:col-span-2
                bg-white
                border border-slate-200
                rounded-2xl
                p-10
                text-center shadow-sm">

                <p class="text-slate-500 text-sm font-medium">
                    Belum ada siswa yang menjadi bimbingan Anda.
                </p>

            </div>

        @endforelse

    </div>

    {{-- PAGINATION --}}
    @if($siswas->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $siswas->onEachSide(1)->links() }}
        </div>
    @endif

</x-guru-layout>