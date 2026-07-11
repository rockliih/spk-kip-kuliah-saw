<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK KIP-Kuliah - Metode SAW')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>
<body>

    <nav class="nav-bar">
        [ <a href="{{ route('dashboard') }}">Hasil Perankingan (Dashboard)</a> ] &nbsp;|&nbsp; 
        [ <a href="{{ route('students.index') }}">Kelola Data Mahasiswa</a> ] &nbsp;|&nbsp; 
        [ <a href="{{ route('about') }}">Tentang Sistem & Metode SAW</a> ]
    </nav>

    <header>
        <h1>SISTEM PENDUKUNG KEPUTUSAN KIP-KULIAH (METODE SAW)</h1>
        <div class="subtitle">
            [PROTOTYPE: TUGAS EKSPERIMEN] &nbsp;|&nbsp; [STATUS: TAHAP PENGEMBANGAN (DEV)] &nbsp;|&nbsp; [ALGORITMA: SIMPLE ADDITIVE WEIGHTING]
        </div>
    </header>

    @if(session('success'))
        <div class="alert-success">
            [ INF: {{ session('success') }} ]
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        SISTEM SIMULASI SELEKSI KIP-KULIAH v1.0-DEV &nbsp;|&nbsp; DIBANGUN DENGAN LARAVEL &amp; PHP 8 &nbsp;
    </footer>

</body>
</html>