@extends('layouts.admin')
@section('title','Add Result') @section('page-title','Add Student Result')
@section('content')<div class="max-w-4xl bg-white rounded-xl shadow p-6"><form method="POST" action="{{ route('admin.results.store') }}">@csrf
<div class="grid md:grid-cols-2 gap-5">
<div><label class="block text-sm font-semibold mb-2">Student *</label><select name="student_id" required class="w-full border rounded-lg px-3 py-2"><option value="">Select student</option>@foreach($students as $s)<option value="{{ $s->id }}" @selected(old('student_id')==$s->id)>{{ $s->student_id }} — {{ $s->name }} — Class {{ $s->class_name }} / Roll {{ $s->roll_no }}</option>@endforeach</select></div>
<div><label class="block text-sm font-semibold mb-2">Exam Name *</label><input name="exam_name" value="{{ old('exam_name','Annual Examination') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Academic Year *</label><input type="number" name="academic_year" value="{{ old('academic_year',now()->year) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Subject *</label><input name="subject" value="{{ old('subject') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Subject Code</label><input name="subject_code" value="{{ old('subject_code') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Full Marks *</label><input type="number" step="0.01" name="full_marks" value="{{ old('full_marks',100) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Pass Marks *</label><input type="number" step="0.01" name="pass_marks" value="{{ old('pass_marks',33) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Obtained Marks *</label><input type="number" step="0.01" min="0" name="marks" value="{{ old('marks') }}" required class="w-full border rounded-lg px-3 py-2"></div>
</div>
<div class="mt-6"><button class="bg-primary text-white px-6 py-2 rounded-lg">Save Result</button></div></form></div>@endsection
