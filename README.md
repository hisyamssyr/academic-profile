# Profile Akademis — Laravel Local Routing Sandbox

> **Tugas Mandiri — Pemrograman Berbasis Kerangka Kerja (PBKK), Pertemuan 2: Instalasi & Routing**

Website **profile akademis statis** yang dibangun dengan **Laravel local routing sandbox** (tanpa database — seluruh data di-hardcode di controller). Fokus utama tugas ini adalah penguasaan **routing** Laravel: *required parameter*, *optional parameter + fallback*, *named routes*, *regex constraint*, hingga *route fallback* (custom 404).

---

## Identitas Mahasiswa

- **Nama: Hisyam Syafa Raditya**
- **NRP: 5025241130**
- **Prodi: S1 Teknik Informatika — Departemen Teknik Informatika, Institut Teknologi Sepuluh Nopember**
- **Angkatan: 2024** (masuk Agustus 2024, expected lulus Agustus 2028)

Data diri tersebut ditampilkan langsung di dalam aplikasi (halaman Home dan halaman Detail Profil `/mahasiswa/5025241130`).

---

## Deskripsi Proyek

Aplikasi ini adalah **portofolio/persona akademis** milik Hisyam Syafa Raditya yang dirancang sebagai *landing page* modern dan responsif, memuat:

1. **Home** — Kata sambutan bernuansa ITS beserta *sneak peek* profil dan ide *Final Project*.
2. **Detail Profil** — Data akademis lengkap (NRP, IPK, minat), pengalaman organisasi berbentuk *timeline*, skill badges, dan tombol konek sosial media.
3. **DataAgent.ai** — Halaman konsep platform *Agentic AI* untuk analitik data end-to-end, dengan 3 agent khusus yang dapat diakses per-agen.
4. **Kalkulator IPK** — Kalkulator rata-rata dua nilai IP dengan validasi skala maksimal 4.00.
5. **Custom 404** — Halaman fallback untuk URL yang tidak cocok dengan route mana pun.

---

## Tech Stack

### Backend
| Teknologi | Keterangan |
|---|---|
| **PHP 8.5** | Bahasa pemrograman utama |
| **Laravel 13** (`laravel/framework ^13.17`) | Framework backend, routing, dan Blade templating |
| **Laravel Tinker** | REPL untuk debugging dalam konteks aplikasi |
| **PHPUnit 12** | Testing framework |
| **Laravel Pint** | Code formatter (PSR-style) |

### Frontend & Build Tools
| Teknologi | Keterangan |
|---|---|
| **Blade** | Templating engine bawaan Laravel |
| **Tailwind CSS 4** | Utility-first CSS (via `@tailwindcss/vite`) |
| **Vite 8** | Build tool & dev server untuk asset frontend |
| **JavaScript (vanilla)** | Interaktivitas ringan (animasi scroll-reveal, count-up, hamburger menu) |

### Lainnya
| Teknologi | Keterangan |
|---|---|
| **Laravel Boost 2.8** | MCP server + skill untuk pengembangan berbasis AI agent |
| **SQLite** | Terpasang namun tidak digunakan (tugas ini tanpa database) |

---

## Struktur Route

Semua route didefinisikan di `routes/web.php` dan **wajib memiliki nama** (`->name()`):

| Method | URI | Nama | Keterangan |
|---|---|---|---|
| `GET` | `/` | `home` | Landing page profil akademis |
| `GET` | `/mahasiswa/{nrp}` | `mahasiswa.detail` | Detail profil; `{nrp}` wajib 10 digit (`where('nrp', '[0-9]{10}')`) |
| `GET` | `/agent/{tema?}` | `agent.show` | Overview DataAgent.ai atau detail agent (`sql-builder`, `eda-cleaner`, `viz-reporter`) |
| `GET` | `/hitung-ipk` | `ipk.form` | Form input IP sebelum kalkulasi |
| `GET` | `/hitung-ipk/{ip1}/{ip2}` | `ipk.hitung` | Kalkulator rata-rata 2 IP; parameter desimal tervalidasi |
| *(fallback)* | — | `fallback` | Custom 404 untuk URL yang tidak cocok |

### Semua halaman memakai `route()` — tidak ada hardcoded path.

---

## URL untuk Demo ke Dosen

### Route yang Benar
- **Home** → `GET /`
- **Profil valid** → `GET /mahasiswa/5025241130`
- **Agent overview** → `GET /agent`
- **Agent detail (per tema)** → `GET /agent/sql-builder`, `GET /agent/eda-cleaner`, `GET /agent/viz-reporter`
- **Kalkulator** → `GET /hitung-ipk/3.5/3.5`
- **Agent tema tidak dikenali** → `GET /agent/acak`

### Route yang Memicu Error/404 (untuk membuktikan constraint)
- **NRP bukan 10 digit** → `GET /mahasiswa/123` (regex `[0-9]{10}` ditolak → fallback 404)
- **NRP 10 digit tapi tidak terdaftar** → `GET /mahasiswa/0000000000` (view "Mahasiswa tidak ditemukan")
- **IP > 4.00** → `GET /hitung-ipk/5/3` (pesan "Nilai IP tidak valid, skala maksimal 4.00")
- **URL acak** → `GET /halaman-tidak-ada` (custom 404)

---

## Menjalankan Proyek Secara Lokal

```bash
# 1. Instal dependency PHP
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Instal dependency frontend & build asset
npm install
npm run build

# 4. Jalankan development server
php artisan serve
```

Tampilan dapat diakses di `http://localhost:8000`. Untuk development frontend real-time, gunakan `npm run dev`.

---

## Struktur Direktori Utama

```
routes/web.php                          -> definisi seluruh route + constraint
app/Http/Controllers/
├── HomeController.php                   -> landing page
├── MahasiswaController.php              -> detail profil mahasiswa (data hardcode)
├── AgentController.php                  -> overview/detail DataAgent.ai
└── IpkController.php                    -> kalkulator IPK
resources/views/
├── layouts/app.blade.php                -> navbar + footer + Tailwind
├── home.blade.php
├── mahasiswa/{detail,notfound}.blade.php
├── agent/{show,unknown}.blade.php
├── ipk/{form,hasil}.blade.php
└── errors/fallback.blade.php            -> custom 404
```

---

## Lisensi

Proyek ini dibuat untuk keperluan tugas mata kuliah **PBKK** — Departemen Teknik Informatika, Institut Teknologi Sepuluh Nopember.