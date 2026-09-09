@extends('layouts.app')

@section('content')
    @if (isset($agent))
        <!-- Single Agent View -->
        <div class="mb-6">
            <a href="{{ route('agent.show') }}" class="inline-flex items-center gap-2 text-sm font-bold text-teal-800 transition hover:text-teal-950">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Semua Agent DataAgent.ai</span>
            </a>
        </div>

        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 p-6 text-white shadow-xl sm:p-10">
            <div class="pointer-events-none absolute -right-20 -top-20 size-80 rounded-full bg-teal-500/10 blur-3xl"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center rounded-md bg-teal-400/20 px-2.5 py-1 font-mono text-xs font-bold text-teal-300">
                        {{ $agent['nama'] }}
                    </span>
                    <span class="rounded-full bg-white/10 px-2.5 py-0.5 text-xs text-slate-300">Specialized AI Agent</span>
                </div>

                <h1 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    {{ $agent['peran'] }}
                </h1>
                <p class="mt-2 text-base text-teal-200">
                    Sistem agen otonom khusus untuk mempercepat alur data analytics.
                </p>
            </div>
        </section>

        <section class="mt-8 grid gap-6 md:grid-cols-2">
            <!-- Fungsi Card -->
            <article class="surface-card flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <div class="grid size-9 place-items-center rounded-xl bg-teal-50 text-teal-800">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="eyebrow">Kapabilitas Utama</p>
                            <h2 class="text-xl font-bold text-slate-900">Fungsi Agent</h2>
                        </div>
                    </div>
                    <p class="body-copy mt-4 text-base">
                        {{ $agent['fungsi'] }}
                    </p>
                </div>
            </article>

            <!-- Output Card -->
            <article class="surface-card flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <div class="grid size-9 place-items-center rounded-xl bg-teal-50 text-teal-800">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="eyebrow">Hasil Kerja</p>
                            <h2 class="text-xl font-bold text-slate-900">Output Yang Dihasilkan</h2>
                        </div>
                    </div>
                    <p class="body-copy mt-4 text-base">
                        {{ $agent['output'] }}
                    </p>
                </div>
                <div class="mt-6 rounded-xl bg-slate-900 p-4 font-mono text-xs text-teal-300 border border-slate-800">
                    <div class="flex items-center justify-between text-slate-400 text-[10px] mb-2 border-b border-slate-800 pb-1.5">
                        <span>FORMAT OUTPUT AGENT</span>
                        <span>STATUS: ACTIVE</span>
                    </div>
                    <code>{{ $agent['output'] }}</code>
                </div>
            </article>
        </section>
    @else
        <!-- Overview Platform View -->
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-teal-950 to-slate-900 p-6 text-white shadow-xl sm:p-10 lg:p-14">
            <div class="pointer-events-none absolute -right-24 -top-24 size-96 rounded-full bg-teal-500/10 blur-3xl"></div>

            <div class="relative z-10 max-w-4xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-teal-400/20 bg-teal-400/10 px-3.5 py-1 text-xs font-bold tracking-wider text-teal-300 uppercase">
                    <span class="size-1.5 rounded-full bg-teal-400"></span>
                    <span>{{ $platform['nama'] }}</span>
                </div>

                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    General Assistant Agent Suite
                </h1>

                <p class="mt-3 text-lg font-semibold text-teal-200 sm:text-xl">
                    {{ $platform['tagline'] }}
                </p>

                <p class="mt-5 text-sm leading-relaxed text-slate-300 sm:text-base">
                    {{ $platform['latarBelakang'] }}
                </p>
            </div>
        </section>

        <!-- Agents Grid Section -->
        <section class="mt-12 sm:mt-16">
            <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="eyebrow">Tim Spesialis AI</p>
                    <h2 class="section-title">Agent Untuk Setiap Tahap Analisis</h2>
                </div>
                <p class="text-xs text-slate-500 font-medium">Klik agen untuk melihat deskripsi detail</p>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-3">
                @foreach ($agents as $key => $item)
                    <a href="{{ route('agent.show', ['tema' => $key]) }}" class="surface-card-interactive group flex flex-col justify-between p-6">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="rounded-lg bg-teal-50 px-2.5 py-1 font-mono text-xs font-bold text-teal-800 border border-teal-100">
                                    {{ $item['nama'] }}
                                </span>
                                <span class="grid size-7 place-items-center rounded-full bg-slate-100 text-slate-500 transition-colors group-hover:bg-teal-700 group-hover:text-white">
                                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>

                            <h3 class="mt-4 text-lg font-bold tracking-tight text-slate-900 group-hover:text-teal-800 transition-colors">
                                {{ $item['peran'] }}
                            </h3>

                            <p class="mt-2 text-sm leading-relaxed text-slate-600 line-clamp-3">
                                {{ $item['fungsi'] }}
                            </p>
                        </div>

                        <div class="mt-6 border-t border-slate-100 pt-4 flex items-center justify-between text-xs text-slate-500">
                            <span class="truncate font-mono">Output: {{ Str::limit($item['output'], 28) }}</span>
                            <span class="shrink-0 font-bold text-teal-800 group-hover:translate-x-0.5 transition-transform">Detail →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Tech Stack Banner -->
        <aside class="mt-10 surface-card border-teal-100 bg-gradient-to-r from-teal-50/40 via-white to-teal-50/20 p-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-start gap-3">
                    <div class="grid size-9 shrink-0 place-items-center rounded-xl bg-teal-700 text-white">
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Arsitektur Tech Stack</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-600">{{ $platform['techStack'] }}</p>
                    </div>
                </div>
            </div>
        </aside>
    @endif
@endsection
