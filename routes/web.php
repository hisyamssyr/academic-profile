<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IpkController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Landing page profil akademis.
Route::get('/', [HomeController::class, 'index'])->name('home');

// Detail mahasiswa hanya menerima NRP ITS berformat sepuluh digit.
Route::get('mahasiswa/{nrp}', [MahasiswaController::class, 'show'])
    ->where('nrp', '[0-9]{10}')
    ->name('mahasiswa.detail');

// Ringkasan platform atau detail agent berdasarkan tema opsional.
Route::get('agent/{tema?}', [AgentController::class, 'show'])
    ->name('agent.show');

// Form GET untuk memasukkan IP sebelum menuju URL hasil perhitungan.
Route::get('hitung-ipk', [IpkController::class, 'form'])->name('ipk.form');

// Kalkulator IP dua semester dengan parameter desimal tervalidasi.
Route::get('hitung-ipk/{ip1}/{ip2}', [IpkController::class, 'hitung'])
    ->where([
        'ip1' => '[0-9]+([.][0-9]+)?',
        'ip2' => '[0-9]+([.][0-9]+)?',
    ])
    ->name('ipk.hitung');

// Halaman 404 untuk URL yang tidak cocok dengan route mana pun.
Route::fallback(function () {
    return response()->view('errors.fallback', [], 404);
})->name('fallback');
