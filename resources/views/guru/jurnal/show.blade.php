<x-guru-layout>

<x-slot name="title">
    Detail Jurnal PKL
</x-slot>

{{-- HEADER --}}
<div class="mb-6 sm:mb-8">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[10px] sm:text-xs font-semibold uppercase tracking-[0.15em] text-indigo-400 mb-2">
                Jurnal PKL
            </p>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Detail Jurnal
            </h1>

            <p class="text-sm text-slate-500 mt-1.5">
                Periksa jurnal harian siswa yang kamu bimbing
            </p>
        </div>

        <a
            href="{{ route('guru.jurnal.index') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl
                   border border-slate-800 bg-slate-900/80
                   px-4 py-2.5 text-xs sm:text-sm font-semibold text-slate-300
                   hover:bg-slate-800 hover:text-white
                   transition-all duration-200"
        >
            <span class="text-base leading-none">←</span>
            Kembali
        </a>
    </div>
</div>


{{-- DATA SISWA --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 sm:p-6 mb-5 relative overflow-hidden">

    <div class="absolute -top-16 -right-16 w-40 h-40 rounded-full bg-indigo-600/10 blur-3xl pointer-events-none"></div>

    <div class="relative">
        <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-800/80">
            <div class="w-9 h-9 rounded-xl bg-indigo-500/10 border border-indigo-500/15 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>

            <div>
                <h2 class="text-sm sm:text-base font-bold text-white">
                    Data Siswa
                </h2>
                <p class="text-[11px] text-slate-500 mt-0.5">
                    Informasi siswa pemilik jurnal
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">

            {{-- NAMA SISWA --}}
            <div class="rounded-xl bg-slate-800/35 border border-slate-800/80 p-4">
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    Nama Siswa
                </p>

                <p class="text-white text-sm mt-1.5 font-semibold break-words">
                    {{ $jurnal->siswa->nama ?? '-' }}
                </p>
            </div>

            {{-- NIS --}}
            <div class="rounded-xl bg-slate-800/35 border border-slate-800/80 p-4">
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    NIS
                </p>

                <p class="text-white text-sm mt-1.5 font-semibold break-words">
                    {{ $jurnal->siswa->nis ?? '-' }}
                </p>
            </div>

        </div>
    </div>
</div>


{{-- DETAIL JURNAL --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 sm:p-6 mb-5 relative overflow-hidden">

    <div class="absolute -top-16 -right-16 w-40 h-40 rounded-full bg-blue-600/8 blur-3xl pointer-events-none"></div>

    <div class="relative">

        <div class="flex items-center gap-3 mb-5 pb-4 border-b border-slate-800/80">
            <div class="w-9 h-9 rounded-xl bg-blue-500/10 border border-blue-500/15 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>

            <div>
                <h2 class="text-sm sm:text-base font-bold text-white">
                    Detail Jurnal
                </h2>
                <p class="text-[11px] text-slate-500 mt-0.5">
                    Isi jurnal harian siswa
                </p>
            </div>
        </div>


        <div class="space-y-5">

            {{-- TANGGAL --}}
            <div>
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    Tanggal
                </p>

                <div class="mt-2 inline-flex items-center rounded-lg bg-slate-800/60 border border-slate-800 px-3 py-2">
                    <p class="text-white text-sm font-medium">
                        {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}
                    </p>
                </div>
            </div>


            {{-- JAM --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">

                <div class="rounded-xl bg-slate-800/35 border border-slate-800/80 p-4">
                    <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                        Jam Masuk
                    </p>

                    <p class="text-white text-sm mt-1.5 font-medium">
                        {{ $jurnal->jam_masuk ?? '-' }}
                    </p>
                </div>

                <div class="rounded-xl bg-slate-800/35 border border-slate-800/80 p-4">
                    <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                        Jam Pulang
                    </p>

                    <p class="text-white text-sm mt-1.5 font-medium">
                        {{ $jurnal->jam_pulang ?? '-' }}
                    </p>
                </div>

            </div>


            {{-- KEGIATAN --}}
            <div>
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    Kegiatan
                </p>

                <div class="mt-2 rounded-xl bg-slate-800/30 border border-slate-800/80 p-4 sm:p-5">
                    <p class="text-slate-300 text-sm leading-7 whitespace-pre-line break-words">
                        {{ $jurnal->kegiatan ?? '-' }}
                    </p>
                </div>
            </div>


            {{-- KENDALA --}}
            <div>
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    Kendala
                </p>

                <div class="mt-2 rounded-xl bg-slate-800/30 border border-slate-800/80 p-4 sm:p-5">
                    <p class="text-slate-300 text-sm leading-7 whitespace-pre-line break-words">
                        {{ $jurnal->kon ?: 'Tidak ada kendala.' }}
                    </p>
                </div>
            </div>


            {{-- SOLUSI --}}
            <div>
                <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold">
                    Solusi
                </p>

                <div class="mt-2 rounded-xl bg-slate-800/30 border border-slate-800/80 p-4 sm:p-5">
                    <p class="text-slate-300 text-sm leading-7 whitespace-pre-line break-words">
                        {{ $jurnal->solusi ?: 'Tidak ada solusi.' }}
                    </p>
                </div>
            </div>


            {{-- FOTO --}}
            @if($jurnal->foto)
                <div>
                    <p class="text-[10px] text-slate-500 uppercase tracking-[0.15em] font-bold mb-2">
                        Foto Kegiatan
                    </p>

                    <div class="rounded-xl bg-slate-800/30 border border-slate-800/80 p-3 sm:p-4">
                        <img
                            src="{{ asset('storage/' . $jurnal->foto) }}"
                            alt="Foto kegiatan jurnal"
                            class="w-full max-w-lg rounded-xl border border-slate-700/70 object-cover"
                        >
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>


{{-- REVIEW JURNAL --}}
@if($jurnal->status_jurnal === 'Menunggu Review')

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden">

        <div class="absolute -bottom-16 -left-16 w-40 h-40 rounded-full bg-indigo-600/8 blur-3xl pointer-events-none"></div>

        <div class="relative">

            <div class="mb-5 pb-4 border-b border-slate-800/80">
                <h2 class="text-sm sm:text-base font-bold text-white">
                    Review Jurnal
                </h2>

                <p class="text-xs text-slate-500 mt-1">
                    Setelah memeriksa isi jurnal di atas, tentukan hasil review.
                </p>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                {{-- SETUJUI --}}
                <form
                    action="{{ route('guru.jurnal.update', $jurnal->id_jurnal) }}"
                    method="POST"
                    class="w-full"
                >
                    @csrf
                    @method('PUT')

                    <input
                        type="hidden"
                        name="status_jurnal"
                        value="Disetujui"
                    >

                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center gap-2
                               rounded-xl bg-emerald-600
                               px-5 py-3
                               text-sm text-white font-semibold
                               hover:bg-emerald-500
                               active:scale-[0.98]
                               transition-all duration-200
                               shadow-lg shadow-emerald-600/10"
                    >
                        <span class="text-base">✓</span>
                        Setujui Jurnal
                    </button>
                </form>


                {{-- PERLU REVISI --}}
                <form
                    action="{{ route('guru.jurnal.update', $jurnal->id_jurnal) }}"
                    method="POST"
                    class="w-full"
                >
                    @csrf
                    @method('PUT')

                    <input
                        type="hidden"
                        name="status_jurnal"
                        value="Perlu Revisi"
                    >

                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center gap-2
                               rounded-xl bg-red-600
                               px-5 py-3
                               text-sm text-white font-semibold
                               hover:bg-red-500
                               active:scale-[0.98]
                               transition-all duration-200
                               shadow-lg shadow-red-600/10"
                    >
                        <span class="text-base">✕</span>
                        Perlu Revisi
                    </button>
                </form>

            </div>
        </div>
    </div>


@else

    {{-- HASIL REVIEW --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden">

        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full blur-3xl
            @if($jurnal->status_jurnal === 'Disetujui')
                bg-green-600/8
            @else
                bg-red-600/8
            @endif
        "></div>

        <div class="relative">

            <div class="mb-4">
                <h2 class="text-sm sm:text-base font-bold text-white">
                    Hasil Review
                </h2>

                <p class="text-xs text-slate-500 mt-1">
                    Status jurnal setelah dilakukan pemeriksaan.
                </p>
            </div>

            @if($jurnal->status_jurnal === 'Disetujui')

                <span class="inline-flex items-center gap-2 rounded-full
                    bg-green-500/10 px-4 py-2.5
                    text-xs font-semibold text-green-400
                    border border-green-500/15"
                >
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                    Jurnal Disetujui
                </span>

            @elseif($jurnal->status_jurnal === 'Perlu Revisi')

                <span class="inline-flex items-center gap-2 rounded-full
                    bg-red-500/10 px-4 py-2.5
                    text-xs font-semibold text-red-400
                    border border-red-500/15"
                >
                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                    Jurnal Perlu Revisi
                </span>

            @endif

        </div>
    </div>

@endif


{{-- KEMBALI --}}
<div class="mt-5 pb-2">
    <a
        href="{{ route('guru.jurnal.index') }}"
        class="inline-flex items-center justify-center gap-2
               rounded-xl bg-slate-800
               border border-slate-700/70
               px-5 py-3
               text-white text-sm font-medium
               hover:bg-slate-700
               transition-all duration-200"
    >
        ← Kembali ke Jurnal
    </a>
</div>


</x-guru-layout>
