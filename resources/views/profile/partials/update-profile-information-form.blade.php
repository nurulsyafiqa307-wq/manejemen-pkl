<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 leading-tight">
            Informasi Akun
        </h2>

        <p class="mt-1 text-sm text-slate-600">
            Perbarui nama, email, dan nomor HP kamu.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- NAMA --}}
        <div>
            <label for="name" class="block text-sm font-bold text-slate-800 mb-2">
                Nama
            </label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name" 
            />
            @if($errors->has('name'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $errors->first('name') }}</p>
            @endif
        </div>

        {{-- EMAIL --}}
        <div>
            <label for="email" class="block text-sm font-bold text-slate-800 mb-2">
                Email
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username" 
            />
            @if($errors->has('email'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $errors->first('email') }}</p>
            @endif
        </div>

        {{-- NO HP --}}
        <div>
            <label for="no_hp" class="block text-sm font-bold text-slate-800 mb-2">
                No. HP
            </label>
            <input 
                id="no_hp" 
                name="no_hp" 
                type="text" 
                style="background-color: #ffffff !important; color: #0f172a !important;"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm font-medium placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition" 
                value="{{ old('no_hp', $guru->no_hp ?? '') }}" 
                placeholder="Contoh: 081234567890" 
            />
            @if($errors->has('no_hp'))
                <p class="mt-1.5 text-xs font-medium text-rose-600">{{ $errors->first('no_hp') }}</p>
            @endif
        </div>

        {{-- TOMBOL SIMPAN --}}
        <div class="flex items-center gap-4 pt-2">
            <button 
                type="submit" 
                class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
            >
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
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