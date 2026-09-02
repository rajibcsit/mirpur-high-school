<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'designation', 'subject', 'qualification', 'photo_path', 'email', 'phone', 'display_order',
    ];
}
