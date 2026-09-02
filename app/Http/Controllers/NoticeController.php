<?php

namespace App\Http\Controllers;

use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::published()->latest('published_at')->paginate(10);
        return view('notices.index', compact('notices'));
    }

    public function show(string $slug)
    {
        $notice = Notice::published()->where('slug', $slug)->firstOrFail();
        return view('notices.show', compact('notice'));
    }
}
