<x-app-layout>

    <x-slot name="header">
        <div>
            <h1 class="text-3xl font-bold text-white">Detail Pengajuan PKL</h1>
            <p class="text-slate-400 mt-1">Informasi lengkap pengajuan PKL siswa</p>
        </div>
    </x-slot>

    <div class="space-y-6">

        {{-- Status --}}
        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <p class="text-sm text-slate-400">Status Pengajuan</p>

                    @if($pengajuan->status === 'Menunggu Seleksi')

                        <span class="mt-2 inline-flex items-center rounded-full border border-yellow-500/30 bg-yellow-500/10 px-4 py-2 text-yellow-300 text-sm font-medium">
                            Menunggu Seleksi
                        </span>

                    @elseif($pengajuan->status === 'Lolos')

                        <span class="mt-2 inline-flex items-center rounded-full border border-green-500/30 bg-green-500/10 px-4 py-2 text-green-300 text-sm font-medium">
                            Lolos
                        </span>

                    @else

                        <span class="mt-2 inline-flex items-center rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-red-300 text-sm font-medium">
                            Tidak Lolos
                        </span>

                    @endif

                </div>

            </div>

        </div>

        {{-- Informasi --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Data Siswa --}}
            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6">

                <h2 class="text-lg font-semibold text-white mb-5">
                    Data Siswa
                </h2>

                <div class="space-y-5">

                    <div>
                        <p class="text-sm text-slate-400">Nama Siswa</p>
                        <p class="text-white font-medium mt-1">
                            {{ $pengajuan->siswa->nama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-400">Guru Pembimbing</p>
                        <p class="text-white font-medium mt-1">
                            {{ $pengajuan->siswa->guruPembimbing->nama ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- Data Perusahaan --}}
            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6">

                <h2 class="text-lg font-semibold text-white mb-5">
                    Data Perusahaan
                </h2>

                <div class="space-y-5">

                    <div>
                        <p class="text-sm text-slate-400">Nama Perusahaan</p>
                        <p class="text-white font-medium mt-1">
                            {{ $pengajuan->tempatPkl->nama_perusahaan ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

        {{-- Detail PKL --}}
        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6">

            <h2 class="text-lg font-semibold text-white mb-6">
                Detail PKL
            </h2>

            <div>
                <p class="text-sm text-slate-400">Alamat Perusahaan</p>
                <p class="text-white leading-7 mt-2">
                    {{ $pengajuan->tempatPkl->alamat ?? '-' }}
                </p>
            </div>

        </div>

        {{-- Tombol --}}
        <div class="flex justify-start gap-3">

            <a href="{{ route('admin.pengajuan.index') }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition text-white font-medium">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"/>

                </svg>

                Kembali

            </a>

            <a href="{{ route('admin.pengajuan.edit', $pengajuan) }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 transition text-white font-medium shadow-lg shadow-amber-500/20">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>

                </svg>

                Edit Pengajuan

            </a>

        </div>

    </div>

</x-app-layout>