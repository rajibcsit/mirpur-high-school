<div>
    <label class="block text-sm font-medium mb-1">Title *</label>
    <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Description</label>
    <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">{{ old('description', $event->description ?? '') }}</textarea>
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium mb-1">Event Date *</label>
        <input type="date" name="event_date" value="{{ old('event_date', isset($event) ? $event->event_date->format('Y-m-d') : '') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Event Time</label>
        <input type="text" name="event_time" placeholder="e.g. 10:00 AM" value="{{ old('event_time', $event->event_time ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Location</label>
    <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Cover Image</label>
    <input type="file" name="cover_image" class="w-full border rounded-lg px-4 py-2">
    @isset($event)
        @if($event->cover_image)
            <img src="{{ asset('storage/'.$event->cover_image) }}" class="w-32 h-20 object-cover rounded mt-2">
        @endif
    @endisset
</div>
