@extends('layouts.retro')

@section('title', 'Tambah Data Mahasiswa Baru')

@section('content')
    <h2>[ FORM INPUT DATA MAHASISWA BARU ]</h2>
    <p style="font-size: 12px; margin-bottom: 15px;">
        Pastikan mengisi skor kriteria dari skala 1 sampai 5 sesuai dengan kondisi sebenarnya.
    </p>

    @if ($errors->any())
        <div style="border: 1px solid #800000; background-color: #fff0f0; padding: 10px; margin-bottom: 15px; color: #800000;">
            <strong>[ TERJADI KESALAHAN INPUT: ]</strong>
            <ul style="margin: 5px 0 0 15px; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        
        <fieldset>
            <legend> [ 01. IDENTITAS MAHASISWA ] </legend>
            <div style="margin-bottom: 10px;">
                <label class="font-bold">Nomor Induk Mahasiswa (NIM):</label>
                <input type="number" name="id_number" value="{{ old('id_number') }}" required placeholder="Contoh: 2023001001" style="margin-top: 4px;">
            </div>
            <div>
                <label class="font-bold">Nama Lengkap Mahasiswa:</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso" style="margin-top: 4px;">
            </div>
        </fieldset>

        <fieldset>
            <legend> [ 02. RATING KRITERIA UMUM (SKALA 1 - 5) ] </legend>
            <div class="form-grid">
                <div class="form-group">
                    <label class="font-bold">C1: Status Orang Tua (Benefit)</label>
                    <select name="c1" required style="margin-top: 4px;">
                        <option value="5" {{ old('c1') == 5 ? 'selected' : '' }}>Skor 5 - Yatim Piatu</option>
                        <option value="4" {{ old('c1') == 4 ? 'selected' : '' }}>Skor 4 - Yatim / Piatu</option>
                        <option value="3" {{ old('c1') == 3 ? 'selected' : '' }}>Skor 3 - Orang Tua Bercerai / Sakit Keras</option>
                        <option value="2" {{ old('c1') == 2 ? 'selected' : '' }}>Skor 2 - Satu Orang Tua Bekerja</option>
                        <option value="1" {{ old('c1') == 1 ? 'selected' : '' }}>Skor 1 - Kedua Ortu Bekerja / Mampu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-bold">C2: Jumlah Tanggungan (Benefit)</label>
                    <select name="c2" required style="margin-top: 4px;">
                        <option value="5" {{ old('c2') == 5 ? 'selected' : '' }}>Skor 5 - Lebih dari 5 Anak</option>
                        <option value="4" {{ old('c2') == 4 ? 'selected' : '' }}>Skor 4 - 4 sampai 5 Anak</option>
                        <option value="3" {{ old('c2') == 3 ? 'selected' : '' }}>Skor 3 - 3 Anak</option>
                        <option value="2" {{ old('c2') == 2 ? 'selected' : '' }}>Skor 2 - 2 Anak</option>
                        <option value="1" {{ old('c2') == 1 ? 'selected' : '' }}>Skor 1 - 1 Anak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-bold">C3: Penghasilan Ortu (Cost)</label>
                    <select name="c3" required style="margin-top: 4px;">
                        <option value="1" {{ old('c3') == 1 ? 'selected' : '' }}>Skor 1 - &lt; Rp 1.000.000 (Paling Layak)</option>
                        <option value="2" {{ old('c3') == 2 ? 'selected' : '' }}>Skor 2 - Rp 1.000.000 s.d Rp 2.000.000</option>
                        <option value="3" {{ old('c3') == 3 ? 'selected' : '' }}>Skor 3 - Rp 2.000.000 s.d Rp 3.000.000</option>
                        <option value="4" {{ old('c3') == 4 ? 'selected' : '' }}>Skor 4 - Rp 3.000.000 s.d Rp 4.000.000</option>
                        <option value="5" {{ old('c3') == 5 ? 'selected' : '' }}>Skor 5 - &gt; Rp 4.000.000 (Kurang Layak)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-bold">C4: Pekerjaan Ortu (Cost)</label>
                    <select name="c4" required style="margin-top: 4px;">
                        <option value="1" {{ old('c4') == 1 ? 'selected' : '' }}>Skor 1 - Tidak Bekerja / Buruh Lepas</option>
                        <option value="2" {{ old('c4') == 2 ? 'selected' : '' }}>Skor 2 - Tani / Nelayan / Supir</option>
                        <option value="3" {{ old('c4') == 3 ? 'selected' : '' }}>Skor 3 - Pedagang Kecil / Honorer</option>
                        <option value="4" {{ old('c4') == 4 ? 'selected' : '' }}>Skor 4 - Wiraswasta / Swasta Tetap</option>
                        <option value="5" {{ old('c4') == 5 ? 'selected' : '' }}>Skor 5 - PNS / TNI / Polri / BUMN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-bold">C5: Status Rumah (Benefit)</label>
                    <select name="c5" required style="margin-top: 4px;">
                        <option value="5" {{ old('c5') == 5 ? 'selected' : '' }}>Skor 5 - Menumpang / Tidak Layak Huni</option>
                        <option value="4" {{ old('c5') == 4 ? 'selected' : '' }}>Skor 4 - Sewa / Kontrak / Kos</option>
                        <option value="3" {{ old('c5') == 3 ? 'selected' : '' }}>Skor 3 - Milik Sendiri (Sederhana)</option>
                        <option value="2" {{ old('c5') == 2 ? 'selected' : '' }}>Skor 2 - Milik Sendiri (Menengah)</option>
                        <option value="1" {{ old('c5') == 1 ? 'selected' : '' }}>Skor 1 - Milik Sendiri (Mewah)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-bold">C7: Prestasi Non-Akademik</label>
                    <select name="c7" required style="margin-top: 4px;">
                        <option value="5" {{ old('c7') == 5 ? 'selected' : '' }}>Skor 5 - Tingkat Internasional / Nasional</option>
                        <option value="4" {{ old('c7') == 4 ? 'selected' : '' }}>Skor 4 - Tingkat Provinsi</option>
                        <option value="3" {{ old('c7') == 3 ? 'selected' : '' }}>Skor 3 - Tingkat Kabupaten / Kota</option>
                        <option value="2" {{ old('c7') == 2 ? 'selected' : '' }}>Skor 2 - Tingkat Sekolah / Kecamatan</option>
                        <option value="1" {{ old('c7') == 1 ? 'selected' : '' }}>Skor 1 - Tidak Ada Prestasi</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset style="border-color: #005a00; background-color: #f4f9f4;">
            <legend style="background-color: #005a00;"> [ 03. C6: BUKTI KEMISKINAN / SKTM (BOBOT TERBESAR 30%) ] </legend>
            <p style="font-size: 12px; margin-top: 0; color: #005a00;">
                Aturan Hierarki: Pilih SATU dokumen dengan tingkat pembuktian paling tinggi yang dimiliki mahasiswa.
            </p>
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <label>
                    <input type="radio" name="c6" value="5" {{ old('c6', 5) == 5 ? 'checked' : '' }} required>
                    <strong>Skor 5 (Paling Tertinggi):</strong> Memiliki KIP (Kartu Indonesia Pintar) waktu SMA/SMK
                </label>
                <label>
                    <input type="radio" name="c6" value="4" {{ old('c6') == 4 ? 'checked' : '' }}>
                    <strong>Skor 4:</strong> Tidak punya KIP, tapi terdaftar resmi di DTKS Kemensos
                </label>
                <label>
                    <input type="radio" name="c6" value="3" {{ old('c6') == 3 ? 'checked' : '' }}>
                    <strong>Skor 3:</strong> Memiliki Surat SKTM Resmi dari Desa / Kelurahan
                </label>
                <label>
                    <input type="radio" name="c6" value="2" {{ old('c6') == 2 ? 'checked' : '' }}>
                    <strong>Skor 2:</strong> Hanya memiliki Surat Keterangan Tidak Mampu dari RT / RW
                </label>
                <label>
                    <input type="radio" name="c6" value="1" {{ old('c6') == 1 ? 'checked' : '' }}>
                    <strong>Skor 1 (Terendah):</strong> Tidak memiliki dokumen keterangan miskin sama sekali
                </label>
            </div>
        </fieldset>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn" style="background-color: #005a00; color: #fff; border-color: #000;">[ SIMPAN DATA KE DATABASE ]</button>
            <a href="{{ route('students.index') }}" class="btn">[ BATAL / KEMBALI ]</a>
        </div>
    </form>
@endsection