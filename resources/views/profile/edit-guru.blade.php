<x-guru-layout>

    <x-slot name="title">
        Profil Saya
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Profil Saya
            </h1>

            <p class="text-slate-500 text-sm mt-1.5">
                Kelola informasi akun dan data diri kamu.
            </p>
        </div>


        {{-- PESAN BERHASIL --}}
        @if (session('status') === 'profile-updated')
            <div class="flex items-start sm:items-center gap-3 rounded-xl
                        border border-emerald-500/15
                        bg-emerald-500/5
                        px-4 py-3.5
                        text-emerald-400 text-sm">

                <svg class="w-5 h-5 shrink-0 mt-0.5 sm:mt-0"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <span>
                    Profil berhasil diperbarui.
                </span>
            </div>
        @endif


        {{-- INFORMASI DATA GURU --}}
        <div class="bg-white/[0.02]
                    border border-white/5
                    rounded-2xl
                    overflow-hidden">

            {{-- HEADER PROFIL --}}
            <div class="p-5 sm:p-6">

                <div class="flex items-center gap-4">

                    {{-- AVATAR --}}
                    <div class="w-14 h-14 sm:w-16 sm:h-16
                                rounded-2xl
                                bg-gradient-to-br from-indigo-500 to-indigo-700
                                flex items-center justify-center
                                text-xl sm:text-2xl
                                font-bold text-white
                                shrink-0
                                shadow-lg shadow-indigo-500/15">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>


                    {{-- NAMA --}}
                    <div class="min-w-0 flex-1">

                        <h2 class="text-lg sm:text-xl
                                   font-bold text-white
                                   truncate">

                            {{ $user->name }}

                        </h2>

                        <div class="flex items-center gap-2 mt-1.5">

                            <span class="inline-flex items-center
                                         rounded-full
                                         bg-indigo-500/10
                                         border border-indigo-500/15
                                         px-2.5 py-1
                                         text-[11px]
                                         font-semibold
                                         text-indigo-400">

                                Guru

                            </span>

                        </div>
                    </div>

                </div>
            </div>


            {{-- DETAIL DATA GURU --}}
            <div class="border-t border-white/5 p-5 sm:p-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    {{-- NIP --}}
                    <div class="rounded-xl
                                bg-white/[0.02]
                                border border-white/5
                                p-4">

                        <p class="text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-[0.15em]
                                  text-slate-600">

                            NIP

                        </p>

                        <p class="text-sm
                                  font-semibold
                                  text-slate-200
                                  mt-1.5
                                  break-all">

                            {{ $guru->nip ?? '-' }}

                        </p>
                    </div>


                    {{-- NO HP --}}
                    <div class="rounded-xl
                                bg-white/[0.02]
                                border border-white/5
                                p-4">

                        <p class="text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-[0.15em]
                                  text-slate-600">

                            No. HP

                        </p>

                        <p class="text-sm
                                  font-semibold
                                  text-slate-200
                                  mt-1.5
                                  break-all">

                            {{ $guru->no_hp ?? '-' }}

                        </p>
                    </div>


                    {{-- EMAIL --}}
                    <div class="rounded-xl
                                bg-white/[0.02]
                                border border-white/5
                                p-4
                                sm:col-span-2">

                        <p class="text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-[0.15em]
                                  text-slate-600">

                            Email

                        </p>

                        <p class="text-sm
                                  font-semibold
                                  text-slate-200
                                  mt-1.5
                                  break-all">

                            {{ $user->email }}

                        </p>
                    </div>

                </div>
            </div>

        </div>


        {{-- FORM INFORMASI AKUN --}}
        <div class="bg-white/[0.02]
                    border border-white/5
                    rounded-2xl
                    p-5 sm:p-6 lg:p-8">

            @include('profile.partials.update-profile-information-form')

        </div>


        {{-- FORM UBAH PASSWORD --}}
        <div class="bg-white/[0.02]
                    border border-white/5
                    rounded-2xl
                    p-5 sm:p-6 lg:p-8">

            @include('profile.partials.update-password-form')

        </div>

    </div>

</x-guru-layout>
