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

                    <label
                        for="search_tempat_pkl"
                        class="block text-xs font-semibold text-slate-400 mb-2 uppercase tracking-wider"
                    >
                        Tempat PKL
                    </label>

                    <div class="relative">

                        {{-- INPUT PENCARIAN --}}
                        <div
                            id="tempat_search_box"
                            class="relative"
                        >
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg
                                    class="w-4 h-4 text-slate-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"
                                    />
                                </svg>
                            </div>

                            <input
                                type="text"
                                id="search_tempat_pkl"
                                placeholder="Cari atau pilih tempat PKL..."
                                autocomplete="off"
                                class="w-full rounded-xl border border-white/5 bg-white/[0.03] pl-11 pr-11 py-3 text-white text-sm placeholder:text-slate-600 focus:border-indigo-500/50 focus:ring-1 focus:ring-indigo-500/30 outline-none transition"
                            >

                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg
                                    class="w-4 h-4 text-slate-500 transition-transform"
                                    id="chevron_icon"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m6 9 6 6 6-6"
                                    />
                                </svg>
                            </div>
                        </div>

                        {{-- HASIL PENCARIAN --}}
                        <div
                            id="tempat_results"
                            class="hidden absolute z-30 left-0 right-0 mt-2 max-h-72 overflow-y-auto rounded-xl border border-white/10 bg-slate-900/95 backdrop-blur-xl shadow-2xl shadow-black/30"
                        >

                            <div class="px-4 py-3 border-b border-white/5">
                                <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">
                                    Pilih Tempat PKL
                                </p>
                            </div>

                            @foreach($tempatPkls as $tempat)
                                <button
                                    type="button"
                                    class="tempat-option group w-full text-left px-4 py-3.5 border-b border-white/5 last:border-b-0 hover:bg-indigo-500/10 transition"
                                    data-id="{{ $tempat->id }}"
                                    data-name="{{ $tempat->nama_perusahaan }}"
                                >
                                    <div class="flex items-center gap-3">

                                        <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-white/[0.04] border border-white/5 flex items-center justify-center group-hover:bg-indigo-500/10 group-hover:border-indigo-500/20 transition">
                                            <svg
                                                class="w-4 h-4 text-slate-500 group-hover:text-indigo-400 transition"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0H5m14 0h2m-2 0h-2M5 21H3m2 0h2M9 7h6M9 11h6M9 15h3"
                                                />
                                            </svg>
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-medium text-slate-200 group-hover:text-white truncate transition">
                                                {{ $tempat->nama_perusahaan }}
                                            </p>

                                            @if(!empty($tempat->alamat))
                                                <p class="text-xs text-slate-500 mt-1 truncate">
                                                    {{ $tempat->alamat }}
                                                </p>
                                            @endif
                                        </div>

                                        <svg
                                            class="w-4 h-4 text-slate-700 group-hover:text-indigo-400 flex-shrink-0 transition"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m9 18 6-6-6-6"
                                            />
                                        </svg>

                                    </div>
                                </button>
                            @endforeach

                            <div
                                id="no_tempat_result"
                                class="hidden px-4 py-8 text-center"
                            >
                                <svg
                                    class="w-8 h-8 mx-auto text-slate-700 mb-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M21 21l-4.5-4.5m2-5.5a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0z"
                                    />
                                </svg>

                                <p class="text-sm text-slate-500">
                                    Tempat PKL tidak ditemukan.
                                </p>

                                <p class="text-xs text-slate-600 mt-1">
                                    Coba gunakan kata kunci lain.
                                </p>
                            </div>

                        </div>

                        {{-- TEMPAT YANG DIPILIH --}}
                        <div
                            id="selected_tempat"
                            class="hidden mt-2"
                        >
                            <div class="flex items-center gap-3 rounded-xl border border-indigo-500/20 bg-indigo-500/5 px-4 py-3">

                                <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-indigo-500/10 flex items-center justify-center">
                                    <svg
                                        class="w-4 h-4 text-indigo-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16M5 21h14M9 7h6M9 11h6M9 15h3"
                                        />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <p class="text-[10px] uppercase tracking-wider text-indigo-400/70 font-semibold">
                                        Tempat PKL dipilih
                                    </p>

                                    <p
                                        id="selected_tempat_name"
                                        class="text-sm font-medium text-white truncate mt-0.5"
                                    ></p>
                                </div>

                                <button
                                    type="button"
                                    id="clear_tempat"
                                    class="flex-shrink-0 rounded-lg px-3 py-1.5 text-xs font-medium text-slate-500 hover:text-red-400 hover:bg-red-500/5 transition"
                                >
                                    Ganti
                                </button>

                            </div>
                        </div>

                        {{-- ID TEMPAT PKL --}}
                        <input
                            type="hidden"
                            name="tempat_pkl_id"
                            id="tempat_pkl_id"
                            value="{{ old('tempat_pkl_id') }}"
                            required
                        >

                    </div>

                    <p class="text-xs text-slate-600 mt-2">
                        Cari berdasarkan nama perusahaan atau pilih dari daftar yang tersedia.
                    </p>

                </div>

                {{-- TANGGAL PENGAJUAN --}}
                <div class="mb-6">
                    <label
                        for="tanggal_pengajuan"
                        class="block text-xs font-semibold text-slate-400 mb-2 uppercase tracking-wider"
                    >
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('search_tempat_pkl');
            const hiddenInput = document.getElementById('tempat_pkl_id');
            const results = document.getElementById('tempat_results');
            const options = document.querySelectorAll('.tempat-option');
            const noResult = document.getElementById('no_tempat_result');

            const selectedBox = document.getElementById('selected_tempat');
            const selectedName = document.getElementById('selected_tempat_name');
            const clearButton = document.getElementById('clear_tempat');
            const searchBox = document.getElementById('tempat_search_box');
            const chevron = document.getElementById('chevron_icon');

            function showResults() {
                results.classList.remove('hidden');
                chevron.classList.add('rotate-180');
            }

            function hideResults() {
                results.classList.add('hidden');
                chevron.classList.remove('rotate-180');
            }

            searchInput.addEventListener('focus', function () {
                if (!hiddenInput.value) {
                    showResults();
                }
            });

            searchInput.addEventListener('input', function () {

                const keyword = this.value.toLowerCase().trim();
                let found = 0;

                options.forEach(function (option) {

                    const name = option.dataset.name.toLowerCase();

                    if (name.includes(keyword)) {
                        option.classList.remove('hidden');
                        found++;
                    } else {
                        option.classList.add('hidden');
                    }

                });

                if (found === 0) {
                    noResult.classList.remove('hidden');
                } else {
                    noResult.classList.add('hidden');
                }

                hiddenInput.value = '';

                if (!selectedBox.classList.contains('hidden')) {
                    selectedBox.classList.add('hidden');
                }

                showResults();
            });

            options.forEach(function (option) {

                option.addEventListener('click', function () {

                    const id = this.dataset.id;
                    const name = this.dataset.name;

                    hiddenInput.value = id;

                    searchInput.value = name;

                    selectedName.textContent = name;

                    selectedBox.classList.remove('hidden');

                    hideResults();

                    searchBox.classList.add('hidden');
                });

            });

            clearButton.addEventListener('click', function () {

                hiddenInput.value = '';

                searchInput.value = '';

                selectedName.textContent = '';

                selectedBox.classList.add('hidden');

                options.forEach(function (option) {
                    option.classList.remove('hidden');
                });

                noResult.classList.add('hidden');

                searchBox.classList.remove('hidden');

                searchInput.focus();

                showResults();

            });

            document.addEventListener('click', function (event) {

                if (
                    !searchBox.contains(event.target) &&
                    !results.contains(event.target) &&
                    !selectedBox.contains(event.target)
                ) {
                    hideResults();
                }

            });

            // Mempertahankan pilihan jika validasi form gagal
            const oldId = hiddenInput.value;

            if (oldId) {

                const selectedOption = document.querySelector(
                    `.tempat-option[data-id="${oldId}"]`
                );

                if (selectedOption) {

                    const name = selectedOption.dataset.name;

                    searchInput.value = name;

                    selectedName.textContent = name;

                    selectedBox.classList.remove('hidden');

                    searchBox.classList.add('hidden');

                }

            }

        });
    </script>

</x-siswa-layout>