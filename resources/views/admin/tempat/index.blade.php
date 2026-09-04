<x-app-layout>

    <x-slot:title>Tempat PKL</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Tempat PKL
            </h2>

            <p
                class="text-[11px] hidden sm:block"
                style="color: var(--text-muted);"
            >
                Kelola data perusahaan tempat PKL
            </p>
        </div>
    </x-slot:header>


    {{-- Alert --}}
    @if(session('success'))

        <div
            class="flex items-center gap-3 p-4 rounded-xl mb-4 anim"
            style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);"
        >

            <div
                class="flex h-8 w-8 items-center justify-center rounded-lg shrink-0"
                style="background: rgba(34,197,94,0.12);"
            >
                <i
                    data-lucide="check-circle-2"
                    class="h-4 w-4"
                    style="color: #4ade80;"
                ></i>
            </div>

            <p
                class="text-[12.5px] font-medium"
                style="color: #4ade80;"
            >
                {{ session('success') }}
            </p>

            <button
                onclick="this.closest('div').remove()"
                class="ml-auto shrink-0"
                style="color: rgba(34,197,94,0.5);"
            >
                <i
                    data-lucide="x"
                    class="h-4 w-4"
                ></i>
            </button>

        </div>

    @endif


    {{-- Top Bar --}}
    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 anim"
    >

        <div>

            <h3 class="text-[16px] font-bold text-white">
                Daftar Tempat PKL
            </h3>

            <p
                class="text-[11px] mt-0.5"
                style="color: var(--text-dim);"
            >
                Kelola data perusahaan tempat PKL
            </p>

        </div>


        <div class="flex items-center gap-2">

            {{-- Search --}}
            <form
                action="{{ route('admin.tempat.index') }}"
                method="GET"
                class="relative w-full sm:w-[220px]"
            >

                <i
                    data-lucide="search"
                    class="absolute left-3 top-1/2 -translate-y-1/2 h-3.5 w-3.5"
                    style="color: var(--text-dim);"
                ></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari tempat..."
                    class="input-dark w-full rounded-lg pl-9 pr-9 py-2.5 text-[12px]"
                >

                @if(request('search'))

                    <a
                        href="{{ route('admin.tempat.index') }}"
                        class="absolute right-3 top-1/2 -translate-y-1/2"
                        style="color: var(--text-dim);"
                        title="Reset pencarian"
                    >
                        <i
                            data-lucide="x"
                            class="h-3.5 w-3.5"
                        ></i>
                    </a>

                @endif

            </form>


            {{-- Tambah --}}
            <a
                href="{{ route('admin.tempat.create') }}"
                class="btn-primary text-[11px] px-3 py-2 shrink-0"
            >

                <i
                    data-lucide="plus"
                    class="h-3.5 w-3.5"
                ></i>

                Tambah

            </a>

        </div>

    </div>


    {{-- Info Bar --}}
    <div
        class="flex items-center justify-between mb-4 px-1 anim anim-d1"
    >

        <p
            class="text-[11px]"
            style="color: var(--text-dim);"
        >

            @if(request('search'))

                Hasil pencarian:
                <span
                    class="font-semibold text-white"
                >
                    {{ $tempats->total() }}
                </span>
                perusahaan

            @else

                Total
                <span
                    class="font-semibold text-white"
                >
                    {{ $tempats->total() }}
                </span>
                perusahaan

            @endif

        </p>

    </div>


    {{-- Card Grid --}}
    @if($tempats->count() > 0)

        <div
            class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4"
            id="tempatGrid"
        >

            @foreach($tempats as $tempat)

                <div
                    class="tempat-card card p-5 anim anim-d1 transition-all duration-200 cursor-pointer hover:translate-y-[-2px]"
                    onclick="window.location='{{ route('admin.tempat.show', $tempat) }}'"
                >

                    {{-- Header --}}
                    <div class="flex items-start justify-between mb-4">

                        <div class="flex items-center gap-3">

                            <div
                                class="avatar h-11 w-11 text-[14px] rounded-xl"
                                style="background: linear-gradient(135deg, #059669, #10b981);"
                            >
                                {{ strtoupper(substr($tempat->nama_perusahaan, 0, 1)) }}
                            </div>

                            <div class="min-w-0">

                                <h3
                                    class="text-[13px] font-bold text-white leading-tight truncate"
                                >
                                    {{ $tempat->nama_perusahaan }}
                                </h3>

                                <span class="badge badge-neutral mt-1">
                                    {{ $tempat->bidang }}
                                </span>

                            </div>

                        </div>


                        {{-- Aksi --}}
                        <div class="flex items-center gap-1 shrink-0">

                            <a
                                href="{{ route('admin.tempat.edit', $tempat) }}"
                                onclick="event.stopPropagation()"
                                class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                style="color: var(--text-dim);"
                                onmouseover="this.style.background='rgba(245,158,11,0.1)';this.style.color='#fbbf24'"
                                onmouseout="this.style.background='transparent';this.style.color='var(--text-dim)'"
                                title="Edit"
                            >
                                <i
                                    data-lucide="pencil"
                                    class="h-3 w-3"
                                ></i>
                            </a>


                            <form
                                action="{{ route('admin.tempat.destroy', $tempat) }}"
                                method="POST"
                                onclick="event.stopPropagation()"
                                onsubmit="return confirm('Yakin ingin menghapus {{ $tempat->nama_perusahaan }}?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="event.stopPropagation()"
                                    class="flex h-7 w-7 items-center justify-center rounded-md transition"
                                    style="color: var(--text-dim);"
                                    onmouseover="this.style.background='rgba(239,68,68,0.1)';this.style.color='#f87171'"
                                    onmouseout="this.style.background='transparent';this.style.color='var(--text-dim)'"
                                    title="Hapus"
                                >
                                    <i
                                        data-lucide="trash-2"
                                        class="h-3 w-3"
                                    ></i>
                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- Info --}}
                    <div class="space-y-2.5">

                        <div class="flex items-center gap-2">

                            <i
                                data-lucide="map-pin"
                                class="h-3 w-3 shrink-0"
                                style="color: var(--text-dim);"
                            ></i>

                            <span
                                class="text-[11px] truncate"
                                style="color: var(--text-secondary);"
                            >
                                {{ $tempat->alamat ?? 'Belum ada alamat' }}
                            </span>

                        </div>


                        <div class="flex items-center gap-2">

                            <i
                                data-lucide="phone"
                                class="h-3 w-3 shrink-0"
                                style="color: var(--text-dim);"
                            ></i>

                            <span
                                class="text-[11px]"
                                style="color: var(--text-secondary);"
                            >
                                {{ $tempat->no_hp ?? '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- Footer --}}
                    <div
                        class="flex items-center justify-between mt-4 pt-3"
                        style="border-top: 1px solid var(--border);"
                    >

                        <div class="flex items-center gap-1.5">

                            <i
                                data-lucide="users"
                                class="h-3 w-3"
                                style="color: var(--accent-green);"
                            ></i>

                            <span
                                class="text-[11px] font-semibold"
                                style="color: var(--accent-green);"
                            >
                                {{ $tempat->kuota }}
                            </span>

                            <span
                                class="text-[10px]"
                                style="color: var(--text-dim);"
                            >
                                kuota
                            </span>

                        </div>


                        <span
                            class="text-[10px] font-medium"
                            style="color: var(--accent-blue);"
                        >
                            Detail

                            <i
                                data-lucide="arrow-right"
                                class="h-2.5 w-2.5 inline-block align-[-1px]"
                            ></i>

                        </span>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Pagination --}}
        @if($tempats->hasPages())

            <div
                class="mt-5 px-1"
            >
                {{ $tempats->links('partials.pagination-dark') }}
            </div>

        @endif


    @else

        {{-- Empty --}}
        <div
            class="card p-16 text-center anim anim-d1"
        >

            <div class="flex flex-col items-center gap-3">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl"
                    style="background: rgba(255,255,255,0.03);"
                >
                    <i
                        data-lucide="building-2"
                        class="h-7 w-7"
                        style="color: var(--text-dim);"
                    ></i>
                </div>

                <p
                    class="text-[13px] font-medium"
                    style="color: var(--text-muted);"
                >
                    @if(request('search'))
                        Data tempat PKL tidak ditemukan
                    @else
                        Belum ada data tempat PKL
                    @endif
                </p>

                <p
                    class="text-[11px]"
                    style="color: var(--text-dim);"
                >
                    @if(request('search'))
                        Coba gunakan kata kunci lain
                    @else
                        Tambahkan perusahaan tempat PKL pertama
                    @endif
                </p>

                @if(!request('search'))

                    <a
                        href="{{ route('admin.tempat.create') }}"
                        class="btn-primary text-[11px] px-4 py-2 mt-1"
                    >

                        <i
                            data-lucide="plus"
                            class="h-3.5 w-3.5"
                        ></i>

                        Tambah Tempat

                    </a>

                @endif

            </div>

        </div>

    @endif


    @push('scripts')

        <script>
            lucide.createIcons();
        </script>

    @endpush

</x-app-layout>