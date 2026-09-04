<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index()
    {
        $notices = Notice::published()->latest('published_at')->take(5)->get();
        $events = EventModel::where('event_date', '>=', now()->subDay())->orderBy('event_date')->take(3)->get();
        $gallery = Gallery::latest()->take(8)->get();
        $teachers = Teacher::orderBy('display_order')->take(4)->get();
        $sliders = Slider::where('is_active', true)->orderBy('display_order')->get();
        $schoolSettings = Setting::first();
        $stats = [
            'students' => $schoolSettings?->stat_students ?: '500+',
            'teachers' => $schoolSettings?->stat_teachers ?: '30+',
            'years' => $schoolSettings?->stat_years ?: '25+',
            'achievements' => $schoolSettings?->stat_achievements ?: '50+',
        ];
        return view('home', compact('notices', 'events', 'gallery', 'teachers', 'sliders','schoolSettings','stats'));
    }

    public function about()
    {
        $schoolSettings = Setting::first();
        return view('about', compact('schoolSettings'));
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
