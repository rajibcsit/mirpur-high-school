@extends('layouts.app')
@section('title', 'Contact Us - Mirpur High School')
@section('content')
{{-- Contact Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#052e1c] via-primary to-[#12643f] text-white">
    <div class="absolute -top-24 -right-20 h-72 w-72 rounded-full bg-gold/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-20 h-72 w-72 rounded-full bg-white/10 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-gold">
                <span class="h-2 w-2 rounded-full bg-gold"></span> Get in touch
            </span>
            <h1 class="mt-6 text-4xl md:text-6xl font-black tracking-tight">We’re here to <span class="text-gold">help.</span></h1>
            <p class="mt-5 max-w-2xl text-base md:text-lg leading-8 text-white/75">Have a question about admission, academics or school activities? Send us a message or visit our campus in Sadullapur.</p>
        </div>
    </div>
</section>

<section class="relative py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-[.82fr_1.18fr] gap-8 lg:gap-10 items-start">
            {{-- Contact information --}}
            <div class="space-y-6">
                <div>
                    <span class="section-eyebrow">CONTACT DETAILS</span>
                    <h2 class="section-title text-3xl md:text-4xl mt-2">Let’s start a <span>conversation.</span></h2>
                    <p class="mt-4 text-gray-500 leading-7">For school information and assistance, please contact our office during working hours.</p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-1 gap-4">
                    <div class="rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:-translate-y-1 transition">
                        <div class="flex gap-4">
                            <div class="h-11 w-11 shrink-0 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s7-5.2 7-11a7 7 0 10-14 0c0 5.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.2" stroke-width="1.8"/></svg>
                            </div>
                            <div><p class="text-xs font-bold uppercase tracking-wider text-gold">Visit us</p><h3 class="font-bold text-gray-900 mt-1">Mirpur High School</h3><p class="text-sm text-gray-500 mt-1">Sadullapur, Gaibandha, Bangladesh</p></div>
                        </div>
                    </div>
                    <div class="rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:-translate-y-1 transition">
                        <div class="flex gap-4">
                            <div class="h-11 w-11 shrink-0 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5.8A2.8 2.8 0 015.8 3h1.1a1.7 1.7 0 011.6 1.2l1.1 3.4a1.7 1.7 0 01-.4 1.7l-1.3 1.3a14.5 14.5 0 005.5 5.5l1.3-1.3a1.7 1.7 0 011.7-.4l3.4 1.1a1.7 1.7 0 011.2 1.6v1.1a2.8 2.8 0 01-2.8 2.8C10.9 21 3 13.1 3 5.8z"/></svg>
                            </div>
                            <div><p class="text-xs font-bold uppercase tracking-wider text-gold">Call us</p><h3 class="font-bold text-gray-900 mt-1">{{ $schoolSettings?->phone ?? 'School office' }}</h3><p class="text-sm text-gray-500 mt-1">We’ll be happy to assist.</p></div>
                        </div>
                    </div>
                    <div class="rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:-translate-y-1 transition">
                        <div class="flex gap-4">
                            <div class="h-11 w-11 shrink-0 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5h16v14H4z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m4 7 8 6 8-6"/></svg>
                            </div>
                            <div><p class="text-xs font-bold uppercase tracking-wider text-gold">Email</p><h3 class="font-bold text-gray-900 mt-1 break-all">{{ $schoolSettings?->email ?? 'School office' }}</h3><p class="text-sm text-gray-500 mt-1">For general enquiries.</p></div>
                        </div>
                    </div>
                    <div class="rounded-2xl bg-white border border-gray-100 p-5 shadow-sm hover:-translate-y-1 transition">
                        <div class="flex gap-4">
                            <div class="h-11 w-11 shrink-0 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v6l4 2"/><circle cx="12" cy="12" r="8.5" stroke-width="1.8"/></svg>
                            </div>
                            <div><p class="text-xs font-bold uppercase tracking-wider text-gold">Office hours</p><h3 class="font-bold text-gray-900 mt-1">Sunday – Thursday</h3><p class="text-sm text-gray-500 mt-1">8:00 AM – 4:00 PM</p></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message form --}}
            <div class="rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-200/60 p-6 sm:p-8 lg:p-10">
                <div class="flex items-start justify-between gap-4 mb-7">
                    <div><span class="section-eyebrow">SEND A MESSAGE</span><h2 class="text-2xl md:text-3xl font-black text-gray-900 mt-2">How can we help?</h2></div>
                    <div class="hidden sm:flex h-12 w-12 rounded-2xl bg-gold/15 text-gold items-center justify-center font-black">✦</div>
                </div>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-gold">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Your full name" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-gold">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div><label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label><input type="text" name="phone" value="{{ old('phone') }}" placeholder="01XXXXXXXXX" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                        <div><label class="block text-sm font-semibold text-gray-700 mb-2">Subject</label><input type="text" name="subject" value="{{ old('subject') }}" placeholder="How can we help?" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10"></div>
                    </div>
                    <div><label class="block text-sm font-semibold text-gray-700 mb-2">Message <span class="text-gold">*</span></label><textarea name="message" rows="6" required placeholder="Write your message here..." class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10">{{ old('message') }}</textarea>@error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror</div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-3 rounded-xl bg-primary px-6 py-4 font-bold text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:opacity-95">Send Message <span>→</span></button>
                </form>
            </div>
        </div>

        {{-- Updated map --}}
        <div class="mt-10 overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-lg">
            <div class="px-6 py-5 sm:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div><span class="section-eyebrow">FIND OUR CAMPUS</span><h2 class="text-xl md:text-2xl font-black text-gray-900 mt-1">Mirpur High School, Sadullapur</h2></div>
                <span class="text-sm text-gray-500">Gaibandha, Bangladesh</span>
            </div>
            <div class="h-80 sm:h-96 bg-gray-100">
                <iframe src="https://www.google.com/maps?q=Mirpur%20High%20School%2C%20Sadullapur%2C%20Gaibandha%2C%20Bangladesh&output=embed" class="w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Mirpur High School, Sadullapur, Gaibandha map"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
