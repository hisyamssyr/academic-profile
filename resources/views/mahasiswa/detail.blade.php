@extends('layouts.app')

@section('content')
    <section class="overflow-hidden rounded-3xl bg-ocean-deep text-white">
        <div class="grid gap-8 px-6 py-10 sm:px-10 lg:grid-cols-[auto_1fr] lg:items-center lg:gap-10 lg:px-14 lg:py-14">
            <div class="grid size-24 place-items-center rounded-3xl border border-white/20 bg-white/10 text-3xl font-bold sm:size-28 sm:text-4xl">HS</div>
            <div>
                <p class="font-mono text-sm text-teal-200">{{ $mahasiswa['nrp'] }}</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">{{ $mahasiswa['nama'] }}</h1>
                <p class="mt-4 max-w-3xl leading-7 text-slate-200">{{ $mahasiswa['bio'] }}</p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $mahasiswa['instagram'] }}" target="_blank" rel="noopener" class="button-on-dark">Instagram <span class="ml-2" aria-hidden="true">↗</span></a>
                    <a href="{{ $mahasiswa['linkedin'] }}" target="_blank" rel="noopener" class="button-quiet-on-dark">LinkedIn <span class="ml-2" aria-hidden="true">↗</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Ringkasan akademis">
        @foreach (['Program Studi' => $mahasiswa['prodi'], 'Angkatan' => $mahasiswa['angkatan'], 'IPK' => $mahasiswa['ipk'], 'Minat' => $mahasiswa['minat']] as $label => $value)
            <article class="surface-card p-5">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">{{ $label }}</p>
                <p class="mt-2 font-semibold leading-6 text-ink">{{ $value }}</p>
            </article>
        @endforeach
    </section>

    <section class="mt-12 sm:mt-16">
        <p class="eyebrow">Perjalanan</p>
        <h2 class="section-title">Pengalaman</h2>
        <div class="mt-7 border-l-2 border-teal-200 pl-5 sm:pl-7">
            <div class="space-y-5">
                @foreach ($mahasiswa['pengalaman'] as $pengalaman)
                    <article class="surface-card relative p-5 sm:p-6">
                        <span class="absolute -left-[1.85rem] top-7 size-3 rounded-full border-[3px] border-canvas bg-teal-600 sm:-left-[2.35rem]" aria-hidden="true"></span>
                        <p class="text-sm font-bold text-teal-700">{{ $pengalaman['periode'] }}</p>
                        <h3 class="mt-1 text-lg font-bold tracking-tight text-ink sm:text-xl">{{ $pengalaman['peran'] }}</h3>
                        <p class="mt-1 font-medium text-ink-soft">{{ $pengalaman['organisasi'] }}</p>
                        <ul class="mt-4 space-y-2 text-sm leading-6 text-ink-soft">
                            @foreach ($pengalaman['poin'] as $poin)
                                <li class="flex gap-2"><span class="mt-2 size-1.5 shrink-0 rounded-full bg-teal-500" aria-hidden="true"></span><span>{{ $poin }}</span></li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mt-12 sm:mt-16">
        <p class="eyebrow">Toolkit</p>
        <h2 class="section-title">Keahlian &amp; kekuatan</h2>
        <div class="mt-7 grid gap-5 md:grid-cols-2">
            @foreach ($mahasiswa['skills'] as $kategori => $skills)
                <article class="surface-card p-5 sm:p-6">
                    <h3 class="font-bold text-ink">{{ $kategori }}</h3>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="rounded-lg bg-teal-50 px-3 py-1.5 text-sm font-semibold text-ocean">{{ $skill }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
