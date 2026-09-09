<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $mahasiswa = [
            'nama' => 'Hisyam Syafa Raditya',
            'nrp' => '5025241130',
            'prodi' => 'S1 Teknik Informatika, ITS',
        ];

        return view('home', compact('mahasiswa'));
    }
}
