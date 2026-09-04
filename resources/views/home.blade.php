@extends('layouts.app')
@php $homeSettings = $schoolSettings ?? \App\Models\Setting::first(); @endphp
@section('title', ($homeSettings?->school_name ?: 'Mirpur ML High School') . ' - Home')
@section('content')
<section class="hero-shell relative overflow-hidden text-white">
    <div class="hero-glow hero-glow-one"></div><div class="hero-glow hero-glow-two"></div>
    <div id="hero-slider" class="relative min-h-[650px] lg:min-h-[730px]">
        @forelse($sliders as $index => $slide)
        <article class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $index===0?'opacity-100':'opacity-0 pointer-events-none' }}" data-slide="{{ $index }}">
            @if($slide->image_path)<img src="{{ asset('storage/'.$slide->image_path) }}" class="hero-image absolute inset-0 w-full h-full object-cover" alt="{{ $slide->title }}"><div class="absolute inset-0 bg-gradient-to-r from-[#052e1c]/95 via-[#0f5132]/75 to-[#0f5132]/25"></div>@else<div class="absolute inset-0 bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f]"></div>@endif
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-[650px] lg:min-h-[730px] flex items-center relative z-10">
                <div class="max-w-3xl pt-12 reveal-up">
                    <span class="hero-kicker">{{ $slide->subtitle ?: 'Welcome to our school' }}</span>
                    <h1 class="text-5xl md:text-7xl font-black leading-[1.02] tracking-tight mt-5 mb-6">{{ $slide->title }}</h1>
                    @if($slide->description)<p class="text-lg md:text-xl text-white/85 max-w-2xl leading-8 mb-9">{{ $slide->description }}</p>@endif
                    <div class="flex flex-wrap gap-4">
                        @if($slide->button_text && $slide->button_url)<a href="{{ $slide->button_url }}" class="btn-gold">{{ $slide->button_text }} <span>→</span></a>@endif
                        <a href="{{ route('about') }}" class="btn-glass">Discover Our School</a>
                    </div>
                </div>
            </div>
        </article>
        @empty
        <article class="absolute inset-0 bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f]"><div class="max-w-7xl mx-auto px-4 min-h-[650px] flex items-center relative z-10"><div class="max-w-3xl"><span class="hero-kicker">A place to learn & lead</span><h1 class="text-5xl md:text-7xl font-black leading-tight mt-5 mb-6">{{ $homeSettings?->school_name ?: 'Mirpur ML High School' }}</h1><p class="text-xl text-white/85 max-w-2xl mb-9">Quality education, strong values and a future-ready learning environment.</p><div class="flex gap-4 flex-wrap"><a href="{{ route('admission.create') }}" class="btn-gold">Apply for Admission →</a><a href="{{ route('about') }}" class="btn-glass">Explore School</a></div></div></div></article>
        @endforelse
        @if($sliders->count()>1)<button id="hero-prev" class="hero-nav left-5">‹</button><button id="hero-next" class="hero-nav right-5">›</button><div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-2 z-20">@foreach($sliders as $i=>$x)<button class="hero-dot w-10 h-1.5 rounded-full bg-white/35 {{ $i===0?'bg-gold':'' }}" data-dot="{{ $i }}"></button>@endforeach</div>@endif
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-28 bg-gradient-to-t from-gray-50 to-transparent z-10"></div>
</section>

{{-- Dynamic Latest News ticker --}}
<section class="relative z-20 -mt-7 max-w-7xl mx-auto px-4">
    <div class="news-ticker rounded-2xl overflow-hidden shadow-xl bg-white">
        <div class="ticker-label">LATEST NEWS</div>
        <div class="ticker-window">
            @forelse($latestNews as $item)
                <div class="ticker-track">
                    <a href="{{ $item->external_url ?: route('news.show', $item->slug) }}"
                       @if($item->external_url) target="_blank" rel="noopener noreferrer" @endif>
                        <span>{{ $item->title }}</span>
                        <small>{{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}</small>
                    </a>
                    <a href="{{ $item->external_url ?: route('news.show', $item->slug) }}"
                       @if($item->external_url) target="_blank" rel="noopener noreferrer" @endif
                       aria-hidden="true" tabindex="-1">
                        <span>{{ $item->title }}</span>
                        <small>{{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}</small>
                    </a>
                </div>
            @empty
                <div class="px-6 py-4 text-sm font-semibold text-gray-500">
                    No latest news published yet.
                </div>
            @endforelse
        </div>
        <a href="{{ route('news.index') }}" class="ticker-more">View all →</a>
    </div>
</section>

{{-- Quick access --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-8"><div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
@foreach([['📊','Results','Check student examination results','results.index'],['🗓️','Routine','Find your weekly class schedule','routine.index'],['📰','News & Notices','Stay updated with school news','news.index'],['🎓','Admission','Start your admission journey','admission.create']] as $item)
<a href="{{ route($item[3]) }}" class="feature-card reveal-up"><div class="feature-icon">{{ $item[0] }}</div><div><h3>{{ $item[1] }}</h3><p>{{ $item[2] }}</p></div><span class="feature-arrow">↗</span></a>
@endforeach
</div></section>

{{-- Welcome / About --}}
<section class="py-20 bg-white"><div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-[1.1fr_.9fr] gap-14 items-center"><div class="reveal-up"><span class="section-eyebrow">WHO WE ARE</span><h2 class="section-title">Growing minds, building <span>futures.</span></h2><p class="text-gray-600 text-lg leading-8 mt-6">{{ $homeSettings?->about_text ?: 'Mirpur ML High School is committed to academic excellence, character development and creating confident learners who are ready to make a positive impact.' }}</p><div class="mt-8 flex gap-4"><a href="{{ route('about') }}" class="btn-primary">Learn More <span>→</span></a><a href="{{ route('academics') }}" class="text-primary font-bold px-4 py-3">Explore Academics</a></div></div><div class="relative reveal-scale"><div class="about-art"><div class="about-orb">MHS</div><div class="about-card about-card-top"><strong>Excellence</strong><span>in every learner</span></div><div class="about-card about-card-bottom"><strong>Future Ready</strong><span>Learn • Grow • Lead</span></div></div></div></div></section>

{{-- Stats --}}<section class="stats-band"><div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 py-14">@foreach([[$stats['students'],'Active Students'],[$stats['teachers'],'Dedicated Teachers'],[$stats['results'],'Result Records'],[$stats['years'],'Years of Service']] as $stat)<div class="text-center reveal-up"><div class="stat-number">{{ number_format($stat[0]) }}<span>+</span></div><p>{{ $stat[1] }}</p></div>@endforeach</div></section>

{{-- Notices/events --}}<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20"><div class="grid lg:grid-cols-[1.05fr_.95fr] gap-12"><div class="reveal-up"><div class="flex justify-between items-end mb-8"><div><span class="section-eyebrow">STAY INFORMED</span><h2 class="section-title text-4xl">Latest <span>Notices</span></h2></div><a href="{{ route('notices.index') }}" class="text-primary font-bold">View all →</a></div><div class="space-y-4">@forelse($notices as $notice)<a href="{{ route('notices.show',$notice->slug) }}" class="notice-card"><div class="notice-date"><b>{{ $notice->published_at?->format('d') }}</b><span>{{ $notice->published_at?->format('M') }}</span></div><div class="min-w-0"><span class="text-xs uppercase tracking-widest text-gold font-bold">{{ $notice->category }}</span><h3 class="font-bold text-lg text-gray-900 truncate mt-1">{{ $notice->title }}</h3></div><span class="ml-auto text-xl text-primary">↗</span></a>@empty<p class="text-gray-500">No notices published yet.</p>@endforelse</div></div><div class="reveal-up"><span class="section-eyebrow">WHAT'S HAPPENING</span><h2 class="section-title text-4xl mb-8">Upcoming <span>Events</span></h2><div class="space-y-4">@forelse($events as $event)<div class="event-card"><div class="event-date"><b>{{ $event->event_date->format('d') }}</b><span>{{ $event->event_date->format('M') }}</span></div><div><h3 class="font-bold text-lg">{{ $event->title }}</h3><p class="text-sm text-gray-500 mt-1">{{ $event->event_time ?: 'School Event' }} @if($event->description) · {{ \Illuminate\Support\Str::limit($event->description,55) }} @endif</p></div></div>@empty<p class="text-gray-500">No upcoming events.</p>@endforelse</div></div></div></section>

{{-- Teachers --}}<section class="bg-slate-950 text-white py-20"><div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"><div class="flex justify-between items-end mb-10"><div><span class="section-eyebrow text-gold">OUR FACULTY</span><h2 class="section-title text-white">Meet our <span>teachers.</span></h2></div><a href="{{ route('teachers.index') }}" class="text-white font-bold">View faculty →</a></div><div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">@foreach($teachers as $teacher)<div class="teacher-card reveal-scale">@if($teacher->photo_path)<img src="{{ asset('storage/'.$teacher->photo_path) }}" alt="{{ $teacher->name }}">@else<div class="teacher-placeholder">{{ strtoupper(substr($teacher->name,0,1)) }}</div>@endif<div class="p-5"><h3 class="font-bold text-lg">{{ $teacher->name }}</h3><p class="text-gold text-sm mt-1">{{ $teacher->designation }}</p><p class="text-white/50 text-xs mt-1">{{ $teacher->subject }}</p></div></div>@endforeach</div></div></section>

{{-- Gallery --}}@if($gallery->count())<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20"><div class="flex justify-between items-end mb-9"><div><span class="section-eyebrow">CAMPUS LIFE</span><h2 class="section-title text-4xl">Moments from <span>school.</span></h2></div><a href="{{ route('gallery.index') }}" class="text-primary font-bold">View gallery →</a></div><div class="gallery-grid">@foreach($gallery as $image)<div class="gallery-item reveal-scale"><img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}"><div>{{ $image->title }}</div></div>@endforeach</div></section>@endif

{{-- CTA --}}<section class="cta-section"><div class="max-w-5xl mx-auto px-4 text-center"><span class="hero-kicker">YOUR JOURNEY STARTS HERE</span><h2 class="text-4xl md:text-6xl font-black mt-5">Ready to learn, grow & lead?</h2><p class="text-white/75 text-lg mt-5 max-w-2xl mx-auto">Join a school community where curiosity is encouraged, character matters and every student is supported.</p><a href="{{ route('admission.create') }}" class="btn-gold mt-9 inline-flex">Apply for Admission <span>→</span></a></div></section>
@endsection
