<?php
namespace App\Http\Controllers;
use App\Models\ClassRoutine;
use Illuminate\Http\Request;

class RoutineController extends Controller {
    public function index(Request $request) {
        $year = (int)($request->academic_year ?: now()->year);
        $class = $request->class_name;
        $section = $request->section;
        $routines = ClassRoutine::where('academic_year',$year)
            ->when($class, fn($q) => $q->where('class_name',$class))
            ->when($section, fn($q) => $q->where('section',$section))
            ->orderByRaw("FIELD(day,'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday')")
            ->orderBy('start_time')->get()->groupBy('day');
        $classes = ClassRoutine::where('academic_year',$year)->distinct()->orderBy('class_name')->pluck('class_name');
        return view('routines.index', compact('routines','classes','year','class','section'));
    }
}
