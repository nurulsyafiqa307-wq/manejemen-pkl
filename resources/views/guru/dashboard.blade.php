<x-guru-layout>

    <x-slot name="title">
        Dashboard Guru
    </x-slot>

    {{-- HEADER --}}
    <div class="mb-6 sm:mb-8">

        <h1 class="text-2xl sm:text-3xl font-bold text-slate-800 tracking-tight">
            Dashboard Guru
        </h1>

        <p class="text-sm sm:text-base text-slate-500 mt-2">
            Selamat datang, {{ auth()->user()->name ?? 'Guru' }}
        </p>

    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6 mb-6 sm:mb-8">

        {{-- SISWA BIMBINGAN --}}
        <div
            class="bg-white border border-slate-200
                   rounded-2xl p-5 sm:p-6
                   hover:border-blue-300
                   transition-all duration-300
                   hover:-translate-y-1
                   shadow-sm"
        >

            <p class="text-sm text-slate-500 font-medium">
                Siswa Bimbingan
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-blue-600 mt-2">
                {{ $jumlahSiswa }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Jumlah siswa yang dibimbing
            </p>

        </div>


        {{-- JURNAL --}}
        <div
            class="bg-white border border-slate-200
                   rounded-2xl p-5 sm:p-6
                   hover:border-blue-300
                   transition-all duration-300
                   hover:-translate-y-1
                   shadow-sm"
        >

            <p class="text-sm text-slate-500 font-medium">
                Jurnal Masuk
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-blue-600 mt-2">
                {{ $jurnalMasuk }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Jurnal siswa yang perlu diperiksa
            </p>

        </div>


        {{-- PENILAIAN --}}
        <div
            class="bg-white border border-slate-200
                   rounded-2xl p-5 sm:p-6
                   hover:border-emerald-300
                   transition-all duration-300
                   hover:-translate-y-1
                   shadow-sm
                   sm:col-span-2 lg:col-span-1"
        >

            <p class="text-sm text-slate-500 font-medium">
                Penilaian
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold text-emerald-600 mt-2">
                {{ $jumlahDinilai }}
            </h2>

            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Siswa yang sudah dinilai
            </p>

        </div>

    </div>


    {{-- INFORMASI --}}
    <div
        class="bg-white border border-slate-200
               rounded-2xl p-5 sm:p-6
               shadow-sm"
    >

        <div class="mb-5 sm:mb-6 border-b border-slate-200 pb-4">

            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                Informasi Guru
            </h2>

            <p class="text-xs sm:text-sm text-slate-400 mt-1">
                Informasi akun guru
            </p>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">

            {{-- NAMA --}}
            <div
                class="bg-slate-50 border border-slate-200
                       rounded-xl p-4 sm:p-5"
            >

                <p
                    class="text-[10px] sm:text-xs text-slate-400 uppercase
                           tracking-wider font-semibold"
                >
                    Nama Lengkap
                </p>

                <p
                    class="text-sm sm:text-base
                           font-medium text-slate-800
                           mt-1 break-words"
                >
                    {{ auth()->user()->name ?? '-' }}
                </p>

            </div>


            {{-- EMAIL --}}
            <div
                class="bg-slate-50 border border-slate-200
                       rounded-xl p-4 sm:p-5"
            >

                <p
                    class="text-[10px] sm:text-xs text-slate-400 uppercase
                           tracking-wider font-semibold"
                >
                    Email
                </p>

                <p
                    class="text-sm sm:text-base
                           font-medium text-slate-800
                           mt-1 break-all"
                >
                    {{ auth()->user()->email ?? '-' }}
                </p>

            </div>


            {{-- ROLE --}}
            <div
                class="bg-slate-50 border border-slate-200
                       rounded-xl p-4 sm:p-5"
            >

                <p
                    class="text-[10px] sm:text-xs text-slate-400 uppercase
                           tracking-wider font-semibold"
                >
                    Role
                </p>

                <span
                    class="inline-flex mt-1 px-3 py-1
                           text-xs font-semibold rounded-full
                           bg-blue-50 text-blue-600
                           border border-blue-100"
                >
                    Guru
                </span>

            </div>


            {{-- STATUS --}}
            <div
                class="bg-slate-50 border border-slate-200
                       rounded-xl p-4 sm:p-5"
            >

                <p
                    class="text-[10px] sm:text-xs text-slate-400 uppercase
                           tracking-wider font-semibold"
                >
                    Status Akun
                </p>

                <span
                    class="inline-flex mt-1 px-3 py-1
                           text-xs font-semibold rounded-full
                           bg-emerald-50 text-emerald-600
                           border border-emerald-100"
                >
                    Aktif
                </span>

            </div>

        </div>

    </div>

</x-guru-layout>