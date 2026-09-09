<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0f4c5c">
        <title>{{ $title ?? 'Academic Profile' }} | DataAgent.ai</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                :root {
                    --ink: #0f172a;
                    --ink-soft: #475569;
                    --ocean: #0f766e;
                    --ocean-dark: #115e59;
                    --ocean-deep: #0f4c5c;
                    --mint: #ccfbf1;
                    --canvas: #f8fafc;
                }
                body { background: var(--canvas); color: var(--ink); font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif; }
                .site-shell { width: 100%; max-width: 80rem; margin-inline: auto; padding-inline: 1rem; }
                .page-content { padding-block: 1.5rem; }
                .eyebrow { color: #0f766e; font-size: .75rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
                .section-title { margin-top: .25rem; color: var(--ink); font-size: 1.5rem; font-weight: 700; letter-spacing: -.025em; }
                .body-copy { color: var(--ink-soft); line-height: 1.625; }
                .surface-card { border: 1px solid rgb(226 232 240); border-radius: 1rem; background: #fff; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1); }
                .surface-card-interactive { border: 1px solid rgb(226 232 240); border-radius: 1rem; background: #fff; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1); transition: all .2s ease; }
                .surface-card-interactive:hover { border-color: #5eead4; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1); transform: translateY(-2px); }
                .button-primary { min-height: 2.75rem; display: inline-flex; align-items: center; justify-content: center; border-radius: .75rem; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 600; background: #0f766e; color: #fff; transition: all .2s; }
                .button-primary:hover { background: #115e59; }
                .button-secondary { min-height: 2.75rem; display: inline-flex; align-items: center; justify-content: center; border-radius: .75rem; border: 1px solid #cbd5e1; background: #fff; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 600; color: #334155; transition: all .2s; }
                .button-secondary:hover { border-color: #2dd4bf; background: #f0fdfa; color: #115e59; }
                .button-on-dark { min-height: 2.75rem; display: inline-flex; align-items: center; justify-content: center; border-radius: .75rem; background: #fff; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 600; color: #042f2e; transition: all .2s; }
                .button-quiet-on-dark { min-height: 2.75rem; display: inline-flex; align-items: center; justify-content: center; border-radius: .75rem; border: 1px solid rgb(255 255 255 / .2); background: rgb(255 255 255 / .1); padding: .625rem 1.25rem; font-size: .875rem; font-weight: 600; color: #fff; backdrop-filter: blur(4px); transition: all .2s; }
                .nav-link { border-radius: .75rem; padding: .5rem .875rem; color: #475569; font-size: .875rem; font-weight: 600; transition: all .15s; }
                .nav-link:hover, .nav-link-active { background: #ccfbf1; color: #0f766e; }
                .form-label { display: block; color: var(--ink); font-size: .875rem; font-weight: 600; }
                .form-input { display: block; min-height: 3rem; width: 100%; margin-top: .5rem; border: 1px solid #cbd5e1; border-radius: .75rem; padding: .75rem 1rem; color: var(--ink); font-family: "JetBrains Mono", monospace; }
                .form-input:focus { border-color: #0d9488; outline: 4px solid #ccfbf1; }
                .status-alert { border: 1px solid; border-radius: .75rem; padding: 1rem; font-size: .875rem; }
                .empty-state { max-width: 36rem; margin-inline: auto; border-radius: 1rem; padding: 2rem; text-align: center; }
                @media (min-width: 640px) { .site-shell { padding-inline: 1.5rem; } .page-content { padding-block: 2.5rem; } .section-title { font-size: 1.875rem; } }
                @media (min-width: 1024px) { .site-shell { padding-inline: 2rem; } .page-content { padding-block: 3.5rem; } }
            </style>
        @endif
    </head>
    <body class="flex min-h-screen flex-col bg-slate-50 text-slate-900 antialiased selection:bg-teal-100 selection:text-teal-900">
        <!-- Main Navigation Header -->
        <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-md transition-all">
            <nav class="site-shell" aria-label="Navigasi Utama">
                <div class="flex min-h-16 items-center justify-between gap-4 py-2.5">
                    <!-- Brand Identity -->
                    <a href="{{ route('home') }}" class="group flex items-center gap-3 rounded-xl transition-transform active:scale-95" aria-label="Academic Profile, Beranda">
                        <div class="grid size-9 place-items-center rounded-xl bg-gradient-to-br from-teal-700 to-teal-900 text-sm font-bold text-white shadow-sm shadow-teal-900/20 transition-all duration-200 group-hover:scale-105 group-hover:shadow-teal-900/30">
                            HS
                        </div>
                        <div class="flex flex-col">
                            <span class="text-base font-bold tracking-tight text-slate-900 group-hover:text-teal-800 transition-colors">Academic Profile</span>
                            <span class="text-[10px] font-medium tracking-wide text-slate-500 uppercase">ITS Informatika</span>
                        </div>
                    </a>

                    <!-- Desktop Navigation Links -->
                    <div class="hidden items-center gap-1.5 md:flex">
                        <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>
                            <svg class="size-4 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 00-1 1m-6 0h6"/></svg>
                            <span>Beranda</span>
                        </a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>
                            <svg class="size-4 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Profil Mahasiswa</span>
                        </a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('agent.*')])>
                            <svg class="size-4 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>DataAgent.ai</span>
                        </a>
                        <div class="ml-2 h-5 w-px bg-slate-200"></div>
                        <a href="{{ route('ipk.form') }}" @class(['button-primary !min-h-[38px] !px-4 !py-2 text-xs', 'bg-teal-900 hover:bg-teal-950' => request()->routeIs('ipk.*')])>
                            <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <span>Kalkulator IP</span>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button type="button" data-menu-button aria-controls="mobile-menu" aria-expanded="false" class="button-secondary !min-h-[40px] !px-3 md:hidden" aria-label="Buka navigasi">
                        <svg data-menu-icon-open class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg data-menu-icon-close class="hidden size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Mobile Menu Drawer -->
                <div id="mobile-menu" data-mobile-menu hidden class="border-t border-slate-200/80 py-3 md:hidden">
                    <div class="flex flex-col gap-1">
                        <a href="{{ route('home') }}" @class(['nav-link !py-2.5', 'nav-link-active' => request()->routeIs('home')])>
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 00-1 1m-6 0h6"/></svg>
                            <span>Beranda</span>
                        </a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link !py-2.5', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Profil Mahasiswa</span>
                        </a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link !py-2.5', 'nav-link-active' => request()->routeIs('agent.*')])>
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>DataAgent.ai</span>
                        </a>
                        <a href="{{ route('ipk.form') }}" class="button-primary mt-2 w-full justify-center">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <span>Kalkulator IP</span>
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Page Content -->
        <main class="site-shell page-content flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="mt-12 border-t border-slate-200/80 bg-white">
            <div class="site-shell flex flex-col gap-4 py-8 sm:flex-row sm:items-center sm:justify-between text-sm text-slate-600">
                <div class="flex items-center gap-3">
                    <div class="grid size-7 place-items-center rounded-lg bg-teal-800 text-xs font-bold text-white">HS</div>
                    <div>
                        <p class="font-bold text-slate-900">Hisyam Syafa Raditya</p>
                        <p class="text-xs text-slate-500">Teknik Informatika · Institut Teknologi Sepuluh Nopember</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-500">
                    <a href="{{ route('home') }}" class="transition hover:text-teal-800">Beranda</a>
                    <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" class="transition hover:text-teal-800">Profil</a>
                    <a href="{{ route('agent.show') }}" class="transition hover:text-teal-800">DataAgent.ai</a>
                    <a href="{{ route('ipk.form') }}" class="transition hover:text-teal-800">Kalkulator IP</a>
                </div>
            </div>
        </footer>
    </body>
</html>
