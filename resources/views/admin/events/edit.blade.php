@extends('layouts.admin')
@section('title', 'Edit Event')
@section('page-title', 'Edit Event')

@section('content')
<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        @include('admin.events._form', ['event' => $event])
        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Update Event</button>
    </form>
</div>
@endsection
