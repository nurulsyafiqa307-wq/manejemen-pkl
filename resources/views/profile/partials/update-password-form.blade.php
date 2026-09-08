<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold !text-slate-900 leading-tight">
            Update Password
        </h2>

        <p class="mt-1 text-sm !text-slate-600">
            Pastikan akun kamu menggunakan kata sandi yang panjang dan acak agar tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        {{-- PASSWORD SAAT INI --}}
        <div>
            <label for="update_password_current_password" class="block text-sm font-bold !text-slate-800 mb-2">
                Password Saat Ini
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                autocomplete="current-password" 
            />
            @if($errors->updatePassword->get('current_password'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        {{-- PASSWORD BARU --}}
        <div>
            <label for="update_password_password" class="block text-sm font-bold !text-slate-800 mb-2">
                Password Baru
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                autocomplete="new-password" 
            />
            @if($errors->updatePassword->get('password'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-bold !text-slate-800 mb-2">
                Konfirmasi Password
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                autocomplete="new-password" 
            />
            @if($errors->updatePassword->get('password_confirmation'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </div>

        {{-- TOMBOL SIMPAN --}}
        <div class="flex items-center gap-4 pt-2">
            <button 
                type="submit" 
                class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
            >
                Simpan Password
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-semibold text-emerald-600"
                >
                    Tersimpan ✓
                </p>
            @endif
        </div>
    </form>
</section>