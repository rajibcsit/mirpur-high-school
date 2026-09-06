@extends('layouts.app')
@section('title', 'Admission - Mirpur High School')

@section('content')
{{-- Admission Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f] text-white">
    <div class="absolute -top-24 -right-20 h-80 w-80 rounded-full bg-gold/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/3 h-56 w-56 rounded-full bg-white/10 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24 relative z-10">
        <div class="max-w-4xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-gold"><span class="h-2 w-2 rounded-full bg-gold"></span> Admissions open</span>
            <h1 class="mt-6 text-4xl md:text-6xl font-black tracking-tight">Start your child’s <span class="text-gold">journey.</span></h1>
            <p class="mt-5 max-w-2xl text-base md:text-lg leading-8 text-white/75">Complete the admission application below. Our school office will review the information and contact the guardian for the next steps.</p>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-14 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-[.72fr_1.28fr] gap-8 lg:gap-10 items-start">
            {{-- Admission information --}}
            <aside class="lg:sticky lg:top-28 space-y-5">
                <div><span class="section-eyebrow">ADMISSION PROCESS</span><h2 class="section-title text-3xl mt-2">A simple path to <span>enrolment.</span></h2></div>
                <div class="rounded-3xl bg-white border border-gray-100 shadow-sm p-6">
                    <div class="space-y-6">
                        @foreach([
                            ['01','Submit application','Provide accurate student and guardian information.'],
                            ['02','Application review','The school office reviews your submitted details.'],
                            ['03','Office contact','Our team contacts the guardian with next steps.'],
                        ] as $step)
                        <div class="flex gap-4"><div class="h-10 w-10 shrink-0 rounded-xl bg-primary text-white flex items-center justify-center text-sm font-black">{{ $step[0] }}</div><div><h3 class="font-bold text-gray-900">{{ $step[1] }}</h3><p class="text-sm text-gray-500 leading-6 mt-1">{{ $step[2] }}</p></div></div>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-3xl bg-gradient-to-br from-primary to-[#12643f] text-white p-6 shadow-lg">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-gold">Campus</p>
                    <h3 class="text-xl font-black mt-2">Mirpur High School</h3>
                    <p class="text-sm text-white/70 mt-1">Sadullapur, Gaibandha, Bangladesh</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 mt-5 rounded-xl bg-white/10 border border-white/15 px-4 py-3 text-sm font-bold hover:bg-white/15 transition">Contact school office →</a>
                </div>
            </aside>

            {{-- Application form --}}
            <div class="rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-200/60 p-6 sm:p-8 lg:p-10">
                <div class="mb-8"><span class="section-eyebrow">APPLICATION FORM</span><h2 class="text-2xl md:text-3xl font-black text-gray-900 mt-2">Student admission details</h2><p class="text-sm text-gray-500 mt-2">Fields marked with <span class="text-gold font-bold">*</span> are required.</p></div>
                <form action="{{ route('admission.store') }}" method="POST" class="space-y-7">
                    @csrf
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-[0.18em] text-primary mb-4">Student information</h3>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="sm:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Student’s Full Name <span class="text-gold">*</span></label><input type="text" name="student_name" value="{{ old('student_name') }}" required placeholder="Enter student's full name" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">@error('student_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror</div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Class Applying For <span class="text-gold">*</span></label><select name="class_applied" required class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"><option value="">Select class</option>@foreach(['Class VI','Class VII','Class VIII','Class IX','Class X'] as $c)<option value="{{ $c }}" @selected(old('class_applied') == $c)>{{ $c }}</option>@endforeach</select>@error('class_applied')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror</div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth</label><input type="date" name="dob" value="{{ old('dob') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Gender</label><select name="gender" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"><option value="">Select gender</option><option value="male" @selected(old('gender') === 'male')>Male</option><option value="female" @selected(old('gender') === 'female')>Female</option></select></div>
                            <div class="sm:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Previous School</label><input type="text" name="previous_school" value="{{ old('previous_school') }}" placeholder="Previous school, if applicable" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-7">
                        <h3 class="text-xs font-black uppercase tracking-[0.18em] text-primary mb-4">Parent / guardian information</h3>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Father’s Name</label><input type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Father's name" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Mother’s Name</label><input type="text" name="mother_name" value="{{ old('mother_name') }}" placeholder="Mother's name" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Guardian’s Phone <span class="text-gold">*</span></label><input type="text" name="guardian_phone" value="{{ old('guardian_phone') }}" required placeholder="01XXXXXXXXX" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">@error('guardian_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror</div>
                            <div><label class="block text-sm font-semibold text-gray-700 mb-2">Guardian’s Email</label><input type="email" name="guardian_email" value="{{ old('guardian_email') }}" placeholder="guardian@example.com" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                            <div class="sm:col-span-2"><label class="block text-sm font-semibold text-gray-700 mb-2">Guardian Address</label><textarea name="address" rows="4" placeholder="Current residential address" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">{{ old('address') }}</textarea></div>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-primary/[.04] border border-primary/10 p-4 text-sm text-gray-600 leading-6">Please make sure the submitted information is accurate. The school office may contact the guardian using the provided phone number.</div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-3 rounded-xl bg-primary px-6 py-4 font-bold text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:opacity-95">Submit Admission Application <span>→</span></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
