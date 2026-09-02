<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'category', 'content', 'file_path', 'is_published', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($notice) {
            $notice->slug = Str::slug($notice->title) . '-' . Str::random(5);
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
