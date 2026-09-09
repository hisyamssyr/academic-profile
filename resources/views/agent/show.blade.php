@extends('layouts.app')

@section('content')
    @if (isset($agent))
        <a href="{{ route('agent.show') }}" class="text-sm font-semibold text-teal-700 transition hover:text-teal-900">← Agent overview</a>
        <section class="mt-5 rounded-2xl bg-[#073b4c] p-8 text-white shadow-sm">
            <p class="font-mono text-teal-200">{{ $tema }}</p><h1 class="mt-2 text-3xl font-bold">{{ $agent['nama'] }}</h1><p class="mt-2 text-lg text-slate-200">{{ $agent['peran'] }}</p>
        </section>
        <section class="mt-6 grid gap-5 md:grid-cols-2"><article class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200"><h2 class="font-bold text-teal-800">Fungsi</h2><p class="mt-3 leading-7 text-slate-600">{{ $agent['fungsi'] }}</p></article><article class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200"><h2 class="font-bold text-teal-800">Output</h2><p class="mt-3 leading-7 text-slate-600">{{ $agent['output'] }}</p></article></section>
    @else
        <section class="rounded-2xl bg-[#073b4c] p-8 text-white sm:p-10"><p class="text-sm font-semibold uppercase tracking-widest text-teal-200">{{ $platform['nama'] }}</p><h1 class="mt-3 text-3xl font-bold sm:text-4xl">General Assistant Agent</h1><p class="mt-4 max-w-3xl text-lg text-slate-200">{{ $platform['tagline'] }}</p><p class="mt-6 max-w-4xl leading-7 text-slate-300">{{ $platform['latarBelakang'] }}</p></section>
        <section class="mt-8"><h2 class="text-2xl font-bold text-[#073b4c]">Specialist agents</h2><div class="mt-5 grid gap-5 md:grid-cols-3">@foreach ($agents as $key => $item)<a href="{{ route('agent.show', ['tema' => $key]) }}" class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:ring-teal-400"><p class="font-mono text-sm text-teal-700">{{ $item['nama'] }}</p><h3 class="mt-2 font-bold text-slate-800">{{ $item['peran'] }}</h3><p class="mt-3 text-sm leading-6 text-slate-600">{{ $item['fungsi'] }}</p></a>@endforeach</div></section>
        <p class="mt-8 rounded-xl border border-teal-100 bg-teal-50 p-5 text-sm text-teal-900"><span class="font-bold">Tech stack:</span> {{ $platform['techStack'] }}</p>
    @endif
@endsection
