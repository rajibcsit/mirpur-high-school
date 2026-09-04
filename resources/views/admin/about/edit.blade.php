@extends('layouts.admin')
@section('title', 'About Page')
@section('page-title', 'About Page Content')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    {{-- Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-emerald-950 via-emerald-900 to-slate-900 p-6 md:p-8 text-white shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-emerald-100">School Website</div>
                <h2 class="mt-3 text-2xl md:text-3xl font-black">About Page Management</h2>
                <p class="mt-2 max-w-2xl text-sm md:text-base text-emerald-50/80">Manage your school's history, mission, vision, headmaster's message and homepage statistics from one clean dashboard.</p>
            </div>
            <a href="{{ route('about') }}" target="_blank" class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-bold text-emerald-900 shadow hover:bg-emerald-50 transition">Preview About Page ↗</a>
        </div>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- About content --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50/80 px-5 py-4 md:px-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-xl">🏫</div>
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-900">School History & About</h3>
                        <p class="mt-1 text-sm text-slate-500">This information appears on your public About page.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 p-5 md:p-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-bold text-slate-700">Section Title</label>
                    <input type="text" name="about_title" value="{{ old('about_title', $settings->about_title ?: 'About Our School') }}" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-bold text-slate-700">Short Introduction</label>
                    <textarea name="about_intro" rows="4" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('about_intro', $settings->about_intro) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-bold text-slate-700">School History / Details</label>
                    <textarea name="about_history" rows="9" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 text-slate-800 outline-none transition focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('about_history', $settings->about_history) }}</textarea>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Mission</label>
                    <textarea name="mission" rows="8" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 text-slate-800 outline-none transition focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('mission', $settings->mission) }}</textarea>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Vision</label>
                    <textarea name="vision" rows="8" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 text-slate-800 outline-none transition focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('vision', $settings->vision) }}</textarea>
                </div>
                <div class="md:col-span-2 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">
                    <label class="mb-2 block text-sm font-bold text-slate-700">About Page Image</label>
                    <input type="file" name="about_image" accept="image/*" class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2 file:font-bold file:text-emerald-800 hover:file:bg-emerald-100">
                    <p class="mt-2 text-xs text-slate-500">JPG, PNG or WEBP. Maximum 4MB.</p>
                    @if($settings->about_image_path)
                        <div class="mt-4 flex items-center gap-4">
                            <img src="{{ asset('storage/'.$settings->about_image_path) }}" alt="About image" class="h-28 w-44 rounded-xl object-cover shadow-sm ring-1 ring-slate-200">
                            <span class="text-xs font-semibold text-slate-500">Current image</span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Headmaster --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50/80 px-5 py-4 md:px-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-xl">👨‍🏫</div>
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-900">Headmaster's Message</h3>
                        <p class="mt-1 text-sm text-slate-500">Update the leadership message displayed on the About page.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 p-5 md:p-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Message Title</label>
                    <input
                        type="text"
                        name="principal_message_title"
                        value="{{ old('principal_message_title', $settings->principal_message_title ?? "Headmaster's Message") }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100"
                    >
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700">Headmaster Photo</label>
                    <input type="file" name="principal_photo" accept="image/*" class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-600 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:font-bold file:text-blue-800">
                    @if($settings->principal_photo_path)
                        <img src="{{ asset('storage/'.$settings->principal_photo_path) }}" alt="Headmaster" class="mt-3 h-24 w-24 rounded-2xl object-cover ring-1 ring-slate-200">
                    @endif
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-bold text-slate-700">Message</label>
                    <textarea name="principal_message" rows="9" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">{{ old('principal_message', $settings->principal_message) }}</textarea>
                </div>
            </div>
        </section>

        {{-- Stats --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50/80 px-5 py-4 md:px-6">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-xl">📊</div>
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-900">Homepage Statistics</h3>
                        <p class="mt-1 text-sm text-slate-500">Numbers shown in the homepage statistics section.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-5 p-5 md:p-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach([['stat_students','Students','500+'],['stat_teachers','Teachers','30+'],['stat_years','Years of Excellence','25+'],['stat_achievements','Achievements','50+']] as [$name,$label,$placeholder])
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <label class="mb-2 block text-sm font-bold text-slate-700">{{ $label }}</label>
                        <input type="text" name="{{ $name }}" value="{{ old($name, $settings->{$name}) }}" placeholder="{{ $placeholder }}" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-semibold outline-none focus:border-emerald-600 focus:ring-4 focus:ring-emerald-100">
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Save bar --}}
        <div class="sticky bottom-4 z-20 flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white/95 p-4 shadow-xl backdrop-blur sm:flex-row sm:items-center sm:justify-between">
            <div class="text-sm text-slate-500"><span class="font-bold text-slate-700">Tip:</span> Save changes after updating your About content.</div>
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-emerald-800 px-7 py-3 text-sm font-extrabold text-white shadow-lg shadow-emerald-900/20 transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-200">Save About Content</button>
        </div>
    </form>
</div>
@endsection
