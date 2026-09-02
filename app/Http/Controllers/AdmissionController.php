<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function create()
    {
        return view('admission');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'class_applied' => 'required|string|max:50',
            'previous_school' => 'nullable|string|max:255',
            'guardian_phone' => 'required|string|max:20',
            'guardian_email' => 'nullable|email',
            'address' => 'nullable|string',
        ]);

        Admission::create($validated);

        return back()->with('success', 'Your admission application has been submitted successfully! We will contact you soon.');
    }
}
