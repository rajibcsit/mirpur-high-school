<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index(Request $request)
    {
        $query = Academic::query()->where('is_active', true);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $items = $query
            ->orderBy('category')
            ->orderBy('display_order')
            ->orderBy('title')
            ->get();

        return view('academics.index', [
            'academics' => $items,
            'classes' => $items->where('category', 'class')->values(),
            'subjects' => $items->where('category', 'subject')->values(),
            'programs' => $items->where('category', 'program')->values(),
            'facilities' => $items->where('category', 'facility')->values(),
            'categories' => $items->pluck('category')->unique()->values(),
        ]);
    }
}
