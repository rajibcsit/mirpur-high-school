@extends('layouts.admin')
@section('title', 'Academics')
@section('page-title', 'Manage Academics')
@section('content')
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div><p class="text-sm text-gray-500">Manage classes, subjects and academic programs shown on the website.</p></div>
    <a href="{{ route('admin.academics.create') }}" class="bg-primary text-white px-5 py-3 rounded-xl font-semibold hover:bg-primary-dark transition">+ Add Academic</a>
</div>
<div class="grid gap-4">
@forelse($academics as $academic)
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col md:flex-row md:items-center gap-5">
    <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary grid place-items-center text-xl font-black shrink-0">{{ $academic->icon ?: '📚' }}</div>
    <div class="flex-1"><div class="flex flex-wrap gap-2 items-center"><h3 class="font-bold text-lg">{{ $academic->title }}</h3><span class="text-xs px-2.5 py-1 rounded-full bg-gray-100 text-gray-600 uppercase font-bold">{{ $academic->category }}</span><span class="text-xs px-2.5 py-1 rounded-full {{ $academic->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $academic->is_active ? 'Active' : 'Hidden' }}</span></div><p class="text-sm text-gray-500 mt-1">{{ $academic->description }}</p></div>
    <div class="flex gap-3"><a href="{{ route('admin.academics.edit', $academic) }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold">Edit</a><form method="POST" action="{{ route('admin.academics.destroy', $academic) }}" onsubmit="return confirm('Delete this academic item?')">@csrf @method('DELETE')<button class="px-4 py-2 rounded-lg bg-red-50 text-red-600 font-semibold">Delete</button></form></div>
</div>
@empty <div class="bg-white rounded-2xl p-10 text-center text-gray-500">No academic records found.</div> @endforelse
</div>
<div class="mt-6">{{ $academics->links() }}</div>
@endsection
