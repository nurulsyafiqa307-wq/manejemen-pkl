<x-app-layout>

    <x-slot:title>Detail Siswa</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">
            <a
                href="{{ route('admin.siswa.index') }}"
                class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-slate-100"
                style="color: var(--text-secondary);"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>

            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                    Detail Siswa
                </h2>

                <p
                    class="text-[11px] hidden sm:block"
                    style="color: var(--text-muted);"
                >
                    Profil {{ $siswa->nama }}
                </p>
            </div>
        </div>
    </x-slot:header>


    {{-- mx-auto buat tengah --}}
    <div class="max-w-2xl mx-auto">

        <div class="card overflow-hidden anim">


            {{-- ===================================================== --}}
            {{-- HEADER --}}
            {{-- ===================================================== --}}

            <div
                class="p-6"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex flex-col items-center justify-center text-center gap-4">

                    {{-- FOTO / AVATAR --}}
                    <div class="relative shrink-0">

                        <div
                            class="avatar h-[72px] w-[72px] text-[26px] rounded-2xl flex items-center justify-center"
                            style="background: linear-gradient(135deg, #2563eb, #4f46e5); box-shadow: 0 8px 24px -4px rgba(37,99,235,0.25);"
                        >
                            {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                        </div>


                        @php
                            $dotColor = match($siswa->status_pkl ?? '') {
                                'aktif'    => '#22c55e',
                                'selesai'  => '#3b82f6',
                                'menunggu' => '#f59e0b',
                                default    => '#6b7280',
                            };
                        @endphp


                        <span
                            class="absolute -bottom-0.5 -right-0.5 h-4 w-4 rounded-full border-2"
                            style="background: {{ $dotColor }}; border-color: var(--bg-card);"
                        ></span>

                    </div>


                    {{-- NAMA + NIS + STATUS --}}
                    <div class="min-w-0 text-center">

                        <h3 class="text-[20px] font-bold text-slate-800 leading-tight">
                            {{ $siswa->nama }}
                        </h3>

                        <p
                            class="text-[12px] mt-1 font-mono"
                            style="color: var(--text-muted);"
                        >
                            NIS:

                            <span style="color: var(--text-secondary);">
                                {{ $siswa->nis }}
                            </span>
                        </p>

                        <div class="flex items-center justify-center gap-2 mt-2.5 flex-wrap">

                            <span class="badge badge-neutral">
                                {{ $siswa->kelas }}
                            </span>

                            <span class="badge badge-neutral">
                                {{ $siswa->jurusan }}
                            </span>

                            @php
                                $bc = 'badge-danger';
                                $sl = 'Belum PKL';

                                if (isset($siswa->status_pkl)) {

                                    $bc = match($siswa->status_pkl) {
                                        'aktif'    => 'badge-success',
                                        'selesai'  => 'badge-info',
                                        'menunggu' => 'badge-warning',
                                        default    => 'badge-danger',
                                    };

                                    $sl = match($siswa->status_pkl) {
                                        'aktif'    => 'Aktif',
                                        'selesai'  => 'Selesai',
                                        'menunggu' => 'Menunggu',
                                        default    => 'Belum PKL',
                                    };
                                }
                            @endphp

                            <span class="badge {{ $bc }}">
                                {{ $sl }}
                            </span>

                        </div>

                    </div>


                    {{-- TOMBOL KEMBALI --}}
                    <div class="flex items-center justify-center gap-2 mt-1">

                        <a
                            href="{{ route('admin.siswa.index') }}"
                            class="btn-ghost flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-medium"
                        >
                            <i data-lucide="arrow-left" class="h-3 w-3"></i>
                            Kembali
                        </a>

                    </div>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- DATA PRIBADI --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="user"
                        class="h-3.5 w-3.5"
                        style="color: #2563eb;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #2563eb;"
                    >
                        Data Pribadi
                    </span>

                </div>


                <div class="space-y-3.5">

                    {{-- NAMA --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Nama Lengkap
                        </p>

                        <p class="text-[12.5px] font-medium text-slate-800 text-right">
                            {{ $siswa->nama }}
                        </p>

                    </div>


                    {{-- NIS --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            NIS
                        </p>

                        <p
                            class="text-[12.5px] font-mono font-medium text-right"
                            style="color: var(--text-secondary);"
                        >
                            {{ $siswa->nis }}
                        </p>

                    </div>


                    {{-- NO HP --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            No. HP
                        </p>

                        <p
                            class="text-[12.5px] font-medium text-right"
                            style="color: var(--text-secondary);"
                        >
                            {{ $siswa->no_hp ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- DATA AKADEMIK --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="graduation-cap"
                        class="h-3.5 w-3.5"
                        style="color: #16a34a;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #16a34a;"
                    >
                        Data Akademik
                    </span>

                </div>


                <div class="space-y-3.5">

                    {{-- KELAS --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Kelas
                        </p>

                        <p class="text-[12.5px] font-medium text-slate-800 text-right">
                            {{ $siswa->kelas }}
                        </p>

                    </div>


                    {{-- JURUSAN --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Jurusan
                        </p>

                        <p class="text-[12.5px] font-medium text-slate-800 text-right">
                            {{ $siswa->jurusan }}
                        </p>

                    </div>


                    {{-- STATUS PKL --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Status PKL
                        </p>

                        <span class="badge {{ $bc }} shrink-0">
                            {{ $sl }}
                        </span>

                    </div>


                    {{-- TEMPAT PKL --}}
                    @if($siswa->tempat_pkl)

                        <div class="flex justify-between items-start gap-4">

                            <p
                                class="text-[12px] shrink-0"
                                style="color: var(--text-dim);"
                            >
                                Tempat PKL
                            </p>

                            <p
                                class="text-[12.5px] font-medium text-right"
                                style="color: var(--text-secondary);"
                            >
                                {{ $siswa->tempat_pkl }}
                            </p>

                        </div>

                    @endif

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- AKUN LOGIN --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="shield"
                        class="h-3.5 w-3.5"
                        style="color: #7c3aed;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #7c3aed;"
                    >
                        Akun Login
                    </span>

                </div>


                <div class="space-y-3.5">

                    {{-- EMAIL --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            E-mail
                        </p>

                        <p
                            class="text-[12.5px] font-medium text-right"
                            style="color: var(--text-secondary);"
                        >
                            {{ $siswa->user->email ?? '-' }}
                        </p>

                    </div>


                    {{-- ROLE --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Role
                        </p>

                        <span class="badge badge-neutral shrink-0">
                            Siswa
                        </span>

                    </div>


                    {{-- STATUS AKUN --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Status Akun
                        </p>

                        @if($siswa->user)

                            <span class="badge badge-success shrink-0">
                                Aktif
                            </span>

                        @else

                            <span class="badge badge-danger shrink-0">
                                Tidak tersedia
                            </span>

                        @endif

                    </div>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- INFO SISTEM --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="clock"
                        class="h-3.5 w-3.5"
                        style="color: #64748b;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #64748b;"
                    >
                        Info Sistem
                    </span>

                </div>


                <div class="space-y-3.5">

                    {{-- ID --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            ID Siswa
                        </p>

                        <p
                            class="text-[12.5px] font-mono text-right"
                            style="color: var(--text-dim);"
                        >
                            #{{ $siswa->id }}
                        </p>

                    </div>


                    {{-- DIBUAT --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Dibuat
                        </p>

                        <p
                            class="text-[12.5px] text-right"
                            style="color: var(--text-dim);"
                        >
                            {{ $siswa->created_at->format('d M Y, H:i') }}
                        </p>

                    </div>


                    {{-- TERAKHIR DIUBAH --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Terakhir diubah
                        </p>

                        <p
                            class="text-[12.5px] text-right"
                            style="color: var(--text-dim);"
                        >
                            {{ $siswa->updated_at->format('d M Y, H:i') }}
                        </p>

                    </div>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- ACTION BUTTONS (EDIT & HAPUS) --}}
            {{-- ===================================================== --}}

            <div class="px-6 py-4 flex items-center justify-end gap-2 bg-slate-50/50">

                <a
                    href="{{ route('admin.siswa.edit', $siswa->id) }}"
                    class="btn-outline flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-[11px] font-medium"
                >
                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                    Edit
                </a>


                <form
                    action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                    method="POST"
                    class="form-delete"
                    data-confirm-message="Yakin ingin menghapus {{ $siswa->nama }}?"
                >

                    @csrf
                    @method('DELETE')


                    <button
                        type="submit"
                        class="flex items-center justify-center gap-1.5 px-3.5 py-2 rounded-lg text-[11px] font-semibold transition"
                        style="
                            color: #ffffff;
                            background: #dc2626;
                            box-shadow: 0 3px 8px rgba(220,38,38,0.18);
                        "
                        onmouseover="this.style.background='#b91c1c'"
                        onmouseout="this.style.background='#dc2626'"
                    >

                        <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                        Hapus Data

                    </button>

                </form>

            </div>

        </div>

    </div>



    {{-- ============================================================= --}}
    {{-- SWEETALERT2 --}}
    {{-- ============================================================= --}}

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <style>

            .swal2-popup-custom {
                border-radius: 18px !important;
                padding: 28px !important;
            }


            .swal2-title-custom {
                font-size: 20px !important;
                font-weight: 700 !important;
                color: #1e293b !important;
            }


            .swal2-text-custom {
                font-size: 13px !important;
                color: #64748b !important;
            }


            .swal2-confirm-custom {
                background: #dc2626 !important;
                color: #ffffff !important;
                border: none !important;
                border-radius: 8px !important;
                padding: 9px 18px !important;
                font-size: 12px !important;
                font-weight: 600 !important;
                margin: 0 4px !important;
                cursor: pointer !important;
            }


            .swal2-confirm-custom:hover {
                background: #b91c1c !important;
            }


            .swal2-cancel-custom {
                background: #f1f5f9 !important;
                color: #475569 !important;
                border: none !important;
                border-radius: 8px !important;
                padding: 9px 18px !important;
                font-size: 12px !important;
                font-weight: 600 !important;
                margin: 0 4px !important;
                cursor: pointer !important;
            }


            .swal2-cancel-custom:hover {
                background: #e2e8f0 !important;
            }

        </style>


        <script>

            lucide.createIcons();


            document.querySelectorAll('.form-delete').forEach(function (form) {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();


                    const message =
                        form.dataset.confirmMessage ||
                        'Yakin ingin menghapus data ini?';


                    Swal.fire({

                        title: 'Hapus Data?',

                        text: message,

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: 'Ya, Hapus',

                        cancelButtonText: 'Batal',

                        reverseButtons: true,

                        buttonsStyling: false,

                        customClass: {

                            popup: 'swal2-popup-custom',

                            title: 'swal2-title-custom',

                            htmlContainer: 'swal2-text-custom',

                            confirmButton: 'swal2-confirm-custom',

                            cancelButton: 'swal2-cancel-custom'

                        }

                    }).then(function (result) {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });

        </script>

    @endpush


</x-app-layout>