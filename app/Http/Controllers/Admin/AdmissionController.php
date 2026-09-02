<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::latest()->paginate(15);
        return view('admin.admissions.index', compact('admissions'));
    }

    public function show(Admission $admission)
    {
        return view('admin.admissions.show', compact('admission'));
    }

    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $admission->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated.');
    }

    public function destroy(Admission $admission)
    {
        $admission->delete();
        return back()->with('success', 'Application deleted.');
    }
}
