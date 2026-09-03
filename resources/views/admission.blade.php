@extends('layouts.app')
@section('title', 'Admission - Mirpur High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Admission</h1>
    <p class="text-gray-200 mt-2">Apply for the upcoming academic year</p>
</section>

<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white p-8 rounded-xl shadow">
        <form action="{{ route('admission.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-1">Student's Full Name *</label>
                    <input type="text" name="student_name" value="{{ old('student_name') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                    @error('student_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Class Applying For *</label>
                    <select name="class_applied" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                        <option value="">Select Class</option>
                        @foreach(['Class VI','Class VII','Class VIII','Class IX','Class X'] as $c)
                            <option value="{{ $c }}" @selected(old('class_applied') == $c)>{{ $c }}</option>
                        @endforeach
                    </select>
                    @error('class_applied') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-1">Father's Name</label>
                    <input type="text" name="father_name" value="{{ old('father_name') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Mother's Name</label>
                    <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-1">Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Gender</label>
                    <select name="gender" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Previous School (if any)</label>
                <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium mb-1">Guardian's Phone *</label>
                    <input type="text" name="guardian_phone" value="{{ old('guardian_phone') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                    @error('guardian_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Guardian's Email</label>
                    <input type="email" name="guardian_email" value="{{ old('guardian_email') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Address</label>
                <textarea name="address" rows="3" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition w-full">Submit Application</button>
        </form>
    </div>
</section>
@endsection
