<x-guru-layout>

    <x-slot name="title">
        Dashboard Guru
    </x-slot>

    {{-- HEADER --}}
    <div class="mb-6 sm:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">
            Dashboard Guru
        </h1>

        <p class="text-sm sm:text-base text-slate-400 mt-2">
            Selamat datang, {{ auth()->user()->name ?? 'Guru' }}
        </p>
    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6 mb-6 sm:mb-8">

        {{-- SISWA BIMBINGAN --}}
        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-5 sm:p-6
                    hover:border-indigo-500/50
                    transition-all duration-300
                    hover:-translate-y-1">

            <p class="text-sm text-slate-400 font-medium">
                Siswa Bimbingan
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-indigo-400 mt-2">
                {{ $jumlahSiswa }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Jumlah siswa yang dibimbing
            </p>
        </div>


        {{-- JURNAL --}}
        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-5 sm:p-6
                    hover:border-blue-500/50
                    transition-all duration-300
                    hover:-translate-y-1">

            <p class="text-sm text-slate-400 font-medium">
                Jurnal Masuk
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-blue-400 mt-2">
                {{ $jurnalMasuk }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Jurnal siswa yang perlu diperiksa
            </p>
        </div>


        {{-- PENILAIAN --}}
        <div class="bg-slate-900 border border-slate-800
                    rounded-2xl p-5 sm:p-6
                    hover:border-emerald-500/50
                    transition-all duration-300
                    hover:-translate-y-1
                    sm:col-span-2 lg:col-span-1">

            <p class="text-sm text-slate-400 font-medium">
                Penilaian
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-emerald-400 mt-2">
                {{ $jumlahDinilai }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Siswa yang sudah dinilai
            </p>
        </div>

    </div>


    {{-- INFORMASI --}}
    <div class="bg-slate-900 border border-slate-800
                rounded-2xl p-5 sm:p-6">

        <div class="mb-5 sm:mb-6 border-b border-slate-800 pb-4">

            <h2 class="text-lg sm:text-xl font-bold text-white">
                Informasi Guru
            </h2>

            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Informasi akun guru
            </p>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">

            {{-- NAMA --}}
            <div class="bg-slate-800/40 border border-slate-800
                        rounded-xl p-4 sm:p-5">

                <p class="text-[10px] sm:text-xs text-slate-500 uppercase
                          tracking-wider font-semibold">

                    Nama Lengkap
                </p>

                <p class="text-sm sm:text-base font-medium text-white mt-1 break-words">

                    {{ auth()->user()->name ?? '-' }}

                </p>

            </div>


            {{-- EMAIL --}}
            <div class="bg-slate-800/40 border border-slate-800
                        rounded-xl p-4 sm:p-5">

                <p class="text-[10px] sm:text-xs text-slate-500 uppercase
                          tracking-wider font-semibold">

                    Email
                </p>

                <p class="text-sm sm:text-base font-medium text-white mt-1 break-all">

                    {{ auth()->user()->email ?? '-' }}

                </p>

            </div>


            {{-- ROLE --}}
            <div class="bg-slate-800/40 border border-slate-800
                        rounded-xl p-4 sm:p-5">

                <p class="text-[10px] sm:text-xs text-slate-500 uppercase
                          tracking-wider font-semibold">

                    Role
                </p>

                <span class="inline-flex mt-1 px-3 py-1
                             text-xs font-semibold rounded-full
                             bg-indigo-500/20 text-indigo-400">

                    Guru

                </span>

            </div>


            {{-- STATUS --}}
            <div class="bg-slate-800/40 border border-slate-800
                        rounded-xl p-4 sm:p-5">

                <p class="text-[10px] sm:text-xs text-slate-500 uppercase
                          tracking-wider font-semibold">

                    Status Akun
                </p>

                <span class="inline-flex mt-1 px-3 py-1
                             text-xs font-semibold rounded-full
                             bg-emerald-500/20 text-emerald-400">

                    Aktif

                </span>

            </div>

        </div>

    </div>

</x-guru-layout>
