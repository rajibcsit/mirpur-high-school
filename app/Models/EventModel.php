<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title', 'description', 'location', 'event_date', 'event_time', 'cover_image',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }
}
