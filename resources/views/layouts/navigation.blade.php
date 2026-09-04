<nav x-data="{ open: false }" class="bg-slate-900 border-b border-slate-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Logo --}}
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl">
                    Jurnal PKL
                </a>

                {{-- Menu Desktop --}}
                <div class="hidden sm:flex items-center gap-6">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @if(Auth::user()->role=='admin')

                        <x-nav-link :href="route('admin.siswa.index')" :active="request()->routeIs('admin.siswa.*')">
                            Siswa
                        </x-nav-link>

                        <x-nav-link :href="route('admin.guru.index')" :active="request()->routeIs('admin.guru.*')">
                            Guru
                        </x-nav-link>

                        <x-nav-link :href="route('admin.tempat.index')" :active="request()->routeIs('admin.tempat.*')">
                            Tempat PKL
                        </x-nav-link>

                        <x-nav-link :href="route('admin.pengajuan.index')" :active="request()->routeIs('admin.pengajuan.*')">
                            Pengajuan
                        </x-nav-link>

                        <x-nav-link :href="route('admin.jurnal.index')" :active="request()->routeIs('admin.jurnal.*')">
                            Jurnal
                        </x-nav-link>

                        <x-nav-link :href="route('admin.penilaian.index')" :active="request()->routeIs('admin.penilaian.*')">
                            Penilaian
                        </x-nav-link>

                        <x-nav-link :href="route('admin.laporan.index')" :active="request()->routeIs('admin.laporan.*')">
                            Laporan
                        </x-nav-link>

                    @elseif(Auth::user()->role=='guru')

                        <x-nav-link :href="route('guru.dashboard')" :active="request()->routeIs('guru.dashboard')">
                            Dashboard Guru
                        </x-nav-link>

                    @elseif(Auth::user()->role=='siswa')

                        <x-nav-link :href="route('siswa.dashboard')" :active="request()->routeIs('siswa.dashboard')">
                            Dashboard Siswa
                        </x-nav-link>

                    @endif

                </div>
            </div>

            {{-- User Dropdown --}}
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 rounded-lg bg-slate-800 text-slate-200 hover:bg-slate-700">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-2">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <div class="sm:hidden flex items-center">
                <button @click="open=!open"
                    class="text-slate-300 hover:text-white">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden':open,'inline-flex':!open}" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                        <path :class="{'hidden':!open,'inline-flex':open}" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{'block':open,'hidden':!open}" class="hidden sm:hidden bg-slate-800">

        <div class="px-4 py-3 space-y-2">

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            @if(Auth::user()->role=='admin')

                <x-responsive-nav-link :href="route('admin.siswa.index')">
                    Siswa
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.guru.index')">
                    Guru
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.tempat.index')">
                    Tempat PKL
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.pengajuan.index')">
                    Pengajuan
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.jurnal.index')">
                    Jurnal
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.penilaian.index')">
                    Penilaian
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.laporan.index')">
                    Laporan
                </x-responsive-nav-link>

            @endif

        </div>

        <div class="border-t border-slate-700 px-4 py-3">

            <div class="text-white font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-slate-400 text-sm">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-2">

                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>
</nav>