@extends('layouts.admin')
@section('title', 'Edit Academic')
@section('page-title', 'Edit Academic')
@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">@include('admin.academics._form', ['academic' => $academic, 'action' => route('admin.academics.update', $academic), 'method' => 'PUT', 'button' => 'Update Academic'])</div>
@endsection
