---
paths:
  - 'resources/views/**'
---

# Views

## Dark navy/ocean theme, jangan teal & putih
Tema sistem perkuas navy-biru (ocean), BUKAN teal/hijau dan BUKAN permukaan putih. Jangan pernah pakai `teal-*`, `slate-*`, `bg-white`, `bg-slate-*`, `bg-gray-*`, `cyan-*`, `emerald-*` di views. Palet: `bg-ocean-deep` / `bg-ocean` / `bg-ocean-deep-strong` untuk blok gelap, `text-ink`/`text-ink-soft`, `text-ocean-soft`/`text-ocean`, kartu pakai `surface-card`, border `border-line` (semua token dark sudah terdefinisi di app.css: `ocean`, `ocean-deep`, `ocean-strong`, `ink`, `ink-soft`, `line`, `surface`, `surface-strong`). Atribut aksen kuning `#F5DD90` dan oranye `#F5A524` diizinkan sebagai aksen, sisanya biru laut.

## No arrow chars on buttons; keep arrows as framed icons
Never use →/← text characters to mark buttons or links. Use a framed circular SVG arrow badge (rounded-full, border + tinted bg matching the surface: border-ocean-soft/30 bg-ocean/15 text-ocean-soft, or border-white/30 bg-white/10 on primary buttons). Navbar links stay grouped on the right side (logo left, nav cluster right), never centered.
