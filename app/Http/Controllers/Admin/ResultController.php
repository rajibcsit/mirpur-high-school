<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller {
    public function index(Request $request) {
        $results=Result::with('student')->when($request->search,fn($q)=>$q->whereHas('student',fn($s)=>$s->where('name','like','%'.$request->search.'%')->orWhere('student_id','like','%'.$request->search.'%')->orWhere('roll_no','like','%'.$request->search.'%')))->latest()->paginate(25)->withQueryString();
        return view('admin.results.index',compact('results'));
    }
    public function create(){ $students=Student::where('is_active',true)->orderBy('class_name')->orderBy('roll_no')->get(); return view('admin.results.create',compact('students')); }
    public function store(Request $request){
        $data=$request->validate(['student_id'=>'required|exists:students,id','exam_name'=>'required|string|max:100','academic_year'=>'required|integer|min:2000|max:2100','subject'=>'required|string|max:100','subject_code'=>'nullable|string|max:30','full_marks'=>'required|numeric|min:1','pass_marks'=>'required|numeric|min:0','marks'=>'required|numeric|min:0']);
        $data['grade']=$this->grade($data['marks'],$data['full_marks']);$data['grade_point']=$this->point($data['marks'],$data['full_marks']);Result::create($data);
        return back()->with('success','Result added successfully.');
    }
    public function destroy(Result $result){$result->delete();return back()->with('success','Result deleted successfully.');}
    private function grade($marks,$full){$p=$marks/$full*100;return match(true){$p>=80=>'A+',$p>=70=>'A',$p>=60=>'A-',$p>=50=>'B',$p>=40=>'C',$p>=33=>'D',default=>'F'};}
    private function point($marks,$full){$p=$marks/$full*100;return match(true){$p>=80=>5.00,$p>=70=>4.00,$p>=60=>3.50,$p>=50=>3.00,$p>=40=>2.00,$p>=33=>1.00,default=>0.00};}
}
