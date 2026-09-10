<x-siswa-layout>

    <x-slot name="title">
        Jurnal Harian
    </x-slot>

    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold header-title tracking-tight text-slate-900">
                    Jurnal Harian
                </h1>
                <p class="text-slate-500 mt-2 text-sm">
                    Catatan kegiatan PKL kamu setiap hari.
                </p>
            </div>

            <a href="{{ route('siswa.jurnal.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:from-blue-500 hover:to-indigo-500 transition shadow-lg shadow-blue-600/15 whitespace-nowrap">
                + Isi Jurnal
            </a>
        </div>
    </div>


    {{-- Daftar jurnal --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

        {{-- Header --}}
        <div class="p-5 sm:p-6 border-b border-slate-200 bg-slate-50/70">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div>
                    <h2 class="text-base font-bold text-slate-800">
                        Riwayat Jurnal
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Semua jurnal PKL yang sudah kamu isi.
                    </p>
                </div>

                @if($jurnals->count() > 0)
                    <div class="text-xs text-slate-500">
                        {{ $jurnals->count() }} jurnal
                    </div>
                @endif

            </div>


            {{-- Pagination Bulan --}}
            @if($bulanTersedia->count() > 0)

                @php
                    $bulanIndonesia = [
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ];

                    $bulanAktifIndex = $bulanTersedia->search($bulan);

                    $bulanSebelumnya = $bulanAktifIndex > 0
                        ? $bulanTersedia[$bulanAktifIndex - 1]
                        : null;

                    $bulanBerikutnya = $bulanAktifIndex < $bulanTersedia->count() - 1
                        ? $bulanTersedia[$bulanAktifIndex + 1]
                        : null;
                @endphp

                <div class="mt-5">

                    {{-- Navigasi bulan --}}
                    <div class="flex items-center justify-between gap-3">

                        {{-- Tombol sebelumnya --}}
                        @if($bulanSebelumnya)

                            <a href="{{ route('siswa.jurnal.index', ['bulan' => $bulanSebelumnya]) }}"
                               class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-100 hover:text-blue-600 transition"
                               title="Bulan sebelumnya">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 19l-7-7 7-7"/>

                                </svg>

                            </a>

                        @else

                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 bg-slate-100 text-slate-300">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 19l-7-7 7-7"/>

                                </svg>

                            </span>

                        @endif


                        {{-- Nama bulan aktif --}}
                        <div class="text-center flex-1">

                            @php
                                $tanggalBulanAktif = \Carbon\Carbon::createFromFormat('Y-m', $bulan);
                            @endphp

                            <h3 class="text-slate-800 font-bold text-base sm:text-lg">
                                {{ $bulanIndonesia[(int) $tanggalBulanAktif->format('n')] }}
                                {{ $tanggalBulanAktif->format('Y') }}
                            </h3>

                            <p class="text-[11px] text-slate-500 mt-1">
                                Jurnal pada bulan ini
                            </p>

                        </div>


                        {{-- Tombol berikutnya --}}
                        @if($bulanBerikutnya)

                            <a href="{{ route('siswa.jurnal.index', ['bulan' => $bulanBerikutnya]) }}"
                               class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-100 hover:text-blue-600 transition"
                               title="Bulan berikutnya">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 5l7 7-7 7"/>

                                </svg>

                            </a>

                        @else

                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-slate-200 bg-slate-100 text-slate-300">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 5l7 7-7 7"/>

                                </svg>

                            </span>

                        @endif

                    </div>


                    {{-- Pilihan bulan --}}
                    <div class="mt-4 flex gap-2 overflow-x-auto pb-1">

                        @foreach($bulanTersedia as $bulanItem)

                            @php
                                $tanggalBulan = \Carbon\Carbon::createFromFormat('Y-m', $bulanItem);
                                $isAktif = $bulanItem === $bulan;
                            @endphp

                            <a href="{{ route('siswa.jurnal.index', ['bulan' => $bulanItem]) }}"
                               class="whitespace-nowrap px-4 py-2 rounded-xl text-xs font-semibold transition
                               {{ $isAktif
                                    ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20'
                                    : 'bg-white border border-slate-200 text-slate-500 hover:text-blue-600 hover:bg-blue-50'
                               }}">

                                {{ $bulanIndonesia[(int) $tanggalBulan->format('n')] }}
                                {{ $tanggalBulan->format('Y') }}

                            </a>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>


        {{-- Tabel --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left min-w-[600px]">

                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            No
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            Jam
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            Kegiatan
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            Status
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                            Aksi
                        </th>

                    </tr>
                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($jurnals as $jurnal)

                        <tr class="hover:bg-slate-50 transition">

                            {{-- NO --}}
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                {{ $loop->iteration }}
                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-6 py-4 text-slate-800 font-medium text-sm">
                                {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}
                            </td>


                            {{-- JAM --}}
                            <td class="px-6 py-4 text-slate-500 text-sm whitespace-nowrap">
                                {{ $jurnal->jam_masuk }} - {{ $jurnal->jam_pulang }}
                            </td>


                            {{-- KEGIATAN --}}
                            <td class="px-6 py-4">

                                <p class="text-slate-800 text-sm font-medium max-w-xs truncate">
                                    {{ $jurnal->kegiatan }}
                                </p>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-4">

                                @if($jurnal->status_jurnal === 'Menunggu Review')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-3 py-1 text-xs font-semibold text-yellow-700 border border-yellow-200">

                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>

                                        Menunggu Review

                                    </span>

                                @elseif($jurnal->status_jurnal === 'Disetujui')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 border border-green-200">

                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                        Disetujui

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700 border border-red-200">

                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                        Perlu Revisi

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-2">

                                    {{-- EDIT --}}
                                    @if($jurnal->status_jurnal === 'Perlu Revisi')

                                        <a href="{{ route('siswa.jurnal.edit', $jurnal->id_jurnal) }}"
                                           class="inline-flex items-center gap-2 rounded-lg bg-yellow-50 border border-yellow-200 px-4 py-2 text-xs font-semibold text-yellow-700 hover:bg-yellow-100 transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-3.5 h-3.5"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                                            </svg>

                                            Edit

                                        </a>

                                    @endif


                                    {{-- HAPUS --}}
                                    <form action="{{ route('siswa.jurnal.destroy', $jurnal->id_jurnal) }}"
                                          method="POST"
                                          class="form-delete"
                                          data-confirm-message="Yakin ingin menghapus jurnal ini? Jurnal yang dihapus tidak dapat dikembalikan.">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex items-center gap-2 rounded-lg bg-red-50 border border-red-200 px-4 py-2 text-xs font-semibold text-red-700 hover:bg-red-100 transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-3.5 h-3.5"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-3a1 1 0 00-1 1v3M4 7h16"/>

                                            </svg>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center mb-4">

                                        <svg class="w-7 h-7 text-slate-400"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                                        </svg>

                                    </div>

                                    <p class="text-slate-800 font-medium text-sm">
                                        Belum ada jurnal
                                    </p>

                                    <p class="text-slate-500 text-xs mt-1">
                                        Belum ada jurnal pada bulan ini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-siswa-layout>