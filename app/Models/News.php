<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class News extends Model {
    use HasFactory;
    protected $fillable=['title','slug','category','excerpt','content','image_path','external_url','is_published','is_featured','published_at'];
    protected function casts(): array { return ['is_published'=>'boolean','is_featured'=>'boolean','published_at'=>'datetime']; }
    protected static function booted(){ static::creating(function($news){ $news->slug=Str::slug($news->title).'-'.Str::lower(Str::random(5)); }); }
    public function scopePublished($q){ return $q->where('is_published',true)->where(function($q){$q->whereNull('published_at')->orWhere('published_at','<=',now());}); }
}
