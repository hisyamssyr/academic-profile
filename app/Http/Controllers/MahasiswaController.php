<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MahasiswaController extends Controller
{
    public function show(string $nrp): View
    {
        $mahasiswa = [
            '5025241130' => [
                'nama' => 'Hisyam Syafa Raditya',
                'nrp' => '5025241130',
                'prodi' => 'S1 Teknik Informatika, Institut Teknologi Sepuluh Nopember',
                'angkatan' => '2024 (masuk Agustus 2024, expected lulus Agustus 2028)',
                'ipk' => '3.51 / 4.00',
                'minat' => 'Data Analysis & Machine Learning',
                'kontak' => 'hisyamsyafa2@gmail.com | +6285227763718',
                'instagram' => 'https://instagram.com/hisyamssyr',
                'linkedin' => 'https://linkedin.com/in/hisyam-syafa-raditya',
                'github' => 'https://github.com/hisyamssyr',
                'bio' => 'Mahasiswa Teknik Informatika ITS dengan ketertarikan kuat pada analisis data dan machine learning. Memiliki fondasi matematika dan pemrograman yang solid, dengan kemampuan yang terus berkembang di pemrosesan data, analisis statistik, dan konsep machine learning.',
                'pengalaman' => [
                    ['organisasi' => 'Himpunan Mahasiswa Teknik Computer-Informatika ITS', 'peran' => 'External Affairs Staff', 'periode' => 'Mar 2026 – Present', 'poin' => ['Menjadi PIC proker SiapinKarirmu! 1.0', 'Menjadi LO kegiatan company visit ke Oracle dan Telkomsel', 'Menjadi PIC benchmark internal']],
                    ['organisasi' => 'Ramadan di Kampus 1447H', 'peran' => 'Head of Food & Nutrition', 'periode' => 'Aug 2025 – Present', 'poin' => ['Memimpin Divisi Nutrisi dengan 25+ staf, mengoordinasikan kolaborasi lintas divisi', 'Merancang sistem distribusi makanan untuk 700+ peserta per hari', 'Berkoordinasi dengan 15+ vendor untuk pengadaan, harga, dan MoU', 'Menyusun SOP food testing, pemilihan vendor, dan alur distribusi']],
                    ['organisasi' => 'Institut Teknologi Sepuluh Nopember', 'peran' => 'Teaching Assistant Database Systems', 'periode' => 'Aug 2025 – Dec 2025', 'poin' => ['Membimbing 13 mahasiswa dalam sesi praktikum konsep basis data', 'Mengajar materi CDM, PDM, DDL, DML, dan SQL Query', 'Mengevaluasi tugas dan kuis selama 7 pertemuan', 'Mengembangkan studi kasus query SQL untuk memperkuat pemahaman praktikal']],
                    ['organisasi' => 'Schematics 2025', 'peran' => 'Vice Head II of Data Management', 'periode' => 'Apr 2025 – Dec 2025', 'poin' => ['Merancang formulir pendaftaran fisik untuk NLC, NPC, dan BST', 'Mengelola seluruh data pendaftaran peserta (form fisik & online)', 'Membuat dan mengelola formulir kehadiran seluruh sesi acara', 'Membuat formulir feedback untuk evaluasi kepuasan peserta']],
                    ['organisasi' => 'ITS Robocon', 'peran' => 'Programming Division Internship', 'periode' => 'Sep 2024 – Oct 2024', 'poin' => ['Mempelajari sistem mikrokontroler dan aplikasinya di robotika', 'Mengembangkan program kontrol robot menggunakan C++ dan Python', 'Mengimplementasikan ROS (Robot Operating System) untuk navigasi dan kontrol robot']]],
                'skills' => [
                    'Hard Skills — Programming' => ['C', 'C++', 'Python', 'Go'],
                    'Hard Skills — Web Development' => ['React', 'Vue', 'Next.js', 'Node.js', 'Laravel'],
                    'Hard Skills — Database' => ['SQL', 'SQLite', 'NoSQL'],
                    'Hard Skills — Data & Machine Learning' => ['Pandas', 'NumPy', 'Scikit-learn', 'TensorFlow', 'Keras', 'Matplotlib'],
                    'Soft Skills' => ['Problem Solving', 'Team Collaboration', 'Communication', 'Time Management', 'Adaptability', 'Attention to Detail'],
                ],
            ],
        ];

        if (! array_key_exists($nrp, $mahasiswa)) {
            return view('mahasiswa.notfound', compact('nrp'));
        }

        return view('mahasiswa.detail', ['mahasiswa' => $mahasiswa[$nrp]]);
    }
}
