@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-xl rounded-2xl border border-rose-200 bg-rose-50 p-8 text-center"><p class="text-sm font-semibold uppercase tracking-widest text-rose-700">DataAgent.ai</p><h1 class="mt-3 text-3xl font-bold text-slate-800">Tema tidak dikenali</h1><p class="mt-3 text-slate-600">Tema <span class="font-mono font-semibold">{{ $tema }}</span> tidak termasuk agent yang tersedia.</p><a href="{{ route('agent.show') }}" class="mt-6 inline-block rounded-lg bg-teal-700 px-5 py-3 font-semibold text-white transition hover:bg-teal-800">Kembali ke ringkasan umum</a></section>
@endsection
