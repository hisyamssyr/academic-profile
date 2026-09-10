@extends('layouts.app')

@section('content')
    <section class="empty-state border-rose-200 bg-rose-50">
        <p class="eyebrow !text-rose-700">DataAgent.ai</p>
        <h1 class="section-title">Tema tidak dikenali</h1>
        <p class="body-copy mt-3">Tema <span class="font-mono font-bold text-ink">{{ $tema }}</span> tidak termasuk agent yang tersedia.</p>
        <a href="{{ route('agent.show') }}" class="button-primary mt-7">Kembali ke ringkasan</a>
    </section>
@endsection
