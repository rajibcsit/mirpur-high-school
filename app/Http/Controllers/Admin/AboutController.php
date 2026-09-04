<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $settings = Setting::firstOrCreate([], ['school_name' => 'Mirpur High School']);
        return view('admin.about.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::firstOrCreate([], ['school_name' => 'Mirpur High School']);

        $data = $request->validate([
            'about_title' => 'nullable|string|max:255',
            'about_intro' => 'nullable|string|max:2000',
            'about_history' => 'nullable|string|max:10000',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'mission' => 'nullable|string|max:5000',
            'vision' => 'nullable|string|max:5000',
            'principal_message_title' => 'nullable|string|max:255',
            'principal_message' => 'nullable|string|max:8000',
            'principal_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'stat_students' => 'nullable|string|max:30',
            'stat_teachers' => 'nullable|string|max:30',
            'stat_years' => 'nullable|string|max:30',
            'stat_achievements' => 'nullable|string|max:30',
        ]);

        if ($request->hasFile('about_image')) {
            if ($settings->about_image_path) Storage::disk('public')->delete($settings->about_image_path);
            $data['about_image_path'] = $request->file('about_image')->store('about', 'public');
        }
        if ($request->hasFile('principal_photo')) {
            if ($settings->principal_photo_path) Storage::disk('public')->delete($settings->principal_photo_path);
            $data['principal_photo_path'] = $request->file('principal_photo')->store('about', 'public');
        }

        unset($data['about_image'], $data['principal_photo']);
        $settings->update($data);

        return back()->with('success', 'About page content updated successfully.');
    }
}
