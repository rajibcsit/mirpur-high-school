@extends('layouts.app')
@section('title', $notice->title . ' - Mirpur High School')

@section('content')
<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <a href="{{ route('notices.index') }}" class="text-primary hover:underline text-sm">← Back to Notices</a>

    <div class="bg-white rounded-xl shadow p-8 mt-4">
        <span class="inline-block text-xs font-semibold uppercase text-primary bg-primary/10 px-2 py-1 rounded mb-4">{{ $notice->category }}</span>
        <h1 class="text-2xl md:text-3xl font-bold mb-2">{{ $notice->title }}</h1>
        <p class="text-sm text-gray-500 mb-6">Published on {{ $notice->published_at?->format('d M, Y') }}</p>
        <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">{{ $notice->content }}</div>

        @if($notice->file_path)
            <a href="{{ asset('storage/' . $notice->file_path) }}" target="_blank" class="inline-block mt-6 bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">📎 Download Attachment</a>
        @endif
    </div>
</section>
@endsection
