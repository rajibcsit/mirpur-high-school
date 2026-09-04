@extends('layouts.app')
@section('title', $event->title . ' - Mirpur ML High School')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f] text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <a href="{{ route('events.index') }}" class="text-white/80 hover:text-white text-sm font-semibold">← Back to Events</a>
        <h1 class="text-3xl md:text-5xl font-black mt-5 max-w-4xl">{{ $event->title }}</h1>
        <div class="flex flex-wrap gap-4 mt-5 text-white/80 text-sm">
            <span>📅 {{ $event->event_date->format('d M, Y') }}</span>
            @if($event->event_time)<span>🕐 {{ $event->event_time }}</span>@endif
            @if($event->location)<span>📍 {{ $event->location }}</span>@endif
        </div>
    </div>
</section>

<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <article class="bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-100">
        @if($event->cover_image)
            <div class="max-h-[520px] overflow-hidden bg-gray-100">
                <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}" class="w-full max-h-[520px] object-cover">
            </div>
        @endif
        <div class="p-7 md:p-10">
            <div class="grid sm:grid-cols-3 gap-4 mb-8">
                <div class="rounded-2xl bg-primary/5 p-5"><span class="text-xs uppercase tracking-widest text-gray-400 font-bold">Date</span><p class="font-bold text-primary mt-1">{{ $event->event_date->format('d M, Y') }}</p></div>
                <div class="rounded-2xl bg-primary/5 p-5"><span class="text-xs uppercase tracking-widest text-gray-400 font-bold">Time</span><p class="font-bold text-primary mt-1">{{ $event->event_time ?: 'To be announced' }}</p></div>
                <div class="rounded-2xl bg-primary/5 p-5"><span class="text-xs uppercase tracking-widest text-gray-400 font-bold">Location</span><p class="font-bold text-primary mt-1">{{ $event->location ?: 'School campus' }}</p></div>
            </div>
            <h2 class="text-2xl font-black text-gray-900 mb-5">About this event</h2>
            <div class="prose max-w-none text-gray-600 leading-8 whitespace-pre-line">{{ $event->description ?: 'Event details will be announced by the school.' }}</div>
        </div>
    </article>

    <div class="mt-8"><a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 text-primary font-bold">← View all events</a></div>
</section>
@endsection
