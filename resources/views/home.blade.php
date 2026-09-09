@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden rounded-3xl bg-ocean-deep px-6 py-12 text-white sm:px-10 sm:py-16 lg:px-16 lg:py-20">
        <div class="absolute -right-28 -top-28 size-80 rounded-full bg-teal-300/10 blur-3xl"></div>
        <div class="absolute -bottom-24 left-1/3 size-64 rounded-full bg-cyan-300/10 blur-3xl"></div>
        <div class="relative max-w-3xl">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-200">Institut Teknologi Sepuluh Nopember</p>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">Halo, saya <span class="text-teal-200">Hisyam.</span></h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">Mahasiswa Informatika ITS yang mengeksplorasi data, machine learning, dan pengalaman digital yang bermakna.</p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="button-on-dark">Jelajahi profil <span class="ml-2" aria-hidden="true">→</span></a>
                <a href="{{ route('agent.show') }}" class="button-quiet-on-dark">Lihat DataAgent.ai</a>
            </div>
        </div>
    </section>

    <section class="mt-10 grid gap-5 lg:grid-cols-5">
        <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="surface-card-interactive group p-6 sm:p-7 lg:col-span-3">
            <div class="flex items-start gap-4 sm:gap-5">
                <div class="grid size-16 shrink-0 place-items-center rounded-2xl bg-mint text-xl font-bold text-ocean sm:size-20 sm:text-2xl">HS</div>
                <div class="min-w-0">
                    <p class="eyebrow">Profil akademis</p>
                    <h2 class="mt-2 text-xl font-bold tracking-tight text-ink sm:text-2xl">{{ $mahasiswa['nama'] }}</h2>
                    <p class="mt-2 text-sm leading-6 text-ink-soft sm:text-base">{{ $mahasiswa['prodi'] }}</p>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between gap-4 border-t border-slate-100 pt-5">
                <span class="font-mono text-xs text-slate-500 sm:text-sm">{{ $mahasiswa['nrp'] }}</span>
                <span class="shrink-0 text-sm font-bold text-ocean transition group-hover:translate-x-1">Profil lengkap <span aria-hidden="true">→</span></span>
            </div>
        </a>

        <a href="{{ route('agent.show') }}" class="surface-card-interactive group bg-ink p-6 text-white hover:border-ink sm:p-7 lg:col-span-2">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-teal-200">Konsep proyek akhir</p>
            <h2 class="mt-3 text-2xl font-bold tracking-tight">DataAgent<span class="text-teal-300">.ai</span></h2>
            <p class="mt-3 leading-7 text-slate-300">Autonomous AI Agent Suite untuk analitik data end-to-end.</p>
            <p class="mt-7 text-sm font-bold text-teal-200">Kenali para agent <span class="inline-block transition group-hover:translate-x-1" aria-hidden="true">→</span></p>
        </a>
    </section>
@endsection
