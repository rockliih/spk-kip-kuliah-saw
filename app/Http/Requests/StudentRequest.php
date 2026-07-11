<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Izinkan semua aksi (karena sistem ini prototipe tanpa login admin)
    }

    public function rules(): array
    {
        // Pengecekan NIM agar tidak duplikat saat edit atau tambah baru
        $studentId = $this->route('student') ? $this->route('student')->id : null;

        return [
            'name'      => 'required|string|max:100',
            'id_number' => 'required|numeric|digits_between:8,15|unique:college_students,id_number,' . $studentId,
            'c1'        => 'required|integer|min:1|max:5',
            'c2'        => 'required|integer|min:1|max:5',
            'c3'        => 'required|integer|min:1|max:5',
            'c4'        => 'required|integer|min:1|max:5',
            'c5'        => 'required|integer|min:1|max:5',
            'c6'        => 'required|integer|min:1|max:5',
            'c7'        => 'required|integer|min:1|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => '[ ERROR: Kolom :attribute wajib diisi! ]',
            'numeric'  => '[ ERROR: Kolom :attribute hanya boleh berisi angka NIM! ]',
            'unique'   => '[ ERROR: NIM ini sudah terdaftar di dalam database! ]',
            'min'      => '[ ERROR: Skor minimal kriteria adalah 1. ]',
            'max'      => '[ ERROR: Skor maksimal kriteria adalah 5. ]',
        ];
    }
}