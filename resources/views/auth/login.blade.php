<x-guest-layout>

<div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950 px-4 py-8 overflow-hidden">

    {{-- GLOW --}}
    <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] bg-indigo-600 rounded-full blur-[160px] opacity-[0.07] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-purple-600 rounded-full blur-[160px] opacity-[0.06] pointer-events-none"></div>
    <div class="absolute top-[30%] right-[20%] w-[300px] h-[300px] bg-blue-500 rounded-full blur-[140px] opacity-[0.04] pointer-events-none"></div>

    {{-- DOT PATTERN --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="w-full max-w-md relative z-10">

        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-black/50">

            {{-- CARD TOP GRADIENT --}}
            <div class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-b from-indigo-600/10 to-transparent pointer-events-none"></div>

            <div class="relative bg-slate-900/90 backdrop-blur-2xl p-8 sm:p-10">

                {{-- LOGO --}}
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        <div class="w-[72px] h-[72px] rounded-2xl bg-gradient-to-br from-indigo-500 via-indigo-600 to-purple-700 flex items-center justify-center shadow-xl shadow-indigo-600/30 rotate-3 hover:rotate-0 transition-transform duration-300">
                            <span class="text-2xl font-extrabold tracking-tight text-white">J</span>
                        </div>
                        <div class="absolute -inset-2 rounded-3xl bg-indigo-500/10 blur-xl -z-10"></div>
                    </div>
                    <h1 class="mt-6 text-[22px] sm:text-2xl font-bold text-white tracking-tight">Login Jurnal PKL</h1>
                    <p class="text-slate-500 mt-1 text-[13px]">Masuk menggunakan akun dari Admin</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">

                    @csrf

                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Email</label>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Password</label>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-12 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Masukkan password">
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 hover:text-slate-300 hover:bg-slate-700/50 transition-all"
                                aria-label="Toggle password">
                                <svg id="eye-off" class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                </svg>
                                <svg id="eye-on" class="w-[18px] h-[18px] hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-1">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-indigo-500 focus:ring-indigo-500/40">
                            <span class="text-xs text-slate-500">Ingat saya</span>
                        </label>                           
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 active:from-indigo-700 active:to-indigo-800 rounded-xl py-3.5 text-white font-semibold text-sm shadow-lg shadow-indigo-600/25 hover:shadow-indigo-500/30 hover:-translate-y-0.5 active:translate-y-0 active:shadow-sm transition-all duration-200">
                            Login
                        </button>
                    </div>

                </form>

                <div class="text-center mt-8">
                    <p class="text-[11px] text-slate-600 leading-relaxed">Hanya akun yang dibuat oleh Admin yang dapat login</p>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
function togglePassword() {
    const p = document.getElementById('password');
    const eyeOff = document.getElementById('eye-off');
    const eyeOn = document.getElementById('eye-on');
    p.type = p.type === 'password' ? 'text' : 'password';
    eyeOff.classList.toggle('hidden');
    eyeOn.classList.toggle('hidden');
}
</script>

</x-guest-layout>