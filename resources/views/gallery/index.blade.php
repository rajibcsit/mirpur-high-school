@extends('layouts.app')
@section('title', 'Gallery - Mirpur High School')
@section('content')
<section class="page-hero"><div class="max-w-7xl mx-auto px-4 py-20 text-center"><span class="section-eyebrow">SCHOOL LIFE</span><h1 class="text-4xl sm:text-6xl font-black mt-3">Photo <span class="text-gold">Gallery.</span></h1><p class="text-white/70 max-w-2xl mx-auto mt-4">Explore memorable moments, events, activities and everyday life at our school.</p></div></section>
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16"><div class="gallery-page-grid">@forelse($images as $image)<article class="gallery-page-item reveal-scale"><img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title ?: 'School gallery' }}"><div class="gallery-overlay"><span>{{ $image->category }}</span><h3>{{ $image->title ?: 'School Moments' }}</h3></div></article>@empty<div class="col-span-full bg-white rounded-3xl border p-12 text-center text-gray-500">No images uploaded yet.</div>@endforelse</div><div class="mt-10">{{ $images->links() }}</div></section>
@endsection
