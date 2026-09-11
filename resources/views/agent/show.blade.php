@extends('layouts.app')

@section('content')
    @if (isset($agent))
        <a href="{{ route('agent.show') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-ocean transition hover:text-ocean-deep"><span aria-hidden="true">←</span> Semua agent</a>

        <section class="surface-card mt-5 overflow-hidden">
            <div class="h-2 bg-gradient-to-r from-ocean-deep via-teal-700 to-ocean" aria-hidden="true"></div>
            <div class="px-6 py-8 sm:px-10">
                <p class="font-mono text-xs font-semibold text-teal-700">{{ $tema }}</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-ink sm:text-4xl">{{ $agent['nama'] }}</h1>
                <p class="mt-3 text-lg text-ink-soft">{{ $agent['peran'] }}</p>
            </div>
        </section>

        <section class="mt-6 grid gap-5 md:grid-cols-2">
            <article class="surface-card p-6 sm:p-7">
                <span class="grid size-11 place-items-center rounded-xl bg-teal-50 text-ocean">
                    <svg class="size-5" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3v4M3 5h4" /><path d="M4 4l6 6" /><path d="M10 5h9v14H5v-5" /><path d="M8 14h.01M12 17h.01M16 14h.01" /></svg>
                </span>
                <p class="eyebrow mt-5">Kapabilitas</p>
                <h2 class="section-title">Fungsi</h2>
                <p class="body-copy mt-4">{{ $agent['fungsi'] }}</p>
            </article>
            <article class="surface-card p-6 sm:p-7">
                <span class="grid size-11 place-items-center rounded-xl bg-teal-50 text-ocean">
                    <svg class="size-5" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h5M12 5v5m6.5 2H17" /><path d="M9.5 15c.7 1 1.7 1.6 2.5 1.6s1.8-.6 2.5-1.6" /><rect x="3.5" y="4" width="17" height="15" rx="3" /></svg>
                </span>
                <p class="eyebrow mt-5">Hasil kerja</p>
                <h2 class="section-title">Output</h2>
                <p class="body-copy mt-4">{{ $agent['output'] }}</p>
            </article>
        </section>
    @else
        <section class="relative overflow-hidden rounded-3xl bg-ocean-deep px-6 py-11 text-white sm:px-10 sm:py-14 lg:px-14 lg:py-16">
            <div class="absolute -right-24 -top-24 size-72 rounded-full bg-teal-400/10 blur-3xl" aria-hidden="true"></div>
            <div class="absolute -bottom-16 -left-12 size-56 rounded-full bg-cyan-400/5 blur-3xl" aria-hidden="true"></div>
            <div class="relative max-w-3xl">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-teal-200">{{ $platform['nama'] }}</p>
                <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">General Assistant <span class="text-teal-300">Agent</span></h1>
                <p class="mt-5 text-lg leading-8 text-slate-200">{{ $platform['tagline'] }}</p>
                <p class="mt-6 max-w-4xl leading-7 text-slate-300">{{ $platform['latarBelakang'] }}</p>
            </div>
        </section>

        <section class="mt-12 sm:mt-16">
            <p class="eyebrow">Tim spesialis</p>
            <h2 class="section-title">Agent untuk tiap tahap analisis</h2>
            <div class="mt-7 grid gap-5 md:grid-cols-3">
                @foreach ($agents as $key => $item)
                    <a href="{{ route('agent.show', ['tema' => $key]) }}" class="surface-card-interactive group flex min-h-64 flex-col p-6">
                        <span class="grid size-11 place-items-center rounded-xl bg-teal-50 font-mono text-sm font-bold text-teal-700">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <p class="mt-5 font-mono text-xs font-semibold text-teal-700">{{ $item['nama'] }}</p>
                        <h3 class="mt-1 text-lg font-bold tracking-tight text-ink">{{ $item['peran'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-ink-soft">{{ $item['fungsi'] }}</p>
                        <span class="mt-auto flex items-center gap-1.5 pt-6 text-sm font-semibold text-ocean">
                            Pelajari agent
                            <span class="inline-block transition group-hover:translate-x-1" aria-hidden="true">→</span>
                        </span>
                    </a>
                @endforeach
            </div>
        </section>

        <aside class="mt-8 flex flex-col gap-3 rounded-2xl border border-line bg-white p-5 shadow-card sm:flex-row sm:items-center sm:justify-between sm:p-6" aria-label="Tech stack">
            <p class="shrink-0 text-sm font-bold text-ink">Tech stack</p>
            <p class="max-w-2xl text-sm leading-6 text-ink-soft">{{ $platform['techStack'] }}</p>
        </aside>
    @endif
@endsection