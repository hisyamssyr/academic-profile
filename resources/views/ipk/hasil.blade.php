@extends('layouts.app')

@section('content')
    <a href="{{ route('ipk.form') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-ocean transition hover:text-ocean-deep"><span aria-hidden="true">←</span> Ubah nilai IP</a>

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
                <article class="rounded-2xl border border-line bg-slate-50/70 p-5">
                    <p class="text-sm font-semibold text-ink-soft">IP Semester 1</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ink">{{ number_format($ip1, 2) }}</p>
                </article>
                <article class="rounded-2xl border border-line bg-slate-50/70 p-5">
                    <p class="text-sm font-semibold text-ink-soft">IP Semester 2</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ink">{{ number_format($ip2, 2) }}</p>
                </article>
                <article class="rounded-2xl bg-gradient-to-br from-ocean-deep to-teal-700 p-5 text-white shadow-card">
                    <p class="text-sm font-semibold text-teal-100">Rata-rata IP</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight">{{ number_format($rataRata, 2) }}</p>
                </article>
            </div>
        @endif
    </section>
@endsection