@extends('layouts.app')

@section('content')
    <section class="empty-state">
        <span class="mx-auto grid size-14 place-items-center rounded-2xl bg-ocean/15 text-ocean-soft">
            <svg class="size-7" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
        </span>
        <p class="eyebrow mt-5 !text-ocean-soft">DataAgent.ai</p>
        <h1 class="section-title">Tema tidak dikenali</h1>
        <p class="body-copy mt-3">Tema <span class="font-mono font-bold text-ink">{{ $tema }}</span> tidak termasuk agent yang tersedia.</p>
        <a href="{{ route('agent.show') }}" class="button-primary mt-7">Kembali ke ringkasan</a>
    </section>
@endsection