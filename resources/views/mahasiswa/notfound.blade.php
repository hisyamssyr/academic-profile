@extends('layouts.app')

@section('content')
    <section class="empty-state">
        <span class="mx-auto grid size-14 place-items-center rounded-2xl bg-amber-50 text-amber-600">
            <svg class="size-7" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
        </span>
        <p class="eyebrow mt-5 !text-amber-700">Data tidak tersedia</p>
        <h1 class="section-title">Mahasiswa tidak ditemukan</h1>
        <p class="body-copy mt-3">NRP <span class="font-mono font-bold text-ink">{{ $nrp }}</span> memiliki format yang benar, tetapi belum ada di data profil statis.</p>
        <a href="{{ route('home') }}" class="button-primary mt-7">Kembali ke beranda</a>
    </section>
@endsection