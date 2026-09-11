# Panduan Hosting di Render

Panduan ini khusus untuk **academic-profile** (Laravel tanpa database) menggunakan Web Service + **Dockerfile** yang sudah disiapkan di repo.

## Prasyarat

1. Repository sudah ada di **GitHub** (bisa public maupun private).
2. Akun **Render** (login pakai akun GitHub cukup).
3. Dockerfile di root repo sudah dalam kondisi bagus (sudah diperbaiki: generate `.env` + `APP_KEY`, runtime tanpa DB, `php artisan view:cache`).

## Alur kerja yang dipakai

Render akan membangun image sesuai `Dockerfile` di root:

- **Stage 1** — `node:22-alpine`: install dependency + `npm run build` (produksi asset Vite).
- **Stage 2** — `php:8.3-cli-alpine`: composer `--no-dev`, generate `.env` + `APP_KEY`, compile Blade, jalankan `php artisan serve` di port `$PORT`.

Render otomatis menyuntikkan env `PORT` ke container, dan Dockerfile sudah membaca `PORT` via `${PORT:-10000}`.

---

## Langkah-langkah deploy

### 1. Beri akses Render ke repository

- Setelah login di [dashboard.render.com](https://dashboard.render.com), pilih **New +** → **Web Service**.
- Jika diminta, **instal aplikasi GitHub "Render"** dan izinkan akses (bisa *All repositories*, atau pilih repo ini saja).
- Pilih repository `academic-profile`.

### 2. Buat Web Service

Isi/cek pengaturan berikut:

| Field | Nilai |
| --- | --- |
| **Name** | `academic-profile` |
| **Region** | **Singapore** (paling dekat untuk Indonesia) |
| **Branch** | `main` |
| **Root Directory** | kosong (`/`) — Dockerfile ada di root |
| **Environment** | Render otomatis mendeteksi **Docker** karena ada `Dockerfile` |
| **Build Command** / **Start Command** | **dikosongkan / diabaikan** (tidak dipakai untuk deploy Docker; Render akan menampilkan peringatan "Deploy is via Dockerfile") |
| **Instance Type** | **Free** (cukup untuk situs ini) |
| **Auto-Deploy** | biarkan **Yes** (redeploy otomatis tiap push ke branch) |

> **Opsional:** jika ingin menimpa konfigurasi bawaan (misal `APP_DEBUG`), bisa ditambahkan sebagai **Environment Variables** di *dashboard* — nilainya menimpa yang sudah dibake di Dockerfile.

### 3. Deploy

- Klik **Create Web Service**.
- Buka tab **Logs** — proses build Docker akan tampil (stage node, composer, directive Artisan, lalu `Server running`).
- Saat status berubah menjadi **Live**, situs bisa diakses di URL `https://academic-profile.onrender.com`.

### 4. Verifikasi

- Buka URL live di browser: halaman beranda, `/mahasiswa/5025241130`, `/agent`, `/hitung-ipk` harus tampil normal.
- Quick check lewat terminal:

  ```bash
  curl -s -o /dev/null -w "%{http_code}\n" https://academic-profile.onrender.com
  ```

  Harusnya `200`. Jika keluar `404`, itu normal untuk route yang memang tidak tersedia (fallback), bukan tanda error.

- Cek tab **Logs**: tidak boleh ada baris `Exception` / `ERROR`.

---

## Workflow update setelah ini

- Cukup **push ke branch `main`** → Render membangun ulang otomatis dan langsung mengganti versi lama.
- Untuk deploy manual dari dashboard: **Deploy → Clear build cache & deploy** (berguna jika perubahan Dockerfile tidak terbaca akibat cache layer Docker).

---

## Catatan penting

- **Free tier "spin down"**: instance Free akan **mati** setelah ± 15 menit tanpa traffic. Request pertama setelah tidur bisa lambat (cold start 10–60 detik) — refresh saja jika timeout. Kalau tidak mau, upsize ke Instance Type berbayar.
- **Tidak butuh persistent disk**: aplikasi ini tidak menulis data penting (session di cookie, cache di array, queue `sync`). Jadi restart container aman dan tidak ada data yang hilang.
- **Build time** memakai kuota jam build bulanan; image sekitar beberapa ratus MB setelah dua stage.
- **Custom domain**: di tab **Settings → Custom Domains** (bisa pakai domain sendiri; sertifikat HTTPS otomatis).

---

## Troubleshooting

| Gejala | Kemungkinan penyebab / solusi |
| --- | --- |
| Halaman `500` / putih | Cek **Logs**. Pastikan build berhasil menjalankan `php artisan key:generate` (muncul di log no. exception `No application encryption key`). |
| Style/JS hilang | Pastikan Build log melewati stage `npm run build` dan tidak error — asset `public/build` diproduksi oleh stage node dan disalin ke container. |
| Lambat pertama buka | Cold start Free tier — refresh / tunggu. |
| Build gagal di `composer install` | Jaringan npm/composer saat build; coba **Clear build cache & deploy**. Pastikan `composer.lock` ter-commit. |
| Port error | Render selalu meng-inject `PORT`. Jangan set `PORT` sendiri di dashboard kecuali sadar dampaknya. |

---

## Referensi repositori-terkait

- `Dockerfile` — definisi image (jangan dihapus; `.dockerignore` mengecualikan `.env`, jadi image membuat `.env` sendiri saat build).
- Api alternatif di `vercel.json` — proyek ini juga punya setup Vercel; panduan ini terpisah untuk Render.