@extends('layouts.retro')

@section('title', 'Kelola Data Mahasiswa')

@section('content')
    <div style="margin-bottom: 15px;">
        <a href="{{ route('students.create') }}" class="btn">[ + TAMBAH DATA MAHASISWA BARU ]</a>
    </div>

    <h2>[ DAFTAR SELURUH DATA INPUT MAHASISWA ]</h2>
    <p style="font-size: 12px; margin-bottom: 10px;">
        Halaman ini untuk mengelola data mentah (skor 1-5) sebelum diproses ke dalam rumus perhitungan SAW di dashboard.
    </p>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA MAHASISWA</th>
                <th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th><th>C6</th><th>C7</th>
                <th style="text-align: center; width: 150px;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $index => $student)
                <tr>
                    <td class="text-center font-bold">{{ $index + 1 }}</td>
                    <td class="text-center font-mono">{{ $student->id_number ?? '-' }}</td>
                    <td><strong>{{ strtoupper($student->name) }}</strong></td>
                    <td class="text-center">{{ $student->c1 }}</td>
                    <td class="text-center">{{ $student->c2 }}</td>
                    <td class="text-center">{{ $student->c3 }}</td>
                    <td class="text-center">{{ $student->c4 }}</td>
                    <td class="text-center">{{ $student->c5 }}</td>
                    <td class="text-center font-bold" style="color: #005a00;">{{ $student->c6 }}</td>
                    <td class="text-center">{{ $student->c7 }}</td>
                    <td class="text-center">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn" style="padding: 2px 6px;">[ EDIT ]</a>
                        
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 2px 6px;">[ HAPUS ]</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center" style="padding: 20px;">[ BELUM ADA DATA MAHASISWA YANG TERDAFTAR ]</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection