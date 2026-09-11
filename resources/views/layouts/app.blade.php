<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#070d1c">
        <meta name="color-scheme" content="dark">
        <title>{{ $title ?? 'Academic Profile' }} | DataAgent.ai</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                :root { --canvas: #070d1c; --surface: #0d1730; --surface-strong: #13223f; --ink: #e7edf7; --ink-soft: #8fa0bd; --ink-faint: #5c6f95; --ocean: #3b82f6; --ocean-strong: #2563eb; --ocean-soft: #60a5fa; --ocean-deep: #0d1f47; --ocean-deep-strong: #081431; --line: #1f2d4f; --line-strong: #2c3d66; --shadow-card: 0 1px 2px rgb(0 0 0 / .35), 0 14px 30px rgb(0 0 0 / .35); --shadow-card-hover: 0 2px 4px rgb(0 0 0 / .4), 0 22px 44px rgb(0 0 0 / .45); }
                html { color-scheme: dark; }
                body { background: var(--canvas); color: var(--ink); font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif; }
                ::selection { background: rgb(59 130 246 / .35); color: var(--ink); }
                *:focus-visible { outline: 2px solid var(--ocean); outline-offset: 2px; }
                .site-shell { width: 100%; max-width: 72rem; margin-inline: auto; padding-inline: 1rem; }
                .page-content { padding-block: 2.5rem; }
                .eyebrow { color: var(--ocean-soft); font-size: .75rem; font-weight: 600; letter-spacing: .18em; text-transform: uppercase; }
                .section-title { margin-top: .375rem; color: var(--ink); font-size: 1.5rem; font-weight: 700; letter-spacing: -.025em; }
                .body-copy { color: var(--ink-soft); line-height: 1.75; }
                .surface-card { border: 1px solid var(--line-strong); border-radius: 1rem; background: var(--surface); box-shadow: var(--shadow-card); }
                .surface-card-interactive { border: 1px solid var(--line-strong); border-radius: 1rem; background: var(--surface); box-shadow: var(--shadow-card); transition: .3s cubic-bezier(0.22,1,0.36,1); }
                .surface-card-interactive:hover { border-color: var(--ocean-strong); box-shadow: var(--shadow-card-hover); transform: translateY(-4px); }
                .button-primary, .button-secondary, .button-on-dark, .button-quiet-on-dark { min-height: 2.75rem; align-items: center; justify-content: center; border-radius: .75rem; padding: .625rem 1.25rem; font-size: .875rem; font-weight: 600; transition: .2s; }
                .button-primary { background: var(--ocean); color: #fff; box-shadow: 0 1px 2px rgb(0 0 0 / .3); }
                .button-primary:hover { background: var(--ocean-strong); }
                .button-secondary { border: 1px solid var(--line-strong); background: var(--surface); color: var(--ink); }
                .button-secondary:hover { border-color: var(--ocean); background: var(--surface-strong); color: #fff; }
                .button-on-dark { background: #fff; color: var(--ocean-deep-strong); }
                .button-on-dark:hover { background: #cfe3ff; }
                .button-quiet-on-dark { border: 1px solid rgb(255 255 255 / .25); color: #fff; }
                .button-quiet-on-dark:hover { border-color: rgb(255 255 255 / .6); background: rgb(255 255 255 / .1); }
                .nav-link { border-radius: .5rem; padding: .5rem .75rem; color: var(--ink-soft); font-size: .875rem; font-weight: 600; transition: .2s; }
                .nav-link:hover { background: rgb(255 255 255 / .06); color: var(--ink); }
                .nav-link-active { background: rgb(59 130 246 / .15); color: var(--ocean-soft); }
                .form-label { display: block; color: var(--ink); font-size: .875rem; font-weight: 600; }
                .form-input { display: block; min-height: 2.75rem; width: 100%; margin-top: .5rem; border: 1px solid var(--line-strong); border-radius: .75rem; padding: .625rem 1rem; color: var(--ink); background: var(--ocean-deep); box-shadow: 0 1px 2px rgb(0 0 0 / .3); }
                .form-input:focus { border-color: var(--ocean); outline: none; box-shadow: 0 0 0 4px rgb(59 130 246 / .18); }
                .form-help { color: var(--ink-soft); font-size: .875rem; line-height: 1.5rem; }
                .status-alert { border: 1px solid; border-radius: .75rem; padding: 1rem; font-size: .875rem; line-height: 1.5rem; }
                .status-alert-error { border-color: rgb(244 63 94 / .3); background: rgb(244 63 94 / .12); color: #fda4af; }
                .chip { display: inline-flex; align-items: center; border: 1px solid rgb(96 165 250 / .3); border-radius: 9999px; background: rgb(59 130 246 / .12); padding: .375rem .75rem; font-size: .875rem; font-weight: 500; color: var(--ocean-soft); }
                .empty-state { max-width: 36rem; margin-inline: auto; border-radius: 1rem; padding: 1.75rem; text-align: center; background: var(--surface); border: 1px solid var(--line-strong); box-shadow: var(--shadow-card); }
                .bg-ocean { background-color: var(--ocean); } .bg-ocean-deep { background-color: var(--ocean-deep); } .bg-ocean-strong { background-color: var(--ocean-strong); }
                .text-ink { color: var(--ink); } .text-ink-soft { color: var(--ink-soft); } .text-ocean { color: var(--ocean); } .text-ocean-deep { color: var(--ocean-deep-strong); } .text-ocean-soft { color: var(--ocean-soft); } .border-line { border-color: var(--line-strong); }
                @media (min-width: 640px) { .site-shell { padding-inline: 1.5rem; } .page-content { padding-block: 3.5rem; } .section-title { font-size: 1.875rem; } .empty-state { padding: 2.5rem; } }
                @media (min-width: 1024px) { .site-shell { padding-inline: 2rem; } .page-content { padding-block: 5rem; } }
            </style>
        @endif
    </head>
    <body class="flex min-h-screen flex-col bg-canvas text-ink">
    <div data-scroll-progress class="fixed inset-x-0 top-0 z-[60] h-0.5 origin-left bg-gradient-to-r from-ocean-soft via-ocean to-ocean-deep-strong" aria-hidden="true" style="transform-origin: left; transform: scaleX(0); transform-style: preserve-3d;"></div>
        <header class="sticky top-0 z-50 border-b border-line bg-canvas/85 backdrop-blur-md">
            <nav class="site-shell" aria-label="Navigasi utama">
                <div class="flex min-h-16 items-center justify-between gap-4 md:min-h-18">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 rounded-lg transition hover:opacity-90" aria-label="HS Portfolio, beranda">
                        <span class="grid size-9 place-items-center rounded-xl bg-gradient-to-br from-ocean to-ocean-deep text-sm font-bold text-white shadow-sm">HS</span>
                        <span class="text-[15px] font-bold tracking-tight text-ink">Hisyam Raditya</span>
                    </a>

                    <div class="hidden items-center gap-1 md:flex">
                        <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>Beranda</a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>Profil</a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('agent.*')])>DataAgent.ai</a>
                        <span class="mx-1.5 block h-5 w-px bg-line" aria-hidden="true"></span>
                        <a href="{{ route('ipk.form') }}" @class(['button-primary !min-h-10 !px-4', 'bg-ocean-strong' => request()->routeIs('ipk.*')])>
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6M10 3v6.3l-4.6 7.4a2 2 0 0 0 1.7 3.1h9.8a2 2 0 0 0 1.7-3.1L14 9.3V3" /><path d="M9 15h6" /></svg>
                            Kalkulator IP
                        </a>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('ipk.form') }}" class="button-primary !min-h-10 !px-4 text-sm md:hidden">
                            <span class="sr-only">Kalkulator IP</span>
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6M10 3v6.3l-4.6 7.4a2 2 0 0 0 1.7 3.1h9.8a2 2 0 0 0 1.7-3.1L14 9.3V3" /><path d="M9 15h6" /></svg>
                        </a>
                        <button type="button" data-menu-button aria-controls="mobile-menu" aria-expanded="false" class="inline-flex size-10 items-center justify-center rounded-xl border border-line bg-surface text-ink transition hover:bg-surface-strong md:hidden">
                            <span class="sr-only">Buka menu navigasi</span>
                            <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16" /></svg>
                        </button>
                    </div>
                </div>

                <div id="mobile-menu" data-mobile-menu hidden class="border-t border-line/80 py-3 md:hidden">
                    <div class="grid gap-1">
                        <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>Beranda</a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>Profil</a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('agent.*')])>DataAgent.ai</a>
                        <a href="{{ route('ipk.form') }}" class="button-primary mt-1">Kalkulator IP</a>
                    </div>
                </div>
            </nav>
        </header>

        <script>
            (function () {
                var menuButton = document.querySelector('[data-menu-button]');
                var menu = document.querySelector('[data-mobile-menu]');
                if (!menuButton || !menu) { return; }
                menuButton.addEventListener('click', function () {
                    var expanded = menuButton.getAttribute('aria-expanded') === 'true';
                    menuButton.setAttribute('aria-expanded', String(!expanded));
                    menu.toggleAttribute('hidden');
                });
            })();
        </script>

        <main class="site-shell page-content flex-1">
            @yield('content')
        </main>

        <footer class="mt-4 border-t border-line bg-surface">
            <div class="site-shell flex flex-col gap-6 py-9 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-3">
                    <span class="grid size-9 place-items-center rounded-xl bg-gradient-to-br from-ocean to-ocean-deep text-sm font-bold text-white shadow-sm">HS</span>
                    <div>
                        <p class="text-sm font-bold text-ink">Hisyam Syafa Raditya</p>
                        <p class="text-xs text-ink-soft">Teknik Informatika · Institut Teknologi Sepuluh Nopember</p>
                    </div>
                </div>
                <nav class="flex items-center gap-2" aria-label="Sosial media">
                    <a href="https://instagram.com/hisyamssyr" target="_blank" rel="noopener" class="grid size-9 place-items-center rounded-xl border border-line text-ink-soft transition hover:border-ocean-strong hover:bg-white/10 hover:text-ocean-soft" aria-label="Instagram">
                        <svg aria-hidden="true" class="size-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5" /><circle cx="12" cy="12" r="4" /><circle cx="17.5" cy="6.5" r=".75" fill="currentColor" stroke="none" /></svg>
                    </a>
                    <a href="https://linkedin.com/in/hisyam-syafa-raditya" target="_blank" rel="noopener" class="grid size-9 place-items-center rounded-xl border border-line text-ink-soft transition hover:border-ocean-strong hover:bg-white/10 hover:text-ocean-soft" aria-label="LinkedIn">
                        <svg aria-hidden="true" class="size-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6Z" /><rect x="2" y="9" width="4" height="12" /><circle cx="4" cy="4" r="2" /></svg>
                    </a>
                    <a href="https://github.com/hisyamssyr" target="_blank" rel="noopener" class="grid size-9 place-items-center rounded-xl border border-line text-ink-soft transition hover:border-ocean-strong hover:bg-white/10 hover:text-ocean-soft" aria-label="GitHub">
                        <svg aria-hidden="true" class="size-4.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.9.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.65s.84-.27 2.75 1.03a9.6 9.6 0 0 1 5 0c1.91-1.3 2.75-1.03 2.75-1.03a3.6 3.6 0 0 1 .1 2.65c.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.85V21c0 .27.18.58.69.48A10 10 0 0 0 12 2Z" /></svg>
                    </a>
                </nav>
            </div>
            <div class="border-t border-line/70">
                <div class="site-shell flex flex-col gap-1.5 py-4 text-xs text-ink-soft sm:flex-row sm:items-center sm:justify-between">
                    <p>Academic portfolio &amp; DataAgent.ai concept</p>
                    <p>© {{ date('Y') }} Hisyam Syafa Raditya</p>
                </div>
            </div>
        </footer>

        <button type="button" data-scroll-top hidden class="fixed bottom-5 right-5 z-50 grid size-11 place-items-center rounded-xl border border-ocean-strong/60 bg-surface/95 text-ocean-soft shadow-card-hover backdrop-blur transition hover:border-ocean-soft hover:text-ocean hover:shadow-glow sm:bottom-6 sm:right-6" aria-label="Kembali ke atas">
            <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5" /><path d="m5 12 7-7 7 7" /></svg>
        </button>
    </body>
</html>
