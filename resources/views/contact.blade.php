@extends('layouts.app')
@section('title', 'Contact Us - Mirpur High School')

@section('content')
<section class="bg-primary text-white py-16 text-center">
    <h1 class="text-4xl font-bold">Contact Us</h1>
    <p class="text-gray-200 mt-2">We'd love to hear from you</p>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid md:grid-cols-2 gap-10">
    <div>
        <h2 class="text-2xl font-bold text-primary mb-6">Get in Touch</h2>
        <div class="space-y-4 text-gray-700">
            <p>📍 <strong>Address:</strong> Mirpur, Dhaka, Bangladesh</p>
            <p>📞 <strong>Phone:</strong> +880-1XXX-XXXXXX</p>
            <p>✉️ <strong>Email:</strong> info@mirpurhighschool.edu</p>
            <p>🕐 <strong>Office Hours:</strong> Sunday - Thursday, 8:00 AM - 4:00 PM</p>
        </div>
        <div class="mt-8 rounded-xl overflow-hidden shadow h-64">
            <iframe src="https://www.google.com/maps?q=Mirpur,Dhaka&output=embed" class="w-full h-full border-0" loading="lazy"></iframe>
        </div>
    </div>

    <div class="bg-white p-8 rounded-xl shadow">
        <h2 class="text-xl font-bold text-primary mb-6">Send a Message</h2>
        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Phone (optional)</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Subject</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Message</label>
                <textarea name="message" rows="4" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition w-full">Send Message</button>
        </form>
    </div>
</section>
@endsection
