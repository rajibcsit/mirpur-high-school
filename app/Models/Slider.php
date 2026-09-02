<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model {
    use HasFactory;
    protected $fillable = ['title','subtitle','description','image_path','button_text','button_url','is_active','display_order'];
    protected function casts(): array { return ['is_active'=>'boolean']; }
}
