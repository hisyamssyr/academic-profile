@extends('layouts.app')

@section('content')
    <a href="{{ route('ipk.form') }}" class="inline-flex items-center gap-2 text-sm font-bold text-ocean transition hover:text-ocean-deep"><span aria-hidden="true">←</span> Ubah nilai IP</a>

    <section class="surface-card mt-5 p-6 sm:p-8">
        <p class="eyebrow">Kalkulator portofolio akademis</p>
        <h1 class="section-title text-3xl sm:text-4xl">Hasil perhitungan IP</h1>

        @if (! $isValid)
            <div class="status-alert status-alert-error mt-6" role="alert">
                <p class="font-bold">Nilai tidak valid</p>
                <p class="mt-1">Skala IP maksimal adalah 4.00 untuk setiap semester.</p>
            </div>
        @else
            <div class="mt-7 grid gap-4 sm:grid-cols-3">
                <article class="rounded-2xl border border-teal-100 bg-teal-50 p-5">
                    <p class="text-sm font-semibold text-ocean">IP Semester 1</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ocean-deep">{{ number_format($ip1, 2) }}</p>
                </article>
                <article class="rounded-2xl border border-teal-100 bg-teal-50 p-5">
                    <p class="text-sm font-semibold text-ocean">IP Semester 2</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-ocean-deep">{{ number_format($ip2, 2) }}</p>
                </article>
                <article class="rounded-2xl bg-ocean-deep p-5 text-white">
                    <p class="text-sm font-semibold text-teal-200">Rata-rata IP</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight">{{ number_format($rataRata, 2) }}</p>
                </article>
            </div>
            <p class="mt-5 text-sm text-ink-soft">Total nilai IP: <span class="font-bold text-ink">{{ number_format($total, 2) }}</span></p>
        @endif
    </section>
@endsection
