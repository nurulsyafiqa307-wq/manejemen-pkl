<x-siswa-layout>
    <x-slot name="title">
        Profil Saya
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6 pb-10">
        
        {{-- Header Section --}}
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">
                Profil Saya
            </h1>
            <p class="text-slate-400 text-sm mt-1">
                Kelola informasi akun dan data diri kamu.
            </p>
        </div>

        {{-- Pesan berhasil --}}
        @if (session('status') === 'profile-updated')
            <div class="flex items-center gap-3 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-emerald-400 text-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Profil berhasil diperbarui.</span>
            </div>
        @endif

        {{-- 1. INFORMASI DATA SISWA --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm">
            {{-- Header Profil Ringkas --}}
            <div class="flex items-center gap-4 pb-6 border-b border-slate-800/80">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-blue-600 flex items-center justify-center text-2xl font-bold text-white shrink-0 shadow-inner">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <h2 class="text-lg sm:text-xl font-bold text-white truncate">
                        {{ $user->name }}
                    </h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20 mt-1">
                        Siswa
                    </span>
                </div>
            </div>

            {{-- Detail Info Grid --}}
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-800/30 border border-slate-800/60">
                    <span class="text-xs font-medium text-slate-400">NIS</span>
                    <span class="font-semibold text-slate-200">{{ $siswa->nis ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-800/30 border border-slate-800/60">
                    <span class="text-xs font-semibold text-slate-400 uppercase">Kelas</span>
                    <span class="font-semibold text-slate-200">{{ $siswa->kelas ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-800/30 border border-slate-800/60">
                    <span class="text-xs font-semibold text-slate-400 uppercase">Jurusan</span>
                    <span class="font-semibold text-slate-200">{{ $siswa->jurusan ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-800/30 border border-slate-800/60">
                    <span class="text-xs font-semibold text-slate-400 uppercase">Status PKL</span>
                    <div>
                        @if($siswa->status_pkl === 'Lolos')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                Lolos
                            </span>
                        @elseif($siswa->status_pkl === 'Tidak Lolos')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-400 border border-red-500/20">
                                Tidak Lolos
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                {{ $siswa->status_pkl ?? 'Belum Mengajukan' }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="sm:col-span-2 flex items-center justify-between p-3 rounded-xl bg-slate-800/30 border border-slate-800/60">
                    <span class="text-xs font-semibold text-slate-400 uppercase">Tempat PKL</span>
                    <span class="font-semibold text-slate-200 truncate max-w-[200px] sm:max-w-xs">
                        {{ $siswa->tempat_pkl ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- 2. FORM INFORMASI AKUN --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- 3. FORM UBAH PASSWORD --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            @include('profile.partials.update-password-form')
        </div>

    </div>
</x-siswa-layout>