@extends('layouts.admin')
@section('title', 'Gallery')
@section('page-title', 'Manage Gallery')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.gallery.create') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">+ Upload Image</a>
</div>

<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">
    @forelse($images as $image)
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <img src="{{ asset('storage/'.$image->image_path) }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <p class="font-medium text-sm truncate">{{ $image->title ?: 'Untitled' }}</p>
                <p class="text-xs text-gray-500 capitalize mb-3">{{ $image->category }}</p>
                <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                    @csrf @method('DELETE')
                    <button class="text-red-500 text-xs font-semibold hover:underline">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500 col-span-full text-center py-8">No images uploaded yet.</p>
    @endforelse
</div>
<div class="mt-6">{{ $images->links() }}</div>
@endsection
