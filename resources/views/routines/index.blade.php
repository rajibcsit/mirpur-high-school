@extends('layouts.app')
@section('title','Class Routine - Mirpur ML High School')
@section('content')
<section class="bg-primary text-white py-14"><div class="max-w-7xl mx-auto px-4 text-center"><p class="text-gold font-semibold">ACADEMIC SERVICES</p><h1 class="text-4xl font-extrabold mt-2">Class Routine</h1><p class="text-gray-200 mt-3">View the latest class schedule by class and section.</p></div></section>
<section class="max-w-7xl mx-auto px-4 py-10">
<form method="GET" class="bg-white shadow rounded-xl p-5 flex flex-wrap gap-4 items-end mb-8">
<div><label class="block text-sm font-semibold mb-2">Class</label><select name="class_name" class="border rounded-lg px-3 py-2 min-w-44"><option value="">All Classes</option>@foreach($classes as $c)<option value="{{ $c }}" @selected($class==$c)>{{ $c }}</option>@endforeach</select></div>
<div><label class="block text-sm font-semibold mb-2">Section</label><input name="section" value="{{ $section }}" class="border rounded-lg px-3 py-2" placeholder="A"></div>
<div><label class="block text-sm font-semibold mb-2">Year</label><input type="number" name="academic_year" value="{{ $year }}" class="border rounded-lg px-3 py-2 w-32"></div>
<button class="bg-primary text-white px-6 py-2.5 rounded-lg font-semibold">View Routine</button>
</form>
@if($routines->isEmpty())<div class="bg-white rounded-xl shadow p-10 text-center text-gray-500">No routine found for the selected filters.</div>@endif
<div class="space-y-6">
@foreach($routines as $day=>$items)
<div class="bg-white rounded-xl shadow overflow-hidden"><div class="bg-primary text-white px-5 py-3 font-bold">{{ $day }}</div><div class="overflow-x-auto"><table class="w-full text-sm"><thead class="bg-gray-50"><tr><th class="text-left p-4">Time</th><th class="text-left p-4">Class</th><th class="text-left p-4">Subject</th><th class="text-left p-4">Teacher</th><th class="text-left p-4">Room</th></tr></thead><tbody>@foreach($items as $item)<tr class="border-t"><td class="p-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</td><td class="p-4">{{ $item->class_name }}{{ $item->section ? ' - '.$item->section : '' }}</td><td class="p-4 font-semibold">{{ $item->subject }}</td><td class="p-4">{{ $item->teacher ?: '—' }}</td><td class="p-4">{{ $item->room ?: '—' }}</td></tr>@endforeach</tbody></table></div></div>
@endforeach
</div>
</section>
@endsection
