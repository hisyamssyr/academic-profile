Saya ingin kamu melakukan **UI/UX redesign** pada website yang sudah ada.

Tujuan utama:

* Membuat tampilan website terlihat **modern, clean, profesional, dan enak dipandang**.
* Membuat seluruh halaman **responsive** dan nyaman digunakan di desktop, tablet, maupun mobile.
* Meningkatkan visual hierarchy, spacing, typography, consistency, dan usability.
* Jangan membuat desain terlalu ramai atau berlebihan.
* Prioritaskan desain yang terlihat seperti website production-ready, bukan sekadar hasil template.

## ATURAN UTAMA

1. **Jangan mengubah business logic**

   * Jangan mengubah alur aplikasi yang sudah berjalan.
   * Jangan menghapus functionality yang sudah ada.
   * Jangan mengubah API, database logic, authentication, routing, atau state management kecuali benar-benar diperlukan untuk kebutuhan UI.
   * Semua fitur existing harus tetap berfungsi setelah redesign.

2. **Pertahankan struktur data dan functionality**

   * Gunakan data dan component yang sudah tersedia.
   * Fokus utama pada presentation layer, component structure, styling, layout, dan UX.

3. **Jangan melakukan redesign secara asal**

   * Analisis terlebih dahulu struktur project dan halaman yang tersedia.
   * Identifikasi component yang reusable.
   * Identifikasi masalah UI saat ini.
   * Setelah itu baru lakukan perubahan.

## DESIGN DIRECTION

Gunakan prinsip desain berikut:

* Modern
* Minimalist
* Clean
* Professional
* Consistent
* Responsive
* Accessible
* Good visual hierarchy
* Tidak terlalu banyak decoration

Gunakan whitespace yang cukup sehingga interface tidak terasa penuh.

Hindari:

* Gradient berlebihan
* Terlalu banyak warna
* Shadow yang terlalu kuat
* Border yang terlalu tebal
* Card yang terlalu banyak
* Animasi berlebihan
* Font size yang tidak konsisten
* Button dengan style berbeda-beda tanpa alasan
* Layout yang terlihat seperti template AI generik

## LAYOUT

Perbaiki:

* Page spacing
* Container width
* Grid/flex layout
* Alignment
* Section spacing
* Navigation
* Sidebar jika ada
* Header
* Footer
* Card layout
* Form layout
* Table layout
* Empty state
* Loading state
* Error state

Gunakan responsive layout dengan breakpoint yang masuk akal.

Pastikan:

* Tidak ada horizontal scrolling pada mobile.
* Text tidak overflow.
* Button dan interactive element tetap mudah ditekan pada touchscreen.
* Table yang lebar memiliki solusi responsive yang baik.
* Navigation tetap usable pada layar kecil.
* Content tidak terlalu mepet ke sisi layar.

## TYPOGRAPHY

Buat typography hierarchy yang jelas untuk:

* Page title
* Section title
* Subtitle
* Body text
* Caption
* Label
* Button
* Navigation

Gunakan font yang modern dan mudah dibaca.

Jaga:

* Font size consistency
* Font weight consistency
* Line height
* Letter spacing
* Contrast

## COLOR SYSTEM

Buat color palette yang konsisten.

Gunakan:

* Primary color
* Secondary/accent color
* Background
* Surface/card
* Text primary
* Text secondary
* Border
* Success
* Warning
* Error

Jangan menggunakan terlalu banyak warna.

Jika website sudah memiliki brand color, **pertahankan identitas warna tersebut** dan gunakan secara lebih konsisten.

## COMPONENT DESIGN

Pastikan component yang memiliki fungsi sama menggunakan visual style yang sama.

Contohnya:

* Semua button primary memiliki style yang konsisten.
* Semua input memiliki height, border, radius, dan focus state yang konsisten.
* Semua card memiliki spacing dan radius yang konsisten.
* Semua modal menggunakan visual language yang sama.
* Semua badge/status menggunakan sistem warna yang konsisten.

Buat reusable component jika memang diperlukan daripada menduplikasi styling.

## INTERACTION & UX

Tambahkan atau perbaiki:

* Hover state
* Focus state
* Active state
* Disabled state
* Loading state
* Error state
* Success feedback

Gunakan animation/micro-interaction secara subtle.

Animasi harus membantu UX, bukan sekadar dekorasi.

## RESPONSIVE DESIGN

Pastikan website bekerja dengan baik pada:

* Mobile: ~320–480px
* Tablet: ~768–1024px
* Desktop: ~1280px+
* Large desktop

Jangan hanya mengecilkan desktop layout.

Pada mobile, lakukan penyesuaian layout jika diperlukan, misalnya:

* Sidebar menjadi drawer
* Navigation menjadi mobile menu
* Multi-column menjadi single-column
* Button group menjadi stacked
* Table menjadi horizontally scrollable atau menggunakan alternative mobile layout
* Form menjadi single-column

## ACCESSIBILITY

Perhatikan:

* Color contrast
* Keyboard navigation
* Visible focus state
* Semantic HTML
* Proper label pada form
* Alt text untuk image
* Touch target yang cukup besar
* Jangan menyampaikan informasi hanya melalui warna

## VISUAL CONSISTENCY

Buat design system sederhana untuk project ini.

Konsistenkan:

* Border radius
* Spacing
* Font sizes
* Font weights
* Colors
* Shadows
* Icons
* Button styles
* Input styles
* Card styles

Gunakan spacing scale yang konsisten daripada memberikan margin/padding secara random.

## IMPLEMENTATION

Sebelum coding:

1. Inspect seluruh project.
2. Identifikasi framework dan styling system yang digunakan.
3. Identifikasi halaman utama.
4. Identifikasi reusable components.
5. Identifikasi UI problems.
6. Buat rencana redesign singkat.
7. Implementasikan perubahan secara bertahap.

Jangan mengganti framework atau library utama tanpa alasan yang kuat.

Jika project sudah menggunakan Tailwind, gunakan Tailwind.
Jika menggunakan CSS/SCSS/module, pertahankan pendekatan tersebut kecuali ada alasan teknis yang jelas.

## PRIORITAS

Prioritaskan perubahan dengan urutan:

1. Layout & responsiveness
2. Visual hierarchy
3. Typography
4. Spacing
5. Component consistency
6. Color system
7. Interaction states
8. Micro-interactions

Jangan mengorbankan usability hanya demi estetika.

## FINAL CHECK

Setelah selesai:

* Pastikan semua existing functionality masih berjalan.
* Pastikan tidak ada broken component.
* Pastikan tidak ada console error akibat perubahan UI.
* Pastikan tidak ada overflow horizontal.
* Test responsive behavior.
* Pastikan desktop dan mobile sama-sama terlihat polished.
* Pastikan design antar halaman konsisten.

Jika menemukan bagian UI yang sebenarnya sudah bagus, **jangan ubah hanya demi mengubahnya**.

Target akhir: website harus terasa seperti produk digital modern yang benar-benar siap digunakan, bukan sekadar website yang diberi warna dan rounded corners.
