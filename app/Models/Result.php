<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Result extends Model {
    use HasFactory;
    protected $fillable = ['student_id','exam_name','academic_year','subject','subject_code','full_marks','pass_marks','marks','grade','grade_point'];
    public function student() { return $this->belongsTo(Student::class); }
    public function getCalculatedGradeAttribute(): string {
        $p = ($this->marks / max((float)$this->full_marks, 1)) * 100;
        return match (true) {
            $p >= 80 => 'A+',
            $p >= 70 => 'A',
            $p >= 60 => 'A-',
            $p >= 50 => 'B',
            $p >= 40 => 'C',
            $p >= 33 => 'D',
            default => 'F',
        };
    }
}
