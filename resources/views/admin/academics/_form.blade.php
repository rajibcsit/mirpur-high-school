<form action="{{ $action }}" method="POST" class="space-y-6">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div>
        <label class="block text-sm font-bold mb-2">Title *</label>
        <input name="title" required
               value="{{ old('title', $academic->title) }}"
               placeholder="Class VI / Mathematics / Science Club / Computer Lab"
               class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary">
    </div>

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-bold mb-2">Category *</label>
            <select name="category" required class="w-full border border-gray-200 rounded-xl px-4 py-3">
                <option value="class" @selected(old('category',$academic->category)==='class')>Class</option>
                <option value="subject" @selected(old('category',$academic->category)==='subject')>Subject</option>
                <option value="program" @selected(old('category',$academic->category)==='program')>Program</option>
                <option value="facility" @selected(old('category',$academic->category)==='facility')>Facility</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Controls which section shows the item on Academics.</p>
        </div>

        <div>
            <label class="block text-sm font-bold mb-2">Icon / Short Mark</label>
            <input name="icon" maxlength="20"
                   value="{{ old('icon',$academic->icon) }}"
                   placeholder="VI / ∑ / 🏫 / ⚽"
                   class="w-full border border-gray-200 rounded-xl px-4 py-3">
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold mb-2">Description</label>
        <textarea name="description" rows="5" maxlength="5000"
                  placeholder="Short description shown on the public Academics page."
                  class="w-full border border-gray-200 rounded-xl px-4 py-3">{{ old('description',$academic->description) }}</textarea>
    </div>

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-bold mb-2">Display Order</label>
            <input type="number" min="0" max="9999" name="display_order"
                   value="{{ old('display_order',$academic->display_order ?? 0) }}"
                   class="w-full border border-gray-200 rounded-xl px-4 py-3">
            <p class="text-xs text-gray-400 mt-1">Lower numbers appear first.</p>
        </div>

        <label class="flex items-center gap-3 sm:mt-8 font-semibold cursor-pointer">
            <input type="checkbox" name="is_active" value="1"
                   @checked(old('is_active', $academic->is_active ?? true))
                   class="w-5 h-5 rounded">
            <span>
                Show on website
                <span class="block text-xs text-gray-400 font-normal">Turn off to hide without deleting.</span>
            </span>
        </label>
    </div>

    <div class="flex gap-3 pt-2">
        <button class="bg-primary text-white px-6 py-3 rounded-xl font-bold hover:bg-primary-dark">
            {{ $button }}
        </button>
        <a href="{{ route('admin.academics.index') }}" class="bg-gray-100 px-6 py-3 rounded-xl font-bold">
            Cancel
        </a>
    </div>
</form>
