@extends('layouts.app')
@section('title', 'About Us - Mirpur High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">About Mirpur High School</h1>
    <p class="text-gray-200 mt-2">Our history, mission, and vision</p>
</section>

<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">
    <div>
        <h2 class="text-2xl font-bold text-primary mb-4">Our History</h2>
        <p class="text-gray-700 leading-relaxed">Mirpur High School has served the community for over two decades, providing quality secondary education rooted in academic excellence and strong moral values. Starting with a handful of students, we have grown into one of the most trusted educational institutions in the Mirpur area, known for our disciplined environment and dedicated faculty.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-xl shadow">
            <h3 class="text-xl font-bold text-primary mb-3">Our Mission</h3>
            <p class="text-gray-700">To provide holistic education that nurtures academic excellence, ethical values, and critical thinking, preparing students to become responsible citizens and future leaders.</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow">
            <h3 class="text-xl font-bold text-primary mb-3">Our Vision</h3>
            <p class="text-gray-700">To be a leading institution recognized for excellence in education, character building, and community service — empowering every student to reach their fullest potential.</p>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold text-primary mb-4">Why Choose Us</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['icon' => '📚', 'title' => 'Quality Curriculum', 'desc' => 'National curriculum with modern teaching methods.'],
                ['icon' => '👩‍🏫', 'title' => 'Experienced Faculty', 'desc' => 'Highly qualified and caring teachers.'],
                ['icon' => '🏫', 'title' => 'Modern Facilities', 'desc' => 'Well-equipped classrooms, labs, and library.'],
                ['icon' => '🏆', 'title' => 'Extracurriculars', 'desc' => 'Sports, debate, cultural and science clubs.'],
            ] as $item)
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl mb-3">{{ $item['icon'] }}</div>
                    <h4 class="font-semibold mb-1">{{ $item['title'] }}</h4>
                    <p class="text-sm text-gray-500">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
