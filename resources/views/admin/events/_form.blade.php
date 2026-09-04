@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Event Title</label>
        <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" required class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
        <input type="date" name="event_date" value="{{ old('event_date', isset($event) && $event->event_date ? $event->event_date->format('Y-m-d') : '') }}" required class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Event Time</label>
        <input type="time" name="event_time" value="{{ old('event_time', $event->event_time ?? '') }}" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
        <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" rows="7" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">{{ old('description', $event->description ?? '') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
        <input type="file" name="cover_image" accept="image/jpeg,image/png,image/webp" class="w-full rounded-lg border border-gray-300 p-2 bg-white">
    </div>
</div>
<div class="flex gap-3 mt-8">
    <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white hover:bg-primary-dark">{{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
    <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-700">Cancel</a>
</div>
