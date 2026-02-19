<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('slug')->constrained('blog_categories')->nullOnDelete();
        });

        // Migrate existing category strings to blog_categories and set category_id
        $distinct = DB::table('blogs')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category');
        $usedSlugs = [];
        foreach ($distinct as $name) {
            $base = Str::slug($name) ?: 'cat';
            $slug = $base;
            $n = 0;
            while (in_array($slug, $usedSlugs, true)) {
                $n++;
                $slug = $base . '-' . $n;
            }
            $usedSlugs[] = $slug;
            $id = DB::table('blog_categories')->insertGetId([
                'name' => $name,
                'slug' => $slug,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('blogs')->where('category', $name)->update(['category_id' => $id]);
        }

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
        });

        $categories = DB::table('blog_categories')->get();
        foreach ($categories as $cat) {
            DB::table('blogs')->where('category_id', $cat->id)->update(['category' => $cat->name]);
        }

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};
