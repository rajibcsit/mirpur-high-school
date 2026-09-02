<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller {
    public function index(Request $request) {
        $student = null; $results = collect(); $error = null;
        if ($request->filled(['student_id','roll_no','academic_year','exam_name'])) {
            $student = Student::where('student_id',$request->student_id)
                ->where('roll_no',$request->roll_no)
                ->where('academic_year',$request->academic_year)
                ->first();
            if ($student) {
                $results = $student->results()->where('exam_name',$request->exam_name)
                    ->where('academic_year',$request->academic_year)->orderBy('id')->get();
                if ($results->isEmpty()) $error = 'No result found for this examination.';
            } else $error = 'Student information did not match our records.';
        }
        $exams = $student ? $student->results()->where('academic_year',$student->academic_year)->distinct()->pluck('exam_name') : collect();
        return view('results.index', compact('student','results','error','exams'));
    }
}
