<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('exam_name');
            $table->unsignedSmallInteger('academic_year');
            $table->string('subject');
            $table->string('subject_code')->nullable();
            $table->decimal('full_marks', 6, 2)->default(100);
            $table->decimal('pass_marks', 6, 2)->default(33);
            $table->decimal('marks', 6, 2);
            $table->string('grade')->nullable();
            $table->decimal('grade_point', 3, 2)->nullable();
            $table->timestamps();
            $table->index(['student_id', 'exam_name', 'academic_year']);
        });
    }
    public function down(): void { Schema::dropIfExists('results'); }
};
