<x-siswa-layout>

    <x-slot name="title">
        Dashboard Siswa
    </x-slot>

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white tracking-tight">
            Dashboard Siswa
        </h1>

        <p class="text-slate-400 mt-2">
            Selamat datang, {{ auth()->user()->name ?? 'Siswa' }}
        </p>
    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">


        {{-- STATUS PKL --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6
                    hover:border-yellow-500/50 transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg hover:shadow-yellow-500/10">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-400 font-medium">
                        Status PKL
                    </p>

                    <h2 class="text-2xl font-bold mt-2
                        {{ ($siswa->status_pkl ?? '') === 'Disetujui'
                            ? 'text-emerald-400'
                            : 'text-yellow-400' }}">

                        {{ $siswa->status_pkl ?? 'Belum Mengajukan' }}

                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Status pengajuan saat ini
                    </p>
                </div>

                <div class="bg-yellow-500/10 p-3 rounded-xl shrink-0">

                    <svg class="w-8 h-8 text-yellow-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>

                    </svg>

                </div>

            </div>

        </div>


        {{-- JURNAL HARI INI --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6
                    hover:border-blue-500/50 transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-500/10">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium">
                        Jurnal Hari Ini
                    </p>

                    @if($jurnalHariIni)

                        <h2 class="text-2xl font-bold text-emerald-400 mt-2">
                            Sudah Diisi
                        </h2>

                        <a href="{{ route('siswa.jurnal.index') }}"
                           class="text-xs text-blue-400 mt-1 hover:text-blue-300 hover:underline inline-block">
                            Lihat jurnal
                        </a>

                    @else

                        <h2 class="text-2xl font-bold text-yellow-400 mt-2">
                            Belum Diisi
                        </h2>

                        <a href="{{ route('siswa.jurnal.create') }}"
                           class="text-xs text-blue-400 mt-1 hover:text-blue-300 hover:underline inline-block">
                            Isi sekarang
                        </a>

                    @endif

                </div>


                <div class="bg-blue-500/10 p-3 rounded-xl shrink-0">

                    <svg class="w-8 h-8 text-blue-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>

                    </svg>

                </div>

            </div>

        </div>


        {{-- NILAI --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6
                    hover:border-emerald-500/50 transition-all duration-300
                    hover:-translate-y-1 hover:shadow-lg hover:shadow-emerald-500/10">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-400 font-medium">
                        Nilai PKL
                    </p>

                    <h2 class="text-2xl font-bold text-emerald-400 mt-2">

                        @if($penilaian)
                            {{ number_format($penilaian->rata_rata, 1) }}
                        @else
                            -
                        @endif

                    </h2>

                    <p class="text-xs text-slate-500 mt-1">

                        {{ $penilaian
                            ? 'Nilai terbaru'
                            : 'Belum ada penilaian' }}

                    </p>

                </div>


                <div class="bg-emerald-500/10 p-3 rounded-xl shrink-0">

                    <svg class="w-8 h-8 text-emerald-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>

                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- INFORMASI SISWA & PKL --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">

        <div class="mb-6 border-b border-slate-800 pb-4">

            <h2 class="text-xl font-bold text-white">
                Informasi PKL
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Detail data kegiatan PKL kamu
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


            {{-- NAMA --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Nama Lengkap
                </p>

                <p class="text-base font-medium text-white mt-1">
                    {{ $user->name ?? '-' }}
                </p>

            </div>


            {{-- EMAIL --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Email
                </p>

                <p class="text-base font-medium text-white mt-1 break-all">
                    {{ $user->email ?? '-' }}
                </p>

            </div>


            {{-- NIS --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    NIS
                </p>

                <p class="text-base font-medium text-white mt-1">
                    {{ $siswa->nis ?? '-' }}
                </p>

            </div>


            {{-- KELAS --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Kelas
                </p>

                <p class="text-base font-medium text-white mt-1">
                    {{ $siswa->kelas ?? '-' }}
                </p>

            </div>


            {{-- JURUSAN --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Jurusan
                </p>

                <p class="text-base font-medium text-white mt-1">
                    {{ $siswa->jurusan ?? '-' }}
                </p>

            </div>


            {{-- STATUS --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Status PKL
                </p>

                <span class="inline-block mt-1 px-3 py-1 text-xs font-semibold rounded-full
                    {{ ($siswa->status_pkl ?? '') === 'Disetujui'
                        ? 'bg-emerald-500/20 text-emerald-400'
                        : 'bg-yellow-500/20 text-yellow-400' }}">

                    {{ $siswa->status_pkl ?? 'Belum PKL' }}

                </span>

            </div>


            {{-- TEMPAT PKL --}}
            <div class="bg-slate-800/40 border border-slate-800 rounded-xl p-4 md:col-span-2">

                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    Tempat PKL
                </p>

                <p class="text-base font-medium text-white mt-1">
                    {{ $siswa->tempat_pkl ?? '-' }}
                </p>

            </div>


        </div>

    </div>

</x-siswa-layout>