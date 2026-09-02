@extends('layouts.admin')
@section('title', 'Events')
@section('page-title', 'Manage Events')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.events.create') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">+ Add Event</a>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Location</th>
                <th class="px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($events as $event)
                <tr>
                    <td class="px-6 py-4 font-medium">{{ $event->title }}</td>
                    <td class="px-6 py-4">{{ $event->event_date->format('d M, Y') }} @if($event->event_time) · {{ $event->event_time }} @endif</td>
                    <td class="px-6 py-4">{{ $event->location }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="text-primary font-semibold hover:underline">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Delete this event?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 font-semibold hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No events found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $events->links() }}</div>
@endsection
