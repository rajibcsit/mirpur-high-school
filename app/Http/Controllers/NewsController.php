<?php
namespace App\Http\Controllers;
use App\Models\News;
class NewsController extends Controller {
    public function index(){ $news=News::where('is_published', true)->latest('created_at')->latest('published_at')->paginate(12); return view('news.index',compact('news')); }
    public function show(string $slug){ $item=News::where('is_published', true)->where('slug',$slug)->firstOrFail(); return view('news.show',compact('item')); }
}
