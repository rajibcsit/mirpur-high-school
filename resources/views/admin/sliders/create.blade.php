@extends('layouts.admin')
@section('title','Add Slider') @section('page-title','Add Hero Slider')
@section('content')<div class="max-w-4xl bg-white rounded-xl shadow p-6"><form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">@csrf
<div class="grid md:grid-cols-2 gap-5">
<div><label class="block text-sm font-semibold mb-2">Title *</label><input name="title" value="{{ old('title',$slider->title ?? '') }}" required class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Subtitle</label><input name="subtitle" value="{{ old('subtitle',$slider->subtitle ?? '') }}" class="w-full border rounded-lg px-3 py-2"></div>
<div class="md:col-span-2"><label class="block text-sm font-semibold mb-2">Description</label><textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2">{{ old('description',$slider->description ?? '') }}</textarea></div>
<div><label class="block text-sm font-semibold mb-2">Hero Image</label><input type="file" name="image" accept="image/*" class="w-full border rounded-lg px-3 py-2">@if(!empty($slider?->image_path))<img src="{{ asset('storage/'.$slider->image_path) }}" class="mt-3 h-28 rounded object-cover">@endif</div>
<div><label class="block text-sm font-semibold mb-2">Display Order</label><input type="number" min="0" name="display_order" value="{{ old('display_order',$slider->display_order ?? 0) }}" class="w-full border rounded-lg px-3 py-2"></div>
<div><label class="block text-sm font-semibold mb-2">Button Text</label><input name="button_text" value="{{ old('button_text',$slider->button_text ?? '') }}" class="w-full border rounded-lg px-3 py-2" placeholder="Apply for Admission"></div>
<div><label class="block text-sm font-semibold mb-2">Button URL</label><input name="button_url" value="{{ old('button_url',$slider->button_url ?? '') }}" class="w-full border rounded-lg px-3 py-2" placeholder="/admission"></div>
<label class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$slider->is_active ?? true))> <span class="text-sm font-semibold">Active slide</span></label>
</div>
<div class="mt-6"><button class="bg-primary text-white px-6 py-2 rounded-lg">Save Slider</button></div></form></div>@endsection
