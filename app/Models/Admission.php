<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 'father_name', 'mother_name', 'dob', 'gender',
        'class_applied', 'previous_school', 'guardian_phone', 'guardian_email',
        'address', 'status', // pending, approved, rejected
    ];

    protected function casts(): array
    {
        return [
            'dob' => 'date',
        ];
    }
}
