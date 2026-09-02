<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium mb-1">Full Name *</label>
        <input type="text" name="name" value="{{ old('name', $teacher->name ?? '') }}" required class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Designation</label>
        <input type="text" name="designation" value="{{ old('designation', $teacher->designation ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium mb-1">Subject</label>
        <input type="text" name="subject" value="{{ old('subject', $teacher->subject ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Qualification</label>
        <input type="text" name="qualification" value="{{ old('qualification', $teacher->qualification ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $teacher->phone ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
    </div>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Display Order</label>
    <input type="number" name="display_order" value="{{ old('display_order', $teacher->display_order ?? 0) }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Photo</label>
    <input type="file" name="photo" accept="image/*" class="w-full border rounded-lg px-4 py-2">
    @isset($teacher)
        @if($teacher->photo_path)
            <img src="{{ asset('storage/'.$teacher->photo_path) }}" class="w-20 h-20 object-cover rounded-full mt-2">
        @endif
    @endisset
</div>
