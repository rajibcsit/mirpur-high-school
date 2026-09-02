@extends('layouts.admin')
@section('title', 'Teachers')
@section('page-title', 'Manage Teachers')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.teachers.create') }}" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">+ Add Teacher</a>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Designation</th>
                <th class="px-6 py-3">Subject</th>
                <th class="px-6 py-3">Order</th>
                <th class="px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($teachers as $teacher)
                <tr>
                    <td class="px-6 py-4 font-medium">{{ $teacher->name }}</td>
                    <td class="px-6 py-4">{{ $teacher->designation }}</td>
                    <td class="px-6 py-4">{{ $teacher->subject }}</td>
                    <td class="px-6 py-4">{{ $teacher->display_order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="text-primary font-semibold hover:underline">Edit</a>
                        <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" class="inline" onsubmit="return confirm('Remove this teacher?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 font-semibold hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No teachers found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $teachers->links() }}</div>
@endsection
