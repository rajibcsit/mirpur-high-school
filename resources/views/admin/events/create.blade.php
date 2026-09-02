@extends('layouts.admin')
@section('title', 'Add Event')
@section('page-title', 'Add New Event')

@section('content')
<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @include('admin.events._form')
        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Create Event</button>
    </form>
</div>
@endsection
