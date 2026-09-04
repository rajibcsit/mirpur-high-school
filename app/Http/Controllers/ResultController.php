<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class ResultController extends Controller {
 public function index(Request $request){
  $student=null;$results=collect();$error=null;$exams=collect();$summary=['total'=>0,'obtained'=>0,'full'=>0,'percentage'=>0,'gpa'=>0];
  if($request->filled(['student_id','roll_no','academic_year','exam_name'])){
   $student=Student::where('student_id',$request->student_id)->where('roll_no',$request->roll_no)->where('academic_year',$request->academic_year)->first();
   if($student){$results=$student->results()->where('exam_name',$request->exam_name)->where('academic_year',$request->academic_year)->orderBy('id')->get();if($results->isEmpty())$error='No result found for this examination.';else{$summary['total']=$results->count();$summary['obtained']=$results->sum('marks');$summary['full']=$results->sum('full_marks');$summary['percentage']=$summary['full']?round($summary['obtained']/$summary['full']*100,2):0;$summary['gpa']=round($results->avg('grade_point'),2);}}else $error='Student information did not match our records.';
  }
  $exams=$student?$student->results()->where('academic_year',$student->academic_year)->distinct()->orderBy('exam_name')->pluck('exam_name'):collect();
  return view('results.index',compact('student','results','error','exams','summary'));
 }
}
