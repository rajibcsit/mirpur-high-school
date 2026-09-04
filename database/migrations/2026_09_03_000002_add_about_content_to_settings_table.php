<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('about_title')->nullable()->after('footer_text');
            $table->text('about_intro')->nullable()->after('about_title');
            $table->longText('about_history')->nullable()->after('about_intro');
            $table->string('about_image_path')->nullable()->after('about_history');
            $table->longText('mission')->nullable()->after('about_image_path');
            $table->longText('vision')->nullable()->after('mission');
            $table->string('principal_message_title')->nullable()->after('vision');
            $table->longText('principal_message')->nullable()->after('principal_message_title');
            $table->string('principal_photo_path')->nullable()->after('principal_message');
            $table->string('stat_students')->nullable()->after('principal_photo_path');
            $table->string('stat_teachers')->nullable()->after('stat_students');
            $table->string('stat_years')->nullable()->after('stat_teachers');
            $table->string('stat_achievements')->nullable()->after('stat_years');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_title', 'about_intro', 'about_history', 'about_image_path',
                'mission', 'vision', 'principal_message_title', 'principal_message',
                'principal_photo_path', 'stat_students', 'stat_teachers', 'stat_years', 'stat_achievements'
            ]);
        });
    }
};
