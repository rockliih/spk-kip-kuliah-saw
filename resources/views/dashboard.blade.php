@extends('layouts.retro')

@section('title', 'Dashboard Hasil Perankingan KIP-K')

@section('content')
    <fieldset>
        <legend> [ KETERANGAN PARAMETER &amp; BOBOT PENILAIAN ] </legend>
        <p style="font-size: 12px; margin-top: 0;">
            Catatan: Angka besar adalah skor input (skala 1-5). Angka kecil di dalam kurung adalah nilai normalisasi matematis (skala 0.00 - 1.00).
        </p>
        <div class="legend-grid">
            <div class="legend-item benefit">
                <strong>C1: Status Orang Tua (20%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Benefit (Semakin tinggi semakin prioritas)</span>
            </div>
            <div class="legend-item benefit">
                <strong>C2: Jumlah Tanggungan (10%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Benefit (Semakin banyak anak semakin prioritas)</span>
            </div>
            <div class="legend-item cost">
                <strong>C3: Penghasilan Ortu (15%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Cost (Semakin kecil gaji semakin prioritas)</span>
            </div>
            <div class="legend-item cost">
                <strong>C4: Pekerjaan Ortu (15%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Cost (Semakin rentan pekerjaan semakin prioritas)</span>
            </div>
            <div class="legend-item benefit">
                <strong>C5: Status Tempat Tinggal (5%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Benefit (Semakin sederhana rumah semakin prioritas)</span>
            </div>
            <div class="legend-item benefit">
                <strong>C6: Bukti Tidak Mampu / SKTM (30%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Benefit (Bobot paling menentukan kelayakan)</span>
            </div>
            <div class="legend-item benefit">
                <strong>C7: Prestasi Non-Akademik (5%)</strong><br>
                <span style="font-size: 11px; color:#444;">Sifat: Benefit (Poin tambahan prestasi)</span>
            </div>
        </div>
    </fieldset>

    <h2>[ HASIL PERANKINGAN SELEKSI KIP-KULIAH ]</h2>
    <p style="font-size: 12px; margin-bottom: 5px;">
        Daftar ini diurutkan secara otomatis dari nilai tertinggi berdasarkan rumus Simple Additive Weighting (SAW). Peringkat 1 sampai 15 masuk prioritas Skema 1.
    </p>

    <table>
        <thead>
            <tr>
                <th style="width: 40px;">RANK</th>
                <th>IDENTITAS MAHASISWA</th>
                <th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th><th>C6</th><th>C7</th>
                <th style="background-color: #d5d3ca;">SKOR AKHIR</th>
                <th>REKOMENDASI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $index => $student)
                <tr>
                    <td class="text-center font-bold">
                        {{ $index < 9 ? '0' . ($index + 1) : $index + 1 }}
                    </td>
                    <td>
                        <strong>{{ strtoupper($student->name) }}</strong><br>
                        <span style="font-size: 11px; color: #555;">NIM: {{ $student->id_number ?? 'BLM-ADA' }}</span>
                    </td>
                    @foreach(['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7'] as $col)
                        <td class="text-center">
                            <strong>{{ $student->$col }}</strong>
                            <span class="norm-val">({{ number_format($student->saw_scores[$col] ?? 0, 2) }})</span>
                        </td>
                    @endforeach
                    <td class="text-center font-bold" style="background-color: #f0eee6; font-size: 14px;">
                        {{ number_format($student->total_score, 3) }}
                    </td>
                    <td class="text-center">
                        @if($index < 15)
                            <span class="status-skema1">[ SKEMA 1 (PENUH) ]</span>
                        @else
                            <span class="status-skema2">[ SKEMA 2 (BANTUAN) ]</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center" style="padding: 20px;">
                        [ DATA KOSONG: Belum ada data mahasiswa. Silakan jalankan seeder atau input data baru. ]
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection