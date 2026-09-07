<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Detail Pengajuan PKL</h1>
                <p class="text-sm text-slate-500 mt-0.5">Informasi lengkap pengajuan PKL siswa</p>
            </div>
            <a 
                href="{{ route('admin.pengajuan.index') }}"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-all shadow-sm"
            >
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6 pb-8">

        {{-- Status Card (Dibuat Menyamping & Ringkas) --}}
        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Status:
                    </span>
                    @if($pengajuan->status === 'Menunggu Seleksi')
                        <span class="inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-4 py-1.5 text-amber-300 text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                            Menunggu Seleksi
                        </span>
                    @elseif($pengajuan->status === 'Lolos')
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-1.5 text-emerald-300 text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Lolos
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 rounded-full border border-rose-500/30 bg-rose-500/10 px-4 py-1.5 text-rose-300 text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                            Tidak Lolos
                        </span>
                    @endif
                </div>

                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span>Tanggal Pengajuan:</span>
                    <span class="font-semibold text-slate-200">
                        {{ $pengajuan->tanggal_pengajuan ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d M Y') : '-' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Grid Data Siswa & Perusahaan --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Data Siswa --}}
            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg space-y-4">
                <div class="flex items-center gap-2 pb-3 border-b border-slate-700/60">
                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <h2 class="text-base font-semibold text-white">Data Siswa</h2>
                </div>

                <div class="space-y-4 pt-1">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Siswa</p>
                        <p class="text-sm font-medium text-slate-100 mt-1">
                            {{ $pengajuan->siswa->nama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Guru Pembimbing</p>
                        <p class="text-sm font-medium text-slate-100 mt-1">
                            {{ $pengajuan->siswa->guruPembimbing->nama ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Data Perusahaan --}}
            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg space-y-4">
                <div class="flex items-center gap-2 pb-3 border-b border-slate-700/60">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h2 class="text-base font-semibold text-white">Data Perusahaan</h2>
                </div>

                <div class="space-y-4 pt-1">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Perusahaan</p>
                        <p class="text-sm font-medium text-slate-100 mt-1">
                            {{ $pengajuan->tempatPkl->nama_perusahaan ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Detail PKL --}}
        <div class="rounded-2xl border border-slate-700 bg-slate-800 p-6 shadow-lg space-y-4">
            <div class="flex items-center gap-2 pb-3 border-b border-slate-700/60">
                <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h2 class="text-base font-semibold text-white">Detail PKL</h2>
            </div>

            <div class="pt-1">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Alamat Perusahaan</p>
                <p class="text-sm text-slate-200 leading-relaxed mt-1">
                    {{ $pengajuan->tempatPkl->alamat ?? '-' }}
                </p>
            </div>
        </div>

        {{-- Tombol Aksional --}}
        <div class="flex items-center justify-end gap-3 pt-2">
            <a 
                href="{{ route('admin.pengajuan.index') }}"
                class="px-5 py-2.5 rounded-xl bg-slate-700 hover:bg-slate-600 transition text-slate-200 text-sm font-medium"
            >
                Kembali
            </a>

            <a 
                href="{{ route('admin.pengajuan.edit', $pengajuan) }}"
                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 transition text-white text-sm font-semibold shadow-lg shadow-amber-500/20 active:scale-[0.98]"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                Edit Pengajuan
            </a>
        </div>

    </div>

</x-app-layout>