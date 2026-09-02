<?php

namespace Database\Seeders;

use App\Models\Notice;
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
    }
}
