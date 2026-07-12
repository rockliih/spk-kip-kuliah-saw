# Sistem Pemberi Keputusan Kelayakan KIP-Kuliah

Aplikasi berbasis web untuk menentukan kelayakan pembagian skema bantuan KIP-Kuliah (Skema 1 dan Skema 2) secara objektif menggunakan metode **Simple Additive Weighting (SAW)**.

Proyek ini dibangun sebagai bagian dari implementasi sistem pengambilan keputusan manajemen kampus, sekaligus dieksekusi di atas infrastruktur *home server* mandiri.

## Teknologi yang Digunakan
- **Framework:** Laravel 13 (PHP 8.x)
- **Database:** MariaDB
- **Web Server:** Nginx

## Kriteria & Bobot (Metode SAW)
Sistem ini menggunakan 7 kriteria utama yang diadaptasi dari jurnal penelitian terkait KIP-K:
1. **C1 (Benefit):** Status Orang Tua (20%)
2. **C2 (Benefit):** Jumlah Tanggungan (10%)
3. **C3 (Cost):** Penghasilan Orang Tua (15%)
4. **C4 (Cost):** Pekerjaan Orang Tua (15%)
5. **C5 (Benefit):** Status Tempat Tinggal (5%)
6. **C6 (Benefit):** Keterangan Miskin / SKTM (30%)
7. **C7 (Benefit):** Prestasi Non-Akademik (5%)

> **Referensi Jurnal:**
> Pembobotan dan kriteria dalam sistem ini merujuk pada penelitian ilmiah: 
> *Habdi, S. Defit, & Sumijan. (2023). ["Sistem Pendukung Keputusan Kelayakan Penerima Kartu Indonesia Pintar Kuliah Menggunakan Metode SAW"](https://jurnalftik.unisi.ac.id/index.php/jupel/article/view/2791/1505). Jurnal Perangkat Lunak, Volume 5, Nomor 3, Hal. 347-353.*

---

## Demo Aplikasi
Link: ["Sistem Pendukung Keputusan Kelayakan Penerima Kartu Indonesia Pintar Kuliah Menggunakan Metode SAW"](https://spk-kipk.rockliih.my.id)

---

## Persyaratan Sistem (System Requirements)

Sebelum menjalankan aplikasi ini, pastikan sistem komputer atau server sudah terpasang spesifikasi berikut:
* **PHP:** Versi 8.2 atau lebih baru
* **Composer:** Versi 2.x
* **Database:** MariaDB (Rekomendasi) atau MySQL
* **Web Server:** Apache / Nginx / PHP Built-in Server (via Artisan)

---

## Panduan Instalasi & Setup Proyek

Ikuti langkah-langkah di bawah ini untuk menjalankan prototipe sistem di lingkungan lokal (*Local Development*):

### 1. **Kloning Repositori**
   Unduh proyek ini ke dalam komputer lokal menggunakan Git:
   ```bash
   git clone https://github.com/rockliih/spk-kip-kuliah-saw.git
   cd spk-kip-kuliah-saw
   ```

### 2. **Install Dependensi PHP:**
   Jalankan perintah Composer untuk menginstal seluruh pustaka yang dibutuhkan oleh Laravel:
   ```bash
   composer install
   ```

### 3. **Konfigurasi Environment (.env)**
   Salin file contoh konfigurasi dan generate kunci enskripsi aplikasi:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

### 4. **Konfigurasi Database**
   - Buka aplikasi manajemen database (phpMyAdmin, HeidiSQL, DBeaver, dll).
   - Buat database baru dengan nama, misalnya: `db_spk_saw`
   - Buka file `.env` di teks editor, lalu sesuaikan konfigurasi koneksi database berikut:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_spk_saw
   DB_USERNAME=<usersname_database_kamu>
   DB_PASSWORD=<password_database_kamu>
   ```

### 5. **Migrasi & Seeding (PENTING!)**
   Karena metode SAW memerlukan data pembanding untuk dapat menghitung nilai ekstrem (Min/Max) dan normalisasi matriks, wajib menjalankan migrasi beserta Seeder untuk mengisi data dummy mahasiswa dan bobot kriteria:
   ```bash
   php artisan migrate:fresh --seed
   ```
   (Perintah ini akan membuat struktur tabel sekaligus memuat data kriteria C1-C7 dan 50 data sampel mahasiswa pendaftar).

### 6. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
Aplikasi sekarang sudah siap digunakan dan dapat diakses melalui browser pada alamat:
=> http://localhost:8000 atau http://127.0.0.1:8000

**Catatan Tambahan untuk Penguji**
- Menu Hasil Perankingan (Dashboard) akan langsung menampilkan urutan mahasiswa dari skor tertinggi berdasarkan perhitungan algoritma SAW secara real-time.
- Untuk mencoba menambah, mengubah, atau menghapus data sampel, silakan navigasikan ke menu Kelola Data Mahasiswa.

---

## Roadmap Proyek (Progress Tracker)

**Fase 1: Infrastruktur & Database (Selesai)**
- [x] Konfigurasi Linux Server, Nginx, dan Firewall
- [x] Setup Local DNS Mikrotik (`spk-kipk.lab`)
- [x] Desain Database Migration (`college_students`, `criterias`)
- [x] Database Seeding (50 Data Dummy Mahasiswa & 7 Kriteria)

**Fase 2: Logika Algoritma SAW**
- [x] Membuat Controller untuk mengambil nilai Min/Max setiap kriteria
- [x] Melakukan perhitungan Normalisasi Matriks (Skala 0-1)
- [x] Melakukan perhitungan Preferensi (Perkalian dengan Bobot)
- [x] Mengurutkan hasil akhir (Ranking)

**Fase 3: Antarmuka Pengguna (UI/UX)**
- [x] Membuat halaman tabel data mahasiswa
- [x] Membuat halaman hasil perankingan SPK
