@extends('layouts.app')

@section('content')
    <section class="surface-card mx-auto max-w-2xl p-6 sm:p-10">
        <p class="eyebrow">Academic portfolio</p>
        <h1 class="section-title text-3xl sm:text-4xl">Kalkulator IP</h1>
        <p class="body-copy mt-3">Bandingkan dua nilai IP semester dalam hitungan detik.</p>

        <form action="{{ route('ipk.form') }}" class="mt-8 grid gap-5 sm:grid-cols-2">
            <label class="form-label">
                IP Semester 1
                <input name="ip1" inputmode="decimal" required class="form-input" placeholder="3.50" aria-describedby="ip-help">
            </label>
            <label class="form-label">
                IP Semester 2
                <input name="ip2" inputmode="decimal" required class="form-input" placeholder="3.50">
            </label>
            <p id="ip-help" class="text-sm leading-6 text-ink-soft sm:col-span-2">Gunakan angka desimal dengan titik, misalnya 3.50. Nilai maksimal adalah 4.00.</p>
            <button class="button-primary sm:col-span-2" type="submit">Hitung sekarang <span class="ml-2" aria-hidden="true">→</span></button>
        </form>
    </section>
@endsection
