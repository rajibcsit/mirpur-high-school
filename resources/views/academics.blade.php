@extends('layouts.app')
@section('title', 'Academics - Mirpur ML High School')
@section('content')
<section class="page-hero">
    <div class="max-w-7xl mx-auto px-4 py-20 text-center">
        <span class="section-eyebrow">LEARNING & GROWTH</span>
        <h1 class="text-4xl sm:text-6xl font-black mt-3">Academics<span class="text-gold">.</span></h1>
        <p class="text-white/70 max-w-2xl mx-auto mt-4">A structured learning journey designed to build knowledge, confidence, discipline and future-ready skills.</p>
    </div>
</section>

<section class="py-16 lg:py-20 bg-gray-50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap gap-2 mb-10">
        @foreach([''=>'All','class'=>'Classes','subject'=>'Subjects','program'=>'Programs','facility'=>'Facilities'] as $value=>$label)
            <a href="{{ route('academics', $value ? ['category'=>$value] : []) }}"
               class="px-5 py-2.5 rounded-full text-sm font-black border transition {{ request('category','') === $value ? 'bg-primary text-white border-primary shadow-lg shadow-primary/15' : 'bg-white text-gray-600 border-gray-200 hover:border-primary hover:text-primary' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    @if($classes->isNotEmpty() && (!request('category') || request('category') === 'class'))
    <div class="mb-16">
        <span class="section-eyebrow">ACADEMIC LEVELS</span>
        <h2 class="section-title text-3xl sm:text-4xl">Classes we <span>offer.</span></h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-8">
            @foreach($classes as $class)
                <div class="academic-card reveal-up">
                    <div class="academic-icon">{{ $class->icon ?: '📚' }}</div>
                    <h3>{{ $class->title }}</h3>
                    <p>{{ $class->description }}</p>
                    <span class="academic-arrow">→</span>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($subjects->isNotEmpty() && (!request('category') || request('category') === 'subject'))
    <div class="mb-16">
        <div class="max-w-2xl">
            <span class="section-eyebrow">CORE CURRICULUM</span>
            <h2 class="section-title text-3xl sm:text-4xl">Subjects that <span>matter.</span></h2>
            <p class="text-gray-500 mt-4 leading-7">Our curriculum balances academic fundamentals with practical knowledge, communication, digital literacy and personal development.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
            @foreach($subjects as $subject)
                <div class="subject-card reveal-scale">
                    <div class="subject-icon">{{ $subject->icon ?: '•' }}</div>
                    <div><h3>{{ $subject->title }}</h3><p>{{ $subject->description }}</p></div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($programs->isNotEmpty() && (!request('category') || request('category') === 'program'))
    <div class="mb-16">
        <span class="section-eyebrow">ENRICHMENT</span>
        <h2 class="section-title text-3xl sm:text-4xl">Beyond the <span>classroom.</span></h2>
        <div class="grid md:grid-cols-3 gap-5 mt-8">
            @foreach($programs as $item)
                <div class="feature-card reveal-up"><div class="feature-icon">{{ $item->icon ?: '✦' }}</div><div><h3>{{ $item->title }}</h3><p>{{ $item->description }}</p></div></div>
            @endforeach
        </div>
    </div>
    @endif

    @if($facilities->isNotEmpty() && (!request('category') || request('category') === 'facility'))
    <div>
        <span class="section-eyebrow">LEARNING ENVIRONMENT</span>
        <h2 class="section-title text-3xl sm:text-4xl">Facilities that <span>support learning.</span></h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-8">
            @foreach($facilities as $item)
                <div class="academic-card reveal-up">
                    <div class="academic-icon">{{ $item->icon ?: '🏫' }}</div>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                    <span class="academic-arrow">→</span>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($classes->isEmpty() && $subjects->isEmpty() && $programs->isEmpty() && $facilities->isEmpty())
        <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-14 text-center">
            <div class="text-5xl">📚</div><h2 class="text-2xl font-black mt-4">Academic information coming soon</h2>
            <p class="text-gray-500 mt-2">Academic content will appear here once it is added from the admin panel.</p>
        </div>
    @endif
</div>
</section>
@endsection
