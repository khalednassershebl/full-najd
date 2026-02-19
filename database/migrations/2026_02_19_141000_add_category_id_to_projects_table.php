<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('slug')->constrained('project_categories')->nullOnDelete();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['category_name', 'category_slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('category_name')->nullable()->after('slug');
            $table->string('category_slug')->nullable()->after('category_name');
        });
    }
};
