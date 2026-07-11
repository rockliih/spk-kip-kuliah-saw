<?php

namespace App\Http\Controllers;

use App\Models\CollegeStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $datas = CollegeStudent::results();
        return $datas;
    }
}
