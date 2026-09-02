@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    @php
        $cards = [
            ['label' => 'Notices', 'value' => $stats['notices'], 'icon' => '📢', 'color' => 'bg-blue-500'],
            ['label' => 'Events', 'value' => $stats['events'], 'icon' => '📅', 'color' => 'bg-purple-500'],
            ['label' => 'Gallery Images', 'value' => $stats['gallery'], 'icon' => '🖼️', 'color' => 'bg-pink-500'],
            ['label' => 'Teachers', 'value' => $stats['teachers'], 'icon' => '👩‍🏫', 'color' => 'bg-green-500'],
            ['label' => 'Admissions', 'value' => $stats['admissions'], 'icon' => '📝', 'color' => 'bg-yellow-500'],
            ['label' => 'Pending Admissions', 'value' => $stats['pending_admissions'], 'icon' => '⏳', 'color' => 'bg-orange-500'],
            ['label' => 'Unread Messages', 'value' => $stats['unread_messages'], 'icon' => '✉️', 'color' => 'bg-red-500'],
        ];
    @endphp
    @foreach($cards as $card)
        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg {{ $card['color'] }} text-white flex items-center justify-center text-xl">{{ $card['icon'] }}</div>
            <div>
                <p class="text-2xl font-bold">{{ $card['value'] }}</p>
                <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
            </div>
        </div>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold mb-4">Recent Admission Applications</h3>
        <div class="space-y-3">
            @forelse($recentAdmissions as $a)
                <a href="{{ route('admin.admissions.show', $a) }}" class="flex justify-between items-center text-sm border-b pb-3 hover:text-primary">
                    <span>{{ $a->student_name }} — {{ $a->class_applied }}</span>
                    <span class="px-2 py-1 rounded text-xs font-semibold
                        {{ $a->status === 'approved' ? 'bg-green-100 text-green-700' : ($a->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($a->status) }}
                    </span>
                </a>
            @empty
                <p class="text-gray-500 text-sm">No admission applications yet.</p>
            @endforelse
        </div>
        <a href="{{ route('admin.admissions.index') }}" class="text-primary text-sm font-semibold mt-4 inline-block hover:underline">View All →</a>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold mb-4">Recent Contact Messages</h3>
        <div class="space-y-3">
            @forelse($recentMessages as $m)
                <a href="{{ route('admin.messages.show', $m) }}" class="flex justify-between items-center text-sm border-b pb-3 hover:text-primary">
                    <span>{{ $m->name }} — {{ Str::limit($m->subject ?: $m->message, 30) }}</span>
                    @if(!$m->is_read)
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-700">New</span>
                    @endif
                </a>
            @empty
                <p class="text-gray-500 text-sm">No messages yet.</p>
            @endforelse
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-primary text-sm font-semibold mt-4 inline-block hover:underline">View All →</a>
    </div>
</div>
@endsection
