<section>
    <header class="mb-6">
        <h2 class="text-lg font-bold text-white">
            Informasi Akun
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui nama, email, dan nomor HP kamu.
        </p>
    </header>

    {{-- FORM VERIFIKASI EMAIL --}}
    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>

    {{-- FORM UPDATE PROFIL --}}
    <form method="post"
      action="{{ auth()->user()->role === 'guru'
          ? route('profile.update-guru')
          : route('profile.update') }}"
      class="space-y-6">
        @csrf
        @method('patch')

        {{-- NAMA --}}
        <div>
            <label
                for="name"
                class="block text-sm font-medium text-slate-300 mb-2"
            >
                Nama
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-blue-500"
            >

            @if($errors->get('name'))
                <p class="mt-2 text-sm text-red-400">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>

        {{-- EMAIL --}}
        <div>
            <label
                for="email"
                class="block text-sm font-medium text-slate-300 mb-2"
            >
                Email
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-blue-500"
            >

            @if($errors->get('email'))
                <p class="mt-2 text-sm text-red-400">
                    {{ $errors->first('email') }}
                </p>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-xl border border-yellow-500/20 bg-yellow-500/10 p-4">
                    <p class="text-sm text-yellow-300">
                        Email kamu belum terverifikasi.
                    </p>

                    <button
                        form="send-verification"
                        class="mt-2 text-sm text-yellow-400 underline hover:text-yellow-300"
                    >
                        Kirim ulang email verifikasi
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-emerald-400">
                            Email verifikasi berhasil dikirim.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- NO HP --}}
        <div>
            <label
                for="no_hp"
                class="block text-sm font-medium text-slate-300 mb-2"
            >
                No. HP
            </label>

            <input
                id="no_hp"
                name="no_hp"
                type="text"
                value="{{ old('no_hp', $user->role === 'guru' ? ($guru->no_hp ?? '') : ($siswa->no_hp ?? '')) }}"
                placeholder="Contoh: 081234567890"
                autocomplete="tel"
                class="w-full rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-500 focus:border-blue-500 focus:ring-blue-500"
            >

            @if($errors->get('no_hp'))
                <p class="mt-2 text-sm text-red-400">
                    {{ $errors->first('no_hp') }}
                </p>
            @endif
        </div>

        {{-- BUTTON --}}
        <div class="flex items-center gap-4 pt-2">
            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition"
            >
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-400"
                >
                    Tersimpan ✓
                </p>
            @endif
        </div>
    </form>
</section>
