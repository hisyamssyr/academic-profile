# Panduan Hosting di Vercel

Panduan ini khusus untuk **academic-profile** (Laravel tanpa database) menggunakan **serverless function PHP** (runtime `vercel-php@0.9.0`). Setup ini sudah tertanam di `vercel.json` + `api/index.php`, jadi deploy cukup lewat dashboard.

> **Kenapa Vercel?** GRATIS (Hobby plan) dan **tidak perlu kartu kredit/virtual card** — cocok kalau Render menolak metode pembayaran.

## Prasyarat

1. Repository sudah ada di **GitHub** (public atau private).
2. Akun **Vercel** (login pakai akun GitHub cukup) — daftar di [vercel.com/signup](https://vercel.com/signup).
3. Sudah ada di repo (yang sudah disiapkan):
   - `vercel.json` — fungsi PHP + routes + env (composer diurus otomatis oleh runtime).
   - `api/index.php` — entry serverless; isinya membuat `/tmp`, menyuntik env (session cookie, cache array, `APP_KEY`), lalu memuat `vendor/autoload.php`.
   - `public/build/` — hasil `npm run build` **harus ter-commit** (sudah tidak di-`.gitignore`). Ini yang membuat animasi/UI Vite tampil di live.
   - `composer.lock` ter-commit, agar install di Vercel deterministik.

## Cara kerja

- Vercel mendeteksi `vercel.json`, memakai runtime **`vercel-php@0.9.0`** yang menyediakan **PHP 8.5.x** (kompatibel dengan Laravel 13 yang butuh `^8.3`).
- **Build framework di-skip** (`"buildCommand": ""` di `vercel.json`) — Vercel TIDAK menjalankan `npm run build`/node. CSS/JS Vite dilayani dari **`public/build` yang ter-commit**; maka setiap ubah UI, jalankan `npm run build` lokal dulu lalu commit hasilnya.
- Saat membangun function, runtime **otomatis menjalankan `composer install`** (`--no-dev --no-interaction --no-scripts --ignore-platform-reqs`) karena `composer.json` ada di root — lalu `vendor/` hasil install ikut ter-package ke lambda (dibutuhkan `api/index.php`). **Jangan** menambah `buildCommand` berisi `composer`: di build-env framework, `composer` tidak terpasang sehingga build gagal `command not found`.
- Semua request (`/(.*)`) diteruskan ke `api/index.php`; file statis di `public/build/` dilayani via route `/build/(.*)`.
- Nilai env (`APP_ENV`, `APP_DEBUG`, `APP_KEY`, dll.) sudah di-inline di `vercel.json` — **tidak perlu `.env`**.

---

## Langkah-langkah deploy

### 1. Commit & push perubahan terakhir

Pastikan semua fix terbaru (UI, `public/build`, `vercel.json`) sudah di commit dan push ke branch `main`:

```bash
git add public/build
git commit -m "fix: vite build assets & composer install for Vercel deploy"
git push
```

### 2. Import proyek ke Vercel

1. Buka [vercel.com/new](https://vercel.com/new).
2. Pilih **Import Git Repository** → **Continue with GitHub** → pilih repository `academic-profile`.
3. Halaman **Configure Project**:
   - **Framework Preset** → pilih **Other** (bukan Laravel; Vercel tidak punya preset PHP built-in).
   - **Root Directory** → biarkan kosong (`/`).
   - **Build & Development Settings** → biarkan **semua auto** (isi sudah dibaca dari `vercel.json`: install & build command dikosongkan sehingga Vercel tidak menjalankan `npm run build`, outputDirectory `public`). **Jangan** menimpa manual.
   - **Environment Variables** → tidak perlu diisi apa pun (sudah di `vercel.json`). Kalau mau, variabel yang diisi manual di sini menimpa yang di `vercel.json`.
4. Klik **Deploy**.

### 3. Verifikasi

- Status build tampil di halaman dashboard; tunggu sampai **Ready**.
- URL live otomatis: `https://academic-profile.vercel.app`.
- Cek di browser: `/`, `/mahasiswa/5025241130`, `/agent`, `/hitung-ipk` harus tampil normal **dengan animasi** (ripple, tilt, navbar hamburger, dll.) — kalau animasi mati, berarti `public/build` belum ter-commit.
- Quick check terminal:

  ```bash
  curl -s -o /dev/null -w "%{http_code}\n" https://academic-profile.vercel.app
  ```

  Harusnya `200`. Logika route juga menangani `404` untuk path yang tidak ada.

### 4. (Opsional) Tentukan domain

- Dashboard proyek → **Settings → Domains** → tambah `academic-profile.vercel.app` atau domain sendiri (HTTPS otomatis).

---

## Workflow update setelah ini

- **Cukup push ke `main`** → Vercel redeploy otomatis.
- **Setiap mengubah UI**, build dulu lokal lalu commit hasilnya, baru push:

  ```bash
  npm run build
  git add public/build
  git commit -m "build: regenerate vite assets"
  git push
  ```

  Tanpa ini, Vercel memakai `public/build` versi lama (statis di repo).

---

## Catatan penting

- **Tanpa database**: session di `cookie`, cache di `array`, queue `sync` — jadi aman untuk serverless; tidak ada state yang hilang antar-invocation.
- **Cold start**: lambda bebas sporadis "tidur"; request pertama bisa beberapa detik, selanjutnya cepat.
- **PHP version**: runtime `vercel-php@0.9.0` memakai PHP 8.5.x. Jangan mengubah `composer.json` ke versi PHP yang lebih tinggi dari kapabilitas runtime.
- **Composer otomatis**: runtime `vercel-php` menjalankan `composer install --no-dev --no-scripts --ignore-platform-reqs` sendiri saat mendeteksi `composer.json`. Artinya `bootstrap/cache/packages.php` tidak dibuat saat build — aman karena aplikasi ini tidak bergantung pada package discovery (provider inti ada di `bootstrap/providers.php`). Jangan tambahkan `buildCommand` composer di `vercel.json`.
- **`APP_DEBUG=false`** di produksi; jangan set `true` di `vercel.json`.
- **Secret**: `APP_KEY` masih tercantum di `vercel.json` (jelas terlihat di repo). Untuk lebih rapi, pindahkan ke **Settings → Environment Variables** di dashboard lalu hapus dari `vercel.json`.

### (Opsional) Deploy lewat CLI

Kalau prefer command line dan sudah login (`vercel login`):

```bash
vercel --prod
```

CLI membaca `vercel.json` yang sama; hasilnya identik dengan deploy dari GitHub, hanya **tanpa auto-redeploy** saat push.

---

## Troubleshooting

| Gejala | Kemungkinan penyebab / solusi |
| --- | --- |
| Halaman `500` / "vendor/autoload.php not found" | `composer install` gagal / vendor tidak ter-package. Cek tab **Deployments → (deployment) → Logs** — pastikan baris `🐘 Installing Composer dependencies [START] ... [DONE]` ada dan `composer.lock` ter-commit. |
| Build gagal "composer: command not found" | `buildCommand` berisi `composer` di `vercel.json`. Hapus `buildCommand` — composer dijalankan otomatis oleh runtime `vercel-php`, bukan build-env. |
| Build "Running npm run build" → "vite: command not found" | `buildCommand` tidak dikosongkan sehingga Vercel menjalankan default `npm run build` tanpa node_modules. Pastikan `"buildCommand": ""` di `vercel.json` (build di-skip; CSS/JS diambil dari `public/build` yang ter-commit). |
| `500` "Too few arguments ... Manager::createDriver()" | `APP_MAINTENANCE_DRIVER` ada di env Vercel bernilai **kosong** → driver maintenance `''` → rekursi di `Manager`. Hapus variabel kosong itu di dashboard (Settings → Environment Variables), atau biarkan handler di `api/index.php` (sudah memaksa `file`). |
| Situs tampil tapi **tanpa animasi/style baru** | `public/build` belum naik. Jalankan `npm run build`, commit `public/build`, push → redeploy. |
| Build Vercel gagal | Bisa gagal di `composer install` (jaringan/kuota): **Deployments → Redeploy** ulang, atau cek versi PHP runtime di Logs. |
| Muncul `ERR_REQUIRE_ESM` / error Node di build | Pastikan `installCommand` di `vercel.json` tetap `""` (skip npm) — Vercel tidak perlu node untuk proyek ini. |
| Route / 404 untuk path valid | Pastikan routes di `vercel.json` tidak dihapus: `/build/(.*)` → `/public/build/$1`, lalu `/(.*)` → `/api/index.php`. |
| Exception PHP | Ambil dari dashboard **Logs** → copy stack trace; umumnya karena file di luar root tidak ter-upload (pastikan tidak ada `.vercelignore` aneh). |

---

## Referensi file terkait

- `vercel.json` — konfigurasi runtime, env, dan routes.
- `api/index.php` — bootstrap serverless Laravel (membuat `/tmp`, env inline, `APP_KEY`).
- `public/build/` — aset Vite **wajib ter-commit**; `manifest.json` dipakai `@vite` di `resources/views/layouts` untuk memuat CSS/JS hasil build.
- `.gitignore` — `vendor/` & `.env` tidak ter-commit (sengaja); `public/build` **tidak** lagi dikecualikan.
- Panduan alternatif lain: `docs/hosting-render.md` (via Docker/Render).