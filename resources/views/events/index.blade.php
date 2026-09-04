@extends('layouts.app')
@section('title', 'Events - Mirpur ML High School')

@section('content')
<section class="bg-slate-950 text-white py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="section-eyebrow text-gold">SCHOOL ACTIVITIES</span>
        <h1 class="text-4xl md:text-5xl font-black mt-3">School <span class="text-emerald-400">Events</span></h1>
        <p class="text-white/70 mt-4 max-w-2xl mx-auto">Discover upcoming and past events, programs and activities at Mirpur ML High School.</p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
            <a href="{{ route('events.show', $event) }}" class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">
                @if($event->cover_image)
                    <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-52 bg-gradient-to-br from-emerald-900 to-slate-950 flex items-center justify-center text-white text-5xl font-black">MHS</div>
                @endif
                <div class="p-6">
                    <div class="flex items-start gap-4">
                        <div class="shrink-0 w-14 h-14 rounded-xl bg-emerald-50 text-emerald-800 flex flex-col items-center justify-center">
                            <b class="text-xl leading-none">{{ $event->event_date?->format('d') }}</b>
                            <span class="text-[10px] font-bold uppercase mt-1">{{ $event->event_date?->format('M') }}</span>
                        </div>
                        <div class="min-w-0">
                            <h2 class="font-black text-xl text-slate-900 group-hover:text-emerald-700 transition">{{ $event->title }}</h2>
                            <p class="text-sm text-slate-500 mt-1">{{ $event->event_time ?: 'School Event' }} @if($event->location) · {{ $event->location }} @endif</p>
                        </div>
                    </div>
                    @if($event->description)
                        <p class="text-slate-600 mt-5 leading-7">{{ \Illuminate\Support\Str::limit(strip_tags($event->description), 120) }}</p>
                    @endif
                    <div class="mt-5 text-emerald-700 font-bold">View details <span class="ml-1">→</span></div>
                </div>
            </a>
        @empty
            <div class="sm:col-span-2 lg:col-span-3 text-center py-16 text-slate-500">No events found.</div>
        @endforelse
    </div>
    <div class="mt-10">{{ $events->links() }}</div>
</section>
@endsection
