# Panduan Hosting di Vercel

Panduan ini khusus untuk **academic-profile** (Laravel tanpa database) menggunakan **serverless function PHP** (runtime `vercel-php@0.9.0`). Setup ini sudah tertanam di `vercel.json` + `api/index.php`, jadi deploy cukup lewat dashboard.

> **Kenapa Vercel?** GRATIS (Hobby plan) dan **tidak perlu kartu kredit/virtual card** — cocok kalau Render menolak metode pembayaran.

## Prasyarat

1. Repository sudah ada di **GitHub** (public atau private).
2. Akun **Vercel** (login pakai akun GitHub cukup) — daftar di [vercel.com/signup](https://vercel.com/signup).
3. Sudah ada di repo (yang sudah disiapkan):
   - `vercel.json` — fungsi PHP + routes + env (composer diurus otomatis oleh runtime).
   - `api/index.php` — entry serverless; menyiapkan `/tmp`, melayani file statis dari `public/`, menyuntik env (session cookie, cache array, `APP_KEY`), lalu memuat `vendor/autoload.php`.
   - `app/Providers/AppServiceProvider.php` — memaksa skema `https` ketika berjalan di Vercel (anti mixed content).
   - `public/build/` — hasil `npm run build` **harus ter-commit** (sudah tidak di-`.gitignore`). Ini yang membuat animasi/UI Vite tampil di live.
   - `composer.lock` ter-commit, agar install di Vercel deterministik.

## Cara kerja

- Vercel mendeteksi `vercel.json`, memakai runtime **`vercel-php@0.9.0`** yang menyediakan **PHP 8.5.x** (kompatibel dengan Laravel 13 yang butuh `^8.3`).
- **Build framework di-skip** (`"buildCommand": ""` di `vercel.json`) — Vercel TIDAK menjalankan `npm run build`/node. CSS/JS Vite dilayani dari **`public/build` yang ter-commit**; maka setiap ubah UI, jalankan `npm run build` lokal dulu lalu commit hasilnya.
- Saat membangun function, runtime **otomatis menjalankan `composer install`** (`--no-dev --no-interaction --no-scripts --ignore-platform-reqs`) karena `composer.json` ada di root — lalu `vendor/` hasil install ikut ter-package ke lambda (dibutuhkan `api/index.php`). **Jangan** menambah `buildCommand` berisi `composer`: di build-env framework, `composer` tidak terpasang sehingga build gagal `command not found`.
- Semua request diteruskan ke `api/index.php` via route tunggal `/(.*)`. **File statis** di `public/build/`, `public/images/`, dan `public/favicon.ico` dilayani **langsung oleh fungsi** `api/index.php` — sebelum Laravel bootstrap — berdasarkan `REQUEST_URI`. Jika file ditemukan dan ekstensinya di-whitelist (`.css`, `.js`, `.woff2`, `.jpeg`, `.svg`, dll.), konten langsung dikirim dengan `Content-Type` yang benar dan caching yang agresif (`immutable` untuk `build/`). Jika tidak, request diteruskan ke Laravel. Konsep ini memastikan aset Vite tetap tersaji meskipun routing statis Vercel tidak aktif atau ambigu.
- Nilai env (`APP_ENV`, `APP_DEBUG`, `APP_KEY`, dll.) sudah di-inline di `vercel.json` — **tidak perlu `.env`**.
- **Skema HTTPS dipaksa** saat di Vercel (`AppServiceProvider::boot()` → `URL::forceScheme('https')`, diaktifkan oleh env `VERCEL`). Vercel memotong TLS, jadi function PHP melihat request sebagai HTTP dan `@vite`/`asset()` akan menghasilkan URL `http://` absolut — browser memblokir ini sebagai **mixed content** (halaman polos + gambar rusak). Paksaan skema ini mencegah hal tersebut.

---

## Konfigurasi yang dilakukan

Ringkasan lengkap semua perubahan yang dipakai untuk menghosting proyek Laravel ini di Vercel (serverless PHP).

### 1. `vercel.json`

```json
{
    "version": 2,
    "outputDirectory": "public",
    "installCommand": "",
    "buildCommand": "",
    "env": {
        "APP_ENV": "production",
        "APP_DEBUG": "false",
        "APP_KEY": "base64:...",
        "APP_MAINTENANCE_DRIVER": "file",
        "VIEW_COMPILED_PATH": "/tmp",
        "CACHE_STORE": "array",
        "SESSION_DRIVER": "cookie",
        "LOG_CHANNEL": "stderr"
    },
    "functions": {
        "api/index.php": {
            "runtime": "vercel-php@0.9.0"
        }
    },
    "routes": [
        { "src": "/(.*)", "dest": "/api/index.php" }
    ]
}
```

Per-key:

| Kunci | Nilai | Kenapa |
| --- | --- | --- |
| `version` | `2` | Format legacy routing (`functions` + `routes`). |
| `outputDirectory` | `"public"` | Menjadikan isi folder `public/` sebagai output statis; aset Vite di `public/build/` dan `public/images/` punya URL alami (`/build/...`, `/images/...`). |
| `installCommand` | `""` | Menonaktifkan install Node otomatis (`npm install`) — proyek ini tidak butuh node di build. |
| `buildCommand` | `""` | Menonaktifkan build framework (`npm run build`). Vite sudah di-build lokal dan hasilnya ter-commit. Menghindari error `vite: command not found` / `composer: command not found`. |
| `env` | — | Nilai yang normalnya di `.env` di-inline di sini; Vercel mengeksposnya sebagai environment saat runtime. **Jangan** set `APP_DEBUG=true`. |
| `functions.api/index.php.runtime` | `"vercel-php@0.9.0"` | Satu-satunya function (PHP 8.5.x). Runtime ini otomatis menjalankan `composer install --no-dev --no-scripts --ignore-platform-reqs` saat `composer.json` ada. |
| `routes` | `/(.*)` → `/api/index.php` | Semua request masuk ke fungsi; fungsi yang memutuskan statis vs Laravel (lihat `api/index.php`). Tidak ada route terpisah untuk aset. |

### 2. `api/index.php` (entry serverless)

Urutan kerja fungsi:

1. **Siapkan direktori tulis** di `/tmp` (`storage`, `framework/views`, `cache`, `session`, dll.) — filesystem lambda read-only selain `/tmp`.
2. **Copy database SQLite** ke `/tmp/database.sqlite` (SQLite butuh akses tulis untuk WAL/journal) dan set `DB_DATABASE` ke sana.
3. **Serve file statis langsung** — urutan terpenting. Resolve `REQUEST_URI` ke path di `public/`; jika file ada **dan** ekstensinya di-whitelist (`.css`, `.js`, `.mjs`, `.json`, `.map`, `.svg`, `.png`, `.jpg`, `.jpeg`, `.webp`, `.gif`, `.avif`, `.ico`, `.woff`, `.woff2`, `.ttf`, `.otf`, `.txt`, `.xml`), kirim konten + `Content-Type` yang benar + `Cache-Control` (`immutable` untuk `/build/`), lalu `exit`. Guard `realpath` mencegah path traversal; file `.php` tidak ikut diserve. Ini menjamin CSS/JS Vite & gambar selalu tersaji walau routing statis Vercel tidak aktif.
4. **Suntik env** (hanya kalau belum ada): `APP_DEBUG=false`, `APP_MAINTENANCE_DRIVER=file`, `DB_CONNECTION=sqlite`, `CACHE_STORE=array`, `SESSION_DRIVER=cookie`, `LOG_CHANNEL=stderr`, cache paths ke `/tmp`, dst.
5. **Load `vendor/autoload.php`**, bootstrap `bootstrap/app.php`, `useStoragePath('/tmp')`, lalu `handleRequest(...)`. Catch `Throwable` → 500 dengan halaman error berisi pesan (berguna saat debugging).

> **Trap penting** `APP_MAINTENANCE_DRIVER`: jika berisi string kosong (mis. dari dashboard), `Manager::createDriver('')` memicu rekursi/`ArgumentCountError`. Handler ini **memaksa `file`** sehingga aman.

### 3. `app/Providers/AppServiceProvider.php`

```php
public function boot(): void
{
    if (($_SERVER['VERCEL'] ?? $_ENV['VERCEL'] ?? getenv('VERCEL')) !== false) {
        URL::forceScheme('https');
    }
}
```

Vercel memotong TLS, jadi function PHP melihat request sebagai `http://`. Tanpa force ini, `@vite()`/`asset()`/`url()` menghasilkan URL `http://...` absolut — browser memblokirnya sebagai **mixed content** di halaman `https://` (gejala: halaman polos + ikon gambar rusak, padahal status 200). `getenv('VERCEL')` hanya benar di environment Vercel, jadi preview lokal tetap `http://` normal.

### 4. Build aset Vite (`public/build`) di-commit

- `.gitignore` TIDAK lagi mengecualikan `public/build/` — hasil `npm run build` (**`public/build/`** berisi `manifest.json` + `assets/*.css|js|woff2`) di-commit ke repo.
- Runtime tidak menjalankan build apa pun; file inilah yang di-upload sebagai aset.
- `resources/views/layouts/app.blade.php` memakai `@vite(...)` ketika `public_path('build/manifest.json')` ada, dan jatuh ke fallback CDN Tailwind + CSS inline jika tidak.

### 5. Tidak perlu `.env` & `vendor`

- `.env` di-`.gitignore`; nilai diganti oleh `vercel.json` env + `api/index.php`.
- `vendor/` di-`.gitignore`; dihasilkan otomatis oleh runtime saat build deployment.

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
- URL live otomatis: `https://hisyam-academic-profile.vercel.app` (nama proyek Vercel = `hisyam-academic-profile`).
- Cek di browser: `/`, `/mahasiswa/5025241130`, `/agent`, `/hitung-ipk` harus tampil normal **dengan animasi** (ripple, tilt, navbar hamburger, dll.) — kalau animasi mati, berarti `public/build` belum ter-commit.
- Quick check terminal:

  ```bash
  curl -s -o /dev/null -w "%{http_code}\n" https://hisyam-academic-profile.vercel.app
  ```

  Harusnya `200`. Logika route juga menangani `404` untuk path yang tidak ada.

### 4. (Opsional) Tentukan domain

- Dashboard proyek → **Settings → Domains** → tambah `hisyam-academic-profile.vercel.app` atau domain sendiri (HTTPS otomatis).

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
| Situs tampil tapi **tanpa animasi/style baru** | `public/build` belum ter-commit. Jalankan `npm run build` lokal, commit `public/build`, push → redeploy. Fungsi `api/index.php` akan melayani file statis dari `public/build/` secara otomatis jika file ada. |
| Halaman polos + **ikon gambar rusak** (tapi status 200) | **Mixed content**: `asset()`/`@vite` menghasilkan `http://` padahal halaman `https://` → browser memblokir CSS/JS. Pastikan `AppServiceProvider::boot()` memanggil `URL::forceScheme('https')` (dijaga env `VERCEL`), lalu push ulang. |
| Build Vercel gagal | Bisa gagal di `composer install` (jaringan/kuota): **Deployments → Redeploy** ulang, atau cek versi PHP runtime di Logs. |
| Muncul `ERR_REQUIRE_ESM` / error Node di build | Pastikan `installCommand` di `vercel.json` tetap `""` (skip npm) — Vercel tidak perlu node untuk proyek ini. |
| Route / 404 untuk path valid | Pastikan `api/index.php` sudah ada di repo — route `/(.*)` → `/api/index.php` harus tetap ada di `vercel.json`. File statis di `/build/`, `/images/` dilayani oleh fungsi, bukan oleh route terpisah. |
| Halaman "This deployment could not be found. DEPLOYMENT_NOT_FOUND" | Alias/domain menunjuk deployment yang sudah dihapus/tidak aktif. Cek dashboard: deployment terbaru harus **Ready** dan menjadi **Production**. Kalau build baru masih berjalan, tunggu selesai; kalau Deployment terhapus, buat deployment baru (push ulang / **Redeploy**). |
| Halaman muncul tapi CSS/gambar hilang (hanya teks + ikon gambar rusak) | Aset statis di `/build/assets/*.css`, `.js`, dan `/images/*` tidak tersaji → biasanya karena `public/build` tidak ter-commit atau fungsi lama yang belum punya static-serving. Push perubahan `api/index.php` + `vercel.json` terbaru lalu redeploy. |
| Exception PHP | Ambil dari dashboard **Logs** → copy stack trace; umumnya karena file di luar root tidak ter-upload (pastikan tidak ada `.vercelignore` aneh). |

---

## Referensi file terkait

- `vercel.json` — konfigurasi runtime, env, dan routes.
- `api/index.php` — bootstrap serverless Laravel (membuat `/tmp`, serve statis, env inline, `APP_KEY`).
- `app/Providers/AppServiceProvider.php` — `URL::forceScheme('https')` saat di Vercel.
- `public/build/` — aset Vite **wajib ter-commit**; `manifest.json` dipakai `@vite` di `resources/views/layouts` untuk memuat CSS/JS hasil build.
- `.gitignore` — `vendor/` & `.env` tidak ter-commit (sengaja); `public/build` **tidak** lagi dikecualikan.
- Panduan alternatif lain: `docs/hosting-render.md` (via Docker/Render).