# Revisi Konten Route Agent (Langkah 5/5) — Ganti Ide FP

Ini **bukan** ubah struktur routing — struktur route, named routes, regex constraint, dan layout yang sudah jalan tetap dipertahankan semuanya. Ini murni **ganti konten** di route `/agent/{tema?}` (dan sneak peek di Home) dari ide lama (DataAgent.ai) ke ide final project yang baru.

---

## Yang Diganti

Di `AgentController` (atau file data hardcode tempat kamu simpan konten agent sebelumnya), **ganti seluruh array data platform & 3 agent lama** dengan data baru di bawah. Struktur array/key tetap sama polanya (nama platform, tagline, tech stack, latar belakang, list agent dengan key/nama/fungsi/output) — cuma isinya diganti.

**Tema/key agent juga berubah dari `sql-builder` / `eda-cleaner` / `viz-reporter` menjadi 3 key baru di bawah.** Sesuaikan juga link card di halaman overview `/agent` dan di navbar/sneak peek Home yang mengarah ke tema-tema lama — ganti ke tema baru.

---

## Data Baru (hardcode persis)

```
Nama Platform : (fungsional, bukan brand) — Agentic AI-Based Web Application
                Quality Assurance, Security Testing, and Automated Repair System
Tagline       : Autonomous agent that tests, diagnoses, and repairs deployed
                web applications — then proves the fix with a verified pull request.
Tech Stack    : Laravel + Livewire (orchestration), Qwen3 1.7B via llama.cpp
                (reasoning engine, CPU-only), Playwright + Headless Chromium
                (browser automation), OWASP ZAP (security scanning),
                GitHub App + GitHub Actions (repo integration, CI, PR),
                PostgreSQL + Queue (data & job orchestration)

Latar Belakang:
Pengujian web modern menghadapi dua masalah sekaligus: DOM yang berantakan
(div custom, canvas UI, tanpa label semantik) membuat automation tools biasa
gagal, dan business-logic vulnerability seperti broken access control sering
lolos dari scanner otomatis. Sistem ini menggabungkan agent browser dengan
strategi fallback berlapis, security scanning berbasis reasoning AI, dan
kemampuan menelusuri root cause langsung ke source code di GitHub — lalu
mengusulkan perbaikan yang sudah diverifikasi lewat testing otomatis,
bukan sekadar laporan bug.

Agent 1 - key: qa-explorer
  Nama    : @qa-explorer (Functional & Accessibility QA Agent)
  Fungsi  : Menjelajahi aplikasi web memakai strategi 6-level fallback —
            mulai dari semantic accessibility tree, DOM heuristics, computed
            geometry/proximity, keyboard navigation, coordinate interaction,
            hingga (opsional) interpretasi visual — sehingga tetap bisa
            menguji form dan interaksi meski markup HTML-nya berantakan.
  Output  : Daftar temuan fungsional (error, broken flow) dan aksesibilitas
            (elemen tidak punya label/tidak keyboard-reachable), lengkap
            dengan bukti (DOM snapshot, network log, screenshot).

Agent 2 - key: security-scanner
  Nama    : @security-scanner (Security Testing Agent)
  Fungsi  : Menjalankan passive scan (lewat proxy OWASP ZAP) terhadap semua
            traffic untuk deteksi header/cookie tidak aman, lalu memakai
            beberapa akun uji berbeda peran untuk menguji broken access
            control dan IDOR/BOLA secara berbasis reasoning — kategori bug
            yang biasanya lolos dari scanner otomatis biasa. Active scan
            hanya aktif bila pengguna eksplisit mencentang otorisasi.
  Output  : Laporan temuan keamanan dengan tingkat keparahan (severity),
            bukti request/response, dan rekomendasi.

Agent 3 - key: repair-engineer
  Nama    : @repair-engineer (Auto-Repair Agent)
  Fungsi  : Menelusuri root cause bug ke source code repo GitHub terkait
            (lewat pencarian deterministik: stack trace → file → caller →
            test terkait), menghasilkan patch beserta regression test, lalu
            memvalidasinya di environment sementara (ephemeral container)
            sebelum diajukan.
  Output  : Branch perbaikan + regression test + hasil CI + Draft Pull
            Request yang menunggu review manusia (tidak pernah auto-merge
            ke main).
```

**Fallback default kosong** (`/agent` tanpa tema) tetap pakai judul **"General Assistant Agent"**, tapi ringkasan overview-nya diganti mengikuti latar belakang baru di atas — sebutkan singkat bahwa sistem punya 3 agent (qa-explorer, security-scanner, repair-engineer) yang bekerja berurutan: temukan masalah → analisis akar masalah → usulkan perbaikan terverifikasi.

---

## Bagian Lain yang Perlu Disesuaikan

1. **Home (`/`)** — sneak peek "ide Final Project" saat ini masih merujuk DataAgent.ai. Ganti teks & tagline singkatnya ke ide baru, tombol tetap mengarah ke `route('agent.show')` (tidak berubah).
2. **Card overview di `/agent`** — 3 card yang mengarah ke tema harus diupdate: link `route('agent.show', 'qa-explorer')`, `route('agent.show', 'security-scanner')`, `route('agent.show', 'repair-engineer')`.
3. **Halaman "tema tidak dikenali"** — tidak perlu diubah logikanya, karena key lama (`sql-builder` dst) otomatis akan jatuh ke halaman ini kalau ada yang coba akses — itu perilaku yang benar, tidak perlu ditangani khusus.
4. **Named routes, regex constraint, struktur file, navbar** — semuanya tetap seperti sebelumnya, **tidak ada perubahan**.

---

## Yang TIDAK Berubah

- Route `/mahasiswa/{nrp}` (profil pribadi) — tetap seperti sekarang.
- Route `/hitung-ipk/{ip1}/{ip2}` — tetap seperti sekarang.
- Desain UI, navbar, styling, fallback route — tidak diubah, karena ini murni revisi konten, bukan revisi desain.

Setelah selesai, tunjukkan diff/perubahan pada file controller & view yang terpengaruh saja, tidak perlu regenerate seluruh project.

SPEC_EOF