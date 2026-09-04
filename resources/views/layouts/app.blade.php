<!DOCTYPE html>
@php
    $schoolSettings = \App\Models\Setting::first();
    $schoolName = $schoolSettings?->school_name ?: 'Mirpur High School';
    $shortName = $schoolSettings?->short_name ?: 'MHS';
    $tagline = $schoolSettings?->tagline ?: 'Excellence in Education';
    $siteTitle = $schoolSettings?->site_title ?: $schoolName;
    $siteDescription = $schoolSettings?->site_description ?: 'Quality education, discipline and character development for every learner.';
@endphp
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"><title>@yield('title', $siteTitle)</title>
    <meta name="description" content="{{ $siteDescription }}">
    @if($schoolSettings?->favicon_path)<link rel="icon" href="{{ asset('storage/'.$schoolSettings->favicon_path) }}">@endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    <div class="bg-slate-950 text-slate-200 text-xs sm:text-sm">
        <div class="site-container flex flex-col sm:flex-row justify-between gap-2 py-2.5">
            <span>📍 {{ $schoolSettings?->address ?: 'Mirpur, Dhaka, Bangladesh' }}</span>
            <span>@if($schoolSettings?->phone)📞 {{ $schoolSettings->phone }} @endif @if($schoolSettings?->email)<span class="mx-2 text-slate-600">|</span>✉ {{ $schoolSettings->email }}@endif</span>
        </div>
    </div>
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
        <div class="site-container h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-0">
                @if($schoolSettings?->logo_path)<img src="{{ asset('storage/'.$schoolSettings->logo_path) }}" class="w-12 h-12 object-contain rounded-xl" alt="{{ $schoolName }}">@else<div class="brand-mark">{{ $shortName }}</div>@endif
                <div class="min-w-0"><div class="font-black text-primary text-base sm:text-lg truncate">{{ $schoolName }}</div><div class="text-xs text-slate-500 truncate">{{ $tagline }}</div></div>
            </a>
            <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold">
                @foreach([['home','Home'],['about','About'],['academics','Academics'],['teachers.index','Teachers'],['notices.index','Notices'],['gallery.index','Gallery'],['results.index','Results'],['routine.index','Routine'],['contact','Contact']] as [$route,$label])
                    <a href="{{ route($route) }}" class="nav-link {{ request()->routeIs($route) || ($route==='notices.index' && request()->routeIs('notices.*')) ? 'active' : '' }}">{{ $label }}</a>
                @endforeach
                <a href="{{ route('admission.create') }}" class="btn-primary py-2.5 px-5">Admission</a>
            </nav>
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-xl border border-slate-200 text-slate-700 text-xl" aria-label="Menu">☰</button>
        </div>
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-100 bg-white">
            <div class="site-container py-3 grid grid-cols-2 gap-1">
                @foreach([['home','Home'],['about','About'],['academics','Academics'],['teachers.index','Teachers'],['notices.index','Notices'],['gallery.index','Gallery'],['results.index','Results'],['routine.index','Routine'],['contact','Contact'],['admission.create','Admission']] as [$route,$label])
                    <a href="{{ route($route) }}" class="px-4 py-3 rounded-xl hover:bg-slate-50 font-semibold">{{ $label }}</a>
                @endforeach
            </div>
        </div>
    </header>
    @if(session('success'))<div class="site-container mt-5"><div class="alert-success">{{ session('success') }}</div></div>@endif
    <main>@yield('content')</main>
    <footer class="bg-slate-950 text-slate-300 mt-20">
        <div class="site-container py-14 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div class="lg:col-span-2"><div class="flex items-center gap-3 mb-4"><div class="brand-mark">{{ $shortName }}</div><h3 class="text-white text-xl font-black">{{ $schoolName }}</h3></div><p class="max-w-xl text-sm leading-7 text-slate-400">{{ $schoolSettings?->footer_text ?: $siteDescription }}</p></div>
            <div><h4 class="text-white font-bold mb-4">Explore</h4><div class="space-y-2 text-sm"><a class="footer-link" href="{{ route('about') }}">About Us</a><a class="footer-link" href="{{ route('academics') }}">Academics</a><a class="footer-link" href="{{ route('teachers.index') }}">Teachers</a><a class="footer-link" href="{{ route('gallery.index') }}">Gallery</a></div></div>
            <div><h4 class="text-white font-bold mb-4">Quick Access</h4><div class="space-y-2 text-sm"><a class="footer-link" href="{{ route('notices.index') }}">Notices</a><a class="footer-link" href="{{ route('results.index') }}">Student Results</a><a class="footer-link" href="{{ route('routine.index') }}">Class Routine</a><a class="footer-link" href="{{ route('admission.create') }}">Online Admission</a></div></div>
        </div>
        <div class="border-t border-white/10"><div class="site-container py-5 flex flex-col sm:flex-row justify-between gap-2 text-xs text-slate-500"><span>© {{ date('Y') }} {{ $schoolName }}. All rights reserved.</span><span>{{ $schoolSettings?->established_year ? 'Established '.$schoolSettings->established_year : 'Learning • Character • Leadership' }}</span></div></div>
    </footer>
</body></html>
