<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $schoolSettings = Setting::first();

        return view('about.index', compact('schoolSettings'));
    }
}
