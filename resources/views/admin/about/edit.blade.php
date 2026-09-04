@extends('layouts.admin')
@section('title', 'About Page')
@section('page-title', 'About Page Content')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-primary uppercase tracking-widest">Website Content</p>
            <h2 class="text-2xl md:text-3xl font-black text-slate-900 mt-1">About & School Story</h2>
            <p class="text-slate-500 mt-1">Manage the About page, principal message and homepage statistics from one place.</p>
        </div>
        <a href="{{ route('about') }}" target="_blank" class="btn-secondary">Preview Page ↗</a>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <section class="admin-card">
            <div class="card-heading"><div><h3>About Section</h3><p>Your school's public story and identity.</p></div><span class="badge">ABOUT</span></div>
            <div class="p-6 grid md:grid-cols-2 gap-5">
                <div class="md:col-span-2"><label class="form-label">Section Title</label><input name="about_title" value="{{ old('about_title',$settings->about_title ?: 'About Our School') }}" class="form-input"></div>
                <div class="md:col-span-2"><label class="form-label">Intro</label><textarea name="about_intro" rows="3" class="form-input">{{ old('about_intro',$settings->about_intro) }}</textarea></div>
                <div class="md:col-span-2"><label class="form-label">History / About Details</label><textarea name="about_history" rows="7" class="form-input">{{ old('about_history',$settings->about_history) }}</textarea></div>
                <div><label class="form-label">Mission</label><textarea name="mission" rows="6" class="form-input">{{ old('mission',$settings->mission) }}</textarea></div>
                <div><label class="form-label">Vision</label><textarea name="vision" rows="6" class="form-input">{{ old('vision',$settings->vision) }}</textarea></div>
                <div><label class="form-label">About Image</label><input type="file" name="about_image" accept="image/*" class="form-input"><p class="form-help">JPG/PNG/WEBP, max 4MB.</p>@if($settings->about_image_path)<img src="{{ asset('storage/'.$settings->about_image_path) }}" class="mt-3 w-full h-44 object-cover rounded-xl">@endif</div>
            </div>
        </section>

        <section class="admin-card">
            <div class="card-heading"><div><h3>Principal's Message</h3><p>Show a warm leadership message on the homepage.</p></div><span class="badge">LEADERSHIP</span></div>
            <div class="p-6 grid md:grid-cols-2 gap-5">
                <div><label class="form-label">Message Title</label><input name="principal_message_title" value="{{ old('principal_message_title',$settings->principal_message_title ?: "Principal's Message") }}" class="form-input"></div>
                <div><label class="form-label">Principal Photo</label><input type="file" name="principal_photo" accept="image/*" class="form-input">@if($settings->principal_photo_path)<img src="{{ asset('storage/'.$settings->principal_photo_path) }}" class="mt-3 w-28 h-28 object-cover rounded-2xl">@endif</div>
                <div class="md:col-span-2"><label class="form-label">Message</label><textarea name="principal_message" rows="7" class="form-input">{{ old('principal_message',$settings->principal_message) }}</textarea></div>
            </div>
        </section>

        <section class="admin-card">
            <div class="card-heading"><div><h3>Homepage Statistics</h3><p>Numbers displayed in the modern statistics strip.</p></div><span class="badge">STATS</span></div>
            <div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach([['stat_students','Students','500+'],['stat_teachers','Teachers','30+'],['stat_years','Years of Excellence','25+'],['stat_achievements','Achievements','50+']] as [$name,$label,$placeholder])
                <div><label class="form-label">{{ $label }}</label><input name="{{ $name }}" value="{{ old($name,$settings->{$name}) }}" placeholder="{{ $placeholder }}" class="form-input"><p class="form-help">Example: {{ $placeholder }}</p></div>
                @endforeach
            </div>
        </section>

        <div class="flex justify-end"><button class="btn-primary px-7">Save About Content</button></div>
    </form>
</div>
@endsection
