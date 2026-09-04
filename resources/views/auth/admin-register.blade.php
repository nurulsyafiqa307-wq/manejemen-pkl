<x-guest-layout>

<div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950 px-4 py-8 overflow-y-auto">

    {{-- glow --}}
    <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] bg-red-600 rounded-full blur-[160px] opacity-[0.06] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-orange-600 rounded-full blur-[160px] opacity-[0.05] pointer-events-none"></div>
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="w-full max-w-md relative z-10 my-8">

        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-black/50">

            <div class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-b from-red-600/10 to-transparent pointer-events-none"></div>

            <div class="relative bg-slate-900/90 backdrop-blur-2xl p-8 sm:p-10">

                {{-- LOGO --}}
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-red-500 via-red-600 to-orange-700 flex items-center justify-center shadow-xl shadow-red-600/30 rotate-3 hover:rotate-0 transition-transform duration-300">
                            <span class="text-sm font-extrabold tracking-tight text-white">ADM</span>
                        </div>
                        <div class="absolute -inset-2 rounded-3xl bg-red-500/10 blur-xl -z-10"></div>
                    </div>
                    <h1 class="mt-6 text-[22px] sm:text-2xl font-bold text-white tracking-tight">Daftar Administrator</h1>
                    <p class="text-slate-500 mt-1 text-[13px]">Buat akun untuk mengakses Panel Admin</p>
                </div>

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-red-500/10 px-4 py-3 text-sm text-red-400 flex items-start gap-2">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.register.process') }}" class="space-y-4">

                    @csrf

                    {{-- NAMA --}}
                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Nama Administrator</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-red-400 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Masukkan nama">
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Email</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-red-400 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Password</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-red-400 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" required
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Minimal 8 karakter">
                        </div>
                    </div>

                    {{-- KONFIRMASI --}}
                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Konfirmasi Password</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-red-400 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" required
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Ulangi password">
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 active:from-red-700 active:to-red-800 rounded-xl py-3.5 text-white font-semibold text-sm shadow-lg shadow-red-600/25 hover:shadow-red-500/30 hover:-translate-y-0.5 active:translate-y-0 active:shadow-sm transition-all duration-200">
                            Buat Akun Admin
                        </button>
                    </div>

                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-6">
                    <p class="text-[11px] text-slate-600">Sudah memiliki akun Admin?</p>
                    <a href="{{ route('admin.login') }}" class="inline-block mt-1.5 text-xs text-red-400/80 hover:text-red-300 font-semibold transition-colors">
                        Login Admin
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

</x-guest-layout>