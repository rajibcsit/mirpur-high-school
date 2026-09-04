@extends('layouts.app')
@section('title', 'Notices - Mirpur High School')
@section('content')
<section class="page-hero"><div class="max-w-7xl mx-auto px-4 py-20 text-center"><span class="section-eyebrow">SCHOOL UPDATES</span><h1 class="text-4xl sm:text-6xl font-black mt-3">Notice <span class="text-gold">Board.</span></h1><p class="text-white/70 max-w-2xl mx-auto mt-4">Important announcements, examinations, admissions and school updates in one place.</p></div></section>
<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16"><div class="space-y-4">@forelse($notices as $notice)<a href="{{ route('notices.show',$notice->slug) }}" class="notice-modern reveal-up"><div class="notice-date"><b>{{ $notice->published_at?->format('d') }}</b><span>{{ $notice->published_at?->format('M') }}</span></div><div class="flex-1"><span class="notice-tag">{{ $notice->category }}</span><h3>{{ $notice->title }}</h3><p>View notice details and attached document</p></div><span class="notice-go">→</span></a>@empty<div class="bg-white rounded-3xl border p-12 text-center text-gray-500">No notices found.</div>@endforelse</div><div class="mt-10">{{ $notices->links() }}</div></section>
@endsection
