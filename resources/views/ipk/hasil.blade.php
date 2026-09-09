@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <a href="{{ route('ipk.form') }}" class="inline-flex items-center gap-2 text-sm font-bold text-teal-800 transition hover:text-teal-950">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Hitung Ulang / Ubah Nilai IP</span>
        </a>
    </div>

    <section class="surface-card p-6 sm:p-10 shadow-lg border-slate-200/90">
        <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
            <div class="grid size-12 place-items-center rounded-2xl bg-teal-700 text-white shadow-md shadow-teal-900/10">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div>
                <p class="eyebrow">Kalkulator Portofolio Akademis</p>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Hasil Perhitungan IP</h1>
            </div>
        </div>

        @if (! $isValid)
            <div class="status-alert status-alert-error mt-6 flex items-start gap-3" role="alert">
                <svg class="size-5 shrink-0 text-rose-700 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="font-bold text-rose-900">Nilai tidak valid</p>
                    <p class="mt-1 text-sm text-rose-800">Skala IP maksimal adalah 4.00 untuk setiap semester. Silakan periksa kembali angka yang Anda masukkan.</p>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('ipk.form') }}" class="button-primary">Coba Lagi</a>
            </div>
        @else
            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                <!-- Semester 1 Card -->
                <article class="surface-card flex flex-col justify-between border-teal-100 bg-teal-50/40 p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-teal-800">IP Semester 1</span>
                        <span class="rounded bg-teal-100 px-2 py-0.5 font-mono text-xs font-bold text-teal-900">Sem 1</span>
                    </div>
                    <p class="mt-4 font-mono text-3xl font-extrabold text-teal-950">{{ number_format($ip1, 2) }}</p>
                    <span class="mt-2 text-xs text-slate-500">Skala Maksimal 4.00</span>
                </article>

                <!-- Semester 2 Card -->
                <article class="surface-card flex flex-col justify-between border-teal-100 bg-teal-50/40 p-5">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-teal-800">IP Semester 2</span>
                        <span class="rounded bg-teal-100 px-2 py-0.5 font-mono text-xs font-bold text-teal-900">Sem 2</span>
                    </div>
                    <p class="mt-4 font-mono text-3xl font-extrabold text-teal-950">{{ number_format($ip2, 2) }}</p>
                    <span class="mt-2 text-xs text-slate-500">Skala Maksimal 4.00</span>
                </article>

                <!-- Average Result Card -->
                <article class="surface-card flex flex-col justify-between bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 p-5 text-white shadow-md">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-teal-300">Rata-rata IP</span>
                        <span class="rounded bg-teal-400/20 px-2 py-0.5 font-mono text-xs font-bold text-teal-300">Hasil</span>
                    </div>
                    <p class="mt-4 font-mono text-4xl font-extrabold text-white">{{ number_format($rataRata, 2) }}</p>
                    <span class="mt-2 text-xs text-slate-300">Total Akumulasi: <strong class="font-mono text-teal-200">{{ number_format($total, 2) }}</strong></span>
                </article>
            </div>

            <div class="mt-8 flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-slate-500">
                    Hasil ini adalah estimasi rata-rata dari dua semester tanpa pembobotan SKS.
                </p>
                <div class="flex items-center gap-3">
                    <a href="{{ route('ipk.form') }}" class="button-secondary !min-h-[40px] !px-4 !py-2 text-xs">
                        <span>Hitung Ulang</span>
                    </a>
                    <a href="{{ route('mahasiswa.detail', ['nrp' => '5025241130']) }}" class="button-primary !min-h-[40px] !px-4 !py-2 text-xs">
                        <span>Lihat Profil Akademis</span>
                    </a>
                </div>
            </div>
        @endif
    </section>
@endsection
