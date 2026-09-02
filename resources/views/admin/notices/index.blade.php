@extends('layouts.admin')
@section('title', 'Notices')
@section('page-title', 'Manage Notices')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.notices.create') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">+ Add Notice</a>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($notices as $notice)
                <tr>
                    <td class="px-6 py-4 font-medium">{{ $notice->title }}</td>
                    <td class="px-6 py-4 capitalize">{{ $notice->category }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $notice->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $notice->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $notice->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.notices.edit', $notice) }}" class="text-primary font-semibold hover:underline">Edit</a>
                        <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" class="inline" onsubmit="return confirm('Delete this notice?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 font-semibold hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No notices found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $notices->links() }}</div>
@endsection
