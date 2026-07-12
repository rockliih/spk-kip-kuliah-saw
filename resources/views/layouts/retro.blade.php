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

    <header style="position: relative; padding-right: 150px;">
        <h1>SISTEM PEMBERI KEPUTUSAN KIP-KULIAH (METODE SAW)</h1>
        
        <a href="https://github.com/rockliih/spk-kip-kuliah-saw" target="_blank" 
        style="position: absolute; top: 50%; transform: translateY(-50%); right: 0; color: #444; text-decoration: none; font-size: 10px; display: flex; align-items: center; gap: 4px; font-weight: bold;">
            [ LIHAT SOURCE CODE ]
            <svg height="24" width="24" viewBox="0 0 16 16" fill="currentColor">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
        </a>

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
        <div style="margin-bottom: 5px;">
            SISTEM SIMULASI SELEKSI KIP-KULIAH v1.0-DEV &nbsp;|&nbsp; DIBANGUN DENGAN LARAVEL &amp; PHP 8 &nbsp;
        </div>
        <a href="https://github.com/rockliih/spk-kip-kuliah-saw" target="_blank" 
            style="color: #444; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; font-weight: bold;">
        
            <svg height="16" width="16" viewBox="0 0 16 16" fill="currentColor">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
            
            [ LIHAT SOURCE CODE DI GITHUB ]
        </a>
    </footer>

</body>
</html>
