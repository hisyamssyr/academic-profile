@extends('layouts.app')

@section('content')
    <section class="empty-state border-rose-200/80 bg-rose-50/50">
        <div class="mx-auto grid size-16 place-items-center rounded-2xl bg-rose-100 text-rose-800">
            <svg class="size-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="eyebrow !text-rose-800 mt-4">DataAgent.ai Error</p>
        <h1 class="section-title mt-1">Tema Agent Tidak Dikenali</h1>
        <p class="body-copy mt-3 max-w-md mx-auto">
            Tema <span class="rounded bg-rose-100 px-2 py-0.5 font-mono font-bold text-rose-900">{{ $tema }}</span> tidak terdaftar dalam spesifikasi agent platform.
        </p>
        <a href="{{ route('agent.show') }}" class="button-primary mt-6 inline-flex">
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Ringkasan Agent</span>
        </a>
    </section>
@endsection
