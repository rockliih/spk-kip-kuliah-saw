@extends('layouts.retro')

@section('title', 'Tentang Sistem & Metode SAW')

@section('content')
    <fieldset>
        <legend> [ 01. TENTANG APLIKASI SPK KIP-KULIAH ] </legend>
        <p>
            Aplikasi ini merupakan prototipe <strong>Sistem Pendukung Keputusan (SPK)</strong> berbasis web yang dirancang untuk mengotomatisasi dan membantu proses seleksi awal (screening) calon penerima bantuan Kartu Indonesia Pintar Kuliah (KIP-Kuliah).
        </p>
        <p>
            Sistem ini dibangun menggunakan <em>framework</em> Laravel dan PHP 8 dengan tujuan menciptakan proses verifikasi data yang lebih transparan, objektif, dan efisien. Aplikasi bekerja dengan cara mengolah data kondisi sosial ekonomi dan prestasi calon mahasiswa menjadi urutan prioritas rekomendasi secara komputasional.
        </p>
    </fieldset>

    <fieldset>
        <legend> [ 02. ALGORITMA &amp; METODE SAW (SIMPLE ADDITIVE WEIGHTING) ] </legend>
        <p>
            <strong>Simple Additive Weighting (SAW)</strong> atau metode penjumlahan terbobot adalah algoritma matematika yang digunakan untuk menentukan alternatif terbaik dari sejumlah kandidat berdasarkan banyak kriteria penilaian sekaligus.
        </p>
        <p>
            Cara kerja algoritma SAW dalam sistem ini dibagi menjadi tiga tahapan utama:
        </p>
        <ul style="margin: 8px 0 0 15px; padding: 0;">
            <li style="margin-bottom: 6px;">
                <strong>Pembobotan &amp; Skoring:</strong> Setiap kriteria ditentukan persentase tingkat kepentingannya (total bobot 100%). Data atribut mahasiswa (seperti penghasilan orang tua atau status kepemilikan KIP) kemudian dikonversi menjadi angka skor penilaian standar 1 sampai 5.
            </li>
            <li style="margin-bottom: 6px;">
                <strong>Normalisasi Matriks:</strong> Sistem menyamakan skala seluruh nilai ke dalam rentang rasio 0.0 sampai 1.0. Pada tahap ini, sistem membedakan variabel berdasarkan sifatnya: kriteria <em>Benefit</em> (semakin besar skor semakin prioritas) dan kriteria <em>Cost</em> (semakin kecil skor justru semakin prioritas).
            </li>
            <li>
                <strong>Perhitungan Skor Akhir (Preferensi):</strong> Nilai yang sudah dinormalisasi dikalikan dengan persentase bobot pada masing-masing kriteria, kemudian dijumlahkan. Mahasiswa dengan nilai total akhir tertinggi akan menempati peringkat teratas sebagai kandidat yang paling direkomendasikan.
            </li>
        </ul>
    </fieldset>

    <fieldset>
        <legend> [ REFERENSI JURNAL ILMIAH YANG DIGUNAKAN ] </legend>
        <p>Aturan pembobotan dan pemilihan metode dalam aplikasi ini dibangun berdasarkan dua penelitian ilmiah berikut:</p>
        <ul>
            <li style="margin-bottom: 12px;">
                <strong>Bukti Keunggulan Metode SAW:</strong><br>
                Berdasarkan penelitian yang membandingkan berbagai algoritma sistem pengambilan keputusan, metode SAW terbukti sebagai metode yang paling efektif, konsisten, dan akurat dalam menyeleksi kelayakan bantuan.<br>
                🔗 <a href="https://jurnal.nawansa.com/index.php/teknofile/article/view/245/100" target="_blank" style="color: #2b6cb0; font-weight: bold;">Baca Jurnal Teknofile (Nawansa)</a>
            </li>
            <li>
                <strong>Implementasi Kriteria KIP-Kuliah:</strong><br>
                Penentuan 7 variabel kriteria (C1-C7) beserta nilai persentase bobot yang diterapkan di dalam prototipe ini diadaptasi langsung dari penelitian implementasi metode SAW untuk seleksi KIP-Kuliah.<br>
                🔗 <a href="https://jurnalftik.unisi.ac.id/index.php/jupel/article/view/2791/1505" target="_blank" style="color: #2b6cb0; font-weight: bold;">Baca Jurnal Perangkat Lunak (JUPEL UNISI)</a>
            </li>
        </ul>
    </fieldset>

    <fieldset style="border-color: #c53030; background-color: #fff8f8;">
        <legend style="background-color: #c53030;"> [ ⚠️ CATATAN PENGEMBANGAN &amp; BATASAN SISTEM (DISCLAIMER) ] </legend>
        <p style="margin-top: 0; color: #800000; font-weight: bold;">
            Aplikasi ini masih berada dalam tahap pengembangan (Prototype Eksperimen) dan BELUM SIAP digunakan sebagai satu-satunya alat penentu kelayakan publik (Not Production Ready).
        </p>
        <p>
            <strong>Kenapa aplikasi ini belum sempurna?</strong><br>
            Dalam realitas lapangan yang sesungguhnya, seleksi penerimaan KIP-Kuliah tidak boleh hanya mengandalkan perhitungan angka dari formulir kertas atau web (*desk evaluation*). Angka matematika di aplikasi ini berfungsi sebagai <strong>penyaring awal (screening)</strong> untuk mengurutkan prioritas antrean.
        </p>
        <p style="margin-bottom: 0;">
            Keputusan akhir kelayakan yang sah di perguruan tinggi tetap memerlukan tahapan verifikasi lapangan langsung, seperti: <strong>wawancara calon mahasiswa, survei langsung ke rumah keluarga, dan verifikasi keaslian dokumen pendukung</strong> oleh panitia seleksi kampus.
        </p>
    </fieldset>
@endsection