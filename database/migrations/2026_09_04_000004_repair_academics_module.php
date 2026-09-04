<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('academics')) {
            return;
        }

        if (DB::table('academics')->count() > 0) {
            return;
        }

        $now = now();
        $defaults = [
            ['Class VI', 'class', 'Foundational secondary education with a strong focus on language, mathematics and science.', 'VI', 1],
            ['Class VII', 'class', 'Builds core knowledge, confidence and independent learning habits.', 'VII', 2],
            ['Class VIII', 'class', 'Strengthens academic foundations and prepares learners for secondary-level studies.', 'VIII', 3],
            ['Class IX', 'class', 'SSC-focused academic preparation with structured subject-based learning.', 'IX', 4],
            ['Class X (SSC)', 'class', 'Final secondary year with focused revision, assessment and SSC preparation.', 'X', 5],
            ['Bangla', 'subject', 'Language, literature, grammar and communication skills.', 'Aa', 1],
            ['English', 'subject', 'English language, grammar, reading, writing and communication.', 'En', 2],
            ['Mathematics', 'subject', 'Logical reasoning, arithmetic, algebra, geometry and problem solving.', '∑', 3],
            ['General Science', 'subject', 'Core scientific concepts, observation, experimentation and everyday science.', '⚗', 4],
            ['ICT', 'subject', 'Digital literacy, computing concepts and practical technology skills.', '⌘', 5],
            ['Social Science', 'subject', 'History, geography, society, citizenship and Bangladesh studies.', '◎', 6],
            ['Religion', 'subject', 'Moral values, ethics and religious studies.', '✦', 7],
            ['Physical Education', 'subject', 'Fitness, sports, teamwork and healthy lifestyle development.', '⚽', 8],
        ];

        foreach ($defaults as [$title, $category, $description, $icon, $order]) {
            DB::table('academics')->insert([
                'title' => $title,
                'category' => $category,
                'description' => $description,
                'icon' => $icon,
                'display_order' => $order,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        // Keep existing academic content when rolling back the repair migration.
    }
};
