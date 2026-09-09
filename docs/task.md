# SPESIFIKASI TUGAS — Laravel Local Sandbox: Profile Akademis (Revisi 2)

Salin seluruh isi di bawah ini dan berikan ke AI coding agent (Claude Code, dsb). Ini menggantikan spesifikasi versi sebelumnya sepenuhnya — jangan campur dengan versi lama.

---

## KONTEKS PROYEK

Tugas mandiri mata kuliah **Pemrograman Berbasis Kerangka Kerja (PBKK)** — Pertemuan 2: Instalasi & Routing, Departemen Teknik Informatika ITS. Membangun **aplikasi profile akademis statis** dengan **Laravel local routing sandbox** (tanpa database — semua data hardcode di controller, fokus pada routing: required param, optional param + fallback, named routes, regex constraint, route fallback).

**PENTING — perubahan dari draft sebelumnya:**
- **Semua route langsung di root, TIDAK ada prefix `/dashboard`.** Jangan group route di bawah `/dashboard`.
- UI harus **modern, bersih, rapi, dan responsive** — bukan sekadar routing polos tanpa styling. Perhatikan detail visual: spacing, typography, hover/transition states, mobile-first.
- Navbar wajib punya 4 link: **Home, Profile, Agent, Kalkulator** (pakai `route()`, bukan hardcoded href).

---

## TECH STACK

- Laravel 11/12, Blade, Tailwind CSS (CDN atau Vite — pilih yang lebih mudah di-setup Boost)
- Tanpa database, tanpa autentikasi
- Boleh pakai Alpine.js (CDN) secukupnya untuk interaktivitas ringan (dropdown, toggle, dsb) jika membantu UX

---

## ROUTE 1 — Home: `GET /`

- Name: `home`
- Kata sambutan welcome yang hangat, bernuansa ITS (bisa selipkan elemen "Sepuluh Nopember" / teal-navy identity).
- Tampilkan **sneak peek profil** (foto/avatar placeholder, nama, NRP, prodi) dengan tombol/link menuju halaman profil lengkap (`route('mahasiswa.detail', ...)`).
- Tampilkan juga **sneak peek ide Final Project** (DataAgent.ai) dengan tombol menuju `route('agent.show')`.
- Section harus terasa seperti landing page portofolio pribadi, bukan halaman kosong.

---

## ROUTE 2 — Detail Profil: `GET /mahasiswa/{nrp}`

- Name: `mahasiswa.detail`
- Parameter `{nrp}` **required**, dengan regex constraint `where('nrp', '[0-9]{10}')` (hanya terima 10 digit).
- Data untuk NRP `5025241130` (hardcode di controller, array asosiatif):

```
Nama       : Hisyam Syafa Raditya
NRP        : 5025241130
Prodi      : S1 Teknik Informatika, Institut Teknologi Sepuluh Nopember
Angkatan   : 2024 (masuk Agustus 2024, expected lulus Agustus 2028)
IPK        : 3.49 / 4.00
Minat      : Data Analysis & Machine Learning
Kontak     : hisyamsyafa2@gmail.com | +6285227763718
Instagram  : https://instagram.com/hisyamssyr
LinkedIn   : https://linkedin.com/in/hisyam-syafa-raditya
GitHub     : https://github.com/hisyamssyr
```

**Ringkasan profil (bio singkat):**
> Mahasiswa Teknik Informatika ITS dengan ketertarikan kuat pada analisis data dan machine learning. Memiliki fondasi matematika dan pemrograman yang solid, dengan kemampuan yang terus berkembang di pemrosesan data, analisis statistik, dan konsep machine learning.

**Pengalaman Kerja / Organisasi (tampilkan sebagai timeline atau card list, urut dari terbaru):**

1. **Himpunan Mahasiswa Teknik Computer-Informatika ITS** — External Affairs Staff (Mar 2026 – Present)
   - Menjadi Person in Charge (PIC) dua kali untuk program konten Instagram "Siapin Karirmu"
   - Bertugas sebagai Liaison Officer (LO) untuk 60 peserta company visit ke Oracle dan Telkom
   - Memimpin program Benchmarking sebagai PIC, mengawasi 10+ staf magang

2. **Ramadan di Kampus 1447H** — Head of Food & Nutrition (Aug 2025 – Present)
   - Memimpin Divisi Nutrisi dengan 25+ staf, mengoordinasikan kolaborasi lintas divisi
   - Merancang sistem distribusi makanan untuk 700+ peserta per hari
   - Berkoordinasi dengan 15+ vendor untuk pengadaan, harga, dan MoU
   - Menyusun SOP food testing, pemilihan vendor, dan alur distribusi

3. **Institut Teknologi Sepuluh Nopember** — Teaching Assistant Database Systems (Aug 2025 – Dec 2025)
   - Membimbing 13 mahasiswa dalam sesi praktikum konsep basis data
   - Mengajar materi CDM, PDM, DDL, DML, dan SQL Query
   - Mengevaluasi tugas dan kuis selama 7 pertemuan
   - Mengembangkan studi kasus query SQL untuk memperkuat pemahaman praktikal

4. **Schematics 2025** — Vice Head II of Data Management (Apr 2025 – Dec 2025)
   - Merancang formulir pendaftaran fisik untuk NLC, NPC, dan BST
   - Mengelola seluruh data pendaftaran peserta (form fisik & online)
   - Membuat dan mengelola formulir kehadiran seluruh sesi acara
   - Membuat formulir feedback untuk evaluasi kepuasan peserta

5. **ITS Robocon** — Programming Division Internship (Sep 2024 – Oct 2024)
   - Mempelajari sistem mikrokontroler dan aplikasinya di robotika
   - Mengembangkan program kontrol robot menggunakan C++ dan Python
   - Mengimplementasikan ROS (Robot Operating System) untuk navigasi dan kontrol robot

**Skills (tampilkan sebagai badge/chip, dikelompokkan):**
- Hard Skills — Programming: C, C++, Python, Go
- Hard Skills — Web Development: React, Vue, Next.js, Node.js, Laravel
- Hard Skills — Database: SQL, SQLite, NoSQL
- Hard Skills — Data & Machine Learning: Pandas, NumPy, Scikit-learn, TensorFlow, Keras, Matplotlib
- Soft Skills: Problem Solving, Team Collaboration, Communication, Time Management, Adaptability, Attention to Detail

**Tombol konek** (pakai ikon, styling jelas — bisa pill button atau icon button): Instagram → `https://instagram.com/hisyamssyr`, LinkedIn → `https://linkedin.com/in/hisyam-syafa-raditya`. Buka di tab baru (`target="_blank" rel="noopener"`).

Jika NRP valid format (10 digit) tapi bukan `5025241130` → tampilkan view "Mahasiswa tidak ditemukan" yang rapi (bukan error mentah), dengan tombol kembali ke Home.

---

## ROUTE 3 — Ide Platform Agentic AI: `GET /agent/{tema?}`

- Name: `agent.show`
- Parameter `{tema}` **optional**. Key yang dikenali: `sql-builder`, `eda-cleaner`, `viz-reporter`.
- Kosong → fallback default, judul **"General Assistant Agent"**, tampilkan overview umum platform (data di bawah).
- Tema tidak dikenali → tampilkan pesan "tema tidak dikenali" + tombol kembali ke overview umum.

**Data platform (hardcode persis):**

```
Nama Platform : DataAgent.ai
Tagline       : Autonomous AI Agent Suite for End-to-End Data Analytics
Tech Stack    : Laravel 11/12 (Backend & Routing), Tailwind CSS (Frontend),
                Gemini API / OpenRouter (AI Engine), PostgreSQL / MySQL (Database)

Latar Belakang:
Seorang Data Analyst sering menghabiskan 60-70% waktunya untuk pekerjaan
berulang: data cleaning, penulisan query SQL dasar, serta pembuatan
visualisasi dan ringkasan data. DataAgent.ai adalah platform Agentic AI
berbasis web yang mengeksekusi alur kerja data analytics secara otomatis,
membagi tugas analisis ke beberapa agen AI khusus.

Agent 1 - key: sql-builder
  Nama    : @sql-builder (Database & Query Agent)
  Fungsi  : Menerjemahkan instruksi bahasa alami menjadi kueri SQL yang
            teroptimasi (support PostgreSQL/MySQL).
  Output  : Kode SQL, deskripsi alur join/aggregation, saran indeks basis data.

Agent 2 - key: eda-cleaner
  Nama    : @eda-cleaner (Data Cleaning & Exploration Agent)
  Fungsi  : Menganalisis skema/struktur data (CSV/JSON/Tabel) untuk mendeteksi
            missing values, outliers, serta rekomendasi statistik preprocessing.
  Output  : Matriks kualitas data & draf fungsi pembersihan data.

Agent 3 - key: viz-reporter
  Nama    : @viz-reporter (Data Visualization & Insight Agent)
  Fungsi  : Membaca hasil analisis data untuk merangkum key business insights
            dan menggenerasi kode visualisasi (Chart.js/Plotly/Matplotlib/Seaborn).
  Output  : Executive summary & konfig chart visualisasi.
```

UI: tampilkan 3 agent sebagai card yang bisa diklik (link ke `route('agent.show', 'sql-builder')` dst) di halaman overview umum, plus halaman detail per-agent yang menonjolkan fungsi & output masing-masing.

---

## ROUTE 4 — Kalkulator Portofolio Akademis: `GET /hitung-ipk/{ip1}/{ip2}`

- Name: `ipk.hitung`
- Regex constraint: `where(['ip1' => '[0-9]+([.][0-9]+)?', 'ip2' => '[0-9]+([.][0-9]+)?'])`.
- Hitung total dan rata-rata dua nilai IP. Validasi: jika salah satu nilai > 4.00, tampilkan pesan error "Nilai IP tidak valid, skala maksimal 4.00" (bukan crash/hasil aneh).
- UI: tampilkan input form sederhana (GET form yang redirect ke URL dengan parameter) supaya user bisa coba nilai lain tanpa edit URL manual, plus hasil kalkulasi ditampilkan jelas (total & rata-rata, bisa pakai card/summary box).

---

## FALLBACK ROUTE

- `Route::fallback()` di paling bawah `web.php` → halaman 404 custom yang rapi (bukan Laravel default), tombol kembali ke Home.

---

## NAMED ROUTES

Semua route wajib `->name()`. Semua href di Blade **wajib** pakai `route()`, tidak boleh ada hardcoded path di manapun.

---

## NAVBAR (di semua halaman, via layout)

4 link: **Home** (`route('home')`), **Profile** (`route('mahasiswa.detail', '5025241130')`), **Agent** (`route('agent.show')`), **Kalkulator** (`route('ipk.hitung', ['ip1' => '3.5', 'ip2' => '3.5'])` atau arahkan ke halaman form kalkulator kosong jika kamu buat route form terpisah — pilih pendekatan yang paling natural). Responsive: jadi hamburger menu di mobile.

---

## STRUKTUR FILE

```
routes/web.php
app/Http/Controllers/HomeController.php
app/Http/Controllers/MahasiswaController.php
app/Http/Controllers/AgentController.php
app/Http/Controllers/IpkController.php
resources/views/layouts/app.blade.php        -> navbar + footer + Tailwind
resources/views/home.blade.php
resources/views/mahasiswa/detail.blade.php
resources/views/mahasiswa/notfound.blade.php
resources/views/agent/show.blade.php
resources/views/agent/unknown.blade.php
resources/views/ipk/form.blade.php           -> (opsional) form input sebelum hasil
resources/views/ipk/hasil.blade.php
resources/views/errors/fallback.blade.php
```

---

## GAYA VISUAL & INTERAKTIVITAS

- Warna dominan teal (`#0d6b6b`-ish) + navy, identitas ITS. Tambahkan aksen gradient atau soft shadow untuk kesan modern, jangan flat/kosong.
- Card-based layout, rounded corners, hover transition (scale/shadow) di elemen yang bisa diklik.
- Mobile-first, breakpoint jelas untuk tablet & desktop (grid Tailwind `sm:` `md:` `lg:`).
- Skill badges, tombol sosial, dan card agent harus punya micro-interaction (hover state minimal).
- Hindari tampilan default/boilerplate Laravel welcome page — desain harus terasa seperti portofolio personal yang di-develop niat.

---

## OUTPUT YANG DIHARAPKAN

Kerjakan berurutan: `routes/web.php` → controller → Blade view → layout/navbar → styling detail. Setelah selesai, kasih daftar URL untuk testing tiap route, termasuk contoh URL salah untuk memicu fallback/404 (untuk didemokan ke dosen).

SPEC_EOF