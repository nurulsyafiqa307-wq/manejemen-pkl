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
                    <h1 class="mt-6 text-[22px] sm:text-2xl font-bold text-white tracking-tight">Administrator</h1>
                    <p class="text-slate-500 mt-1 text-[13px]">Login ke Panel Administrasi</p>
                </div>

                {{-- STATUS --}}
                @if (session('status'))
                    <div class="mb-5 rounded-xl bg-emerald-500/10 px-4 py-3 text-sm text-emerald-400 flex items-start gap-2">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-red-500/10 px-4 py-3 text-sm text-red-400 flex items-start gap-2">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.process') }}" class="space-y-4">

                    @csrf

                    {{-- EMAIL --}}
                    <div class="space-y-1.5">
                        <label class="block text-slate-400 text-[11px] font-bold uppercase tracking-[0.12em]">Email Administrator</label>
                        <div class="relative group">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-red-400 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-4 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Masukkan email admin">
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
                            <input id="admin-password" type="password" name="password" required
                                class="w-full rounded-xl bg-slate-800/50 text-white pl-11 pr-12 py-3 text-sm placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-red-500/40 focus:bg-slate-800/70 transition-all"
                                placeholder="Masukkan password">
                            <button type="button" onclick="toggleAdminPassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 hover:text-slate-300 hover:bg-slate-700/50 transition-all"
                                aria-label="Toggle password">
                                <svg id="admin-eye-off" class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                </svg>
                                <svg id="admin-eye-on" class="w-[18px] h-[18px] hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- REMEMBER --}}
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-red-500 focus:ring-red-500/40">
                        <span class="text-xs text-slate-500">Ingat saya</span>
                    </label>

                    {{-- BUTTON --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 active:from-red-700 active:to-red-800 rounded-xl py-3.5 text-white font-semibold text-sm shadow-lg shadow-red-600/25 hover:shadow-red-500/30 hover:-translate-y-0.5 active:translate-y-0 active:shadow-sm transition-all duration-200">
                            Masuk sebagai Admin
                        </button>
                    </div>

                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-6 space-y-3">
                    <div>
                        <p class="text-[11px] text-slate-600">Belum memiliki akun Admin?</p>
                        <a href="{{ route('admin.register') }}" class="inline-block mt-1 text-xs text-red-400/80 hover:text-red-300 font-semibold transition-colors">Daftar Akun Admin</a>
                    </div>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-600 hover:text-slate-400 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Login Guru / Siswa
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
function toggleAdminPassword() {
    const p = document.getElementById('admin-password');
    const eyeOff = document.getElementById('admin-eye-off');
    const eyeOn = document.getElementById('admin-eye-on');
    p.type = p.type === 'password' ? 'text' : 'password';
    eyeOff.classList.toggle('hidden');
    eyeOn.classList.toggle('hidden');
}
</script>

</x-guest-layout>