<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StudentController extends Controller {
    public function index(Request $request) {
        $students=Student::when($request->search,fn($q)=>$q->where(fn($x)=>$x->where('name','like','%'.$request->search.'%')->orWhere('student_id','like','%'.$request->search.'%')->orWhere('roll_no','like','%'.$request->search.'%')))
            ->latest()->paginate(20)->withQueryString();
        return view('admin.students.index',compact('students'));
    }
    public function create(){return view('admin.students.create');}
    public function store(Request $request){
        $data=$request->validate(['student_id'=>'required|string|max:50|unique:students,student_id','name'=>'required|string|max:255','roll_no'=>'required|string|max:50','registration_no'=>'nullable|string|max:100|unique:students,registration_no','class_name'=>'required|string|max:50','section'=>'nullable|string|max:20','academic_year'=>'required|integer|min:2000|max:2100','father_name'=>'nullable|string|max:255','mother_name'=>'nullable|string|max:255','date_of_birth'=>'nullable|date','photo'=>'nullable|image|max:4096','is_active'=>'nullable|boolean']);
        if($request->hasFile('photo'))$data['photo_path']=$request->file('photo')->store('students','public'); unset($data['photo']);$data['is_active']=$request->boolean('is_active');Student::create($data);
        return redirect()->route('admin.students.index')->with('success','Student created successfully.');
    }
    public function edit(Student $student){return view('admin.students.edit',compact('student'));}
    public function update(Request $request,Student $student){
        $data=$request->validate(['student_id'=>['required','string','max:50',Rule::unique('students','student_id')->ignore($student->id)],'name'=>'required|string|max:255','roll_no'=>'required|string|max:50','registration_no'=>['nullable','string','max:100',Rule::unique('students','registration_no')->ignore($student->id)],'class_name'=>'required|string|max:50','section'=>'nullable|string|max:20','academic_year'=>'required|integer|min:2000|max:2100','father_name'=>'nullable|string|max:255','mother_name'=>'nullable|string|max:255','date_of_birth'=>'nullable|date','photo'=>'nullable|image|max:4096','is_active'=>'nullable|boolean']);
        if($request->hasFile('photo')){if($student->photo_path)Storage::disk('public')->delete($student->photo_path);$data['photo_path']=$request->file('photo')->store('students','public');}unset($data['photo']);$data['is_active']=$request->boolean('is_active');$student->update($data);
        return redirect()->route('admin.students.index')->with('success','Student updated successfully.');
    }
    public function destroy(Student $student){if($student->photo_path)Storage::disk('public')->delete($student->photo_path);$student->delete();return back()->with('success','Student deleted successfully.');}
}
