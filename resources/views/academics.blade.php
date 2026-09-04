@extends('layouts.app')

@section('title', 'Academics - Mirpur M.L High School')
@section('content')

<section class="page-hero">
    <div class="max-w-7xl mx-auto px-4 py-20 text-center">
        <span class="section-eyebrow">LEARNING & GROWTH</span>
        <h1 class="text-4xl sm:text-6xl font-black mt-3">Academics<span class="text-gold">.</span></h1>
        <p class="text-white/70 max-w-2xl mx-auto mt-4">
            A structured learning journey designed to build knowledge, confidence, discipline and future-ready skills.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- Dynamic category filter --}}
    <div class="flex flex-wrap justify-center gap-3 mb-14">
        <a href="{{ route('academics') }}"
           class="px-5 py-2.5 rounded-full font-semibold border transition {{ !$category ? 'bg-primary text-white border-primary' : 'bg-white text-gray-600 border-gray-200 hover:border-primary hover:text-primary' }}">
            All
        </a>
        @foreach($categories as $itemCategory)
            <a href="{{ route('academics', ['category' => $itemCategory]) }}"
               class="px-5 py-2.5 rounded-full font-semibold border capitalize transition {{ $category === $itemCategory ? 'bg-primary text-white border-primary' : 'bg-white text-gray-600 border-gray-200 hover:border-primary hover:text-primary' }}">
                {{ $itemCategory === 'class' ? 'Classes' : ($itemCategory === 'subject' ? 'Subjects' : ucfirst($itemCategory).'s') }}
            </a>
        @endforeach
    </div>

    @if(!$category || $category === 'class')
        <div class="mb-16">
            <div class="mb-8">
                <span class="section-eyebrow">ACADEMIC LEVELS</span>
                <h2 class="section-title text-3xl sm:text-4xl">Classes we <span>offer.</span></h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5">
                @forelse($classes as $class)
                    <div class="academic-card reveal-up">
                        <div class="academic-icon">{{ $class->icon ?: '📚' }}</div>
                        <h3>{{ $class->title }}</h3>
                        @if($class->description)
                            <p>{{ $class->description }}</p>
                        @endif
                        <span class="academic-arrow">→</span>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl border p-8 text-center text-gray-500">
                        No classes are currently available.
                    </div>
                @endforelse
            </div>
        </div>
    @endif

    @if(!$category || $category === 'subject')
        <div class="mb-16">
            <div class="grid lg:grid-cols-[.75fr_1.25fr] gap-10 items-start">
                <div>
                    <span class="section-eyebrow">CORE CURRICULUM</span>
                    <h2 class="section-title text-3xl sm:text-4xl">Subjects that <span>matter.</span></h2>
                    <p class="text-gray-500 mt-4 leading-7">
                        Our curriculum balances academic fundamentals with practical knowledge,
                        communication, digital literacy and personal development.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    @forelse($subjects as $subject)
                        <div class="subject-card reveal-scale">
                            <div class="subject-icon">{{ $subject->icon ?: '•' }}</div>
                            <div>
                                <h3>{{ $subject->title }}</h3>
                                @if($subject->description)
                                    <p>{{ $subject->description }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500">No subjects are currently available.</div>
                    @endforelse
                </div>
            </div>
        </div>
    @endif

    @if(!$category || $category === 'program')
        @if($programs->isNotEmpty())
            <div class="mb-16">
                <span class="section-eyebrow">PROGRAMS</span>
                <h2 class="section-title text-3xl sm:text-4xl">Learning <span>programs.</span></h2>

                <div class="grid md:grid-cols-3 gap-5 mt-8">
                    @foreach($programs as $item)
                        <div class="feature-card reveal-up">
                            <div class="feature-icon">{{ $item->icon ?: '✦' }}</div>
                            <div>
                                <h3>{{ $item->title }}</h3>
                                @if($item->description)
                                    <p>{{ $item->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif

    @if(!$category || $category === 'facility')
        @if($facilities->isNotEmpty())
            <div>
                <span class="section-eyebrow">ACADEMIC FACILITIES</span>
                <h2 class="section-title text-3xl sm:text-4xl">Facilities for <span>better learning.</span></h2>

                <div class="grid md:grid-cols-3 gap-5 mt-8">
                    @foreach($facilities as $item)
                        <div class="feature-card reveal-up">
                            <div class="feature-icon">{{ $item->icon ?: '🏫' }}</div>
                            <div>
                                <h3>{{ $item->title }}</h3>
                                @if($item->description)
                                    <p>{{ $item->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif

</section>
@endsection
