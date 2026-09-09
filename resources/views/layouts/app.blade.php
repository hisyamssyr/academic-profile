<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Academic Profile' }} | DataAgent.ai</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-800">
        <nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-teal-900/30 bg-[#062f3d]/95 text-white shadow-lg backdrop-blur">
            <div class="mx-auto max-w-6xl px-4 py-4 sm:px-6"><div class="flex items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="font-black tracking-tight transition hover:text-teal-200">HS<span class="text-teal-300">.</span> portfolio</a>
                <button type="button" @click="open = !open" class="rounded-lg p-2 text-teal-100 transition hover:bg-white/10 md:hidden" aria-label="Buka menu"><span x-text="open ? '✕' : '☰'"></span></button>
                <div class="hidden items-center gap-1 text-sm font-semibold md:flex"><a href="{{ route('home') }}" class="rounded-full px-4 py-2 transition hover:bg-white/10">Home</a><a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" class="rounded-full px-4 py-2 transition hover:bg-white/10">Profile</a><a href="{{ route('agent.show') }}" class="rounded-full px-4 py-2 transition hover:bg-white/10">Agent</a><a href="{{ route('ipk.form') }}" class="rounded-full bg-teal-500 px-4 py-2 transition hover:bg-teal-400">Kalkulator</a></div>
            </div><div x-show="open" x-cloak class="mt-4 grid gap-1 border-t border-white/10 pt-4 text-sm font-semibold md:hidden"><a href="{{ route('home') }}" class="rounded-lg px-3 py-2 hover:bg-white/10">Home</a><a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" class="rounded-lg px-3 py-2 hover:bg-white/10">Profile</a><a href="{{ route('agent.show') }}" class="rounded-lg px-3 py-2 hover:bg-white/10">Agent</a><a href="{{ route('ipk.form') }}" class="rounded-lg px-3 py-2 hover:bg-white/10">Kalkulator</a></div>
            </div>
        </nav>

        <main class="mx-auto w-full max-w-6xl px-4 py-10 sm:px-6">
            @yield('content')
        </main>

        <footer class="mt-16 bg-[#062f3d] px-4 py-8 text-center text-sm text-teal-100">
            <p class="font-bold">Hisyam Syafa Raditya · Teknik Informatika ITS</p><p class="mt-2 text-teal-300">Built with curiosity from Sepuluh Nopember.</p>
        </footer>
    </body>
</html>
