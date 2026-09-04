@extends('layouts.admin')

@section('title', 'Academics')
@section('page-title', 'Manage Academics')

@section('content')

<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
    <div>
        <p class="text-sm text-gray-500">
            Manage classes, subjects, academic programs and facilities displayed on the public Academics page.
        </p>
    </div>
    <a href="{{ route('admin.academics.create') }}"
       class="inline-flex items-center justify-center bg-primary text-white px-5 py-3 rounded-xl font-semibold hover:bg-primary-dark transition">
        + Add Academic
    </a>
</div>

{{-- Filters --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <form method="GET" action="{{ route('admin.academics.index') }}"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">Search</label>
            <input type="search" name="search" value="{{ request('search') }}"
                   placeholder="Title or description..."
                   class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">Category</label>
            <select name="category" class="w-full border border-gray-200 rounded-xl px-4 py-3">
                <option value="">All Categories</option>
                @foreach($categories as $itemCategory)
                    <option value="{{ $itemCategory }}" @selected(request('category') === $itemCategory)>
                        {{ ucfirst($itemCategory) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wide text-gray-500 mb-2">Status</label>
            <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-3">
                <option value="">All Status</option>
                <option value="1" @selected(request('status') === '1')>Active</option>
                <option value="0" @selected(request('status') === '0')>Hidden</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button class="flex-1 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark">
                Filter
            </button>
            <a href="{{ route('admin.academics.index') }}"
               class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold">
                Reset
            </a>
        </div>
    </form>
</div>

<div class="grid gap-4">
@forelse($academics as $academic)
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col md:flex-row md:items-center gap-5">
        <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary grid place-items-center text-xl font-black shrink-0">
            {{ $academic->icon ?: '📚' }}
        </div>

        <div class="flex-1 min-w-0">
            <div class="flex flex-wrap gap-2 items-center">
                <h3 class="font-bold text-lg">{{ $academic->title }}</h3>

                <span class="text-xs px-2.5 py-1 rounded-full bg-gray-100 text-gray-600 uppercase font-bold">
                    {{ $academic->category }}
                </span>

                <span class="text-xs px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold">
                    Order: {{ $academic->display_order }}
                </span>

                <span class="text-xs px-2.5 py-1 rounded-full {{ $academic->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $academic->is_active ? 'Active' : 'Hidden' }}
                </span>
            </div>

            @if($academic->description)
                <p class="text-sm text-gray-500 mt-2">{{ $academic->description }}</p>
            @endif
        </div>

        <div class="flex gap-3 shrink-0">
            <a href="{{ route('admin.academics.edit', $academic) }}"
               class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200">
                Edit
            </a>

            <form method="POST" action="{{ route('admin.academics.destroy', $academic) }}"
                  onsubmit="return confirm('Delete this academic item?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-lg bg-red-50 text-red-600 font-semibold hover:bg-red-100">
                    Delete
                </button>
            </form>
        </div>
    </div>
@empty
    <div class="bg-white rounded-2xl p-12 text-center border border-gray-100">
        <div class="text-4xl mb-3">📚</div>
        <h3 class="font-bold text-lg">No academic records found</h3>
        <p class="text-gray-500 text-sm mt-1">Try changing your filters or add a new academic item.</p>
    </div>
@endforelse
</div>

<div class="mt-6">
    {{ $academics->links() }}
</div>

@endsection
