<x-app-layout>

    <x-slot:title>Dashboard</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">Dashboard</h2>
        </div>
    </x-slot:header>

    {{-- ===== WELCOME BANNER ===== --}}
    <div class="welcome-banner p-5 sm:p-6 lg:p-8 mb-5 anim">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
        <div class="grid-pattern"></div>

        <div class="relative z-10 flex flex-col items-center justify-center text-center gap-4">
            <div class="min-w-0">
                <p class="text-blue-100/80 text-[11px] font-medium mb-1.5 tracking-wide uppercase">
                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
                </p>

                <h2 class="text-[20px] sm:text-[24px] lg:text-[28px] font-bold text-white leading-tight mb-1.5">
                    Selamat datang, {{ explode(' ', Auth::user()->name ?? 'Admin')[0] }}
                </h2>

                <p class="text-blue-50/80 text-[12px] sm:text-[13px] max-w-md mx-auto leading-relaxed">
                    Pantau jurnal harian, kelola data PKL, dan evaluasi siswa dari satu dashboard.
                </p>
            </div>
        </div>
    </div>

    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4 mb-5 lg:mb-6">

        <div class="stat-card blue p-4 lg:p-5 anim anim-d1">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                         style="background: rgba(37,99,235,0.08);">
                        <i data-lucide="graduation-cap"
                           class="h-[18px] w-[18px]"
                           style="color: var(--accent-blue);"></i>
                    </div>

                    @if($siswaCount > 0)
                        <span class="stat-trend up">
                            <i data-lucide="trending-up" class="h-3 w-3"></i>
                            Aktif
                        </span>
                    @else
                        <span class="text-[10px] font-medium"
                              style="color: var(--text-dim);">—</span>
                    @endif

                </div>

                <p class="text-[26px] lg:text-[32px] font-bold text-slate-800 leading-none mb-1">
                    {{ $siswaCount }}
                </p>

                <p class="text-[11px] font-medium"
                   style="color: var(--text-muted);">
                    Data Siswa
                </p>
            </div>
        </div>


        <div class="stat-card purple p-4 lg:p-5 anim anim-d2">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                         style="background: rgba(124,58,237,0.08);">
                        <i data-lucide="users"
                           class="h-[18px] w-[18px]"
                           style="color: var(--accent-purple);"></i>
                    </div>

                    @if($guruCount > 0)
                        <span class="stat-trend neutral">
                            <i data-lucide="check" class="h-3 w-3"></i>
                            OK
                        </span>
                    @else
                        <span class="text-[10px] font-medium"
                              style="color: var(--text-dim);">—</span>
                    @endif

                </div>

                <p class="text-[26px] lg:text-[32px] font-bold text-slate-800 leading-none mb-1">
                    {{ $guruCount }}
                </p>

                <p class="text-[11px] font-medium"
                   style="color: var(--text-muted);">
                    Data Guru
                </p>
            </div>
        </div>


        <div class="stat-card amber p-4 lg:p-5 anim anim-d3">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                         style="background: rgba(245,158,11,0.08);">
                        <i data-lucide="file-text"
                           class="h-[18px] w-[18px]"
                           style="color: var(--accent-amber);"></i>
                    </div>

                    @if($pendingCount > 0)
                        <span class="badge badge-warning">
                            {{ $pendingCount }} baru
                        </span>
                    @else
                        <span class="stat-trend neutral">
                            <i data-lucide="check" class="h-3 w-3"></i>
                            OK
                        </span>
                    @endif

                </div>

                <p class="text-[26px] lg:text-[32px] font-bold text-slate-800 leading-none mb-1">
                    {{ $pengajuanCount }}
                </p>

                <p class="text-[11px] font-medium"
                   style="color: var(--text-muted);">
                    Pengajuan PKL
                </p>
            </div>
        </div>


        <div class="stat-card green p-4 lg:p-5 anim anim-d4">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                         style="background: rgba(34,197,94,0.08);">
                        <i data-lucide="notebook-pen"
                           class="h-[18px] w-[18px]"
                           style="color: var(--accent-green);"></i>
                    </div>

                    @if($jurnalCount > 0)
                        <span class="stat-trend neutral">
                            <i data-lucide="check" class="h-3 w-3"></i>
                            OK
                        </span>
                    @else
                        <span class="text-[10px] font-medium"
                              style="color: var(--text-dim);">—</span>
                    @endif

                </div>

                <p class="text-[26px] lg:text-[32px] font-bold text-slate-800 leading-none mb-1">
                    {{ $jurnalCount }}
                </p>

                <p class="text-[11px] font-medium"
                   style="color: var(--text-muted);">
                    Jurnal Harian
                </p>
            </div>
        </div>

    </div>


    {{-- ===== MAIN GRID ===== --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 lg:gap-5">

        {{-- Tabel Siswa Terbaru --}}
        <div class="xl:col-span-2 card overflow-hidden anim anim-d5">

            <div class="flex items-center justify-between px-5 py-4"
                 style="border-bottom:1px solid var(--border);">

                <div>
                    <h3 class="text-[13px] font-bold text-slate-800">
                        Siswa Terbaru
                    </h3>

                    <p class="text-[11px] mt-0.5"
                       style="color:var(--text-muted);">
                        {{ $siswaCount }} total terdaftar
                    </p>
                </div>

                <a href="{{ route('admin.siswa.index') }}"
                   class="btn-ghost flex items-center gap-1.5 px-2.5 py-1.5 text-[11px] font-medium">

                    Lihat semua

                    <i data-lucide="arrow-right"
                       class="h-3 w-3"></i>
                </a>
            </div>


            <div class="overflow-x-auto">

                <table class="table-dark w-full text-left">

                    <thead>
                        <tr>
                            <th class="px-5 py-3">Siswa</th>
                            <th class="px-5 py-3 hidden sm:table-cell">Kelas</th>
                            <th class="px-5 py-3 hidden lg:table-cell">Tempat PKL</th>
                            <th class="px-5 py-3 text-right">Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if($recentSiswa->count() > 0)

                            @foreach($recentSiswa as $siswa)

                                <tr>

                                    <td class="px-5 py-3">

                                        <div class="flex items-center gap-3">

                                            <div class="avatar h-8 w-8 text-[10px] rounded-lg"
                                                 style="background:linear-gradient(135deg,#2563eb,#4f46e5);">

                                                {{ strtoupper(substr($siswa->nama ?? 'S',0,1)) }}

                                            </div>

                                            <div class="min-w-0">

                                                <p class="text-[12.5px] font-semibold text-slate-800 truncate">
                                                    {{ $siswa->nama }}
                                                </p>

                                                <p class="text-[10px]"
                                                   style="color:var(--text-dim);">
                                                    {{ $siswa->nis }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="px-5 py-3 hidden sm:table-cell">

                                        <span class="text-[12px]"
                                              style="color:var(--text-secondary);">

                                            {{ $siswa->kelas }}

                                        </span>

                                    </td>


                                    <td class="px-5 py-3 hidden lg:table-cell">

                                        <span class="text-[12px] truncate block max-w-[180px]"
                                              style="color:var(--text-secondary);">

                                            {{ $siswa->tempat_pkl ?? '-' }}

                                        </span>

                                    </td>


                                    <td class="px-5 py-3 text-right">

                                        @if($siswa->status_pkl == 'PKL')

                                            <span class="badge badge-success">
                                                PKL
                                            </span>

                                        @elseif($siswa->status_pkl == 'Selesai')

                                            <span class="badge badge-info">
                                                Selesai
                                            </span>

                                        @else

                                            <span class="badge badge-danger">
                                                Belum PKL
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        @else

                            <tr>

                                <td colspan="4"
                                    class="px-5 py-16 text-center">

                                    <div class="flex flex-col items-center gap-2.5">

                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl"
                                             style="background:rgba(37,99,235,0.06);">

                                            <i data-lucide="inbox"
                                               class="h-5 w-5"
                                               style="color:var(--text-dim);"></i>

                                        </div>

                                        <p class="text-[12px]"
                                           style="color:var(--text-muted);">

                                            Belum ada data siswa

                                        </p>

                                        <a href="{{ route('admin.siswa.create') }}"
                                           class="btn-outline text-[11px]">

                                            <i data-lucide="plus"
                                               class="h-3 w-3"></i>

                                            Tambah siswa pertama

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endif

                    </tbody>

                </table>

            </div>

        </div>


        {{-- ===== RIGHT COLUMN ===== --}}
        <div class="space-y-4 lg:space-y-5">


            {{-- Pengajuan Menunggu --}}
            <div class="card p-5 anim anim-d7">

                <div class="flex items-center justify-between mb-4">

                    <h3 class="text-[13px] font-bold text-slate-800">
                        Pengajuan Masuk
                    </h3>

                    <span class="flex h-5 min-w-[20px] items-center justify-center rounded-md px-1.5 text-[10px] font-bold"
                          style="background: rgba(245,158,11,0.10); color: #b45309;">

                        {{ $pendingCount }}

                    </span>

                </div>


                @if($pendingPengajuan->count() > 0)

                    <div class="space-y-2">

                        @foreach($pendingPengajuan as $p)

                            <a href="{{ route('admin.pengajuan.show', $p->id) }}"
                               class="flex items-center gap-3 p-3 rounded-lg transition hover:bg-slate-50"
                               style="border: 1px solid var(--border);">

                                <div class="avatar h-9 w-9 text-[11px] rounded-lg shrink-0"
                                     style="background: linear-gradient(135deg, #d97706, #b45309);">

                                    {{ strtoupper(substr($p->siswa->nama ?? 'S', 0, 1)) }}

                                </div>

                                <div class="min-w-0 flex-1">

                                    <p class="text-[12px] font-medium text-slate-800 truncate">
                                        {{ $p->siswa->nama ?? '-' }}
                                    </p>

                                    <p class="text-[10px] truncate"
                                       style="color: var(--text-dim);">

                                        {{ $p->tempat_pkl ?? '-' }}

                                    </p>

                                </div>

                                <span class="badge badge-warning shrink-0">
                                    Menunggu
                                </span>

                            </a>

                        @endforeach

                    </div>

                @else

                    <div class="flex flex-col items-center py-6 gap-2.5">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: rgba(34,197,94,0.08);">

                            <i data-lucide="check-circle-2"
                               class="h-4 w-4"
                               style="color: var(--accent-green);"></i>

                        </div>

                        <p class="text-[11px]"
                           style="color: var(--text-muted);">

                            Semua pengajuan sudah diproses

                        </p>

                    </div>

                @endif

            </div>


            {{-- Jurnal Terbaru --}}
            <div class="card p-5 anim anim-d7">

                <div class="flex items-center justify-between mb-4">

                    <h3 class="text-[13px] font-bold text-slate-800">
                        Jurnal Terbaru
                    </h3>

                    <div class="flex h-6 w-6 items-center justify-center rounded-md"
                         style="background: rgba(34,197,94,0.08);">

                        <i data-lucide="pen-line"
                           class="h-3 w-3"
                           style="color: var(--accent-green);"></i>

                    </div>

                </div>


                @if($recentJurnal->count() > 0)

                    <div class="space-y-2.5">

                        @foreach($recentJurnal as $j)

                            <div class="p-3 rounded-lg transition hover:bg-slate-50"
                                 style="background: #f8fafc; border: 1px solid var(--border);">

                                <div class="flex items-center justify-between mb-1.5">

                                    <div class="flex items-center gap-2 min-w-0">

                                        <div class="avatar h-6 w-6 text-[8px] rounded-md"
                                             style="background: rgba(34,197,94,0.10);">

                                            {{ strtoupper(substr($j->siswa->nama ?? 'S', 0, 1)) }}

                                        </div>

                                        <p class="text-[12px] font-medium text-slate-800 truncate">
                                            {{ $j->siswa->nama ?? '-' }}
                                        </p>

                                    </div>


                                    <span class="text-[10px] shrink-0 ml-2 px-1.5 py-0.5 rounded"
                                          style="color: var(--text-dim); background: #eef2f7;">

                                        {{ \Carbon\Carbon::parse($j->tanggal ?? now())->format('d M') }}

                                    </span>

                                </div>


                                <p class="text-[11px] line-clamp-2 leading-relaxed pl-8"
                                   style="color: var(--text-muted);">

                                    {{ $j->kegiatan ?? '-' }}

                                </p>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="flex flex-col items-center py-6 gap-2.5">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: rgba(37,99,235,0.06);">

                            <i data-lucide="book-open"
                               class="h-4 w-4"
                               style="color: var(--text-dim);"></i>

                        </div>

                        <p class="text-[11px]"
                           style="color: var(--text-muted);">

                            Belum ada jurnal masuk

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    @push('scripts')

        <script>
            lucide.createIcons();
        </script>

    @endpush

</x-app-layout>