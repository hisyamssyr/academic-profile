@extends('layouts.app')

@php
    $angkatanTahun = (int) substr($mahasiswa['angkatan'], 0, 4);
    $angkatanCatatan = \Illuminate\Support\Str::after(\Illuminate\Support\Str::before($mahasiswa['angkatan'], ')'), '(');
    $ipkNumerik = \Illuminate\Support\Str::before($mahasiswa['ipk'], ' / ');
    $ipkSkala = \Illuminate\Support\Str::after($mahasiswa['ipk'], ' / ');
    $emailKontak = \Illuminate\Support\Str::before($mahasiswa['kontak'], ' | ');
    $telpKontak = \Illuminate\Support\Str::after($mahasiswa['kontak'], ' | ');
@endphp

@section('content')
    <section class="surface-card overflow-hidden">
        <div class="h-16 bg-gradient-to-r from-ocean-deep via-ocean to-ocean-deep-strong sm:h-20" aria-hidden="true"></div>
        <div class="px-5 pb-8 pt-7 sm:px-9 sm:pb-10 sm:pt-8">
            <div class="flex flex-wrap items-center justify-between gap-x-5 gap-y-4">
                <div class="flex items-center gap-4 sm:gap-5">
                    <img src="{{ asset('images/pict.jpeg') }}" alt="Foto {{ $mahasiswa['nama'] }}" class="size-24 rounded-2xl border-4 border-surface object-cover shadow-card sm:size-28" loading="lazy">
                    <div>
                        <p class="font-mono text-xs font-semibold text-ocean-soft">{{ $mahasiswa['nrp'] }}</p>
                        <h1 class="mt-1 text-2xl font-bold tracking-tight text-ink sm:text-3xl">{{ $mahasiswa['nama'] }}</h1>
                        <p class="mt-1 text-sm font-medium text-ink-soft">{{ $mahasiswa['prodi'] }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ $mahasiswa['instagram'] }}" target="_blank" rel="noopener" class="button-secondary !min-h-9 gap-1.5 !px-3.5 !py-2 text-xs" aria-label="Instagram {{ $mahasiswa['nama'] }}">
                        <svg class="size-4" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5" /><circle cx="12" cy="12" r="4" /><circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none" /></svg>
                        Instagram
                    </a>
                    <a href="{{ $mahasiswa['linkedin'] }}" target="_blank" rel="noopener" class="button-secondary !min-h-9 gap-1.5 !px-3.5 !py-2 text-xs" aria-label="LinkedIn {{ $mahasiswa['nama'] }}">
                        <svg class="size-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 5.5a1.94 1.94 0 1 1-3.88 0 1.94 1.94 0 0 1 3.88 0ZM3.4 8.42h3.3V20.5H3.4V8.42Zm5.7 0h3.16v1.65h.05c.44-.83 1.51-1.7 3.1-1.7 3.32 0 3.94 2.18 3.94 5.02v7.11h-3.3v-6.3c0-1.5-.03-3.43-2.09-3.43-2.09 0-2.41 1.63-2.41 3.32v6.41H9.1V8.42Z" /></svg>
                        LinkedIn
                    </a>
                    <a href="{{ $mahasiswa['github'] }}" target="_blank" rel="noopener" class="button-secondary !min-h-9 gap-1.5 !px-3.5 !py-2 text-xs" aria-label="GitHub {{ $mahasiswa['nama'] }}">
                        <svg class="size-4" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.89 1.52 2.34 1.08 2.9.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.65s.84-.27 2.75 1.03a9.6 9.6 0 0 1 5 0c1.91-1.3 2.75-1.03 2.75-1.03a3.6 3.6 0 0 1 .1 2.65c.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.85V21c0 .27.18.58.69.48A10 10 0 0 0 12 2Z" /></svg>
                        GitHub
                    </a>
                </div>
            </div>
            <p class="mt-5 max-w-3xl leading-6 text-ink-soft">{{ $mahasiswa['bio'] }}</p>
        </div>
    </section>

    <section class="surface-card mt-5 overflow-hidden" aria-label="Ringkasan akademis">
        <dl class="grid grid-cols-1 divide-y divide-line sm:grid-cols-2 sm:divide-x sm:divide-y-0 lg:grid-cols-4">
            <div class="p-5 sm:p-6">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-ink-soft">IPK</dt>
                <dd class="mt-2 text-2xl font-bold tracking-tight text-ink">{{ $ipkNumerik }} <span class="text-base font-semibold text-ink-soft">/ {{ $ipkSkala }}</span></dd>
            </div>
            <div class="p-5 sm:p-6">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-ink-soft">Angkatan</dt>
                <dd class="mt-2 text-2xl font-bold tracking-tight text-ink">{{ $angkatanTahun }}</dd>
                <dd class="mt-1 text-xs leading-5 text-ink-soft">{{ $angkatanCatatan }}</dd>
            </div>
            <div class="p-5 sm:p-6">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-ink-soft">Bidang minat</dt>
                <dd class="mt-3 text-sm font-semibold leading-5 text-ink">{{ $mahasiswa['minat'] }}</dd>
            </div>
            <div class="p-5 sm:p-6">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-ink-soft">Kontak</dt>
                <dd class="mt-3 space-y-1.5 text-sm font-medium leading-5 text-ink">
                    <a href="{{ 'mailto:' . $emailKontak }}" class="flex items-center gap-2 transition hover:text-ocean">
                        <svg class="size-3.5 shrink-0 text-ink-soft" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="m3 7 9 6 9-6" /></svg>
                        <span class="break-all">{{ $emailKontak }}</span>
                    </a>
                    <a href="{{ 'tel:' . $telpKontak }}" class="flex items-center gap-2 transition hover:text-ocean">
                        <svg class="size-3.5 shrink-0 text-ink-soft" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z" /></svg>
                        <span>{{ $telpKontak }}</span>
                    </a>
                </dd>
            </div>
        </dl>
    </section>

    <section class="mt-12 sm:mt-16">
        <p class="eyebrow">Perjalanan</p>
        <h2 class="section-title">Pengalaman</h2>
        <div class="mt-7 space-y-6" aria-label="Linimasa pengalaman">
            @foreach ($mahasiswa['pengalaman'] as $index => $pengalaman)
                <div class="grid gap-4 sm:grid-cols-[auto_1fr] sm:gap-6">
                    <div class="hidden sm:flex flex-col items-center pt-2" aria-hidden="true">
                        <span class="size-3.5 rounded-full bg-ocean ring-4 ring-ocean-strong"></span>
                        @if (! $loop->last)
                            <span class="mt-2 w-px flex-1 bg-ocean-strong"></span>
                        @endif
                    </div>
                    <article class="surface-card relative p-5 sm:p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <h3 class="text-lg font-bold tracking-tight text-ink sm:text-xl">{{ $pengalaman['peran'] }}</h3>
                                <p class="mt-0.5 text-sm font-medium text-ink-soft">{{ $pengalaman['organisasi'] }}</p>
                            </div>
                            <span class="{{ $index % 2 === 0 ? 'bg-ocean/10 text-ocean-soft' : 'bg-surface-strong/70 text-ink-soft' }} shrink-0 rounded-full px-3 py-1 text-xs font-semibold">{{ $pengalaman['periode'] }}</span>
                        </div>
                        <ul class="mt-4 space-y-2 text-sm leading-6 text-ink-soft">
                            @foreach ($pengalaman['poin'] as $poin)
                                <li class="flex gap-2.5">
                                    <svg class="mt-1 size-4 shrink-0 text-ocean" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5" /></svg>
                                    <span>{{ $poin }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-12 sm:mt-16">
        <p class="eyebrow">Toolkit</p>
        <h2 class="section-title">Keahlian &amp; kekuatan</h2>
        <div class="mt-7 grid gap-5 md:grid-cols-2">
            @foreach ($mahasiswa['skills'] as $kategori => $skills)
                <article class="surface-card p-5 sm:p-6">
                    <h3 class="font-bold text-ink">{{ $kategori }}</h3>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="chip">{{ $skill }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection