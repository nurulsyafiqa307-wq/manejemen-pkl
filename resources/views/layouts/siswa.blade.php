<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Dashboard Siswa' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white">

    <div class="min-h-screen">

        {{-- OVERLAY (khusus mobile, muncul saat sidebar dibuka) --}}
        <div id="sidebar-overlay"
             class="fixed inset-0 bg-black/60 z-40 hidden"></div>

        {{-- SIDEBAR SISWA --}}
        <aside id="sidebar"
               class="w-64 bg-slate-900 border-r border-slate-800 fixed left-0 top-0 bottom-0 z-50
                      overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out">

            {{-- LOGO + TOMBOL CLOSE --}}
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">

                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center mr-3">
                        <span class="text-xl font-bold">J</span>
                    </div>

                    <div>
                        <h1 class="font-bold text-white text-lg">
                            JURNAL PKL
                        </h1>

                        <p class="text-xs text-indigo-400">
                            Sistem Informasi
                        </p>
                    </div>
                </div>

                <button id="sidebar-close" class="text-slate-400 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

            </div>


            {{-- MENU --}}
            <nav class="p-4">

                <p class="text-xs uppercase tracking-wider text-slate-500 px-3 mb-3">
                    Menu Siswa
                </p>


                {{-- Dashboard --}}
                <a href="{{ route('siswa.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg mb-1
                   {{ request()->routeIs('siswa.dashboard')
                        ? 'bg-indigo-600 text-white'
                        : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>

                    <span class="text-sm font-medium">
                        Dashboard
                    </span>

                </a>


                {{-- Pengajuan PKL --}}
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg mb-1
                   text-slate-400 hover:bg-slate-800 hover:text-white">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>

                    <span class="text-sm font-medium">
                        Pengajuan PKL
                    </span>

                </a>


                {{-- Jurnal Harian --}}
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg mb-1
                   text-slate-400 hover:bg-slate-800 hover:text-white">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>

                    <span class="text-sm font-medium">
                        Jurnal Harian
                    </span>

                </a>


                {{-- Penilaian --}}
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg mb-1
                   text-slate-400 hover:bg-slate-800 hover:text-white">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>

                    <span class="text-sm font-medium">
                        Penilaian
                    </span>

                </a>


                {{-- Profil --}}
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg mb-1
                   text-slate-400 hover:bg-slate-800 hover:text-white">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>

                    <span class="text-sm font-medium">
                        Profil
                    </span>

                </a>

            </nav>


            {{-- USER DI BAWAH --}}
            <div class="border-t border-slate-800 p-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-bold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                    </div>

                    <div class="min-w-0 flex-1">

                        <p class="truncate text-sm font-semibold text-white">
                            {{ auth()->user()->name ?? 'Siswa' }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Siswa
                        </p>

                    </div>

                </div>


                {{-- LOGOUT --}}
                <form method="POST" action="{{ route('logout') }}" class="mt-3">

                    @csrf

                    <button type="submit"
                            class="w-full flex items-center gap-2 px-3 py-2 rounded-lg
                            text-sm text-red-400
                            hover:bg-red-500/10">

                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </aside>


        {{-- CONTENT --}}
        <main id="main-content" class="min-h-screen transition-all duration-300 ease-in-out">

            {{-- HEADER --}}
            <header class="h-20 bg-slate-950 border-b border-slate-800
                           flex items-center justify-between px-4 md:px-8">

                <div class="flex items-center gap-4">

                    {{-- Tombol buka sidebar, selalu ada --}}
                    <button id="sidebar-toggle" class="text-slate-300 hover:text-white p-2 -ml-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    {{ $header ?? '' }}

                </div>


                {{-- USER KANAN --}}
                <div class="flex items-center gap-4">

                    <div class="text-right hidden sm:block">

                        <p class="text-sm font-semibold text-white">
                            {{ auth()->user()->name ?? 'Siswa' }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Siswa
                        </p>

                    </div>


                    <div class="w-10 h-10 rounded-xl bg-indigo-500
                                flex items-center justify-center font-bold">

                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}

                    </div>

                </div>

            </header>


            {{-- ISI HALAMAN --}}
            <section class="p-4 md:p-8">

                {{ $slot }}

            </section>

        </main>

    </div>


    {{-- SCRIPT TOGGLE SIDEBAR --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');
            const openBtn = document.getElementById('sidebar-toggle');
            const closeBtn = document.getElementById('sidebar-close');

            const desktopQuery = window.matchMedia('(min-width: 768px)');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');

                if (desktopQuery.matches) {
                    mainContent.classList.add('md:ml-64');
                    overlay.classList.add('hidden');
                } else {
                    overlay.classList.remove('hidden');
                }
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('md:ml-64');
                overlay.classList.add('hidden');
            }

            openBtn?.addEventListener('click', function () {
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                isOpen ? closeSidebar() : openSidebar();
            });

            overlay?.addEventListener('click', closeSidebar);
            closeBtn?.addEventListener('click', closeSidebar);

            if (desktopQuery.matches) {
                openSidebar();
            }

            desktopQuery.addEventListener('change', function (e) {
                if (e.matches) {
                    overlay.classList.add('hidden');
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        mainContent.classList.add('md:ml-64');
                    }
                } else {
                    mainContent.classList.remove('md:ml-64');
                }
            });
        });
    </script>

</body>

</html>