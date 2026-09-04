<x-siswa-layout>

    <x-slot name="title">
        Ajukan Tempat PKL
    </x-slot>

    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold header-title tracking-tight">
            Ajukan Tempat PKL
        </h1>

        <p class="text-slate-500 mt-2 text-sm">
            Pilih tempat PKL yang ingin kamu ajukan
        </p>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-500/15 bg-red-500/5 px-5 py-4">
            <p class="font-semibold text-red-400 mb-2 text-sm">
                Ada data yang belum benar:
            </p>

            <ul class="list-disc list-inside text-xs text-red-300/80 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="w-full max-w-3xl">

        <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 sm:p-8">

            <form action="{{ route('siswa.pengajuan.store') }}" method="POST">
                @csrf

                {{-- SISWA --}}
                <div class="mb-6">
                    <label class="block text-xs font-semibold text-slate-400 mb-2 uppercase tracking-wider">
                        Nama Siswa
                    </label>

                    <div class="w-full rounded-xl border border-white/5 bg-white/[0.03] px-4 py-3 text-slate-300 text-sm">
                        {{ auth()->user()->name }}
                    </div>

                    <p class="text-xs text-slate-600 mt-2">
                        Data siswa diambil otomatis dari akun yang sedang login.
                    </p>
                </div>

                {{-- TEMPAT PKL --}}
                <div class="mb-6">
                    <label for="tempat_pkl_id" class="block text-xs font-semibold text-slate-400 mb-2 uppercase tracking-wider">
                        Tempat PKL
                    </label>

                    <select
                        name="tempat_pkl_id"
                        id="tempat_pkl_id"
                        required
                        class="w-full rounded-xl border border-white/5 bg-white/[0.03] px-4 py-3 text-white text-sm focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/30 outline-none transition appearance-none"
                    >
                        <option value="">-- Pilih Tempat PKL --</option>

                        @foreach($tempatPkls as $tempat)
                            <option
                                value="{{ $tempat->id }}"
                                {{ old('tempat_pkl_id') == $tempat->id ? 'selected' : '' }}
                            >
                                {{ $tempat->nama_perusahaan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TANGGAL PENGAJUAN --}}
                <div class="mb-6">
                    <label for="tanggal_pengajuan" class="block text-xs font-semibold text-slate-400 mb-2 uppercase tracking-wider">
                        Tanggal Pengajuan
                    </label>

                    <input
                        type="date"
                        name="tanggal_pengajuan"
                        id="tanggal_pengajuan"
                        value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                        required
                        class="w-full rounded-xl border border-white/5 bg-white/[0.03] px-4 py-3 text-white text-sm focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/30 outline-none transition"
                    >
                </div>

                {{-- INFORMASI --}}
                <div class="mb-6 rounded-xl border border-blue-500/15 bg-blue-500/5 p-4">
                    <p class="text-xs text-blue-300/80 leading-relaxed">
                        Setelah pengajuan dikirim, status akan menjadi
                        <span class="font-semibold text-blue-300">Menunggu Seleksi</span>
                        sampai admin menentukan hasil pengajuan.
                    </p>
                </div>

                {{-- BUTTON --}}
                <div class="flex flex-col-reverse sm:flex-row gap-3 sm:justify-end">

                    <a
                        href="{{ route('siswa.pengajuan.index') }}"
                        class="rounded-xl border border-white/5 px-5 py-3 text-center text-slate-400 text-sm font-medium hover:bg-white/[0.03] hover:text-slate-200 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 text-white text-sm font-medium hover:from-blue-500 hover:to-indigo-500 transition shadow-lg shadow-blue-600/15"
                    >
                        Ajukan Tempat PKL
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-siswa-layout>