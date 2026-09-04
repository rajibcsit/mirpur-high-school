<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->index(['is_active', 'category', 'display_order'], 'academics_active_category_order_idx');
        });
    }

    public function down(): void
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->dropIndex('academics_active_category_order_idx');
        });
    }
};
