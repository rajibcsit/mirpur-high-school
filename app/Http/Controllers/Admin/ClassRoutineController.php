<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ClassRoutine;
use Illuminate\Http\Request;

class ClassRoutineController extends Controller {
    public function index(){ $routines=ClassRoutine::orderBy('academic_year','desc')->orderBy('class_name')->orderBy('day')->orderBy('start_time')->paginate(30); return view('admin.routines.index',compact('routines')); }
    public function create(){return view('admin.routines.create');}
    public function store(Request $request){
        $data=$request->validate(['class_name'=>'required|string|max:50','section'=>'nullable|string|max:20','academic_year'=>'required|integer|min:2000|max:2100','day'=>'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday','start_time'=>'required|date_format:H:i','end_time'=>'required|date_format:H:i|after:start_time','subject'=>'required|string|max:100','teacher'=>'nullable|string|max:255','room'=>'nullable|string|max:50','display_order'=>'nullable|integer|min:0']);
        ClassRoutine::create($data);return redirect()->route('admin.routines.index')->with('success','Routine entry added.');
    }
    public function edit(ClassRoutine $routine){return view('admin.routines.edit',compact('routine'));}
    public function update(Request $request,ClassRoutine $routine){
        $data=$request->validate(['class_name'=>'required|string|max:50','section'=>'nullable|string|max:20','academic_year'=>'required|integer|min:2000|max:2100','day'=>'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday','start_time'=>'required|date_format:H:i','end_time'=>'required|date_format:H:i|after:start_time','subject'=>'required|string|max:100','teacher'=>'nullable|string|max:255','room'=>'nullable|string|max:50','display_order'=>'nullable|integer|min:0']);$routine->update($data);return redirect()->route('admin.routines.index')->with('success','Routine updated.');
    }
    public function destroy(ClassRoutine $routine){$routine->delete();return back()->with('success','Routine deleted.');}
}
