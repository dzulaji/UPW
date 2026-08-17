# Sistem Manajemen Unit Pengelola Wakaf (UPW) Universitas Andalas

Selamat datang di repositori Sistem Manajemen Unit Pengelola Wakaf (UPW) Universitas Andalas (UNAND). Proyek ini adalah platform berbasis web yang dikembangkan untuk memudahkan pengelolaan dana sosial, khususnya wakaf, secara transparan, akuntabel, dan digital.

## 🎯 Tujuan Proyek
Proyek ini dibangun dengan tujuan utama:
1. **Digitalisasi Manajemen Wakaf:** Memindahkan proses manual pencatatan dan pengelolaan wakaf uang atau melalui uang menjadi sistem digital yang terintegrasi.
2. **Transparansi & Akuntabilitas:** Memberikan kemudahan bagi para wakif (donatur) untuk melacak status wakaf mereka dan melihat laporan penyaluran dana secara publik.
3. **Kemudahan Transaksi:** Menyediakan antarmuka yang ramah pengguna bagi masyarakat (termasuk alumni, dosen, mahasiswa, dan umum) untuk menyalurkan wakaf dengan mudah.
4. **Otomatisasi Laporan & Sertifikat:** Membantu pengelola (admin) dalam mengelola data donatur, menerbitkan sertifikat wakaf (PDF), serta mengekspor laporan keuangan (Excel).

---

## 💻 Tech Stack yang Dipakai
Aplikasi ini dikembangkan menggunakan tumpukan teknologi (tech stack) modern untuk memastikan performa, keamanan, dan kemudahan pengembangan (maintainability).

**Backend:**
- **[Laravel 10.x](https://laravel.com/)**: Framework PHP yang digunakan sebagai fondasi utama aplikasi (Routing, ORM, Auth).
- **PHP ^8.1**: Versi PHP minimum untuk menjalankan Laravel 10.
- **MySQL**: Sistem manajemen basis data relasional untuk menyimpan data (User, Program, Artikel, Donasi).
- **[Barryvdh/Laravel-DomPDF](https://github.com/barryvdh/laravel-dompdf)**: Digunakan untuk men-generate Sertifikat Wakaf dan Invoice dalam format PDF.
- **[Maatwebsite/Excel](https://laravel-excel.com/)**: Digunakan untuk meng-export data laporan donasi/wakaf ke format Excel.

**Frontend:**
- **[Bootstrap 5.3.0](https://getbootstrap.com/)**: Framework CSS untuk membangun UI yang responsif dan modern.
- **[Vite](https://vitejs.dev/)**: Module bundler yang digunakan untuk mengkompilasi aset CSS dan JavaScript.
- **Vanilla JavaScript**: Untuk logika interaktif di sisi klien.
- **[AOS (Animate On Scroll)](https://michalsnik.github.io/aos/)**: Library untuk animasi micro-interaction saat scroll halaman.
- **[SweetAlert2](https://sweetalert2.github.io/)**: Untuk menampilkan *pop-up* notifikasi/alert yang interaktif (Sukses/Error).
- **[Chart.js](https://www.chartjs.org/)**: Untuk visualisasi data grafik (misalnya pada halaman dashboard).

---

## 🔄 Alur Bisnis (Business Flow)
Sistem ini membagi alur kerja ke dalam beberapa peran utama: **Public (Guest/Wakif Non-Login)**, **Wakif (Donatur Terdaftar)**, dan **Admin**.

### 1. Alur Wakaf (Donasi)
- **Pemilihan Program:** Pengguna (baik login maupun tidak) dapat melihat daftar Program Wakaf (Wakaf Uang / Wakaf Melalui Uang) dari halaman utama.
- **Pengisian Form:** Pengguna memilih program, memasukkan nominal (minimal Rp 10.000), dan mengisi identitas. Jika sudah login, identitas akan terisi otomatis (*autofill*).
- **Checkout & Instruksi:** Sistem akan membuat `Order ID` (contoh: W2308...xxx) dengan status `pending` dan mengirimkan email notifikasi ke donatur dan admin.
- **Pembayaran (Transfer Manual):** Donatur melakukan transfer bank ke rekening UPW UNAND yang tertera dan dapat membatalkan donasi jika masih berstatus pending.
- **Verifikasi:** Admin masuk ke dashboard, melihat daftar donasi pending, mencocokkan dengan mutasi rekening bank, dan mengubah status menjadi `paid` atau `success`.
- **Sertifikat & Invoice:** Setelah diverifikasi, donatur dapat mengunduh Invoice dan Sertifikat Wakaf yang di-generate oleh sistem.

### 2. Alur Publik & Edukasi
- Pengunjung dapat membaca **Berita**, **Laporan Tahunan/Bulanan**, dan **Edukasi Wakaf** yang dipublikasikan oleh Admin.
- Pengunjung dapat mengecek status wakaf mereka hanya dengan memasukkan `Order ID` atau mengecek Riwayat Wakaf berdasarkan Email/No. HP.

### 3. Alur Admin (Manajemen)
- Admin memiliki akses ke halaman Dashboard (`/admin/dashboard`) yang dilindungi middleware `auth` dan `admin`.
- Admin mengelola **Master Data**: Program Wakaf, Artikel/Berita, Susunan Kepengurusan, Akun Bank (Rekening), dan Laporan PDF.
- Admin mengelola **Data Transaksi**: Memverifikasi donasi masuk, melakukan input donasi tunai/offline secara manual, dan mengekspor laporan excel.

---

## 🚀 Perkembangan Berikutnya (Future Roadmap)
Mengingat aplikasi saat ini menggunakan metode transfer manual, berikut adalah beberapa potensi pengembangan (scale-up) yang sangat memungkinkan untuk diterapkan di masa depan:

1. **Integrasi Payment Gateway (Otomatisasi Pembayaran)**
   - Mengganti alur verifikasi manual dengan Payment Gateway (seperti **Midtrans**, **Xendit**, atau **Tripay**).
   - Donatur bisa membayar menggunakan Virtual Account (VA), QRIS, atau e-Wallet (GoPay, OVO, ShopeePay), dan status donasi akan berubah menjadi `paid` secara otomatis melalui *Webhook*.

2. **Sistem Notifikasi WhatsApp (WA Gateway)**
   - Saat ini notifikasi masih menggunakan Email. Ke depannya, dapat diintegrasikan dengan API WhatsApp (misal: Fonnte atau Watzap) untuk mengirim notifikasi tagihan, pengingat, dan konfirmasi wakaf langsung ke nomor HP donatur.

3. **Dashboard Analitik & Pelaporan yang Lebih Maju**
   - Menambahkan filter laporan yang lebih kompleks (berdasarkan rentang tanggal, demografi donatur: dosen/alumni/mahasiswa).
   - Menambahkan fitur rekonsiliasi data otomatis dengan bank.

4. **Program Wakaf Berkelanjutan (Subscription)**
   - Fitur "Autodebet" atau wakaf rutin bulanan (Subscription) untuk memudahkan donatur yang ingin berwakaf setiap gajian tanpa harus mengisi form berulang kali.

5. **Pemisahan Frontend & Backend (API-based)**
   - Jika proyek ini ingin dikembangkan menjadi aplikasi *Mobile* (Android/iOS), arsitektur bisa diubah/ditambahkan menjadi RESTful API menggunakan Laravel Sanctum yang sudah terpasang, dengan Frontend berbasis React/Vue atau Flutter.

---
*Dokumentasi ini dibuat untuk memudahkan developer atau pengelola baru dalam memahami struktur dan tujuan aplikasi UPW UNAND.*
