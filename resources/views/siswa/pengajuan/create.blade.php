<x-siswa-layout>
    <x-slot name="title">
        Ajukan Tempat PKL
    </x-slot>

    {{-- WRAPPER UTAMA: Mengatur konten agar berada di tengah secara presisi --}}
    <div class="min-h-[calc(100vh-120px)] flex flex-col justify-center items-center py-6 px-4">

        <div class="w-full max-w-2xl">

            {{-- HEADER HALAMAN --}}
            <div class="mb-6 text-center">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">
                    Ajukan Tempat PKL
                </h1>
                <p class="text-slate-500 mt-2 text-sm">
                    Pilih tempat PKL yang ingin kamu ajukan
                </p>
            </div>

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4">
                    <p class="font-semibold text-red-700 mb-2 text-sm">
                        Ada data yang belum benar:
                    </p>
                    <ul class="list-disc list-inside text-xs text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- KARDUS FORM --}}
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm">

                <form action="{{ route('siswa.pengajuan.store') }}" method="POST">
                    @csrf

                    {{-- SISWA --}}
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-slate-700 mb-2 uppercase tracking-wider">
                            Nama Siswa
                        </label>
                        <div class="w-full rounded-xl border border-slate-200 bg-slate-50/80 px-4 py-3 text-slate-700 text-sm font-medium">
                            {{ auth()->user()->name }}
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1.5">
                            Data siswa diambil otomatis dari akun yang sedang login.
                        </p>
                    </div>

                    {{-- TEMPAT PKL --}}
                    <div class="mb-5">
                        <label for="search_tempat_pkl" class="block text-xs font-semibold text-slate-700 mb-2 uppercase tracking-wider">
                            Tempat PKL
                        </label>

                        <div class="relative">
                            {{-- INPUT PENCARIAN --}}
                            <div id="tempat_search_box" class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"/>
                                    </svg>
                                </div>

                                <input
                                    type="text"
                                    id="search_tempat_pkl"
                                    placeholder="Cari atau pilih tempat PKL..."
                                    autocomplete="off"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-11 pr-11 py-3 text-slate-800 text-sm placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition duration-150"
                                >

                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" id="chevron_icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- HASIL PENCARIAN DROPDOWN --}}
                            <div id="tempat_results" class="hidden absolute z-30 left-0 right-0 mt-2 max-h-64 overflow-y-auto rounded-xl border border-slate-200 bg-white shadow-xl">
                                <div class="px-4 py-2.5 border-b border-slate-100 bg-slate-50">
                                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                                        Pilih Tempat PKL
                                    </p>
                                </div>

                                @foreach($tempatPkls as $tempat)
                                    <button
                                        type="button"
                                        class="tempat-option group w-full text-left px-4 py-3 border-b border-slate-100 last:border-b-0 hover:bg-blue-50/70 transition"
                                        data-id="{{ $tempat->id }}"
                                        data-name="{{ $tempat->nama_perusahaan }}"
                                    >
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center group-hover:bg-blue-100 group-hover:border-blue-200 transition">
                                                <svg class="w-4 h-4 text-slate-500 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0H5m14 0h2m-2 0h-2M5 21H3m2 0h2M9 7h6M9 11h6M9 15h3"/>
                                                </svg>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-slate-800 group-hover:text-blue-700 truncate">
                                                    {{ $tempat->nama_perusahaan }}
                                                </p>
                                                @if(!empty($tempat->alamat))
                                                    <p class="text-xs text-slate-400 truncate mt-0.5">
                                                        {{ $tempat->alamat }}
                                                    </p>
                                                @endif
                                            </div>
                                            <svg class="w-4 h-4 text-slate-300 group-hover:text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/>
                                            </svg>
                                        </div>
                                    </button>
                                @endforeach

                                <div id="no_tempat_result" class="hidden px-4 py-6 text-center">
                                    <svg class="w-8 h-8 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.5-4.5m2-5.5a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0z"/>
                                    </svg>
                                    <p class="text-xs text-slate-500">Tempat PKL tidak ditemukan.</p>
                                </div>
                            </div>

                            {{-- TEMPAT YANG DIPILIH --}}
                            <div id="selected_tempat" class="hidden mt-2">
                                <div class="flex items-center gap-3 rounded-xl border border-blue-200 bg-blue-50/60 px-4 py-3">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16M5 21h14M9 7h6M9 11h6M9 15h3"/>
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-[10px] uppercase tracking-wider text-blue-600 font-bold">
                                            Tempat PKL Dipilih
                                        </p>
                                        <p id="selected_tempat_name" class="text-sm font-semibold text-slate-800 truncate mt-0.5"></p>
                                    </div>
                                    <button type="button" id="clear_tempat" class="flex-shrink-0 rounded-lg px-3 py-1.5 text-xs font-medium text-slate-500 hover:text-red-600 hover:bg-red-50 transition">
                                        Ganti
                                    </button>
                                </div>
                            </div>

                            {{-- INPUT HIDDEN --}}
                            <input type="hidden" name="tempat_pkl_id" id="tempat_pkl_id" value="{{ old('tempat_pkl_id') }}" required>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1.5">
                            Cari berdasarkan nama perusahaan atau pilih dari daftar yang tersedia.
                        </p>
                    </div>

                    {{-- TANGGAL PENGAJUAN --}}
                    <div class="mb-5">
                        <label for="tanggal_pengajuan" class="block text-xs font-semibold text-slate-700 mb-2 uppercase tracking-wider">
                            Tanggal Pengajuan
                        </label>
                        <input
                            type="date"
                            name="tanggal_pengajuan"
                            id="tanggal_pengajuan"
                            value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-800 text-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition duration-150"
                        >
                    </div>

                    {{-- INFORMASI --}}
                    <div class="mb-6 rounded-xl border border-blue-100 bg-blue-50/50 p-4">
                        <p class="text-xs text-blue-800 leading-relaxed">
                            Setelah pengajuan dikirim, status akan menjadi 
                            <span class="font-bold text-blue-900">Menunggu Seleksi</span> 
                            sampai admin menentukan hasil pengajuan.
                        </p>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex flex-col-reverse sm:flex-row gap-3 sm:justify-end pt-2">
                        <a
                            href="{{ route('siswa.pengajuan.index') }}"
                            class="rounded-xl border border-slate-200 px-5 py-2.5 text-center text-slate-600 text-sm font-medium hover:bg-slate-50 hover:text-slate-800 transition"
                        >
                            Batal
                        </a>
                        <button
                            type="submit"
                            class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-white text-sm font-semibold hover:from-blue-500 hover:to-indigo-500 transition shadow-md shadow-blue-500/20"
                        >
                            Ajukan Tempat PKL
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    {{-- SCRIPT TETAP SAMA --}}
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

            const oldId = hiddenInput.value;
            if (oldId) {
                const selectedOption = document.querySelector(`.tempat-option[data-id="${oldId}"]`);
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