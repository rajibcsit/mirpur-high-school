<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index()
    {
        $notices = Notice::published()->latest('published_at')->take(5)->get();
        $events = EventModel::where('event_date', '>=', now()->subDay())->orderBy('event_date')->take(3)->get();
        $gallery = Gallery::latest()->take(8)->get();
        $teachers = Teacher::orderBy('display_order')->take(4)->get();

        return view('home', compact('notices', 'events', 'gallery', 'teachers'));
    }

    public function about()
    {
        return view('about');
    }

    public function academics()
    {
        return view('academics');
    }

    public function contact()
    {
        return view('contact');
    }
}
