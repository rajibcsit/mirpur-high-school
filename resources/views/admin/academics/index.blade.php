@extends('layouts.admin')
@section('title', 'Academics')
@section('page-title', 'Manage Academics')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-5">
        <div>
            <span class="text-xs font-black tracking-[.18em] text-primary uppercase">Academic Management</span>
            <h2 class="text-2xl md:text-3xl font-black text-gray-900 mt-2">Academics</h2>
            <p class="text-gray-500 mt-1">Manage classes, subjects, programs and facilities displayed on the public Academics page.</p>
        </div>
        <a href="{{ route('admin.academics.create') }}" class="inline-flex items-center justify-center gap-2 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark transition shadow-lg shadow-primary/10">
            <span class="text-lg">+</span> Add Academic
        </a>
    </div>

    @php
        $counts = [
            'all' => \App\Models\Academic::count(),
            'class' => \App\Models\Academic::where('category','class')->count(),
            'subject' => \App\Models\Academic::where('category','subject')->count(),
            'program' => \App\Models\Academic::where('category','program')->count(),
            'facility' => \App\Models\Academic::where('category','facility')->count(),
        ];
    @endphp

    <div class="grid grid-cols-2 lg:grid-cols-5 gap-3">
        @foreach([
            ['all','All','📚'],['class','Classes','🎓'],['subject','Subjects','📖'],['program','Programs','✦'],['facility','Facilities','🏫']
        ] as [$key,$label,$icon])
        <a href="{{ route('admin.academics.index', $key === 'all' ? [] : ['category'=>$key]) }}"
           class="bg-white border rounded-2xl p-4 hover:-translate-y-1 transition {{ request('category') === $key || (!request('category') && $key === 'all') ? 'border-primary ring-2 ring-primary/10' : 'border-gray-100' }}">
            <div class="text-xl">{{ $icon }}</div>
            <div class="text-2xl font-black mt-2 text-gray-900">{{ $counts[$key] }}</div>
            <div class="text-xs font-bold text-gray-500 uppercase tracking-wider">{{ $label }}</div>
        </a>
        @endforeach
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl p-4 shadow-sm">
        <form method="GET" class="grid md:grid-cols-[1fr_180px_150px_auto] gap-3">
            <input name="search" value="{{ request('search') }}" placeholder="Search academic title or description..."
                   class="w-full border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
            <select name="category" class="border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20">
                <option value="">All categories</option>
                @foreach(['class'=>'Class','subject'=>'Subject','program'=>'Program','facility'=>'Facility'] as $value=>$label)
                    <option value="{{ $value }}" @selected(request('category') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            <select name="status" class="border border-gray-200 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary/20">
                <option value="">All status</option>
                <option value="active" @selected(request('status') === 'active')>Active</option>
                <option value="inactive" @selected(request('status') === 'inactive')>Hidden</option>
            </select>
            <button class="bg-gray-900 text-white rounded-xl px-5 py-3 font-bold hover:bg-primary transition">Filter</button>
        </form>
    </div>

    <div class="space-y-3">
        @forelse($academics as $academic)
            <article class="bg-white border border-gray-100 rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-md transition">
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary grid place-items-center text-xl font-black shrink-0">
                        {{ $academic->icon ?: '📚' }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-black text-lg text-gray-900">{{ $academic->title }}</h3>
                            <span class="text-[10px] px-2.5 py-1 rounded-full bg-primary/10 text-primary uppercase font-black">{{ $academic->category }}</span>
                            <span class="text-[10px] px-2.5 py-1 rounded-full {{ $academic->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} uppercase font-black">
                                {{ $academic->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $academic->description ?: 'No description added.' }}</p>
                        <p class="text-xs text-gray-400 mt-2">Display order: {{ $academic->display_order }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.academics.edit', $academic) }}" class="px-4 py-2.5 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-primary hover:text-white transition">Edit</a>
                        <form method="POST" action="{{ route('admin.academics.destroy', $academic) }}" onsubmit="return confirm('Delete this academic item?')">
                            @csrf @method('DELETE')
                            <button class="px-4 py-2.5 rounded-xl bg-red-50 text-red-600 font-bold hover:bg-red-600 hover:text-white transition">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="bg-white border border-dashed border-gray-300 rounded-2xl p-12 text-center">
                <div class="text-4xl">📚</div>
                <h3 class="font-black text-xl mt-3">No academic items found</h3>
                <p class="text-gray-500 mt-1">Create your first class, subject, program or facility.</p>
                <a href="{{ route('admin.academics.create') }}" class="inline-flex mt-5 bg-primary text-white px-5 py-3 rounded-xl font-bold">Add Academic</a>
            </div>
        @endforelse
    </div>

    <div>{{ $academics->withQueryString()->links() }}</div>
</div>
@endsection
