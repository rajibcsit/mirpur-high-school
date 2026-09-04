@extends('layouts.app')
@section('title', ($schoolSettings?->about_title ?: 'About Our School') . ' - ' . ($schoolSettings?->school_name ?: 'Mirpur ML High School'))

@section('content')
@php
    $schoolName = $schoolSettings?->school_name ?: 'Mirpur ML High School';
    $aboutTitle = $schoolSettings?->about_title ?: 'About Our School';
    $intro = $schoolSettings?->about_intro ?: 'Discover our story, values and commitment to building a brighter future through quality education.';
    $history = $schoolSettings?->about_history ?: 'Our school is committed to creating a disciplined, supportive and inspiring environment where every student can learn, grow and achieve their potential.';
    $mission = $schoolSettings?->mission ?: 'To provide quality education that develops knowledge, character, creativity and responsibility in every learner.';
    $vision = $schoolSettings?->vision ?: 'To build a confident generation of responsible citizens prepared to contribute positively to society and the nation.';
    $headmasterTitle = $schoolSettings?->principal_message_title ?: "Headmaster's Message";
    $headmasterMessage = $schoolSettings?->principal_message ?: 'Welcome to our school. We believe education is not only about academic success, but also about developing character, confidence and a lifelong love of learning.';
@endphp

<section class="relative overflow-hidden bg-primary-dark text-white">
    <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_20%_20%,#d4a01755,transparent_35%),radial-gradient(circle_at_85%_70%,#49c98a33,transparent_35%)]"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="max-w-3xl reveal-up">
            <span class="hero-kicker">OUR SCHOOL</span>
            <h1 class="text-4xl md:text-6xl font-black tracking-tight mt-5">{{ $aboutTitle }}</h1>
            <p class="mt-6 text-lg md:text-xl text-white/75 leading-relaxed">{{ $intro }}</p>
        </div>
        <div class="absolute -right-20 -bottom-40 w-96 h-96 rounded-full border border-white/10"></div>
        <div class="absolute right-16 top-16 w-28 h-28 rounded-full border border-gold/30"></div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid lg:grid-cols-[1.05fr_.95fr] gap-10 lg:gap-16 items-center">
        <div class="reveal-up">
            @if($schoolSettings?->about_image_path)
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/'.$schoolSettings->about_image_path) }}" alt="{{ $schoolName }}" class="w-full h-[420px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent"></div>
                    <div class="absolute left-6 bottom-6 text-white">
                        <p class="text-sm font-bold uppercase tracking-widest text-gold">Since {{ $schoolSettings?->established_year ?: 'Our Beginning' }}</p>
                        <p class="text-2xl font-black mt-1">{{ $schoolName }}</p>
                    </div>
                </div>
            @else
                <div class="about-art">
                    <div class="about-orb">MHS</div>
                    <div class="about-card about-card-top"><strong>{{ $schoolName }}</strong><span>Learning • Character • Excellence</span></div>
                    <div class="about-card about-card-bottom"><strong>Our Story</strong><span>Growing together, serving our community.</span></div>
                </div>
            @endif
        </div>
        <div class="reveal-up">
            <span class="section-eyebrow">OUR STORY</span>
            <h2 class="section-title !text-4xl md:!text-5xl">A school built around <span>students</span></h2>
            <p class="mt-6 text-slate-600 leading-8 whitespace-pre-line">{{ $history }}</p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-8">
                @foreach([
                    [$schoolSettings?->stat_students ?: '500+', 'Students'],
                    [$schoolSettings?->stat_teachers ?: '30+', 'Teachers'],
                    [$schoolSettings?->stat_years ?: '25+', 'Years'],
                    [$schoolSettings?->stat_achievements ?: '50+', 'Achievements'],
                ] as [$value,$label])
                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4 text-center">
                        <div class="text-2xl font-black text-primary">{{ $value }}</div>
                        <div class="text-xs font-semibold text-slate-500 mt-1">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 border-y border-slate-200 py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto reveal-up">
            <span class="section-eyebrow">WHAT GUIDES US</span>
            <h2 class="section-title !text-4xl md:!text-5xl">Mission & <span>Vision</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6 mt-10">
            <article class="group bg-white rounded-3xl p-8 md:p-10 border border-slate-200 shadow-sm hover:-translate-y-2 hover:shadow-xl transition reveal-up">
                <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary grid place-items-center text-2xl font-black">M</div>
                <h3 class="text-2xl font-black text-slate-900 mt-6">Our Mission</h3>
                <p class="text-slate-600 leading-8 mt-4 whitespace-pre-line">{{ $mission }}</p>
            </article>
            <article class="group bg-primary-dark text-white rounded-3xl p-8 md:p-10 shadow-sm hover:-translate-y-2 hover:shadow-xl transition reveal-up">
                <div class="w-14 h-14 rounded-2xl bg-white/10 text-gold grid place-items-center text-2xl font-black">V</div>
                <h3 class="text-2xl font-black mt-6">Our Vision</h3>
                <p class="text-white/75 leading-8 mt-4 whitespace-pre-line">{{ $vision }}</p>
            </article>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid lg:grid-cols-[.75fr_1.25fr] gap-10 items-center bg-white rounded-[2rem] border border-slate-200 shadow-xl overflow-hidden reveal-up">
        <div class="bg-primary-dark min-h-[360px] flex items-center justify-center p-8 relative overflow-hidden">
            @if($schoolSettings?->principal_photo_path)
                <img src="{{ asset('storage/'.$schoolSettings->principal_photo_path) }}" alt="Headmaster" class="relative w-64 h-64 md:w-72 md:h-72 rounded-full object-cover border-8 border-white/10 shadow-2xl">
            @else
                <div class="relative w-64 h-64 rounded-full bg-white/10 border border-white/20 grid place-items-center text-7xl font-black text-gold">HM</div>
            @endif
            <div class="absolute -bottom-24 -right-20 w-64 h-64 rounded-full border border-white/10"></div>
        </div>
        <div class="p-8 md:p-12">
            <span class="section-eyebrow">LEADERSHIP</span>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 mt-3">{{ $headmasterTitle }}</h2>
            @if($schoolSettings?->principal_name)
                <p class="font-bold text-primary mt-3">{{ $schoolSettings->principal_name }}</p>
            @endif
            <div class="mt-6 text-slate-600 leading-8 whitespace-pre-line">{{ $headmasterMessage }}</div>
            <div class="mt-7 flex items-center gap-3 text-sm font-semibold text-slate-500">
                <span class="w-10 h-px bg-gold"></span> {{ $schoolName }}
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="max-w-4xl mx-auto px-4 text-center reveal-up">
        <span class="section-eyebrow">OUR COMMITMENT</span>
        <h2 class="text-3xl md:text-5xl font-black mt-4">Learning today. Leading tomorrow.</h2>
        <p class="text-white/70 mt-5 leading-7">We are committed to providing an environment where every learner is encouraged to discover, improve and make a meaningful difference.</p>
    </div>
</section>
@endsection
