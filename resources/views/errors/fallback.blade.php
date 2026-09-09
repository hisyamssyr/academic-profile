@extends('layouts.app')

@section('content')
    <section class="empty-state bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 text-white border-slate-800 shadow-xl py-12 px-6">
        <p class="font-mono text-6xl font-extrabold tracking-tight text-teal-300 sm:text-7xl">404</p>
        <h1 class="mt-4 text-2xl font-bold tracking-tight text-white sm:text-3xl">Halaman Tidak Ditemukan</h1>
        <p class="mx-auto mt-3 max-w-md text-sm leading-relaxed text-slate-300 sm:text-base">
            Halaman atau URL yang Anda tuju tidak tersedia di routing aplikasi ini.
        </p>
        <a href="{{ route('home') }}" class="button-on-dark mt-8 inline-flex">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 00-1 1m-6 0h6"/></svg>
            <span>Kembali ke Beranda</span>
        </a>
    </section>
@endsection
