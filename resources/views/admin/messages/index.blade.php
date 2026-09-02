@extends('layouts.admin')
@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Subject</th>
                <th class="px-6 py-3">Received</th>
                <th class="px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($messages as $m)
                <tr class="{{ !$m->is_read ? 'bg-blue-50/50 font-medium' : '' }}">
                    <td class="px-6 py-4">{{ $m->name }}</td>
                    <td class="px-6 py-4">{{ $m->email }}</td>
                    <td class="px-6 py-4">{{ $m->subject ?: '—' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $m->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.messages.show', $m) }}" class="text-primary font-semibold hover:underline">View</a>
                        <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 font-semibold hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No messages found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $messages->links() }}</div>
@endsection
