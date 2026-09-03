@extends('layouts.app')
@section('title', 'Notices - Mirpur High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Notice Board</h1>
    <p class="text-gray-200 mt-2">Stay updated with the latest announcements</p>
</section>

<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="space-y-4">
        @forelse($notices as $notice)
            <a href="{{ route('notices.show', $notice->slug) }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition flex justify-between items-center gap-4">
                <div>
                    <span class="inline-block text-xs font-semibold uppercase text-primary bg-primary/10 px-2 py-1 rounded mb-2">{{ $notice->category }}</span>
                    <h3 class="font-semibold text-lg">{{ $notice->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $notice->published_at?->format('d M, Y') }}</p>
                </div>
                <span class="text-primary text-xl">→</span>
            </a>
        @empty
            <p class="text-gray-500 text-center">No notices found.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $notices->links() }}
    </div>
</section>
@endsection
