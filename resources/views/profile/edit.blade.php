<x-siswa-layout>
    <x-slot name="title">
        Profil Saya
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6 pb-10">
        
        {{-- Header Section --}}
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold !text-slate-800 tracking-tight">
                Profil Saya
            </h1>
            <p class="!text-slate-500 text-sm mt-1">
                Kelola informasi akun dan data diri kamu.
            </p>
        </div>

        {{-- Pesan berhasil --}}
        @if (session('status') === 'profile-updated')
            <div class="flex items-center gap-3 rounded-xl border border-emerald-200 !bg-emerald-50 px-4 py-3 !text-emerald-700 text-sm">
                <svg class="w-5 h-5 shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Profil berhasil diperbarui.</span>
            </div>
        @endif

        {{-- 1. INFORMASI DATA SISWA --}}
        <div class="!bg-white border border-slate-200 rounded-2xl p-6 shadow-xs">
            {{-- Header Profil Ringkas --}}
            <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-blue-600 flex items-center justify-center text-2xl font-bold !text-white shrink-0 shadow-sm">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <h2 class="text-lg sm:text-xl font-bold !text-slate-800 truncate">
                        {{ $user->name }}
                    </h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold !bg-blue-50 !text-blue-600 border border-blue-200 mt-1">
                        Siswa
                    </span>
                </div>
            </div>

            {{-- Detail Info Grid --}}
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex items-center justify-between p-3.5 rounded-xl !bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold uppercase tracking-wider !text-slate-500">NIS</span>
                    <span class="font-semibold !text-slate-800">{{ $siswa->nis ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3.5 rounded-xl !bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold uppercase tracking-wider !text-slate-500">Kelas</span>
                    <span class="font-semibold !text-slate-800">{{ $siswa->kelas ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3.5 rounded-xl !bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold uppercase tracking-wider !text-slate-500">Jurusan</span>
                    <span class="font-semibold !text-slate-800">{{ $siswa->jurusan ?? '-' }}</span>
                </div>

                <div class="flex items-center justify-between p-3.5 rounded-xl !bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold uppercase tracking-wider !text-slate-500">Status PKL</span>
                    <div>
                        @if($siswa->status_pkl === 'Lolos')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold !bg-emerald-50 !text-emerald-600 border border-emerald-200">
                                Lolos
                            </span>
                        @elseif($siswa->status_pkl === 'Tidak Lolos')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold !bg-rose-50 !text-rose-600 border border-rose-200">
                                Tidak Lolos
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold !bg-amber-50 !text-amber-600 border border-amber-200">
                                {{ $siswa->status_pkl ?? 'Belum Mengajukan' }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="sm:col-span-2 flex items-center justify-between p-3.5 rounded-xl !bg-slate-50 border border-slate-200">
                    <span class="text-xs font-bold uppercase tracking-wider !text-slate-500">Tempat PKL</span>
                    <span class="font-semibold !text-slate-800 truncate max-w-[200px] sm:max-w-xs">
                        {{ $siswa->tempat_pkl ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- 2. FORM INFORMASI AKUN --}}
        <div class="!bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-xs">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- 3. FORM UBAH PASSWORD --}}
        <div class="!bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-xs">
            @include('profile.partials.update-password-form')
        </div>

    </div>
</x-siswa-layout>