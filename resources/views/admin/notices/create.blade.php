@extends('layouts.admin')
@section('title', 'Add Notice')
@section('page-title', 'Add New Notice')

@section('content')
<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    <form action="{{ route('admin.notices.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @include('admin.notices._form')
        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Create Notice</button>
    </form>
</div>
@endsection
