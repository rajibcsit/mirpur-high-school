@extends('layouts.app')
@section('title','Student Result Portal - Mirpur High School')
@section('content')
<section class="bg-primary text-white py-14">
<div class="max-w-5xl mx-auto px-4 text-center"><p class="text-gold font-semibold">ACADEMIC SERVICES</p><h1 class="text-4xl font-extrabold mt-2">Student Result Portal</h1><p class="text-gray-200 mt-3">Check your examination result using your student ID, roll and academic year.</p></div>
</section>
<section class="max-w-5xl mx-auto px-4 py-12">
<div class="bg-white rounded-2xl shadow p-6 md:p-8">
<form method="GET" action="{{ route('results.index') }}" class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
<div><label class="block text-sm font-semibold mb-2">Student ID</label><input name="student_id" value="{{ request('student_id') }}" required class="w-full border rounded-lg px-3 py-2" placeholder="MHS-1001"></div>
<div><label class="block text-sm font-semibold mb-2">Roll No</label><input name="roll_no" value="{{ request('roll_no') }}" required class="w-full border rounded-lg px-3 py-2" placeholder="1"></div>
<div><label class="block text-sm font-semibold mb-2">Academic Year</label><input type="number" name="academic_year" value="{{ request('academic_year', now()->year) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Exam</label><input name="exam_name" value="{{ request('exam_name','Annual Examination') }}" required class="w-full border rounded-lg px-3 py-2" placeholder="Annual Examination"></div>
<div class="lg:col-span-4"><button class="bg-primary text-white px-7 py-3 rounded-lg font-semibold hover:opacity-90">Search Result</button></div>
</form>
</div>
@if($error)<div class="mt-6 bg-red-50 border border-red-200 text-red-700 rounded-xl p-4">{{ $error }}</div>@endif
@if($student && $results->count())
<div class="mt-8 bg-white rounded-2xl shadow overflow-hidden">
<div class="p-6 border-b"><h2 class="text-2xl font-bold text-primary">{{ $student->name }}</h2><p class="text-sm text-gray-500">ID: {{ $student->student_id }} · Roll: {{ $student->roll_no }} · Class: {{ $student->class_name }} {{ $student->section ? '('.$student->section.')' : '' }}</p><p class="text-sm text-gray-500 mt-1">{{ request('exam_name') }} · {{ $student->academic_year }}</p></div>
<div class="overflow-x-auto"><table class="w-full text-sm"><thead class="bg-gray-50"><tr><th class="text-left p-4">Subject</th><th class="p-4">Full Marks</th><th class="p-4">Marks</th><th class="p-4">Grade</th><th class="p-4">Point</th></tr></thead><tbody>
@foreach($results as $r)<tr class="border-t"><td class="p-4 font-medium">{{ $r->subject }} @if($r->subject_code)<span class="text-xs text-gray-400">({{ $r->subject_code }})</span>@endif</td><td class="p-4 text-center">{{ $r->full_marks }}</td><td class="p-4 text-center font-semibold">{{ $r->marks }}</td><td class="p-4 text-center">{{ $r->grade }}</td><td class="p-4 text-center">{{ number_format((float)$r->grade_point,2) }}</td></tr>@endforeach
</tbody></table></div></div>
@endif
</section>
@endsection
