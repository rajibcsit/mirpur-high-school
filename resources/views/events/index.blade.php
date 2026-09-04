@extends('layouts.app')
@section('title', 'Events - Mirpur ML High School')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f] text-white py-20">
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-gold/10 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <span class="section-eyebrow text-gold">SCHOOL ACTIVITIES</span>
        <h1 class="text-4xl md:text-6xl font-black mt-3">School <span class="text-gold">Events</span></h1>
        <p class="mt-4 text-white/75 max-w-2xl text-lg">Discover upcoming programs, celebrations, academic activities and memorable moments at Mirpur ML High School.</p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
        @forelse($events as $event)
            <a href="{{ route('events.show', $event) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="h-52 bg-gray-100 overflow-hidden">
                    @if($event->cover_image)
                        <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#0f5132] to-[#167a4d] flex items-center justify-center text-white">
                            <span class="text-5xl">📅</span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-14 h-14 rounded-xl bg-primary/10 text-primary flex flex-col items-center justify-center leading-none">
                            <b class="text-xl">{{ $event->event_date->format('d') }}</b>
                            <span class="text-[10px] uppercase font-bold mt-1">{{ $event->event_date->format('M') }}</span>
                        </div>
                        <div class="text-sm text-gray-500">
                            <div>{{ $event->event_date->format('d M, Y') }}</div>
                            @if($event->event_time)<div class="mt-1">{{ $event->event_time }}</div>@endif
                        </div>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900 group-hover:text-primary transition">{{ $event->title }}</h2>
                    @if($event->description)<p class="text-gray-500 mt-2 leading-6">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</p>@endif
                    @if($event->location)<p class="text-sm text-gray-400 mt-3">📍 {{ $event->location }}</p>@endif
                    <div class="mt-5 text-primary font-bold">View event details <span>→</span></div>
                </div>
            </a>
        @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-100">
                <div class="text-5xl mb-4">📅</div>
                <h2 class="text-xl font-bold text-gray-800">No events found</h2>
                <p class="text-gray-500 mt-2">There are no school events available at the moment.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $events->links() }}</div>
</section>
@endsection
