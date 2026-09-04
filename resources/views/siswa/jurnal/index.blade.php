<x-siswa-layout>

    <x-slot name="title">
        Jurnal Harian
    </x-slot>

    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold header-title tracking-tight">
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

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-500/15 bg-green-500/5 px-5 py-4 text-green-400 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Daftar jurnal --}}
    <div class="bg-white/[0.02] border border-white/5 rounded-2xl overflow-hidden">

        <div class="p-5 sm:p-6 border-b border-white/5">
            <h2 class="text-base font-bold text-white">
                Riwayat Jurnal
            </h2>

            <p class="text-xs text-slate-600 mt-1">
                Semua jurnal PKL yang sudah kamu isi.
            </p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-left min-w-[600px]">

                <thead>
                    <tr class="border-b border-white/5">

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

                <tbody class="divide-y divide-white/[0.03]">

                    @forelse($jurnals as $jurnal)

                        <tr class="hover:bg-white/[0.02] transition">

                            <td class="px-6 py-4 text-slate-400 text-sm">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 text-white font-medium text-sm">
                                {{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d-m-Y') }}
                            </td>

                            <td class="px-6 py-4 text-slate-400 text-sm whitespace-nowrap">
                                {{ $jurnal->jam_masuk }} - {{ $jurnal->jam_pulang }}
                            </td>

                            <td class="px-6 py-4">
                                <p class="text-white text-sm font-medium max-w-xs truncate">
                                    {{ $jurnal->kegiatan }}
                                </p>
                            </td>

                            <td class="px-6 py-4">

                                @if($jurnal->status_jurnal === 'Menunggu Review')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-500/10 px-3 py-1 text-xs font-semibold text-yellow-400 border border-yellow-500/15">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                        Menunggu Review
                                    </span>

                                @elseif($jurnal->status_jurnal === 'Disetujui')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400 border border-green-500/15">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                        Disetujui
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400 border border-red-500/15">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                        Perlu Revisi
                                    </span>

                                @endif

                            </td>

                            {{-- AKSI EDIT --}}
                            <td class="px-6 py-4">

                                @if($jurnal->status_jurnal === 'Perlu Revisi')

                                    <a href="{{ route('siswa.jurnal.edit', $jurnal->id_jurnal) }}"
                                       class="inline-flex items-center gap-2 rounded-lg bg-yellow-500/10 border border-yellow-500/15 px-4 py-2 text-xs font-semibold text-yellow-400 hover:bg-yellow-500/20 transition">

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

                                @else

                                    <span class="text-sm text-slate-700">-</span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-2xl bg-white/[0.03] border border-white/5 flex items-center justify-center mb-4">

                                        <svg class="w-7 h-7 text-slate-600"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>

                                        </svg>

                                    </div>

                                    <p class="text-white font-medium text-sm">
                                        Belum ada jurnal
                                    </p>

                                    <p class="text-slate-600 text-xs mt-1">
                                        Mulai isi jurnal kegiatan PKL kamu.
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