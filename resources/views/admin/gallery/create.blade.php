@extends('layouts.admin')
@section('title', 'Upload Image')
@section('page-title', 'Upload Gallery Image')

@section('content')
<div class="bg-white rounded-xl shadow p-8 max-w-xl">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Title (optional)</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Category *</label>
            <select name="category" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                @foreach(['campus','event','sports','cultural'] as $cat)
                    <option value="{{ $cat }}" @selected(old('category') == $cat)>{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Image *</label>
            <input type="file" name="image" required accept="image/*" class="w-full border rounded-lg px-4 py-2">
            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Upload</button>
    </form>
</div>
@endsection
