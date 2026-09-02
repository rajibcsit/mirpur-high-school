<?php

namespace Database\Seeders;

use App\Models\Notice;
use App\Models\Slider;
use App\Models\Student;
use App\Models\Result;
use App\Models\ClassRoutine;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mirpurhighschool.edu',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        Notice::create([
            'title' => 'Annual Examination Routine Published',
            'category' => 'exam',
            'content' => 'The annual examination routine for all classes has been published. Please check the notice board for details.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        Notice::create([
            'title' => 'Admission Circular 2026',
            'category' => 'admission',
            'content' => 'Mirpur ML High School is now accepting admission applications for the academic year 2026. Apply online through our admission form.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        Teacher::create([
            'name' => 'Mohammad Rahman',
            'designation' => 'Headmaster',
            'subject' => 'Administration',
            'qualification' => 'M.Ed, University of Dhaka',
            'display_order' => 1,
        ]);

        Teacher::create([
            'name' => 'Nasrin Akter',
            'designation' => 'Assistant Headmistress',
            'subject' => 'English',
            'qualification' => 'MA in English, University of Dhaka',
            'display_order' => 2,
        ]);

        Slider::create([
            'title' => 'A Better Future Starts Here',
            'subtitle' => 'Welcome to Mirpur ML High School',
            'description' => 'Quality education, discipline and character development for every learner.',
            'button_text' => 'Apply for Admission',
            'button_url' => '/admission',
            'is_active' => true,
            'display_order' => 1,
        ]);

        Slider::create([
            'title' => 'Learn. Grow. Lead.',
            'subtitle' => 'Excellence in Education',
            'description' => 'Discover a supportive learning environment where students can reach their full potential.',
            'button_text' => 'Check Results',
            'button_url' => '/results',
            'is_active' => true,
            'display_order' => 2,
        ]);

        $student = Student::create([
            'student_id' => 'MHS-1001',
            'name' => 'Demo Student',
            'roll_no' => '1',
            'registration_no' => 'MHS-REG-1001',
            'class_name' => '8',
            'section' => 'A',
            'academic_year' => 2026,
            'father_name' => 'Demo Father',
            'is_active' => true,
        ]);

        foreach ([
            ['subject'=>'Bangla','marks'=>82],
            ['subject'=>'English','marks'=>76],
            ['subject'=>'Mathematics','marks'=>91],
            ['subject'=>'Science','marks'=>68],
        ] as $row) {
            $grade = $row['marks'] >= 80 ? 'A+' : ($row['marks'] >= 70 ? 'A' : ($row['marks'] >= 60 ? 'A-' : 'B'));
            $point = $row['marks'] >= 80 ? 5.00 : ($row['marks'] >= 70 ? 4.00 : ($row['marks'] >= 60 ? 3.50 : 3.00));
            Result::create([
                'student_id'=>$student->id,'exam_name'=>'Annual Examination','academic_year'=>2026,
                'subject'=>$row['subject'],'full_marks'=>100,'pass_marks'=>33,'marks'=>$row['marks'],
                'grade'=>$grade,'grade_point'=>$point
            ]);
        }

        foreach ([
            ['day'=>'Saturday','start'=>'09:00','end'=>'09:45','subject'=>'Bangla','teacher'=>'Nasrin Akter'],
            ['day'=>'Saturday','start'=>'09:45','end'=>'10:30','subject'=>'Mathematics','teacher'=>'Mohammad Rahman'],
            ['day'=>'Sunday','start'=>'09:00','end'=>'09:45','subject'=>'English','teacher'=>'Nasrin Akter'],
            ['day'=>'Sunday','start'=>'09:45','end'=>'10:30','subject'=>'Science','teacher'=>'Mohammad Rahman'],
        ] as $i => $row) {
            ClassRoutine::create([
                'class_name'=>'8','section'=>'A','academic_year'=>2026,'day'=>$row['day'],
                'start_time'=>$row['start'],'end_time'=>$row['end'],'subject'=>$row['subject'],
                'teacher'=>$row['teacher'],'display_order'=>$i+1
            ]);
        }

    }
}
