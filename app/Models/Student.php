<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model {
    use HasFactory;
    protected $fillable = ['student_id','name','roll_no','registration_no','class_name','section','academic_year','father_name','mother_name','date_of_birth','photo_path','is_active'];
    protected function casts(): array { return ['date_of_birth'=>'date','is_active'=>'boolean']; }
    public function results() { return $this->hasMany(Result::class); }
}
