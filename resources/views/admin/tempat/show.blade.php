<x-app-layout>

    <x-slot:title>Detail Tempat PKL</x-slot:title>

    <x-slot:header>
        <div class="flex items-center gap-3">

            <a
                href="{{ route('admin.tempat.index') }}"
                class="flex h-8 w-8 items-center justify-center rounded-lg transition hover:bg-slate-100"
                style="color: var(--text-secondary);"
            >
                <i data-lucide="arrow-left" class="h-4 w-4"></i>
            </a>

            <div>
                <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                    Detail Tempat PKL
                </h2>

                <p
                    class="text-[11px] hidden sm:block"
                    style="color: var(--text-muted);"
                >
                    Profil {{ $tempat->nama_perusahaan }}
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

                    {{-- AVATAR PERUSAHAAN --}}
                    <div class="relative shrink-0">

                        <div
                            class="avatar h-[72px] w-[72px] text-[26px] rounded-2xl flex items-center justify-center"
                            style="background: linear-gradient(135deg, #059669, #10b981); box-shadow: 0 8px 24px -4px rgba(5,150,105,0.25);"
                        >
                            {{ strtoupper(substr($tempat->nama_perusahaan, 0, 1)) }}
                        </div>

                    </div>


                    {{-- NAMA + BIDANG + KUOTA --}}
                    <div class="min-w-0 text-center">

                        <h3 class="text-[20px] font-bold text-slate-800 leading-tight">
                            {{ $tempat->nama_perusahaan }}
                        </h3>

                        <p
                            class="text-[12px] mt-1"
                            style="color: var(--text-muted);"
                        >
                            {{ $tempat->bidang }}
                        </p>

                        <div class="flex items-center justify-center gap-2 mt-2.5 flex-wrap">

                            <span class="badge badge-neutral">
                                {{ $tempat->bidang }}
                            </span>

                            <div
                                class="flex items-center gap-1 px-2 py-0.5 rounded-md"
                                style="background: rgba(34,197,94,0.08);"
                            >
                                <i
                                    data-lucide="users"
                                    class="h-2.5 w-2.5"
                                    style="color: #16a34a;"
                                ></i>

                                <span
                                    class="text-[10px] font-semibold"
                                    style="color: #16a34a;"
                                >
                                    Kuota {{ $tempat->kuota }}
                                </span>
                            </div>

                        </div>

                    </div>


                    {{-- TOMBOL KEMBALI --}}
                    <div class="flex items-center justify-center gap-2 mt-1">

                        <a
                            href="{{ route('admin.tempat.index') }}"
                            class="btn-ghost flex items-center gap-1.5 px-3 py-1.5 text-[11px] font-medium"
                        >
                            <i data-lucide="arrow-left" class="h-3 w-3"></i>
                            Kembali
                        </a>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- INFORMASI PERUSAHAAN --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="building"
                        class="h-3.5 w-3.5"
                        style="color: #16a34a;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #16a34a;"
                    >
                        Informasi Perusahaan
                    </span>

                </div>


                <div class="space-y-3.5">

                    {{-- NAMA PERUSAHAAN --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Nama Perusahaan
                        </p>

                        <p class="text-[12.5px] font-medium text-slate-800 text-right">
                            {{ $tempat->nama_perusahaan }}
                        </p>

                    </div>


                    {{-- BIDANG --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Bidang
                        </p>

                        <span class="badge badge-neutral shrink-0">
                            {{ $tempat->bidang }}
                        </span>

                    </div>


                    {{-- KUOTA --}}
                    <div class="flex justify-between items-start gap-4">

                        <p
                            class="text-[12px] shrink-0"
                            style="color: var(--text-dim);"
                        >
                            Kuota
                        </p>

                        <p
                            class="text-[12.5px] font-medium text-right"
                            style="color: var(--text-secondary);"
                        >
                            {{ $tempat->kuota }} orang
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- KONTAK & LOKASI --}}
            {{-- ===================================================== --}}

            <div
                class="px-6 py-5"
                style="border-bottom: 1px solid var(--border);"
            >

                <div class="flex items-center gap-2 mb-4">

                    <i
                        data-lucide="phone"
                        class="h-3.5 w-3.5"
                        style="color: #2563eb;"
                    ></i>

                    <span
                        class="text-[10px] font-bold uppercase tracking-widest"
                        style="color: #2563eb;"
                    >
                        Kontak & Lokasi
                    </span>

                </div>


                <div class="space-y-3.5">

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
                            {{ $tempat->no_hp ?? '-' }}
                        </p>

                    </div>


                    {{-- ALAMAT --}}
                    <div>

                        <p
                            class="text-[12px] mb-1"
                            style="color: var(--text-dim);"
                        >
                            Alamat
                        </p>

                        <p
                            class="text-[12.5px] font-medium"
                            style="color: var(--text-secondary);"
                        >
                            {{ $tempat->alamat ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- KETERANGAN --}}
            {{-- ===================================================== --}}

            @if($tempat->keterangan)

                <div
                    class="px-6 py-5"
                    style="border-bottom: 1px solid var(--border);"
                >

                    <div class="flex items-center gap-2 mb-4">

                        <i
                            data-lucide="file-text"
                            class="h-3.5 w-3.5"
                            style="color: #d97706;"
                        ></i>

                        <span
                            class="text-[10px] font-bold uppercase tracking-widest"
                            style="color: #d97706;"
                        >
                            Keterangan
                        </span>

                    </div>

                    <p
                        class="text-[12.5px] leading-relaxed"
                        style="color: var(--text-secondary);"
                    >
                        {{ $tempat->keterangan }}
                    </p>

                </div>

            @endif


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
                            ID Tempat PKL
                        </p>

                        <p
                            class="text-[12.5px] font-mono text-right"
                            style="color: var(--text-dim);"
                        >
                            #{{ $tempat->id }}
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
                            {{ $tempat->created_at->format('d M Y, H:i') }}
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
                            {{ $tempat->updated_at->format('d M Y, H:i') }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- ACTION BUTTONS --}}
            {{-- ===================================================== --}}

            <div class="px-6 py-4 flex items-center justify-end gap-2 bg-slate-50/50">

                {{-- EDIT --}}
                <a
                    href="{{ route('admin.tempat.edit', $tempat) }}"
                    class="btn-outline flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-[11px] font-medium"
                >
                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                    Edit
                </a>


                {{-- HAPUS --}}
                <form
                    action="{{ route('admin.tempat.destroy', $tempat) }}"
                    method="POST"
                    class="form-delete"
                    data-confirm-message="Yakin ingin menghapus {{ $tempat->nama_perusahaan }}?"
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