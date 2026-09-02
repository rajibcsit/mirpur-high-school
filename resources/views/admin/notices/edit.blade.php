@extends('layouts.admin')
@section('title', 'Edit Notice')
@section('page-title', 'Edit Notice')

@section('content')
<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        @include('admin.notices._form', ['notice' => $notice])
        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">Update Notice</button>
    </form>
</div>
@endsection
