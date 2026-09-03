@extends('layouts.app')
@section('title', 'Gallery - Mirpur High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Photo Gallery</h1>
    <p class="text-gray-200 mt-2">Moments from our school life</p>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($images as $image)
            <div class="relative group overflow-hidden rounded-lg shadow">
                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" alt="{{ $image->title }}">
                @if($image->title)
                    <div class="absolute inset-x-0 bottom-0 bg-black/60 text-white text-xs p-2">{{ $image->title }}</div>
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No images uploaded yet.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $images->links() }}
    </div>
</section>
@endsection
