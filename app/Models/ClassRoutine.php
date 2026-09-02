<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ClassRoutine extends Model {
    use HasFactory;
    protected $fillable = ['class_name','section','academic_year','day','start_time','end_time','subject','teacher','room','display_order'];
}
