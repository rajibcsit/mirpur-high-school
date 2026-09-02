@extends('layouts.app')
@section('title', 'Mirpur ML High School - Home')

@section('content')
{{-- Hero --}}
<section class="relative bg-gradient-to-br from-primary to-primary-dark text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-gold font-semibold mb-3 tracking-wide">WELCOME TO</p>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">Mirpur ML High School</h1>
            <p class="text-lg text-gray-200 mb-8">Shaping bright futures through quality education, strong values, and a nurturing learning environment for every student.</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admission.create') }}" class="bg-gold px-6 py-3 rounded-full font-semibold hover:opacity-90 transition">Apply for Admission</a>
                <a href="{{ route('about') }}" class="border border-white px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-primary transition">Learn More</a>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="bg-white/10 rounded-2xl p-8 backdrop-blur">
                <div class="grid grid-cols-2 gap-6 text-center">
                    <div><p class="text-4xl font-bold text-gold">1200+</p><p class="text-sm text-gray-200">Students</p></div>
                    <div><p class="text-4xl font-bold text-gold">60+</p><p class="text-sm text-gray-200">Teachers</p></div>
                    <div><p class="text-4xl font-bold text-gold">98%</p><p class="text-sm text-gray-200">Pass Rate</p></div>
                    <div><p class="text-4xl font-bold text-gold">25+</p><p class="text-sm text-gray-200">Years of Service</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Notices --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Latest Notices</h2>
        <a href="{{ route('notices.index') }}" class="text-primary font-semibold hover:underline">View All →</a>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($notices as $notice)
            <a href="{{ route('notices.show', $notice->slug) }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition border-l-4 border-gold">
                <span class="inline-block text-xs font-semibold uppercase text-primary bg-primary/10 px-2 py-1 rounded mb-3">{{ $notice->category }}</span>
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">{{ $notice->title }}</h3>
                <p class="text-sm text-gray-500">{{ $notice->published_at?->format('d M, Y') }}</p>
            </a>
        @empty
            <p class="text-gray-500">No notices published yet.</p>
        @endforelse
    </div>
</section>

{{-- Upcoming Events --}}
@if($events->count())
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-primary mb-8">Upcoming Events</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    @if($event->cover_image)
                        <img src="{{ asset('storage/' . $event->cover_image) }}" class="w-full h-40 object-cover" alt="{{ $event->title }}">
                    @else
                        <div class="w-full h-40 bg-primary/10 flex items-center justify-center text-primary text-3xl">📅</div>
                    @endif
                    <div class="p-5">
                        <p class="text-gold font-semibold text-sm mb-1">{{ $event->event_date->format('d M, Y') }} @if($event->event_time) · {{ $event->event_time }} @endif</p>
                        <h3 class="font-semibold text-lg mb-1">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-500 line-clamp-2">{{ $event->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Teachers --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-primary">Meet Our Teachers</h2>
        <a href="{{ route('teachers.index') }}" class="text-primary font-semibold hover:underline">View All →</a>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($teachers as $teacher)
            <div class="bg-white rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                @if($teacher->photo_path)
                    <img src="{{ asset('storage/' . $teacher->photo_path) }}" class="w-24 h-24 rounded-full mx-auto object-cover mb-4" alt="{{ $teacher->name }}">
                @else
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-primary/10 flex items-center justify-center text-primary text-2xl font-bold">{{ substr($teacher->name, 0, 1) }}</div>
                @endif
                <h3 class="font-semibold">{{ $teacher->name }}</h3>
                <p class="text-sm text-gold">{{ $teacher->designation }}</p>
                <p class="text-xs text-gray-500">{{ $teacher->subject }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- Gallery preview --}}
@if($gallery->count())
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-primary">School Gallery</h2>
            <a href="{{ route('gallery.index') }}" class="text-primary font-semibold hover:underline">View All →</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($gallery as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-40 object-cover rounded-lg hover:opacity-90 transition" alt="{{ $image->title }}">
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16 text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Ready to Join Mirpur ML High School?</h2>
        <p class="text-gray-200 mb-8">Admissions for the new academic year are now open. Secure your child's future today.</p>
        <a href="{{ route('admission.create') }}" class="bg-gold px-8 py-3 rounded-full font-semibold hover:opacity-90 transition inline-block">Apply Now</a>
    </div>
</section>
@endsection
