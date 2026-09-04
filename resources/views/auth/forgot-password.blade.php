<x-guest-layout>

<div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950 px-4 py-8 overflow-hidden">

    {{-- GLOW --}}
    <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] bg-indigo-600 rounded-full blur-[160px] opacity-[0.07] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-purple-600 rounded-full blur-[160px] opacity-[0.06] pointer-events-none"></div>
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="w-full max-w-md relative z-10">

        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-black/50">

            <div class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-b from-indigo-600/10 to-transparent pointer-events-none"></div>

            <div class="relative bg-slate-900/90 backdrop-blur-2xl p-8 sm:p-10">

                {{-- LOGO --}}
                <div class="text-center mb-6">
                    <div class="relative inline-block">
                        <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-indigo-500 via-indigo-600 to-purple-700 flex items-center justify-center shadow-xl shadow-indigo-600/30 rotate-3 hover:rotate-0 transition-transform duration-300">
                            <span class="text-2xl font-extrabold tracking-tight text-white">J</span>
                        </div>
                        <div class="absolute -inset-2 rounded-3xl bg-indigo-500/10 blur-xl -z-10"></div>
                    </div>
                    <h1 class="mt-6 text-[22px] sm:text-2xl font-bold text-white tracking-tight">Lupa Password</h1>
                    <p class="text-slate-500 mt-1 text-[13px]">Kami akan kirim link reset ke email kamu</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <p class="text-[13px] text-slate-400 leading-relaxed mb-6">
                    Masukkan email yang terdaftar, kami akan mengirimkan link untuk membuat password baru.
                </p>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">

                    @csrf

                    {{-- EMAIL --}}
                    <div class="space-y-1.5">
                        <label for="email" class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Email</label>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <p class="text-xs text-red-400 mt-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 active:from-indigo-700 active:to-indigo-800 rounded-xl py-3.5 text-white font-semibold text-sm shadow-lg shadow-indigo-600/25 hover:shadow-indigo-500/30 hover:-translate-y-0.5 active:translate-y-0 active:shadow-sm transition-all duration-200">

                        Kirim Link Reset

                    </button>

                </form>

                {{-- BACK TO LOGIN --}}
                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-500 hover:text-slate-300 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Login
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

</x-guest-layout>