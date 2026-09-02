@extends('layouts.admin')
@section('title','Edit Student') @section('page-title','Edit Student')
@section('content')<div class="max-w-4xl bg-white rounded-xl shadow p-6"><form method="POST" action="{{ route('admin.students.update',$student) }}" enctype="multipart/form-data">@csrf @method('PUT')
<div class="grid md:grid-cols-2 gap-5">
<div><label class="block text-sm font-semibold mb-2">Student ID *</label><input name="student_id" value="{{ old('student_id',$student->student_id ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Student Name *</label><input name="name" value="{{ old('name',$student->name ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Roll No *</label><input name="roll_no" value="{{ old('roll_no',$student->roll_no ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Registration No</label><input name="registration_no" value="{{ old('registration_no',$student->registration_no ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Class *</label><input name="class_name" value="{{ old('class_name',$student->class_name ?? '') }}" required class="w-full border rounded-lg px-3 py-2" placeholder="6"></div>
<div><label class="block text-sm font-semibold mb-2">Section</label><input name="section" value="{{ old('section',$student->section ?? '') }}" class="w-full border rounded-lg px-3 py-2" placeholder="A"></div>
<div><label class="block text-sm font-semibold mb-2">Academic Year *</label><input type="number" name="academic_year" value="{{ old('academic_year',$student->academic_year ?? now()->year) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Date of Birth</label><input type="date" name="date_of_birth" value="{{ old('date_of_birth',isset($student)&&$student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Father's Name</label><input name="father_name" value="{{ old('father_name',$student->father_name ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Mother's Name</label><input name="mother_name" value="{{ old('mother_name',$student->mother_name ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Photo</label><input type="file" name="photo" accept="image/*" class="w-full border rounded-lg px-3 py-2"></div>
<label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$student->is_active ?? true))> <span class="text-sm font-semibold">Active</span></label>
</div>
<div class="mt-6"><button class="bg-primary text-white px-6 py-2 rounded-lg">Update Student</button></div></form></div>@endsection
