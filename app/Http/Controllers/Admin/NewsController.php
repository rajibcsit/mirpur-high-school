<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class NewsController extends Controller {
    public function index(){ $news=News::latest()->paginate(15); return view('admin.news.index',compact('news')); }
    public function create(){ $news=new News(); return view('admin.news.create',compact('news')); }
    public function store(Request $request){
        $data=$request->validate(['title'=>'required|string|max:255','category'=>'nullable|string|max:80','excerpt'=>'nullable|string|max:500','content'=>'nullable|string','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:4096','external_url'=>'nullable|url|max:500','is_published'=>'nullable|boolean','is_featured'=>'nullable|boolean','published_at'=>'nullable|date']);
        if($request->hasFile('image')) $data['image_path']=$request->file('image')->store('news','public');
        $data['slug']=Str::slug($data['title']).'-'.Str::lower(Str::random(5)); $data['is_published']=$request->boolean('is_published'); $data['is_featured']=$request->boolean('is_featured');
        if($data['is_published'] && empty($data['published_at'])) $data['published_at']=now(); News::create($data);
        return redirect()->route('admin.news.index')->with('success','News published successfully.');
    }
    public function edit(News $news){ return view('admin.news.edit',compact('news')); }
    public function update(Request $request,News $news){
        $data=$request->validate(['title'=>'required|string|max:255','category'=>'nullable|string|max:80','excerpt'=>'nullable|string|max:500','content'=>'nullable|string','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:4096','external_url'=>'nullable|url|max:500','is_published'=>'nullable|boolean','is_featured'=>'nullable|boolean','published_at'=>'nullable|date']);
        if($request->hasFile('image')){ if($news->image_path) Storage::disk('public')->delete($news->image_path); $data['image_path']=$request->file('image')->store('news','public'); }
        if($data['title']!==$news->title) $data['slug']=Str::slug($data['title']).'-'.Str::lower(Str::random(5));
        $data['is_published']=$request->boolean('is_published'); $data['is_featured']=$request->boolean('is_featured'); if($data['is_published'] && empty($data['published_at'])) $data['published_at']=$news->published_at??now();
        $news->update($data); return redirect()->route('admin.news.index')->with('success','News updated successfully.');
    }
    public function destroy(News $news){ if($news->image_path) Storage::disk('public')->delete($news->image_path); $news->delete(); return back()->with('success','News deleted successfully.'); }
}
