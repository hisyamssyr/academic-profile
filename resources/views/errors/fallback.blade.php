@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-xl rounded-2xl bg-[#073b4c] p-10 text-center text-white"><p class="text-7xl font-bold text-teal-300">404</p><h1 class="mt-4 text-3xl font-bold">Halaman tidak ditemukan</h1><p class="mt-3 text-slate-200">URL yang Anda tuju tidak tersedia di routing sandbox ini.</p><a href="{{ route('home') }}" class="mt-7 inline-block rounded-lg bg-teal-500 px-5 py-3 font-semibold text-white transition hover:bg-teal-400">Kembali ke Home</a></section>
@endsection
