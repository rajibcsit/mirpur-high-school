<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('roll_no');
            $table->string('registration_no')->nullable()->unique();
            $table->string('class_name');
            $table->string('section')->nullable();
            $table->unsignedSmallInteger('academic_year');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('photo_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['class_name', 'section', 'academic_year']);
            $table->unique(['roll_no', 'class_name', 'section', 'academic_year']);
        });
    }
    public function down(): void { Schema::dropIfExists('students'); }
};
