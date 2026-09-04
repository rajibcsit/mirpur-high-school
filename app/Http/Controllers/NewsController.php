<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Show all published news.
     *
     * A news item marked as published is visible immediately. We intentionally
     * do not filter by published_at here because the admin's Publish switch is
     * the source of truth for visibility.
     */
    public function index()
    {
        $news = News::query()
            ->where('is_published', true)
            ->orderByDesc('created_at')
            ->orderByDesc('published_at')
            ->paginate(12);

        return view('news.index', compact('news'));
    }

    /**
     * Show one published news item.
     */
    public function show(string $slug)
    {
        $item = News::query()
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', compact('item'));
    }
}
