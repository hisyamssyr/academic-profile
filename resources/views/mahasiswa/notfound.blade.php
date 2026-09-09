@extends('layouts.app')

@section('content')
    <section class="empty-state border-amber-200/80 bg-amber-50/50">
        <div class="mx-auto grid size-16 place-items-center rounded-2xl bg-amber-100 text-amber-800">
            <svg class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <p class="eyebrow !text-amber-800 mt-4">Data Tidak Ditemukan</p>
        <h1 class="section-title mt-1">Mahasiswa Tidak Ditemukan</h1>
        <p class="body-copy mt-3 max-w-md mx-auto">
            NRP <span class="rounded bg-amber-100 px-2 py-0.5 font-mono font-bold text-amber-900">{{ $nrp }}</span> memiliki format 10 digit yang valid, tetapi belum terdaftar dalam database profil akademis.
        </p>
        <a href="{{ route('home') }}" class="button-primary mt-6 inline-flex">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Beranda</span>
        </a>
    </section>
@endsection
