@extends('layouts.app')
@section('title', 'Academics - Mirpur ML High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Academics</h1>
    <p class="text-gray-200 mt-2">Curriculum, classes and academic programs</p>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-2xl font-bold text-primary mb-8">Classes Offered</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 mb-16">
        @foreach(['Class VI', 'Class VII', 'Class VIII', 'Class IX', 'Class X (SSC)'] as $class)
            <div class="bg-white p-6 rounded-xl shadow border-t-4 border-primary">
                <h3 class="font-semibold text-lg">{{ $class }}</h3>
                <p class="text-sm text-gray-500 mt-1">Bangla &amp; English medium sections available.</p>
            </div>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold text-primary mb-8">Subjects</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
        @foreach(['Bangla', 'English', 'Mathematics', 'General Science', 'ICT', 'Social Science', 'Religion', 'Physical Education'] as $subject)
            <div class="bg-primary/5 border border-primary/20 rounded-lg p-4 text-center font-medium text-primary">{{ $subject }}</div>
        @endforeach
    </div>
</section>
@endsection
