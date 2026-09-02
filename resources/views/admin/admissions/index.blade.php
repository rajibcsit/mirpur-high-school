@extends('layouts.admin')
@section('title', 'Admissions')
@section('page-title', 'Admission Applications')

@section('content')
<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Student</th>
                <th class="px-6 py-3">Class</th>
                <th class="px-6 py-3">Guardian Phone</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Applied On</th>
                <th class="px-6 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($admissions as $a)
                <tr>
                    <td class="px-6 py-4 font-medium">{{ $a->student_name }}</td>
                    <td class="px-6 py-4">{{ $a->class_applied }}</td>
                    <td class="px-6 py-4">{{ $a->guardian_phone }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            {{ $a->status === 'approved' ? 'bg-green-100 text-green-700' : ($a->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                            {{ ucfirst($a->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $a->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.admissions.show', $a) }}" class="text-primary font-semibold hover:underline">View</a>
                        <form action="{{ route('admin.admissions.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('Delete this application?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 font-semibold hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">No applications found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $admissions->links() }}</div>
@endsection
