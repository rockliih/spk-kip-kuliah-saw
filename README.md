# Sistem Pendukung Keputusan (SPK) Kelayakan KIP-Kuliah

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
- [ ] Membuat halaman tabel data mahasiswa
- [ ] Membuat halaman hasil perankingan SPK