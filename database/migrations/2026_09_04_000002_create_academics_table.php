<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('class');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $now = now();
        $defaults = [
            ['Class VI', 'class', 'Foundational secondary education with a strong focus on language, mathematics and science.', 'VI', 1, true, $now, $now],
            ['Class VII', 'class', 'Builds core knowledge, confidence and independent learning habits.', 'VII', 2, true, $now, $now],
            ['Class VIII', 'class', 'Strengthens academic foundations and prepares learners for secondary-level studies.', 'VIII', 3, true, $now, $now],
            ['Class IX', 'class', 'SSC-focused academic preparation with structured subject-based learning.', 'IX', 4, true, $now, $now],
            ['Class X (SSC)', 'class', 'Final secondary year with focused revision, assessment and SSC preparation.', 'X', 5, true, $now, $now],
            ['Bangla', 'subject', 'Language, literature, grammar and communication skills.', 'Aa', 1, true, $now, $now],
            ['English', 'subject', 'English language, grammar, reading, writing and communication.', 'En', 2, true, $now, $now],
            ['Mathematics', 'subject', 'Logical reasoning, arithmetic, algebra, geometry and problem solving.', '∑', 3, true, $now, $now],
            ['General Science', 'subject', 'Core scientific concepts, observation, experimentation and everyday science.', '⚗', 4, true, $now, $now],
            ['ICT', 'subject', 'Digital literacy, computing concepts and practical technology skills.', '⌘', 5, true, $now, $now],
            ['Social Science', 'subject', 'History, geography, society, citizenship and Bangladesh studies.', '◎', 6, true, $now, $now],
            ['Religion', 'subject', 'Moral values, ethics and religious studies.', '✦', 7, true, $now, $now],
            ['Physical Education', 'subject', 'Fitness, sports, teamwork and healthy lifestyle development.', '⚽', 8, true, $now, $now],
        ];

        foreach ($defaults as $item) {
            DB::table('academics')->insert([
                'title' => $item[0], 'category' => $item[1], 'description' => $item[2], 'icon' => $item[3],
                'display_order' => $item[4], 'is_active' => $item[5], 'created_at' => $item[6], 'updated_at' => $item[7],
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
