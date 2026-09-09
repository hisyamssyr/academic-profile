@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <section class="surface-card p-6 sm:p-10 shadow-lg border-slate-200/90">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-5">
                <div class="grid size-12 place-items-center rounded-2xl bg-teal-700 text-white shadow-md shadow-teal-900/10">
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="eyebrow">Academic Portfolio Tool</p>
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Kalkulator IP Semester</h1>
                </div>
            </div>

            <p class="body-copy mt-4 text-sm sm:text-base">
                Hitung rata-rata Indeks Prestasi (IP) dari dua semester secara akurat.
            </p>

            <form action="{{ route('ipk.form') }}" method="GET" class="mt-8 grid gap-6 sm:grid-cols-2">
                <div class="flex flex-col gap-1.5">
                    <label for="ip1" class="form-label">
                        IP Semester 1 <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input
                            type="number"
                            step="0.01"
                            min="0.00"
                            max="4.00"
                            id="ip1"
                            name="ip1"
                            inputmode="decimal"
                            required
                            class="form-input"
                            placeholder="3.50"
                            aria-describedby="ip-help"
                        >
                        <span class="pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 font-mono text-xs font-semibold text-slate-400">/ 4.00</span>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="ip2" class="form-label">
                        IP Semester 2 <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input
                            type="number"
                            step="0.01"
                            min="0.00"
                            max="4.00"
                            id="ip2"
                            name="ip2"
                            inputmode="decimal"
                            required
                            class="form-input"
                            placeholder="3.50"
                        >
                        <span class="pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 font-mono text-xs font-semibold text-slate-400">/ 4.00</span>
                    </div>
                </div>

                <div id="ip-help" class="flex items-start gap-2 rounded-xl bg-slate-50 p-3.5 text-xs text-slate-600 border border-slate-200/80 sm:col-span-2">
                    <svg class="size-4 shrink-0 text-teal-700 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Gunakan format angka desimal (misalnya: 3.50 atau 3.75). Nilai IP maksimum yang valid adalah <strong>4.00</strong>.</span>
                </div>

                <button class="button-primary sm:col-span-2 w-full text-base py-3" type="submit">
                    <span>Hitung IP Sekarang</span>
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </section>
    </div>
@endsection
