<x-siswa-layout>

    <x-slot name="title">
        Pengajuan PKL
    </x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold header-title">
            Pengajuan PKL
        </h1>

        <p class="text-slate-500 mt-2">
            Lihat status pengajuan PKL kamu
        </p>
    </div>

    <div class="space-y-6">

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="rounded-xl border border-green-500/20 bg-green-500/8 px-5 py-4 text-green-400 text-sm">
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
        <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/[0.02]">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>
                        <tr class="border-b border-white/5">

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

                    <tbody class="divide-y divide-white/[0.03]">

                        @forelse($pengajuans as $pengajuan)

                            <tr class="hover:bg-white/[0.02] transition">

                                {{-- No --}}
                                <td class="px-6 py-4 text-slate-400 text-sm">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Tempat PKL --}}
                                <td class="px-6 py-4">

                                    <p class="font-semibold text-white text-sm">
                                        {{ $pengajuan->tempatPkl->nama_perusahaan ?? '-' }}
                                    </p>

                                    <p class="text-xs text-slate-500 mt-0.5">
                                        {{ $pengajuan->tempatPkl->bidang ?? '-' }}
                                    </p>

                                </td>

                                {{-- Guru Pembimbing --}}
                                <td class="px-6 py-4">

                                    @if($pengajuan->status === 'Lolos')

                                        <p class="font-semibold text-white text-sm">
                                            {{ $pengajuan->siswa->guruPembimbing->nama ?? '-' }}
                                        </p>

                                    @else

                                        <span class="text-xs text-slate-600">
                                            Belum ditentukan
                                        </span>

                                    @endif

                                </td>

                                {{-- Tanggal Pengajuan --}}
                                <td class="px-6 py-4 text-slate-400 text-sm">
                                    {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d-m-Y') }}
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($pengajuan->status === 'Menunggu Seleksi')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-500/10 px-3 py-1 text-xs font-semibold text-yellow-400 border border-yellow-500/15">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                            Menunggu Seleksi
                                        </span>

                                    @elseif($pengajuan->status === 'Lolos')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400 border border-green-500/15">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                            Lolos
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400 border border-red-500/15">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
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

                                        <span class="text-xs text-slate-600">
                                            Menunggu hasil seleksi
                                        </span>

                                    @elseif($pengajuan->status === 'Lolos')

                                        <span class="text-xs text-green-400/80 font-medium">
                                            ✓ Pengajuan diterima
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-16 text-center text-slate-600 text-sm"
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