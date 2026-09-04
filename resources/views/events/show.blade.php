@extends('layouts.app')
@section('title', $event->title . ' - Mirpur ML High School')

@section('content')
<section class="bg-slate-950 text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('events.index') }}" class="text-white/70 hover:text-white text-sm">← Back to Events</a>
        <h1 class="text-3xl md:text-5xl font-black mt-5">{{ $event->title }}</h1>
        <div class="flex flex-wrap gap-4 mt-5 text-white/70 text-sm">
            <span>📅 {{ $event->event_date?->format('d M, Y') }}</span>
            @if($event->event_time)<span>🕒 {{ $event->event_time }}</span>@endif
            @if($event->location)<span>📍 {{ $event->location }}</span>@endif
        </div>
    </div>
</section>

<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        @if($event->cover_image)
            <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}" class="w-full max-h-[520px] object-cover">
        @endif
        <div class="p-7 md:p-10">
            <div class="prose prose-slate max-w-none leading-8 whitespace-pre-line">{{ $event->description ?: 'More information about this school event will be available soon.' }}</div>
        </div>
    </article>
</section>
@endsection
