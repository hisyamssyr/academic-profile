<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AgentController extends Controller
{
    public function show(?string $tema = null): View
    {
        $platform = [
            'nama' => 'Agentic AI-Based Web Application — Quality Assurance, Security Testing, and Automated Repair System',
            'tagline' => 'Autonomous agent that tests, diagnoses, and repairs deployed web applications — then proves the fix with a verified pull request.',
            'techStack' => 'Laravel + Livewire (orchestration), Qwen3 1.7B via llama.cpp (reasoning engine, CPU-only), Playwright + Headless Chromium (browser automation), OWASP ZAP (security scanning), GitHub App + GitHub Actions (repo integration, CI, PR), PostgreSQL + Queue (data & job orchestration)',
            'latarBelakang' => 'Pengujian web modern menghadapi dua masalah sekaligus: DOM yang berantakan (div custom, canvas UI, tanpa label semantik) membuat automation tools biasa gagal, dan business-logic vulnerability seperti broken access control sering lolos dari scanner otomatis. Sistem ini menggabungkan agent browser dengan strategi fallback berlapis, security scanning berbasis reasoning AI, dan kemampuan menelusuri root cause langsung ke source code di GitHub — lalu mengusulkan perbaikan yang sudah diverifikasi lewat testing otomatis, bukan sekadar laporan bug.',
        ];

        $agents = [
            'qa-explorer' => [
                'nama' => '@qa-explorer',
                'peran' => 'Functional & Accessibility QA Agent',
                'fungsi' => 'Menjelajahi aplikasi web memakai strategi 6-level fallback — mulai dari semantic accessibility tree, DOM heuristics, computed geometry/proximity, keyboard navigation, coordinate interaction, hingga (opsional) interpretasi visual — sehingga tetap bisa menguji form dan interaksi meski markup HTML-nya berantakan.',
                'output' => 'Daftar temuan fungsional (error, broken flow) dan aksesibilitas (elemen tidak punya label/tidak keyboard-reachable), lengkap dengan bukti (DOM snapshot, network log, screenshot).',
            ],
            'security-scanner' => [
                'nama' => '@security-scanner',
                'peran' => 'Security Testing Agent',
                'fungsi' => 'Menjalankan passive scan (lewat proxy OWASP ZAP) terhadap semua traffic untuk deteksi header/cookie tidak aman, lalu memakai beberapa akun uji berbeda peran untuk menguji broken access control dan IDOR/BOLA secara berbasis reasoning — kategori bug yang biasanya lolos dari scanner otomatis biasa. Active scan hanya aktif bila pengguna eksplisit mencentang otorisasi.',
                'output' => 'Laporan temuan keamanan dengan tingkat keparahan (severity), bukti request/response, dan rekomendasi.',
            ],
            'repair-engineer' => [
                'nama' => '@repair-engineer',
                'peran' => 'Auto-Repair Agent',
                'fungsi' => 'Menelusuri root cause bug ke source code repo GitHub terkait (lewat pencarian deterministik: stack trace → file → caller → test terkait), menghasilkan patch beserta regression test, lalu memvalidasinya di environment sementara (ephemeral container) sebelum diajukan.',
                'output' => 'Branch perbaikan + regression test + hasil CI + Draft Pull Request yang menunggu review manusia (tidak pernah auto-merge ke main).',
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
