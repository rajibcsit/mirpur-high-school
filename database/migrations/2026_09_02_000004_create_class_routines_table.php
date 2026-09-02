<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('section')->nullable();
            $table->unsignedSmallInteger('academic_year');
            $table->enum('day', ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('subject');
            $table->string('teacher')->nullable();
            $table->string('room')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
            $table->index(['class_name', 'section', 'academic_year', 'day']);
        });
    }
    public function down(): void { Schema::dropIfExists('class_routines'); }
};
