@extends('layouts.app')

@section('content')
    <section class="empty-state border-amber-200 bg-amber-50">
        <p class="eyebrow !text-amber-700">Data tidak tersedia</p>
        <h1 class="section-title">Mahasiswa tidak ditemukan</h1>
        <p class="body-copy mt-3">NRP <span class="font-mono font-bold text-ink">{{ $nrp }}</span> memiliki format yang benar, tetapi belum ada di data profil statis.</p>
        <a href="{{ route('home') }}" class="button-primary mt-7">Kembali ke beranda</a>
    </section>
@endsection
