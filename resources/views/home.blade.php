@extends('layouts.app')
@section('title', 'Mirpur ML High School - Home')

@section('content')
{{-- Hero Slider --}}
<section class="relative overflow-hidden bg-primary text-white">
    <div id="hero-slider" class="relative min-h-[560px] md:min-h-[650px]">
        @forelse($sliders as $index => $slide)
            <article class="hero-slide absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}" data-slide="{{ $index }}">
                @if($slide->image_path)
                    <img src="{{ asset('storage/'.$slide->image_path) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $slide->title }}">
                    <div class="absolute inset-0 bg-primary/75"></div>
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-primary to-primary-dark"></div>
                @endif
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-[560px] md:min-h-[650px] flex items-center">
                    <div class="max-w-3xl py-20">
                        @if($slide->subtitle)<p class="text-gold font-bold uppercase tracking-[.2em] mb-4">{{ $slide->subtitle }}</p>@endif
                        <h1 class="text-4xl md:text-6xl font-black leading-tight mb-5">{{ $slide->title }}</h1>
                        @if($slide->description)<p class="text-lg md:text-xl text-gray-100 max-w-2xl mb-8">{{ $slide->description }}</p>@endif
                        @if($slide->button_text && $slide->button_url)
                            <a href="{{ $slide->button_url }}" class="inline-flex bg-gold text-white px-7 py-3.5 rounded-full font-bold hover:scale-105 transition">{{ $slide->button_text }}</a>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <article class="absolute inset-0 bg-gradient-to-br from-primary to-primary-dark">
                <div class="max-w-7xl mx-auto px-4 min-h-[560px] flex items-center">
                    <div class="max-w-3xl"><p class="text-gold font-bold uppercase tracking-[.2em] mb-4">WELCOME TO</p><h1 class="text-4xl md:text-6xl font-black mb-6">Mirpur ML High School</h1><p class="text-xl text-gray-100 mb-8">Shaping bright futures through quality education, strong values and a nurturing learning environment.</p><div class="flex flex-wrap gap-4"><a href="{{ route('admission.create') }}" class="bg-gold px-7 py-3 rounded-full font-bold">Apply for Admission</a><a href="{{ route('about') }}" class="border border-white px-7 py-3 rounded-full font-bold">Learn More</a></div></div>
                </div>
            </article>
        @endforelse
        @if($sliders->count() > 1)
            <button id="hero-prev" type="button" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/30 hover:bg-black/50 text-2xl">‹</button>
            <button id="hero-next" type="button" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/30 hover:bg-black/50 text-2xl">›</button>
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2">
                @foreach($sliders as $index => $slide)<button type="button" class="hero-dot w-3 h-3 rounded-full bg-white/50 {{ $index===0?'bg-gold':'' }}" data-dot="{{ $index }}"></button>@endforeach
            </div>
        @endif
    </div>
</section>

{{-- Quick Services --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <div class="grid md:grid-cols-3 gap-4">
        <a href="{{ route('results.index') }}" class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition"><div class="text-3xl mb-3">📊</div><h3 class="font-bold text-lg text-primary">Student Results</h3><p class="text-sm text-gray-500 mt-1">Check examination results online.</p></a>
        <a href="{{ route('routine.index') }}" class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition"><div class="text-3xl mb-3">🗓️</div><h3 class="font-bold text-lg text-primary">Class Routine</h3><p class="text-sm text-gray-500 mt-1">View class-wise weekly schedules.</p></a>
        <a href="{{ route('admission.create') }}" class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition"><div class="text-3xl mb-3">📝</div><h3 class="font-bold text-lg text-primary">Online Admission</h3><p class="text-sm text-gray-500 mt-1">Submit an admission application online.</p></a>
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
