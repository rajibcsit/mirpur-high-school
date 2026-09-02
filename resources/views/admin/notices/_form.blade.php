<div>
    <label class="block text-sm font-medium mb-1">Title *</label>
    <input type="text" name="title" value="{{ old('title', $notice->title ?? '') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Category *</label>
    <select name="category" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
        @foreach(['general','exam','admission','result','holiday'] as $cat)
            <option value="{{ $cat }}" @selected(old('category', $notice->category ?? '') == $cat)>{{ ucfirst($cat) }}</option>
        @endforeach
    </select>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Content *</label>
    <textarea name="content" rows="6" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">{{ old('content', $notice->content ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Attachment (PDF/Image, optional)</label>
    <input type="file" name="file" class="w-full border rounded-lg px-4 py-2">
    @isset($notice)
        @if($notice->file_path)
            <p class="text-xs text-gray-500 mt-1">Current: <a href="{{ asset('storage/'.$notice->file_path) }}" class="text-primary hover:underline" target="_blank">View file</a></p>
        @endif
    @endisset
</div>

<label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="is_published" value="1" class="rounded" @checked(old('is_published', $notice->is_published ?? true))>
    Publish immediately
</label>
