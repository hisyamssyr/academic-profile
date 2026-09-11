@extends('layouts.app')

@section('content')
    <section class="relative" data-reveal-group>
        <div class="absolute inset-x-0 -top-32 z-0 h-72 bg-gradient-to-b from-ocean-deep/70 via-ocean/20 to-transparent blur-3xl" aria-hidden="true"></div>

        <div class="relative grid items-center gap-12 lg:grid-cols-12 lg:gap-10">
            <div class="lg:col-span-7">
                <p class="inline-flex items-center gap-2 rounded-full border border-ocean-strong/50 bg-ocean/10 px-3.5 py-1.5 text-xs font-semibold text-ocean-soft" data-reveal="0">
                    <span class="relative flex size-1.5 rounded-full bg-ocean-soft" aria-hidden="true"><span class="absolute inset-0 animate-ping rounded-full bg-ocean-soft/70"></span></span>
                    Institut Teknologi Sepuluh Nopember
                </p>

                <h1 class="mt-5 text-4xl font-bold leading-[1.05] tracking-tight text-ink sm:text-5xl lg:text-6xl">
                    Halo, saya
                    <span class="bg-gradient-to-r from-ocean-soft via-ocean to-ocean-deep-strong bg-clip-text text-transparent">Hisyam.</span>
                </h1>

                <p class="mt-5 max-w-xl text-lg leading-8 text-ink-soft">
                    Mahasiswa Informatika ITS yang mengeksplorasi data, machine learning, dan pengalaman digital yang bermakna.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="button-primary group">
                        Jelajahi profil
                        <span aria-hidden="true" class="grid size-7 place-items-center rounded-full border border-white/30 bg-white/10 text-white transition-all duration-300 group-hover:translate-x-0.5 group-hover:border-white/50 group-hover:bg-white/20">
                            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14" /><path d="m12 5 7 7-7 7" /></svg>
                        </span>
                    </a>
                    <a href="{{ route('agent.show') }}" class="button-secondary group">
                        Lihat DataAgent.ai
                        <span aria-hidden="true" class="grid size-6 place-items-center rounded-full border border-ocean-soft/40 bg-ocean/15 text-ocean-soft transition-all duration-300 group-hover:translate-x-0.5 group-hover:border-ocean group-hover:bg-ocean group-hover:text-white">
                            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14" /><path d="m12 5 7 7-7 7" /></svg>
                        </span>
                    </a>
                </div>

                <dl class="mt-10 grid max-w-md grid-cols-3 gap-x-8 gap-y-5 border-t border-line pt-6" data-reveal-group>
                    <div data-reveal="0">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-ink-faint">NRP</dt>
                        <dd class="mt-1 font-mono text-sm font-semibold text-ink">{{ $mahasiswa['nrp'] }}</dd>
                    </div>
                    <div data-reveal="1">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-ink-faint">IPK</dt>
                        <dd class="mt-1 text-sm font-bold text-ink"><span data-count-up="3.51" data-count-decimals="2">3.49</span> <span class="font-medium text-ink-soft">/ 4.00</span></dd>
                    </div>
                    <div data-reveal="2">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-ink-faint">Minat</dt>
                        <dd class="mt-1 text-sm font-bold text-ink">Data &amp; ML</dd>
                    </div>
                </dl>
            </div>

            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-xs sm:max-w-sm lg:max-w-none">
                    <div class="absolute -inset-5 animate-float-slow rounded-[2rem] bg-gradient-to-br from-ocean-deep/60 via-ocean/20 to-ocean-deep-strong/25 blur-2xl" aria-hidden="true"></div>
                    <div class="relative animate-float overflow-hidden rounded-[1.75rem] border border-line-strong bg-surface p-3 shadow-card-hover">
                        <img src="{{ asset('images/pict.jpeg') }}" alt="Foto Hisyam Syafa Raditya" class="aspect-[4/5] w-full rounded-3xl object-cover" loading="lazy">
                        <span class="pointer-events-none absolute inset-3 rounded-3xl ring-1 ring-inset ring-line-strong" aria-hidden="true"></span>
                    </div>
                    <div class="absolute -bottom-5 -left-4 animate-float rounded-2xl border border-line bg-surface px-4 py-3 shadow-card [animation-delay:1.2s] sm:-left-8">
                        <p class="text-xs font-semibold text-ink-soft">Fokus terkini</p>
                        <p class="mt-0.5 text-sm font-bold text-ink">Data &amp; Machine Learning</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-16 grid gap-5 md:grid-cols-2 lg:mt-20" data-reveal-group>
        <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="surface-card-interactive group flex flex-col p-6 sm:p-7" data-reveal="3">
            <div class="flex items-start gap-4">
                <span class="grid size-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-ocean to-ocean-deep-strong text-white shadow-sm">
                    <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4" /><path d="M4 20c1.6-3 4.6-4.5 8-4.5s6.4 1.5 8 4.5" /></svg>
                </span>
                <div class="min-w-0">
                    <p class="eyebrow">Profil akademis</p>
                    <h2 class="mt-1.5 text-xl font-bold tracking-tight text-ink sm:text-2xl">{{ $mahasiswa['nama'] }}</h2>
                    <p class="mt-1.5 text-sm leading-6 text-ink-soft">{{ $mahasiswa['prodi'] }}</p>
                </div>
            </div>
            <div class="mt-auto flex items-center justify-between gap-4 border-t border-line pt-5">
                <span class="font-mono text-xs text-ink-faint">{{ $mahasiswa['nrp'] }}</span>
                <span class="inline-flex items-center gap-2 text-sm font-semibold text-ocean">
                    Buka profil
                    <span aria-hidden="true" class="grid size-7 place-items-center rounded-full border border-ocean-soft/30 bg-ocean/15 text-ocean-soft transition-all duration-300 group-hover:translate-x-0.5 group-hover:border-ocean group-hover:bg-ocean group-hover:text-white">
                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14" /><path d="m12 5 7 7-7 7" /></svg>
                    </span>
                </span>
            </div>
        </a>

        <a href="{{ route('agent.show') }}" class="surface-card-interactive group flex flex-col bg-ocean-deep p-6 text-white hover:border-ocean-soft/60 sm:p-7" data-reveal="4">
            <span class="grid size-12 place-items-center rounded-xl bg-white/10 text-white ring-1 ring-inset ring-white/20">
                <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="8" width="16" height="12" rx="2.5" /><path d="M12 8V5" /><circle cx="12" cy="4" r="1" /><path d="M8.5 13h.01M12 13h.01M15.5 13h.01" /><path d="M9 16.5c1 .8 2.5 1.2 3 1.2s2-.4 3-1.2" /></svg>
            </span>
            <p class="mt-5 text-xs font-semibold uppercase tracking-[0.16em] text-ocean-soft">Konsep proyek akhir</p>
            <h2 class="mt-2 text-2xl font-bold tracking-tight">DataAgent<span class="text-ocean-soft">.ai</span></h2>
            <p class="mt-2 max-w-md text-sm leading-6 text-ink-soft">Autonomous AI Agent Suite untuk analitik data end-to-end.</p>
            <p class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-semibold text-ocean-soft">
                    Kenali para agent
                    <span aria-hidden="true" class="grid size-7 place-items-center rounded-full border border-ocean-soft/40 bg-white/10 text-ocean-soft transition-all duration-300 group-hover:translate-x-0.5 group-hover:border-ocean-soft group-hover:bg-ocean group-hover:text-white">
                        <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14" /><path d="m12 5 7 7-7 7" /></svg>
                    </span>
                </p>
        </a>
    </section>
@endsection
