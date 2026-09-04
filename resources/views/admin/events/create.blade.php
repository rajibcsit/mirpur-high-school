@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Add New Event</h1>
        <p class="text-gray-500 mt-1">Create an event for the school website.</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.events._form')
        </form>
    </div>
</div>
@endsection
