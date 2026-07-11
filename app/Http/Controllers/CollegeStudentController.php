<?php

namespace App\Http\Controllers;

use App\Models\CollegeStudent;
use Illuminate\Http\Request;

class CollegeStudentController extends Controller
{
    public function index() {
        $students = CollegeStudent::all();
        return view('student.index', compact('students'));
    }
}
