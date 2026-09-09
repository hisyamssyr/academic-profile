<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AgentController extends Controller
{
    public function show(?string $tema = null): View
    {
        $platform = [
            'nama' => 'DataAgent.ai',
            'tagline' => 'Autonomous AI Agent Suite for End-to-End Data Analytics',
            'techStack' => 'Laravel 11/12 (Backend & Routing), Tailwind CSS (Frontend), Gemini API / OpenRouter (AI Engine), PostgreSQL / MySQL (Database)',
            'latarBelakang' => 'Seorang Data Analyst sering menghabiskan 60-70% waktunya untuk pekerjaan berulang: data cleaning, penulisan query SQL dasar, serta pembuatan visualisasi dan ringkasan data. DataAgent.ai adalah platform Agentic AI berbasis web yang mengeksekusi alur kerja data analytics secara otomatis, membagi tugas analisis ke beberapa agen AI khusus.',
        ];

        $agents = [
            'sql-builder' => [
                'nama' => '@sql-builder',
                'peran' => 'Database & Query Agent',
                'fungsi' => 'Menerjemahkan instruksi bahasa alami menjadi kueri SQL yang teroptimasi (support PostgreSQL/MySQL).',
                'output' => 'Kode SQL, deskripsi alur join/aggregation, saran indeks basis data.',
            ],
            'eda-cleaner' => [
                'nama' => '@eda-cleaner',
                'peran' => 'Data Cleaning & Exploration Agent',
                'fungsi' => 'Menganalisis skema/struktur data (CSV/JSON/Tabel) untuk mendeteksi missing values, outliers, serta rekomendasi statistik preprocessing.',
                'output' => 'Matriks kualitas data & draf fungsi pembersihan data.',
            ],
            'viz-reporter' => [
                'nama' => '@viz-reporter',
                'peran' => 'Data Visualization & Insight Agent',
                'fungsi' => 'Membaca hasil analisis data untuk merangkum key business insights dan menggenerasi kode visualisasi (Chart.js/Plotly/Matplotlib/Seaborn).',
                'output' => 'Executive summary & konfig chart visualisasi.',
            ],
        ];

        if ($tema === null) {
            return view('agent.show', compact('platform', 'agents'));
        }

        if (! array_key_exists($tema, $agents)) {
            return view('agent.unknown', compact('platform', 'tema'));
        }

        return view('agent.show', [
            'platform' => $platform,
            'agents' => $agents,
            'agent' => $agents[$tema],
            'tema' => $tema,
        ]);
    }
}
