<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->paginate(15);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,docx|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('notices', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        Notice::create($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,docx|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            if ($notice->file_path) {
                Storage::disk('public')->delete($notice->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('notices', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($notice->published_at ?? now()) : null;

        $notice->update($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->file_path) {
            Storage::disk('public')->delete($notice->file_path);
        }
        $notice->delete();

        return back()->with('success', 'Notice deleted successfully.');
    }
}
