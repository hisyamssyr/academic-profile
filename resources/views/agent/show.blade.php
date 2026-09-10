@extends('layouts.app')

@section('content')
    @if (isset($agent))
        <a href="{{ route('agent.show') }}" class="inline-flex items-center gap-2 text-sm font-bold text-ocean transition hover:text-ocean-deep"><span aria-hidden="true">←</span> Semua agent</a>

        <section class="mt-5 rounded-3xl bg-ocean-deep p-7 text-white sm:p-10">
            <p class="font-mono text-sm text-teal-200">{{ $tema }}</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">{{ $agent['nama'] }}</h1>
            <p class="mt-3 text-lg text-slate-200">{{ $agent['peran'] }}</p>
        </section>

        <section class="mt-7 grid gap-5 md:grid-cols-2">
            <article class="surface-card p-6 sm:p-7">
                <p class="eyebrow">Kapabilitas</p>
                <h2 class="section-title">Fungsi</h2>
                <p class="body-copy mt-4">{{ $agent['fungsi'] }}</p>
            </article>
            <article class="surface-card p-6 sm:p-7">
                <p class="eyebrow">Hasil kerja</p>
                <h2 class="section-title">Output</h2>
                <p class="body-copy mt-4">{{ $agent['output'] }}</p>
            </article>
        </section>
    @else
        <section class="rounded-3xl bg-ocean-deep p-7 text-white sm:p-10 lg:p-14">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-teal-200">{{ $platform['nama'] }}</p>
            <h1 class="mt-3 max-w-3xl text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">General Assistant Agent</h1>
            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-200">{{ $platform['tagline'] }}</p>
            <p class="mt-6 max-w-4xl leading-7 text-slate-300">{{ $platform['latarBelakang'] }}</p>
        </section>

        <section class="mt-12 sm:mt-16">
            <p class="eyebrow">Tim spesialis</p>
            <h2 class="section-title">Agent untuk tiap tahap analisis</h2>
            <div class="mt-7 grid gap-5 md:grid-cols-3">
                @foreach ($agents as $key => $item)
                    <a href="{{ route('agent.show', ['tema' => $key]) }}" class="surface-card-interactive group flex min-h-60 flex-col p-6">
                        <p class="font-mono text-sm font-semibold text-teal-700">{{ $item['nama'] }}</p>
                        <h3 class="mt-3 text-lg font-bold tracking-tight text-ink">{{ $item['peran'] }}</h3>
                        <p class="mt-3 text-sm leading-6 text-ink-soft">{{ $item['fungsi'] }}</p>
                        <span class="mt-auto pt-6 text-sm font-bold text-ocean">Pelajari agent <span class="inline-block transition group-hover:translate-x-1" aria-hidden="true">→</span></span>
                    </a>
                @endforeach
            </div>
        </section>

        <aside class="mt-8 rounded-2xl border border-teal-100 bg-teal-50 p-5 sm:p-6" aria-label="Tech stack">
            <p class="text-sm font-bold text-ocean">Tech stack</p>
            <p class="mt-2 text-sm leading-6 text-ink-soft">{{ $platform['techStack'] }}</p>
        </aside>
    @endif
@endsection
