<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('display_order')->get();
        return view('teachers.index', compact('teachers'));
    }
}
