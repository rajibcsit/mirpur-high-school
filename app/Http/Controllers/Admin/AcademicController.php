<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index()
    {
        $academics = Academic::orderBy('category')->orderBy('display_order')->paginate(20);
        return view('admin.academics.index', compact('academics'));
    }

    public function create()
    {
        return view('admin.academics.create', ['academic' => new Academic(['is_active' => true])]);
    }

    public function store(Request $request)
    {
        $academic = $this->validateData($request);
        Academic::create($academic);
        return redirect()->route('admin.academics.index')->with('success', 'Academic item added successfully.');
    }

    public function edit(Academic $academic)
    {
        return view('admin.academics.edit', compact('academic'));
    }

    public function update(Request $request, Academic $academic)
    {
        $academic->update($this->validateData($request));
        return redirect()->route('admin.academics.index')->with('success', 'Academic item updated successfully.');
    }

    public function destroy(Academic $academic)
    {
        $academic->delete();
        return back()->with('success', 'Academic item deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:class,subject,program,facility',
            'description' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:20',
            'display_order' => 'nullable|integer|min:0|max:9999',
            'is_active' => 'nullable|boolean',
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
