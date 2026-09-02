@extends('layouts.admin')
@section('title','Edit Routine') @section('page-title','Edit Routine Entry')
@section('content')<div class="max-w-4xl bg-white rounded-xl shadow p-6"><form method="POST" action="{{ route('admin.routines.update',$routine) }}">@csrf @method('PUT')
@php $days=['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']; @endphp
<div class="grid md:grid-cols-2 gap-5">
<div><label class="block text-sm font-semibold mb-2">Class *</label><input name="class_name" value="{{ old('class_name',$routine->class_name ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Section</label><input name="section" value="{{ old('section',$routine->section ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Academic Year *</label><input type="number" name="academic_year" value="{{ old('academic_year',$routine->academic_year ?? now()->year) }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Day *</label><select name="day" required class="w-full border rounded-lg px-3 py-2">@foreach($days as $day)<option @selected(old('day',$routine->day ?? '')==$day)>{{ $day }}</option>@endforeach</select></div>
<div><label class="block text-sm font-semibold mb-2">Start Time *</label><input type="time" name="start_time" value="{{ old('start_time',isset($routine)?substr($routine->start_time,0,5):'09:00') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">End Time *</label><input type="time" name="end_time" value="{{ old('end_time',isset($routine)?substr($routine->end_time,0,5):'09:45') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Subject *</label><input name="subject" value="{{ old('subject',$routine->subject ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Teacher</label><input name="teacher" value="{{ old('teacher',$routine->teacher ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Room</label><input name="room" value="{{ old('room',$routine->room ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Display Order</label><input type="number" min="0" name="display_order" value="{{ old('display_order',$routine->display_order ?? 0) }}" class="w-full border rounded-lg px-3 py-2"></div>
</div>
<div class="mt-6"><button class="bg-primary text-white px-6 py-2 rounded-lg">Update Routine</button></div></form></div>@endsection
