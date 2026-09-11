@extends('layouts.app')

@section('content')
    <section class="mx-auto w-full max-w-2xl">
        <div class="text-center">
            <p class="eyebrow">Academic portfolio</p>
            <h1 class="section-title mx-auto mt-2 !text-3xl sm:!text-4xl">Kalkulator IP</h1>
            <p class="body-copy mx-auto mt-3 max-w-md">Bandingkan dua nilai IP semester dalam hitungan detik.</p>
        </div>

        <form action="{{ route('ipk.form') }}" class="surface-card mt-8 grid gap-6 p-6 sm:p-10">
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="form-label" for="ip1">IP Semester 1</label>
                    <input id="ip1" name="ip1" type="text" inputmode="decimal" required class="form-input" placeholder="3.50" aria-describedby="ip-help">
                </div>
                <div>
                    <label class="form-label" for="ip2">IP Semester 2</label>
                    <input id="ip2" name="ip2" type="text" inputmode="decimal" required class="form-input" placeholder="3.50">
                </div>
            </div>

            <p id="ip-help" class="form-help">Gunakan angka desimal dengan titik, misalnya 3.50. Nilai maksimal adalah 4.00.</p>

            <button class="button-primary w-full" type="submit">
                Hitung sekarang
                <span aria-hidden="true">→</span>
            </button>
        </form>
    </section>
@endsection