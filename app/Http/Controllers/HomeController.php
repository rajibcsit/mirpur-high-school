<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\EventModel;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\News;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $notices = Notice::published()->latest('published_at')->take(5)->get();
        $latestNews = News::query()
            ->where('is_published', true)
            ->orderByDesc('created_at')
            ->orderByDesc('published_at')
            ->take(8)->get();
        $events = EventModel::where('event_date', '>=', now()->subDay())->orderBy('event_date')->take(3)->get();
        $gallery = Gallery::latest()->take(8)->get();
        $teachers = Teacher::orderBy('display_order')->take(4)->get();
        $sliders = Slider::where('is_active', true)->orderBy('display_order')->get();
        $schoolSettings = Setting::first();
        $stats = [
            'students' => Student::where('is_active', true)->count(),
            'teachers' => Teacher::count(),
            'results' => Result::count(),
            'years' => max(1, (int)($schoolSettings?->established_year ? now()->year - (int)$schoolSettings->established_year + 1 : 1)),
        ];
        return view('home', compact('notices', 'latestNews', 'events', 'gallery', 'teachers', 'sliders', 'schoolSettings', 'stats'));
    }

    public function about()
    {
        $schoolSettings = Setting::first();
        return view('about', compact('schoolSettings'));
    }

    public function academics(Request $request)
    {
        $category = $request->query('category');

        $items = Academic::query()
            ->where('is_active', true)
            ->when($category, fn ($q) => $q->where('category', $category))
            ->orderBy('display_order')
            ->orderBy('title')
            ->get();

        $classes = $items->where('category', 'class')->values();
        $subjects = $items->where('category', 'subject')->values();
        $programs = $items->where('category', 'program')->values();
        $facilities = $items->where('category', 'facility')->values();

        $categories = Academic::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('academics', compact(
            'classes', 'subjects', 'programs', 'facilities', 'categories', 'category'
        ));
    }

    public function contact()
    {
        return view('contact');
    }
}
