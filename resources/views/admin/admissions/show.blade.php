@extends('layouts.admin')
@section('title', 'Application Details')
@section('page-title', 'Admission Application')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow p-8">
    <div class="grid grid-cols-2 gap-y-4 text-sm mb-6">
        <p class="text-gray-500">Student Name</p><p class="font-medium">{{ $admission->student_name }}</p>
        <p class="text-gray-500">Class Applied</p><p class="font-medium">{{ $admission->class_applied }}</p>
        <p class="text-gray-500">Father's Name</p><p class="font-medium">{{ $admission->father_name ?: '—' }}</p>
        <p class="text-gray-500">Mother's Name</p><p class="font-medium">{{ $admission->mother_name ?: '—' }}</p>
        <p class="text-gray-500">Date of Birth</p><p class="font-medium">{{ $admission->dob?->format('d M, Y') ?: '—' }}</p>
        <p class="text-gray-500">Gender</p><p class="font-medium capitalize">{{ $admission->gender ?: '—' }}</p>
        <p class="text-gray-500">Previous School</p><p class="font-medium">{{ $admission->previous_school ?: '—' }}</p>
        <p class="text-gray-500">Guardian Phone</p><p class="font-medium">{{ $admission->guardian_phone }}</p>
        <p class="text-gray-500">Guardian Email</p><p class="font-medium">{{ $admission->guardian_email ?: '—' }}</p>
        <p class="text-gray-500">Address</p><p class="font-medium">{{ $admission->address ?: '—' }}</p>
        <p class="text-gray-500">Applied On</p><p class="font-medium">{{ $admission->created_at->format('d M, Y h:i A') }}</p>
    </div>

    <form action="{{ route('admin.admissions.status', $admission) }}" method="POST" class="flex items-center gap-3">
        @csrf @method('PATCH')
        <select name="status" class="border rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-primary focus:outline-none">
            @foreach(['pending','approved','rejected'] as $status)
                <option value="{{ $status }}" @selected($admission->status === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">Update Status</button>
    </form>
</div>
@endsection
