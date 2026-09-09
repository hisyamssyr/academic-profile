@extends('layouts.app')

@section('content')
    <!-- Profile Banner Hero -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 p-6 text-white shadow-xl sm:p-10 lg:p-12">
        <div class="pointer-events-none absolute -right-20 -top-20 size-80 rounded-full bg-teal-500/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative z-10 flex flex-col gap-6 lg:flex-row lg:items-start lg:gap-8">
            <!-- Avatar Badge -->
            <div class="grid size-24 shrink-0 place-items-center rounded-2xl border-2 border-white/10 bg-gradient-to-br from-teal-600 to-teal-800 text-3xl font-extrabold text-white shadow-lg shadow-teal-950/40 sm:size-28 sm:text-4xl">
                HS
            </div>

            <!-- Profile Info -->
            <div class="min-w-0 flex-1">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-teal-400/20 bg-teal-400/10 px-3 py-1 font-mono text-xs font-bold text-teal-300">
                        <svg class="size-3.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/></svg>
                        NRP: {{ $mahasiswa['nrp'] }}
                    </span>
                    <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-slate-300">ITS Informatika</span>
                </div>

                <h1 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    {{ $mahasiswa['nama'] }}
                </h1>

                <p class="mt-4 max-w-3xl text-sm leading-relaxed text-slate-300 sm:text-base">
                    {{ $mahasiswa['bio'] }}
                </p>

                <!-- Social & Contact Actions -->
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <a href="{{ $mahasiswa['instagram'] }}" target="_blank" rel="noopener" class="button-on-dark !min-h-[40px] !px-4 !py-2 text-xs">
                        <span>Instagram</span>
                        <svg class="size-3.5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <a href="{{ $mahasiswa['linkedin'] }}" target="_blank" rel="noopener" class="button-quiet-on-dark !min-h-[40px] !px-4 !py-2 text-xs">
                        <span>LinkedIn</span>
                        <svg class="size-3.5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <a href="{{ $mahasiswa['github'] }}" target="_blank" rel="noopener" class="button-quiet-on-dark !min-h-[40px] !px-4 !py-2 text-xs">
                        <span>GitHub</span>
                        <svg class="size-3.5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <span class="inline-flex items-center gap-2 rounded-xl bg-white/5 border border-white/10 px-3 py-2 text-xs text-slate-300">
                        <svg class="size-3.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $mahasiswa['kontak'] }}</span>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Overview Cards -->
    <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Ringkasan Akademis">
        <!-- Card 1: Prodi -->
        <article class="surface-card flex flex-col justify-between p-5">
            <div class="flex items-center justify-between">
                <span class="eyebrow">Program Studi</span>
                <div class="grid size-8 place-items-center rounded-lg bg-teal-50 text-teal-700">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                </div>
            </div>
            <p class="mt-4 text-base font-bold leading-snug text-slate-900">{{ $mahasiswa['prodi'] }}</p>
        </article>

        <!-- Card 2: Angkatan -->
        <article class="surface-card flex flex-col justify-between p-5">
            <div class="flex items-center justify-between">
                <span class="eyebrow">Angkatan</span>
                <div class="grid size-8 place-items-center rounded-lg bg-teal-50 text-teal-700">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <p class="mt-4 text-base font-bold leading-snug text-slate-900">{{ $mahasiswa['angkatan'] }}</p>
        </article>

        <!-- Card 3: IPK -->
        <article class="surface-card flex flex-col justify-between p-5 border-teal-200 bg-gradient-to-br from-teal-50/50 via-white to-white">
            <div class="flex items-center justify-between">
                <span class="eyebrow">IPK Kumulatif</span>
                <div class="grid size-8 place-items-center rounded-lg bg-teal-700 text-white">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
            </div>
            <p class="mt-4 font-mono text-2xl font-extrabold text-teal-900">{{ $mahasiswa['ipk'] }}</p>
        </article>

        <!-- Card 4: Minat -->
        <article class="surface-card flex flex-col justify-between p-5">
            <div class="flex items-center justify-between">
                <span class="eyebrow">Fokus Minat</span>
                <div class="grid size-8 place-items-center rounded-lg bg-teal-50 text-teal-700">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
            <p class="mt-4 text-base font-bold leading-snug text-slate-900">{{ $mahasiswa['minat'] }}</p>
        </article>
    </section>

    <!-- Experience Timeline -->
    <section class="mt-12 sm:mt-16">
        <div class="flex items-center gap-3">
            <div class="grid size-9 place-items-center rounded-xl bg-teal-700 text-white shadow-sm">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="eyebrow">Rekam Jejak</p>
                <h2 class="section-title">Pengalaman Organisasi &amp; Asistensi</h2>
            </div>
        </div>

        <div class="relative mt-8 border-l-2 border-teal-200/80 ml-4 pl-6 sm:ml-6 sm:pl-8 space-y-6">
            @foreach ($mahasiswa['pengalaman'] as $pengalaman)
                <article class="surface-card relative transition-all duration-200 hover:border-teal-300 hover:shadow-md">
                    <!-- Timeline Node Pin -->
                    <span class="absolute -left-[2.1rem] sm:-left-[2.6rem] top-7 size-4 rounded-full border-4 border-slate-50 bg-teal-700 shadow-sm" aria-hidden="true"></span>

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-3">
                        <div>
                            <h3 class="text-lg font-bold tracking-tight text-slate-900 sm:text-xl">{{ $pengalaman['peran'] }}</h3>
                            <p class="text-sm font-semibold text-teal-800">{{ $pengalaman['organisasi'] }}</p>
                        </div>
                        <span class="inline-flex w-fit items-center rounded-full bg-teal-50 px-3 py-1 font-mono text-xs font-semibold text-teal-800 border border-teal-100/80">
                            {{ $pengalaman['periode'] }}
                        </span>
                    </div>

                    <ul class="mt-4 space-y-2 text-sm leading-relaxed text-slate-600">
                        @foreach ($pengalaman['poin'] as $poin)
                            <li class="flex items-start gap-2.5">
                                <svg class="mt-1 size-3.5 shrink-0 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $poin }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Skills & Toolkit Section -->
    <section class="mt-12 sm:mt-16">
        <div class="flex items-center gap-3">
            <div class="grid size-9 place-items-center rounded-xl bg-teal-700 text-white shadow-sm">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            </div>
            <div>
                <p class="eyebrow">Toolkit Technical &amp; Interpersonal</p>
                <h2 class="section-title">Keahlian &amp; Kompetensi</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2">
            @foreach ($mahasiswa['skills'] as $kategori => $skills)
                <article class="surface-card flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
                            <span class="size-2 rounded-full bg-teal-600"></span>
                            <h3 class="font-bold text-slate-900 text-base">{{ $kategori }}</h3>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($skills as $skill)
                                <span class="rounded-xl border border-teal-100 bg-teal-50/70 px-3 py-1.5 text-xs font-semibold text-teal-900 transition-colors hover:bg-teal-100 hover:border-teal-200">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
