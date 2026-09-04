<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Models\Admission;
use App\Models\ContactMessage;
use App\Models\EventModel;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;
use App\Models\ClassRoutine;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'notices' => Notice::count(),
            'events' => EventModel::count(),
            'gallery' => Gallery::count(),
            'teachers' => Teacher::count(),
            'students' => Student::count(),
            'results' => Result::count(),
            'routines' => ClassRoutine::count(),
            'admissions' => Admission::count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentAdmissions = Admission::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentAdmissions', 'recentMessages'));
    }
}
