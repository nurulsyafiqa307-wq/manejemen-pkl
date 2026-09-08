<x-guru-layout>
    <x-slot name="title">
        Profil Saya
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Profil Saya
            </h1>

            <p class="text-slate-600 text-sm mt-1.5 font-medium">
                Kelola informasi akun dan data diri kamu.
            </p>
        </div>


        {{-- PESAN BERHASIL --}}
        @if (session('status') === 'profile-updated')
            <div class="flex items-start sm:items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5 text-emerald-700 text-sm font-medium shadow-xs">
                <svg class="w-5 h-5 shrink-0 mt-0.5 sm:mt-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Profil berhasil diperbarui.</span>
            </div>
        @endif


        {{-- INFORMASI DATA GURU --}}
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-xs">

            {{-- HEADER PROFIL --}}
            <div class="p-5 sm:p-6 bg-white">
                <div class="flex items-center gap-4">
                    {{-- AVATAR --}}
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center text-xl sm:text-2xl font-bold text-white shrink-0 shadow-md">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    {{-- NAMA --}}
                    <div class="min-w-0 flex-1">
                        <h2 class="text-lg sm:text-xl font-bold text-slate-900 truncate">
                            {{ $user->name }}
                        </h2>

                        <div class="flex items-center gap-2 mt-1.5">
                            <span class="inline-flex items-center rounded-full bg-blue-50 border border-blue-200 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                Guru
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            {{-- DETAIL DATA GURU --}}
            <div class="border-t border-slate-200 p-5 sm:p-6 bg-white">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    {{-- NIP --}}
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                            NIP
                        </p>
                        <p class="text-sm font-semibold text-slate-800 mt-1.5 break-all">
                            {{ $guru->nip ?? '-' }}
                        </p>
                    </div>

                    {{-- NO HP --}}
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                            No. HP
                        </p>
                        <p class="text-sm font-semibold text-slate-800 mt-1.5 break-all">
                            {{ $guru->no_hp ?? '-' }}
                        </p>
                    </div>

                    {{-- EMAIL --}}
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 sm:col-span-2">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                            Email
                        </p>
                        <p class="text-sm font-semibold text-slate-800 mt-1.5 break-all">
                            {{ $user->email }}
                        </p>
                    </div>

                </div>
            </div>

        </div>


        {{-- FORM INFORMASI AKUN --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 lg:p-8 shadow-xs">
            @include('profile.partials.update-profile-information-form')
        </div>


        {{-- FORM UBAH PASSWORD --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 lg:p-8 shadow-xs">
            @include('profile.partials.update-password-form')
        </div>

    </div>
</x-guru-layout>