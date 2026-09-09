<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#073b4c">
        <title>{{ $title ?? 'Academic Profile' }} | DataAgent.ai</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                :root { --ink: #102a35; --ink-soft: #49616c; --ocean: #075d62; --ocean-deep: #073b4c; --mint: #dff3ed; --canvas: #f5f8f7; }
                body { background: var(--canvas); color: var(--ink); font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif; }
                .site-shell { width: 100%; max-width: 80rem; margin-inline: auto; padding-inline: 1rem; }
                .page-content { padding-block: 2rem; }
                .eyebrow { color: #0f766e; font-size: .75rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
                .section-title { margin-top: .5rem; color: var(--ink); font-size: 1.5rem; font-weight: 700; letter-spacing: -.025em; }
                .body-copy { color: var(--ink-soft); line-height: 1.75; }
                .surface-card { border: 1px solid rgb(226 232 240 / .8); border-radius: 1rem; background: #fff; box-shadow: 0 8px 24px rgb(16 42 53 / .06); }
                .surface-card-interactive { border: 1px solid rgb(226 232 240 / .8); border-radius: 1rem; background: #fff; box-shadow: 0 8px 24px rgb(16 42 53 / .06); transition: .2s; }
                .surface-card-interactive:hover { border-color: #99f6e4; box-shadow: 0 16px 32px rgb(16 42 53 / .10); transform: translateY(-2px); }
                .button-primary, .button-secondary, .button-on-dark, .button-quiet-on-dark { min-height: 2.75rem; align-items: center; justify-content: center; border-radius: .75rem; padding: .75rem 1.25rem; font-size: .875rem; font-weight: 700; transition: .2s; }
                .button-primary { background: var(--ocean); color: #fff; }
                .button-primary:hover { background: var(--ocean-deep); }
                .button-secondary { border: 1px solid #cbd5e1; background: #fff; color: var(--ink); }
                .button-on-dark { background: #fff; color: var(--ocean); }
                .button-quiet-on-dark { border: 1px solid rgb(255 255 255 / .3); color: #fff; }
                .nav-link { border-radius: .5rem; padding: .5rem .75rem; color: #475569; font-size: .875rem; font-weight: 600; }
                .nav-link:hover, .nav-link-active { background: #f0fdfa; color: var(--ocean); }
                .form-label { display: block; color: var(--ink); font-size: .875rem; font-weight: 700; }
                .form-input { display: block; min-height: 3rem; width: 100%; margin-top: .5rem; border: 1px solid #cbd5e1; border-radius: .75rem; padding: .75rem 1rem; color: var(--ink); box-shadow: 0 1px 2px rgb(15 23 42 / .05); }
                .form-input:focus { border-color: #0d9488; outline: 4px solid #ccfbf1; }
                .status-alert { border: 1px solid; border-radius: .75rem; padding: 1rem; font-size: .875rem; line-height: 1.5rem; }
                .status-alert-error { border-color: #fecdd3; background: #fff1f2; color: #881337; }
                .empty-state { max-width: 36rem; margin-inline: auto; border-radius: 1rem; padding: 1.75rem; text-align: center; }
                .bg-ocean { background-color: var(--ocean); } .bg-ocean-deep { background-color: var(--ocean-deep); } .bg-mint { background-color: var(--mint); }
                .text-ink { color: var(--ink); } .text-ink-soft { color: var(--ink-soft); } .text-ocean { color: var(--ocean); } .text-ocean-deep { color: var(--ocean-deep); }
                @media (min-width: 640px) { .site-shell { padding-inline: 1.5rem; } .page-content { padding-block: 3rem; } .section-title { font-size: 1.875rem; } .empty-state { padding: 2.5rem; } }
                @media (min-width: 1024px) { .site-shell { padding-inline: 2rem; } .page-content { padding-block: 4rem; } }
            </style>
        @endif
    </head>
    <body class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-50 border-b border-slate-200/90 bg-white/95 backdrop-blur">
            <nav class="site-shell" aria-label="Navigasi utama">
                <div class="flex min-h-18 items-center justify-between gap-4 py-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 rounded-lg text-base font-bold tracking-tight text-ink" aria-label="HS Portfolio, beranda">
                        <span class="grid size-8 place-items-center rounded-lg bg-ocean text-sm text-white">HS</span>
                        <span>Portfolio</span>
                    </a>

                    <button type="button" data-menu-button aria-controls="mobile-menu" aria-expanded="false" class="button-secondary !min-h-10 !px-3 md:hidden">
                        <span class="sr-only">Buka menu navigasi</span>
                        <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16" /></svg>
                    </button>

                    <div class="hidden items-center gap-1 md:flex">
                        <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>Beranda</a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>Profil</a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('agent.*')])>DataAgent.ai</a>
                        <a href="{{ route('ipk.form') }}" @class(['button-primary !min-h-10 !px-4', 'bg-ocean-deep' => request()->routeIs('ipk.*')])>Kalkulator IP</a>
                    </div>
                </div>

                <div id="mobile-menu" data-mobile-menu hidden class="border-t border-slate-200 py-3 md:hidden">
                    <div class="grid gap-1">
                        <a href="{{ route('home') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('home')])>Beranda</a>
                        <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('mahasiswa.*')])>Profil</a>
                        <a href="{{ route('agent.show') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('agent.*')])>DataAgent.ai</a>
                        <a href="{{ route('ipk.form') }}" class="button-primary mt-1">Kalkulator IP</a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="site-shell page-content flex-1">
            @yield('content')
        </main>

        <footer class="mt-8 border-t border-slate-200 bg-white">
            <div class="site-shell flex flex-col gap-2 py-7 text-sm text-ink-soft sm:flex-row sm:items-center sm:justify-between">
                <p class="font-semibold text-ink">Hisyam Syafa Raditya <span class="font-normal text-slate-400">·</span> Teknik Informatika ITS</p>
                <p>Academic portfolio &amp; DataAgent.ai concept</p>
            </div>
        </footer>
    </body>
</html>
