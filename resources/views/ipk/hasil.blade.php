@extends('layouts.app')

@section('content')
    <a href="{{ route('ipk.form') }}" class="group inline-flex items-center gap-2 text-sm font-semibold text-ocean transition hover:text-ocean-strong">
        <span aria-hidden="true" class="grid size-7 place-items-center rounded-full border border-ocean-soft/30 bg-ocean/15 text-ocean-soft transition-all duration-300 group-hover:-translate-x-0.5 group-hover:border-ocean group-hover:bg-ocean group-hover:text-white">
            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5" /><path d="m12 19-7-7 7-7" /></svg>
        </span>
        Ubah nilai IP
    </a>

    <section class="surface-card mt-5 p-6 sm:p-8">
        <header>
            <p class="eyebrow">Kalkulator portofolio akademis</p>
            <h1 class="section-title text-3xl sm:text-4xl">Hasil perhitungan IP</h1>
        </header>

        @if (! $isValid)
            <div class="status-alert status-alert-error mt-6" role="alert">
                <p class="font-bold">Nilai tidak valid</p>
                <p class="mt-1">Skala IP maksimal adalah 4.00 untuk setiap semester.</p>
            </div>
        @else
            <div class="mt-7 grid gap-4 sm:grid-cols-3">
                <article class="rounded-2xl border border-line bg-surface-strong/70 p-5">
                    <p class="text-sm font-semibold text-ink-soft">IP Semester 1</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ink">{{ number_format($ip1, 2) }}</p>
                </article>
                <article class="rounded-2xl border border-line bg-surface-strong/70 p-5">
                    <p class="text-sm font-semibold text-ink-soft">IP Semester 2</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ink">{{ number_format($ip2, 2) }}</p>
                </article>
                <article class="rounded-2xl bg-gradient-to-br from-ocean-deep to-ocean p-5 text-white shadow-card">
                    <p class="text-sm font-semibold text-ocean-soft">Rata-rata IP</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight">{{ number_format($rataRata, 2) }}</p>
                </article>
            </div>
        @endif
    </section>
@endsection