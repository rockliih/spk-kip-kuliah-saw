<?php

namespace App\Http\Controllers;

use App\Models\CollegeStudent;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class CollegeStudentController extends Controller
{
    public function index()
    {
        $students = CollegeStudent::latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        CollegeStudent::create($request->validated());
        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa baru berhasil ditambahkan ke sistem!');
    }

    // Di Laravel, form update standar dinamakan 'edit'
    public function edit(CollegeStudent $student)
    {
        return view('students.update', compact('student'));
    }

    public function update(StudentRequest $request, CollegeStudent $student)
    {
        $student->update($request->validated());
        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa bernama ' . $student->name . ' berhasil diperbarui!');
    }

    public function destroy(CollegeStudent $student)
    {
        $nama = $student->name;
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa ' . $nama . ' berhasil dihapus dari sistem!');
    }
}