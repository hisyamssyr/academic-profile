@extends('layouts.app')

@section('content')
    <section class="empty-state border-0 bg-ocean-deep text-white shadow-card-hover">
        <p class="text-6xl font-bold tracking-tight text-teal-200 sm:text-7xl">404</p>
        <h1 class="mt-4 text-2xl font-bold tracking-tight sm:text-3xl">Halaman tidak ditemukan</h1>
        <p class="mx-auto mt-3 max-w-md leading-7 text-slate-200">URL yang Anda tuju tidak tersedia di routing sandbox ini.</p>
        <a href="{{ route('home') }}" class="button-on-dark mt-7">Kembali ke beranda</a>
    </section>
@endsection