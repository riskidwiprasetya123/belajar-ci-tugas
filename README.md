# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Umum
- **Katalog Produk**: Menampilkan daftar produk dengan gambar, nama, harga, dan deskripsi singkat.
- **Pencarian Produk**: Fitur pencarian berdasarkan nama produk agar pengguna mudah menemukan barang yang dicari.
- **Keranjang Belanja**:
  - Tambah produk ke keranjang.
  - Hapus atau update jumlah produk.
  - Simpan isi keranjang selama sesi berlangsung.
- **Proses Checkout**:
  - Formulir checkout dengan informasi pembeli.
  - Menyimpan transaksi ke database.
  - Menampilkan ringkasan transaksi.

### Admin Panel
- **Autentikasi**: Sistem login untuk admin dan pengguna biasa.
- **Manajemen Produk**:
  - CRUD produk (Create, Read, Update, Delete).
  - Upload gambar produk.
- **Manajemen Kategori**: Mengelompokkan produk berdasarkan kategori.
- **Riwayat Transaksi**: Menampilkan daftar transaksi pengguna.
- **Laporan**:
  - Laporan transaksi dalam bentuk tabel.
  - Ekspor laporan transaksi ke file PDF.

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
  - Filter produk berdasarkan kategori.
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi pengguna
  - Diskon otomatis jika tersedia saat checkout
  - Penyimpanan data transaksi dan rincian pembelian
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Manajemen Diskon
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi & profil
  - Login pengguna dengan validasi
  - Logout dan pengelolaan sesi
  - Manajemen akun
  - Proteksi halaman admin melalui middleware/login
- Halaman Informasi
  - Halaman profil pengguna
- API
  - Endpoint API melalui `ApiController.php` untuk kebutuhan pengembangan frontend/mobile 
- UI Responsif dengan NiceAdmin template

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
  - ApiController.php - digunakan untuk menangani permintaan dari API, seperti permintaan dari aplikasi mobile atau front-end
  - BaseController.php - konfigurasi global
  - ContactController.php - Menampilkan halaman kontak
  - DiskonController.php - Menentukan dan menghitung potongan harga dan Menerapkan diskon pada keranjang atau transaksi
  - FaqController.php - Menarik data dari model FAQ
  - Home.php -  halaman utama aplikasi
  - KategoriController.php - Manajemen kategori produk (CRUD)

- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
  - CategoryModel.php - mengelola data kategori produk
  - DiskonModel.php -  menangani logika terkait diskon
  - TransactionDetailModel.php - Menyimpan detail item yang dibeli pada setiap transaksi
  - TransactionModel.php - Model utama untuk menyimpan data transaksi

- app/Views - Template dan komponen UI
  - v_produk.php - Tampilan produk
  - v_keranjang.php - Halaman keranjang
  - v_checkout.php - proses checkout
  - v_contact.php - hubungi kami
  - v_diskon.php - Menampilkan daftar diskon yang tersedia.
  - v_faq.php - Menampilkan daftar pertanyaan yang sering diajukan (FAQ)
  - v_home.php - ampilan halaman utama / beranda toko
  - v_kategori.php - Menampilkan daftar produk berdasarkan kategori tertentu
  - v_login.php - Halaman login pengguna.
  - v_produkPDF.php - Halaman atau template khusus untuk mencetak data produk ke PDF
  - v_profile.php - Halaman profil pengguna.

- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
