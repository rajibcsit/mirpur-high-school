@extends('layouts.admin')
@section('title', 'Message Details')
@section('page-title', 'Contact Message')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow p-8">
    <div class="grid grid-cols-2 gap-y-4 text-sm mb-6">
        <p class="text-gray-500">Name</p><p class="font-medium">{{ $message->name }}</p>
        <p class="text-gray-500">Email</p><p class="font-medium">{{ $message->email }}</p>
        <p class="text-gray-500">Phone</p><p class="font-medium">{{ $message->phone ?: '—' }}</p>
        <p class="text-gray-500">Subject</p><p class="font-medium">{{ $message->subject ?: '—' }}</p>
        <p class="text-gray-500">Received</p><p class="font-medium">{{ $message->created_at->format('d M, Y h:i A') }}</p>
    </div>
    <div>
        <p class="text-gray-500 text-sm mb-2">Message</p>
        <p class="bg-gray-50 rounded-lg p-4 text-sm leading-relaxed">{{ $message->message }}</p>
    </div>
    <a href="mailto:{{ $message->email }}" class="inline-block mt-6 bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">Reply via Email</a>
</div>
@endsection
