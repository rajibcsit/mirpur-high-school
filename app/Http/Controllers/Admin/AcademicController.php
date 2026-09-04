<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AcademicController extends Controller
{
    public function index(Request $request)
    {
        $academics = Academic::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->search);
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('category'), fn ($q) => $q->where('category', $request->category))
            ->when($request->has('status') && $request->status !== '', fn ($q) => $q->where('is_active', $request->boolean('status')))
            ->orderBy('category')
            ->orderBy('display_order')
            ->orderBy('title')
            ->paginate(15)
            ->withQueryString();

        $categories = ['class', 'subject', 'program', 'facility'];

        return view('admin.academics.index', compact('academics', 'categories'));
    }

    public function create()
    {
        return view('admin.academics.create', [
            'academic' => new Academic(['is_active' => true, 'display_order' => 0]),
        ]);
    }

    public function store(Request $request)
    {
        Academic::create($this->validateData($request));

        return redirect()
            ->route('admin.academics.index')
            ->with('success', 'Academic item added successfully.');
    }

    public function edit(Academic $academic)
    {
        return view('admin.academics.edit', compact('academic'));
    }

    public function update(Request $request, Academic $academic)
    {
        $academic->update($this->validateData($request));

        return redirect()
            ->route('admin.academics.index')
            ->with('success', 'Academic item updated successfully.');
    }

    public function destroy(Academic $academic)
    {
        $academic->delete();

        return back()->with('success', 'Academic item deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(['class', 'subject', 'program', 'facility'])],
            'description' => ['nullable', 'string', 'max:5000'],
            'icon' => ['nullable', 'string', 'max:20'],
            'display_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'is_active' => ['nullable', 'boolean'],
        ]) + [
            'display_order' => (int) $request->input('display_order', 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
