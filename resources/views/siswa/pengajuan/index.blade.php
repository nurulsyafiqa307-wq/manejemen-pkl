<x-siswa-layout>

    <x-slot name="title">
        Pengajuan PKL
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
            Pengajuan PKL
        </h1>

        <p class="text-slate-500 mt-2">
            Lihat status pengajuan PKL kamu
        </p>
    </div>

    <div class="space-y-6">

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol ajukan --}}
        @php
            $pengajuanAktif = $pengajuans->firstWhere('status', 'Menunggu Seleksi');
            $sudahLolos = $pengajuans->firstWhere('status', 'Lolos');
            $tidakLolos = $pengajuans->firstWhere('status', 'Tidak Lolos');
        @endphp

        <div class="flex justify-end">

            @if(!$sudahLolos && !$pengajuanAktif)

                <a
                    href="{{ route('siswa.pengajuan.create') }}"
                    class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 text-white font-medium hover:from-blue-500 hover:to-indigo-500 transition shadow-lg shadow-blue-600/20"
                >
                    @if($tidakLolos)
                        + Ajukan Lagi
                    @else
                        + Ajukan Tempat PKL
                    @endif
                </a>

            @endif

        </div>

        {{-- Tabel pengajuan --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>

                        <tr class="border-b border-slate-200 bg-slate-50">

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                No
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Tempat PKL
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Guru Pembimbing
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Tanggal Pengajuan
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($pengajuans as $pengajuan)

                            <tr class="hover:bg-slate-50 transition">

                                {{-- No --}}
                                <td class="px-6 py-4 text-slate-600 text-sm">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Tempat PKL --}}
                                <td class="px-6 py-4">

                                    <p class="font-semibold text-slate-800 text-sm">
                                        {{ $pengajuan->tempatPkl->nama_perusahaan ?? '-' }}
                                    </p>

                                    <p class="text-xs text-slate-500 mt-0.5">
                                        {{ $pengajuan->tempatPkl->bidang ?? '-' }}
                                    </p>

                                </td>

                                {{-- Guru Pembimbing --}}
                                <td class="px-6 py-4">

                                    @if($pengajuan->status === 'Lolos')

                                        <p class="font-semibold text-slate-800 text-sm">
                                            {{ $pengajuan->siswa->guruPembimbing->nama ?? '-' }}
                                        </p>

                                    @else

                                        <span class="text-xs text-slate-400">
                                            Belum ditentukan
                                        </span>

                                    @endif

                                </td>

                                {{-- Tanggal Pengajuan --}}
                                <td class="px-6 py-4 text-slate-600 text-sm">

                                    {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d-m-Y') }}

                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($pengajuan->status === 'Menunggu Seleksi')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-3 py-1 text-xs font-semibold text-yellow-700 border border-yellow-200">

                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>

                                            Menunggu Seleksi

                                        </span>

                                    @elseif($pengajuan->status === 'Lolos')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 border border-green-200">

                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                            Lolos

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700 border border-red-200">

                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                            Tidak Lolos

                                        </span>

                                    @endif

                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    @if($pengajuan->status === 'Tidak Lolos')

                                        <a
                                            href="{{ route('siswa.pengajuan.create') }}"
                                            class="inline-flex items-center rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-xs font-semibold text-white hover:from-blue-500 hover:to-indigo-500 transition shadow-md shadow-blue-600/15"
                                        >
                                            Ajukan Lagi
                                        </a>

                                    @elseif($pengajuan->status === 'Menunggu Seleksi')

                                        <span class="text-xs text-slate-400">
                                            Menunggu hasil seleksi
                                        </span>

                                    @elseif($pengajuan->status === 'Lolos')

                                        <span class="text-xs text-green-600 font-medium">
                                            ✓ Pengajuan diterima
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-16 text-center text-slate-400 text-sm"
                                >
                                    Belum ada pengajuan PKL.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-siswa-layout>