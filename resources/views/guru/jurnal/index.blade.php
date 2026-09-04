<x-guru-layout>

    <x-slot name="title">
        Jurnal PKL
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-indigo-500/10 border border-indigo-500/20">
                <svg class="h-4 w-4 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <div>
                <h2 class="text-sm lg:text-base font-bold text-white" translate="no">Jurnal PKL</h2>
                <p class="text-xs text-slate-400 hidden sm:block">
                    Jurnal harian siswa yang Anda bimbing
                </p>
            </div>
        </div>
    </x-slot>

    {{-- HEADER KONTEN --}}
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <div class="hidden sm:flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-500/10 border border-indigo-500/20 shadow-inner">
                <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-white tracking-tight">
                    Monitoring Jurnal PKL
                </h1>
                <p class="text-slate-400 mt-0.5 text-xs sm:text-sm">
                    Tinjau dan berikan ulasan pada aktivitas harian siswa bimbingan.
                </p>
            </div>
        </div>
    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3.5">
            <svg class="h-5 w-5 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-emerald-300 text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    {{-- PESAN ERROR --}}
    @if(session('error'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-rose-500/20 bg-rose-500/10 px-4 py-3.5">
            <svg class="h-5 w-5 text-rose-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <p class="text-rose-300 text-sm font-medium">{{ session('error') }}</p>
        </div>
    @endif

    {{-- MAIN CONTAINER --}}
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 backdrop-blur-xl shadow-xl overflow-hidden">

        {{-- BAR PENCARIAN & FILTER --}}
        <div class="p-4 sm:p-5 border-b border-slate-800/80 bg-slate-900/40">
            <form method="GET" action="{{ route('guru.jurnal.index') }}">
                <div class="flex flex-col sm:flex-row gap-3">
                    
                    {{-- INPUT SEARCH --}}
                    <div class="relative flex-1">
                        <svg class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Cari nama siswa, NIS, atau tanggal kegiatan..."
                            class="w-full rounded-xl border border-slate-700/60 bg-slate-950/50 pl-10 pr-4 py-2.5 text-sm text-slate-200 placeholder:text-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-all duration-200"
                        >
                    </div>

                    {{-- TOMBOL CARI + RESET --}}
                    <div class="flex gap-2.5">
                        <button
                            type="submit"
                            class="inline-flex flex-1 sm:flex-none items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-indigo-600/20 hover:bg-indigo-500 active:scale-[0.98] transition-all duration-150"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m20 20-4-4"></path>
                            </svg>
                            Cari
                        </button>

                        @if($search ?? false)
                            <a
                                href="{{ route('guru.jurnal.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-800/50 px-4 py-2.5 text-sm font-semibold text-slate-300 hover:bg-slate-700 hover:text-white active:scale-[0.98] transition-all duration-150"
                            >
                                Reset
                            </a>
                        @endif
                    </div>

                </div>
            </form>
        </div>

        {{-- SUB-HEADER DATA --}}
        <div class="px-5 py-3.5 border-b border-slate-800/60 bg-slate-900/20 flex flex-wrap items-center justify-between gap-2">
            <div>
                <span class="text-xs font-medium text-slate-400">Total data ditemukan:</span>
                <span class="text-xs font-bold text-indigo-400 ml-1">{{ $jurnals->total() ?? $jurnals->count() }} Jurnal</span>
            </div>

            @if($search ?? false)
                <div class="inline-flex items-center gap-1.5 rounded-md bg-indigo-500/10 border border-indigo-500/20 px-2.5 py-1 text-xs">
                    <span class="text-slate-400">Pencarian:</span>
                    <span class="text-indigo-300 font-medium truncate max-w-[150px]">"{{ $search }}"</span>
                </div>
            @endif
        </div>

        {{-- CONTENT AREA --}}
        @if($jurnals->count())

            {{-- TABEL DESKTOP --}}
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 bg-slate-900/80 text-slate-400">
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold" translate="no">Siswa</th>
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold" translate="no">Tanggal</th>
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold" translate="no">Waktu Aktivitas</th>
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold" translate="no">Kegiatan</th>
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold" translate="no">Status</th>
                            <th class="px-6 py-3.5 text-[11px] uppercase tracking-wider font-semibold text-right" translate="no">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($jurnals as $jurnal)
                            <tr class="hover:bg-slate-800/40 transition-colors duration-150">

                                {{-- SISWA --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-indigo-500/15 border border-indigo-500/30 text-xs font-bold text-indigo-300">
                                            {{ strtoupper(substr($jurnal->siswa->nama ?? '-', 0, 1)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-medium text-slate-100 truncate max-w-[180px]">
                                                {{ $jurnal->siswa->nama ?? '-' }}
                                            </p>
                                            <p class="text-xs text-slate-400 mt-0.5">
                                                NIS: <span class="text-slate-300 font-mono">{{ $jurnal->siswa->nis ?? '-' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- TANGGAL --}}
                                <td class="px-6 py-4 whitespace-nowrap" translate="no">
                                    <span class="inline-flex items-center gap-1.5 text-slate-300 font-mono text-xs">
                                        <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}
                                    </span>
                                </td>

                                {{-- JAM --}}
                                <td class="px-6 py-4 whitespace-nowrap" translate="no">
                                    <span class="inline-flex items-center gap-1.5 rounded-md bg-slate-950/60 border border-slate-800 px-2.5 py-1 text-xs text-slate-300 font-mono">
                                        <svg class="w-3 h-3 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $jurnal->jam_masuk }} - {{ $jurnal->jam_pulang }}
                                    </span>
                                </td>

                                {{-- KEGIATAN --}}
                                <td class="px-6 py-4">
                                    <p class="text-slate-300 max-w-[220px] xl:max-w-xs text-xs leading-relaxed line-clamp-2" title="{{ $jurnal->kegiatan }}">
                                        {{ $jurnal->kegiatan }}
                                    </p>
                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-4">
                                    @if($jurnal->status_jurnal === 'Disetujui')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 text-xs font-medium text-emerald-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                            Disetujui
                                        </span>
                                    @elseif($jurnal->status_jurnal === 'Perlu Revisi')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-500/10 border border-rose-500/20 px-2.5 py-1 text-xs font-medium text-rose-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-rose-400"></span>
                                            Perlu Revisi
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 text-xs font-medium text-amber-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                            Menunggu Review
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4 text-right">
                                    <a
                                        href="{{ route('guru.jurnal.show', $jurnal->id_jurnal) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg bg-indigo-500/10 border border-indigo-500/20 px-3 py-1.5 text-xs font-medium text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-150"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Lihat Detail
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- TAMPILAN MOBILE --}}
            <div class="md:hidden divide-y divide-slate-800/60">
                @foreach($jurnals as $jurnal)
                    <div class="p-4 space-y-3">

                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-indigo-500/15 border border-indigo-500/30 text-xs font-bold text-indigo-300">
                                    {{ strtoupper(substr($jurnal->siswa->nama ?? '-', 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-sm font-medium text-slate-100 truncate">
                                        {{ $jurnal->siswa->nama ?? '-' }}
                                    </h3>
                                    <p class="text-xs text-slate-400 mt-0.5">
                                        NIS: <span class="text-slate-300 font-mono">{{ $jurnal->siswa->nis ?? '-' }}</span>
                                    </p>
                                </div>
                            </div>

                            @if($jurnal->status_jurnal === 'Disetujui')
                                <span class="shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 text-[11px] font-medium text-emerald-400">
                                    Disetujui
                                </span>
                            @elseif($jurnal->status_jurnal === 'Perlu Revisi')
                                <span class="shrink-0 inline-flex items-center gap-1 rounded-full bg-rose-500/10 border border-rose-500/20 px-2 py-0.5 text-[11px] font-medium text-rose-400">
                                    Perlu Revisi
                                </span>
                            @else
                                <span class="shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-500/10 border border-amber-500/20 px-2 py-0.5 text-[11px] font-medium text-amber-400">
                                    Review
                                </span>
                            @endif
                        </div>

                        <div class="rounded-lg bg-slate-950/40 border border-slate-800/60 p-3 space-y-2 text-xs" translate="no">
                            <div class="flex justify-between">
                                <span class="text-slate-400">Tanggal</span>
                                <span class="text-slate-200 font-mono">{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Jam Kerja</span>
                                <span class="text-slate-200 font-mono">{{ $jurnal->jam_masuk }} - {{ $jurnal->jam_pulang }}</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-[11px] text-slate-400 mb-1">Kegiatan:</p>
                            <p class="text-xs text-slate-300 leading-relaxed bg-slate-950/20 p-2.5 rounded-lg border border-slate-800/40">
                                {{ $jurnal->kegiatan }}
                            </p>
                        </div>

                        <a
                            href="{{ route('guru.jurnal.show', $jurnal->id_jurnal) }}"
                            class="inline-flex items-center justify-center gap-1.5 w-full rounded-lg bg-indigo-500/10 border border-indigo-500/20 px-4 py-2 text-xs font-semibold text-indigo-300 hover:bg-indigo-600 hover:text-white transition-all duration-150"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lihat Detail
                        </a>

                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            @if($jurnals->hasPages())
                <div class="px-5 py-4 border-t border-slate-800">
                    {{ $jurnals->onEachSide(1)->links() }}
                </div>
            @endif

        @else

            {{-- DATA KOSONG --}}
            <div class="px-6 py-16 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-800/60 border border-slate-700/50">
                    <svg class="h-7 w-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                    </svg>
                </div>

                @if($search ?? false)
                    <p class="font-semibold text-slate-200 text-sm">Jurnal Tidak Ditemukan</p>
                    <p class="mt-1 text-xs text-slate-400 max-w-xs mx-auto">
                        Tidak ada catatan jurnal yang cocok dengan kata kunci "{{ $search }}".
                    </p>
                    <a
                        href="{{ route('guru.jurnal.index') }}"
                        class="inline-flex items-center gap-2 mt-4 rounded-xl bg-indigo-600 px-4 py-2 text-xs font-semibold text-white shadow-md hover:bg-indigo-500 transition-all duration-150"
                    >
                        Reset Pencarian
                    </a>
                @else
                    <p class="font-semibold text-slate-200 text-sm">Belum Ada Jurnal</p>
                    <p class="mt-1 text-xs text-slate-400 max-w-xs mx-auto">
                        Siswa bimbingan Anda belum mengirimkan laporan jurnal PKL.
                    </p>
                @endif
            </div>

        @endif

    </div>

</x-guru-layout>