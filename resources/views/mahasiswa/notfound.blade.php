@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-xl rounded-2xl border border-amber-200 bg-amber-50 p-8 text-center">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-700">Data tidak tersedia</p>
        <h1 class="mt-3 text-3xl font-bold text-slate-800">Mahasiswa tidak ditemukan</h1>
        <p class="mt-3 text-slate-600">NRP <span class="font-semibold">{{ $nrp }}</span> memiliki format yang benar, tetapi belum ada di data profil statis.</p>
        <a href="{{ route('home') }}" class="mt-6 inline-block rounded-lg bg-teal-700 px-5 py-3 font-semibold text-white transition hover:bg-teal-800">Kembali ke Home</a>
    </section>
@endsection
