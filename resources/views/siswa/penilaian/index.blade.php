<x-siswa-layout>

    <x-slot name="title">
        Penilaian PKL
    </x-slot>

    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold header-title">
            Penilaian PKL
        </h1>

        <p class="text-slate-500 mt-2 text-sm">
            Lihat hasil penilaian PKL kamu.
        </p>
    </div>

    @if($penilaian)

        {{-- Nilai Rata-rata --}}
        <div class="mb-6 rounded-2xl border border-white/[0.06] bg-white/[0.02] p-6 sm:p-8 relative overflow-hidden">
            <div class="absolute -top-16 -right-16 w-56 h-56 rounded-full bg-indigo-600/10 blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full bg-blue-600/8 blur-3xl"></div>

            <div class="relative flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">

                <div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">
                        Nilai Rata-rata
                    </p>

                    <div class="mt-3 flex items-end gap-3">
                        <span class="text-6xl sm:text-7xl font-extrabold bg-gradient-to-b from-white via-white to-slate-500 bg-clip-text text-transparent leading-none">
                            {{ number_format($penilaian->rata_rata, 1) }}
                        </span>
                        <span class="mb-2.5 text-slate-600 text-sm font-medium">/ 100</span>
                    </div>
                </div>

                @php
                    $r = $penilaian->rata_rata;
                    $grade = $r >= 90 ? 'A' : ($r >= 80 ? 'B' : ($r >= 70 ? 'C' : ($r >= 60 ? 'D' : 'E')));
                    $gradeColor = $r >= 90 ? 'from-emerald-400 to-emerald-600' : ($r >= 80 ? 'from-blue-400 to-indigo-600' : ($r >= 70 ? 'from-yellow-400 to-amber-600' : 'from-red-400 to-red-600'));
                @endphp
                <div class="sm:text-right">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-1">Predikat</p>
                    <span class="text-5xl sm:text-6xl font-extrabold bg-gradient-to-br {{ $gradeColor }} bg-clip-text text-transparent leading-none">
                        {{ $grade }}
                    </span>
                </div>

            </div>

            <div class="mt-6 relative">
                <div class="w-full h-2.5 rounded-full bg-white/[0.04]">
                    <div class="h-full rounded-full bg-gradient-to-r from-blue-500 via-indigo-500 to-violet-500"
                         style="width: {{ $penilaian->rata_rata }}%; box-shadow: 0 0 12px rgba(99,102,241,0.4);"></div>
                </div>
            </div>
        </div>

        {{-- Detail Nilai --}}
        <div class="rounded-2xl border border-white/[0.06] bg-white/[0.02] overflow-hidden">

            <div class="p-5 sm:p-6 border-b border-white/[0.04]">
                <h2 class="text-base font-bold text-white">Detail Penilaian</h2>
                <p class="text-xs text-slate-600 mt-1">Nilai yang diberikan oleh penilai PKL.</p>
            </div>

            <div class="divide-y divide-white/[0.03]">

                @php
                    $items = [
                        ['label' => 'Disiplin', 'value' => $penilaian->disiplin, 'bg' => '#3b82f6', 'glow' => 'rgba(59,130,246,0.35)'],
                        ['label' => 'Komunikasi', 'value' => $penilaian->komunikasi, 'bg' => '#6366f1', 'glow' => 'rgba(99,102,241,0.35)'],
                        ['label' => 'Kerjasama', 'value' => $penilaian->kerjasama, 'bg' => '#8b5cf6', 'glow' => 'rgba(139,92,246,0.35)'],
                        ['label' => 'Tanggung Jawab', 'value' => $penilaian->tanggung_jawab, 'bg' => '#06b6d4', 'glow' => 'rgba(6,182,212,0.35)'],
                        ['label' => 'Keterampilan', 'value' => $penilaian->keterampilan, 'bg' => '#10b981', 'glow' => 'rgba(16,185,129,0.35)'],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="px-5 sm:px-6 py-5 hover:bg-white/[0.015] transition">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-slate-300 text-sm font-medium">{{ $item['label'] }}</span>
                            <div class="flex items-center gap-2.5">
                                <span class="font-bold text-white text-sm tabular-nums">{{ $item['value'] }}</span>
                                <span class="text-[10px] text-slate-600 font-medium w-7 text-right">/100</span>
                            </div>
                        </div>
                        <div class="w-full h-2 rounded-full bg-white/[0.04]">
                            <div class="h-full rounded-full"
                                 style="width: {{ $item['value'] }}%; background: {{ $item['bg'] }}; box-shadow: 0 0 10px {{ $item['glow'] }};"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Catatan --}}
        @if($penilaian->catatan)
            <div class="mt-6 rounded-2xl border border-white/[0.06] bg-white/[0.02] p-5 sm:p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-[3px] h-full bg-gradient-to-b from-indigo-500 via-violet-500 to-transparent"></div>

                <div class="pl-4">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                        <h2 class="text-base font-bold text-white">Catatan Penilai</h2>
                    </div>

                    <p class="leading-relaxed text-slate-400 text-sm">
                        {{ $penilaian->catatan }}
                    </p>
                </div>
            </div>
        @endif

    @else

        <div class="rounded-2xl border border-white/[0.06] bg-white/[0.02] px-6 py-20 text-center relative overflow-hidden">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-56 h-56 rounded-full bg-indigo-600/5 blur-3xl"></div>

            <div class="relative">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-white/[0.03] border border-white/5">
                    <svg class="h-8 w-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <p class="font-semibold text-white text-sm">Belum Ada Penilaian</p>
                <p class="mt-1.5 text-xs text-slate-600 max-w-xs mx-auto leading-relaxed">
                    Nilai PKL kamu belum diberikan oleh penilai.
                </p>
            </div>
        </div>

    @endif

</x-siswa-layout>