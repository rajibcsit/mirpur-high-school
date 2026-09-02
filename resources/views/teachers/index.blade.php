@extends('layouts.app')
@section('title', 'Our Teachers - Mirpur ML High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Our Teachers</h1>
    <p class="text-gray-200 mt-2">Meet the dedicated educators of Mirpur ML High School</p>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($teachers as $teacher)
            <div class="bg-white rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                @if($teacher->photo_path)
                    <img src="{{ asset('storage/' . $teacher->photo_path) }}" class="w-24 h-24 rounded-full mx-auto object-cover mb-4" alt="{{ $teacher->name }}">
                @else
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-primary/10 flex items-center justify-center text-primary text-2xl font-bold">{{ substr($teacher->name, 0, 1) }}</div>
                @endif
                <h3 class="font-semibold">{{ $teacher->name }}</h3>
                <p class="text-sm text-gold">{{ $teacher->designation }}</p>
                <p class="text-xs text-gray-500 mb-2">{{ $teacher->subject }}</p>
                <p class="text-xs text-gray-400">{{ $teacher->qualification }}</p>
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No teacher records found.</p>
        @endforelse
    </div>
</section>
@endsection
