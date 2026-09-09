@extends('layouts.app')

@section('content')
    <a href="{{ route('ipk.form') }}" class="text-sm font-semibold text-teal-700 transition hover:text-teal-900">← Ubah nilai IP</a>
    <section class="mt-5 rounded-2xl bg-white p-7 shadow-sm ring-1 ring-slate-200"><p class="text-sm font-semibold uppercase tracking-widest text-teal-700">Kalkulator Portofolio Akademis</p><h1 class="mt-2 text-3xl font-bold text-[#073b4c]">Hasil perhitungan IP</h1>
        @if (! $isValid)
            <p class="mt-6 rounded-lg bg-rose-50 p-4 font-medium text-rose-800">Nilai tidak valid. Skala IP maksimal adalah 4.00 untuk setiap semester.</p>
        @else
            <div class="mt-6 grid gap-4 sm:grid-cols-3"><div class="rounded-xl bg-teal-50 p-5"><p class="text-sm text-teal-700">IP Semester 1</p><p class="mt-2 text-3xl font-bold text-teal-900">{{ number_format($ip1, 2) }}</p></div><div class="rounded-xl bg-teal-50 p-5"><p class="text-sm text-teal-700">IP Semester 2</p><p class="mt-2 text-3xl font-bold text-teal-900">{{ number_format($ip2, 2) }}</p></div><div class="rounded-xl bg-[#073b4c] p-5 text-white"><p class="text-sm text-teal-200">Rata-rata IP</p><p class="mt-2 text-3xl font-bold">{{ number_format($rataRata, 2) }}</p></div></div><p class="mt-5 text-slate-600">Total nilai IP: <span class="font-semibold">{{ number_format($total, 2) }}</span></p>
        @endif
    </section>
@endsection
