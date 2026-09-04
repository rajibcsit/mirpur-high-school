@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Events</h1>
            <p class="text-gray-500 mt-1">Manage school events from the admin panel.</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="inline-flex px-5 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark transition">
            + Add Event
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($events->count())
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Event</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Location</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                @if($event->cover_image)
                                    <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}" class="w-16 h-12 object-cover rounded-lg border">
                                @else
                                    <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-xs text-gray-400">No Image</div>
                                @endif
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $event->title }}</div>
                                    <div class="text-sm text-gray-500 max-w-md truncate">{{ $event->description }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 text-sm text-gray-700">
                            {{ $event->event_date?->format('d M Y') }}
                            @if($event->event_time)<div class="text-xs text-gray-400">{{ $event->event_time }}</div>@endif
                        </td>
                        <td class="px-5 py-4 text-sm text-gray-700">{{ $event->location ?: '—' }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-sm font-medium">Edit</a>
                                <a href="{{ route('events.show', $event) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 text-sm font-medium">View</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-sm font-medium">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($events->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">{{ $events->links() }}</div>
        @endif
        @else
            <div class="p-10 text-center">
                <div class="text-4xl mb-3">📅</div>
                <h2 class="text-lg font-semibold text-gray-900">No events yet</h2>
                <p class="text-gray-500 mt-1 mb-5">Create your first school event.</p>
                <a href="{{ route('admin.events.create') }}" class="inline-flex px-5 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark transition">+ Add Event</a>
            </div>
        @endif
    </div>
</div>
@endsection
