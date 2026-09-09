@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 p-6 sm:p-10 lg:p-14 text-white shadow-xl shadow-slate-900/10">
        <!-- Subtle Background Glows -->
        <div class="pointer-events-none absolute -right-20 -top-20 size-80 rounded-full bg-teal-500/15 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-20 left-1/4 size-72 rounded-full bg-emerald-500/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-teal-400/20 bg-teal-400/10 px-3.5 py-1 text-xs font-bold tracking-wider text-teal-300 uppercase backdrop-blur-sm">
                <span class="size-1.5 rounded-full bg-teal-400"></span>
                <span>Institut Teknologi Sepuluh Nopember</span>
            </div>

            <h1 class="mt-6 text-3xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl leading-[1.15]">
                Halo, saya <span class="bg-gradient-to-r from-teal-200 via-emerald-200 to-teal-300 bg-clip-text text-transparent">Hisyam.</span>
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-relaxed text-slate-300 sm:text-lg">
                Mahasiswa Teknik Informatika ITS yang berfokus pada analisis data, machine learning, dan pengembangan aplikasi web berbasis AI.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="button-on-dark shadow-lg shadow-teal-950/40">
                    <span>Jelajahi Profil Akademis</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="{{ route('agent.show') }}" class="button-quiet-on-dark">
                    <span>Lihat DataAgent.ai</span>
                    <svg class="size-4 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Main Feature Cards Grid -->
    <section class="mt-8 grid gap-6 lg:grid-cols-5">
        <!-- Student Profile Spotlight Card (3 cols on lg) -->
        <a href="{{ route('mahasiswa.detail', ['nrp' => $mahasiswa['nrp']]) }}" class="surface-card-interactive group relative flex flex-col justify-between overflow-hidden p-6 sm:p-8 lg:col-span-3">
            <div>
                <div class="flex items-center justify-between gap-4">
                    <span class="eyebrow">Profil Akademis</span>
                    <span class="inline-flex items-center rounded-md bg-teal-50 px-2.5 py-1 font-mono text-xs font-bold text-teal-800 border border-teal-100">
                        NRP: {{ $mahasiswa['nrp'] }}
                    </span>
                </div>

                <div class="mt-6 flex items-start gap-4 sm:gap-6">
                    <div class="grid size-16 shrink-0 place-items-center rounded-2xl bg-gradient-to-br from-teal-600 to-teal-800 text-xl font-bold text-white shadow-md shadow-teal-900/10 sm:size-20 sm:text-2xl">
                        HS
                    </div>
                    <div class="min-w-0">
                        <h2 class="text-xl font-bold tracking-tight text-slate-900 group-hover:text-teal-800 transition-colors sm:text-2xl">
                            {{ $mahasiswa['nama'] }}
                        </h2>
                        <p class="mt-1 text-sm font-medium text-slate-600 sm:text-base">
                            {{ $mahasiswa['prodi'] }}
                        </p>
                        <p class="mt-2 text-xs text-slate-500 line-clamp-2">
                            Ketertarikan tinggi pada analisis data, pemrosesan data, machine learning, dan pengembangan sistem perangkat lunak.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex items-center justify-between border-t border-slate-100 pt-4 text-sm font-semibold text-teal-800">
                <span class="text-xs font-normal text-slate-500">Angkatan 2024 · IPK 3.49</span>
                <span class="flex items-center gap-1 transition-transform duration-200 group-hover:translate-x-1">
                    <span>Lihat Detail Lengkap</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </div>
        </a>

        <!-- DataAgent.ai Spotlight Card (2 cols on lg) -->
        <a href="{{ route('agent.show') }}" class="surface-card-interactive group relative flex flex-col justify-between overflow-hidden bg-gradient-to-b from-slate-900 to-slate-950 p-6 text-white hover:border-slate-700 sm:p-8 lg:col-span-2">
            <div class="pointer-events-none absolute -right-12 -top-12 size-40 rounded-full bg-teal-500/10 blur-2xl"></div>

            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-400">Konsep Proyek Akhir</span>
                    <span class="rounded-full bg-teal-500/20 px-2.5 py-0.5 text-[11px] font-bold text-teal-300">Agentic AI</span>
                </div>

                <h2 class="mt-4 text-2xl font-bold tracking-tight text-white group-hover:text-teal-200 transition-colors">
                    DataAgent<span class="text-teal-400">.ai</span>
                </h2>

                <p class="mt-2 text-sm leading-relaxed text-slate-300">
                    Autonomous AI Agent Suite untuk end-to-end data analytics, otomatisasi query SQL, cleaning data, dan visualisasi insight.
                </p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="rounded-lg bg-white/10 px-2.5 py-1 font-mono text-xs text-slate-200 backdrop-blur-sm">@sql-builder</span>
                    <span class="rounded-lg bg-white/10 px-2.5 py-1 font-mono text-xs text-slate-200 backdrop-blur-sm">@eda-cleaner</span>
                    <span class="rounded-lg bg-white/10 px-2.5 py-1 font-mono text-xs text-slate-200 backdrop-blur-sm">@viz-reporter</span>
                </div>
            </div>

            <div class="relative z-10 mt-8 flex items-center justify-between border-t border-white/10 pt-4 text-sm font-semibold text-teal-300">
                <span class="text-xs font-normal text-slate-400">3 AI Agents Available</span>
                <span class="flex items-center gap-1 transition-transform duration-200 group-hover:translate-x-1">
                    <span>Eksplorasi Platform</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </div>
        </a>
    </section>

    <!-- Quick Utility Banner -->
    <section class="mt-8">
        <div class="surface-card flex flex-col items-start justify-between gap-6 border-teal-100 bg-gradient-to-r from-teal-50/60 via-white to-teal-50/30 p-6 sm:flex-row sm:items-center sm:p-8">
            <div class="flex items-start gap-4">
                <div class="grid size-12 shrink-0 place-items-center rounded-2xl bg-teal-700 text-white shadow-sm">
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Fitur Kalkulator IP Semester</h3>
                    <p class="mt-1 text-sm text-slate-600">Bandingkan dan hitung rata-rata IP semester dengan mudah dalam sekali klik.</p>
                </div>
            </div>
            <a href="{{ route('ipk.form') }}" class="button-primary shrink-0 w-full sm:w-auto">
                <span>Coba Kalkulator IP</span>
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </section>
@endsection
