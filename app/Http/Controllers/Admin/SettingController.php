<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::firstOrCreate([], [
            'school_name' => 'Mirpur High School',
            'short_name' => 'MHS',
            'tagline' => 'Excellence in Education',
            'site_title' => 'Mirpur High School - Official Website',
            'site_description' => 'Quality education, discipline, character development and a brighter future for every learner.',
        ]);

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::firstOrCreate([], ['school_name' => 'Mirpur High School']);

        $data = $request->validate([
            'school_name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'tagline' => 'nullable|string|max:255',
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'alternate_phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'facebook_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'website_url' => 'nullable|url|max:500',
            'established_year' => 'nullable|string|max:10',
            'principal_name' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('logo')) {
            if ($settings->logo_path) {
                Storage::disk('public')->delete($settings->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon_path) {
                Storage::disk('public')->delete($settings->favicon_path);
            }
            $data['favicon_path'] = $request->file('favicon')->store('settings', 'public');
        }

        unset($data['logo'], $data['favicon']);
        $settings->update($data);

        return back()->with('success', 'School settings updated successfully.');
    }
}
