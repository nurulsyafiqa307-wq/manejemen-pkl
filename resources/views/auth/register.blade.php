<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-slate-900 px-4">

    <div class="w-full max-w-md bg-slate-800 border border-slate-700 rounded-3xl shadow-2xl p-8">

        <div class="text-center mb-8">

            <div class="w-20 h-20 mx-auto rounded-full bg-blue-600 flex items-center justify-center text-3xl font-bold text-white">
                PKL
            </div>

            <h1 class="mt-4 text-3xl font-bold text-white">
                Register Admin
            </h1>

            <p class="text-slate-400 mt-1">
                Buat akun administrator
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">

            @csrf

            <div>
                <label class="block text-slate-300 mb-2">Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Masukkan nama lengkap">

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-slate-300 mb-2">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Masukkan email">

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label class="block text-slate-300 mb-2">Password</label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Masukkan password">

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label class="block text-slate-300 mb-2">Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-xl bg-slate-900 border border-slate-700 text-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Ulangi password">

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition rounded-xl py-3 text-white font-semibold">

                Daftar Admin

            </button>

        </form>

        <div class="text-center mt-6">

            <p class="text-slate-400">
                Sudah punya akun?

                <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                    Login
                </a>

            </p>

        </div>

    </div>

</div>

</x-guest-layout>