<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'برمجة المواقع', 'slug' => 'web', 'sort_order' => 1],
            ['name' => 'برمجة التطبيقات', 'slug' => 'app', 'sort_order' => 2],
            ['name' => 'تسويق إلكتروني', 'slug' => 'marketing', 'sort_order' => 3],
            ['name' => 'تصميمات', 'slug' => 'design', 'sort_order' => 4],
            ['name' => 'تحسين محركات البحث', 'slug' => 'seo', 'sort_order' => 5],
            ['name' => 'الهوية البصرية', 'slug' => 'branding', 'sort_order' => 6],
            ['name' => 'الاستشارات الرقمية', 'slug' => 'consulting', 'sort_order' => 7],
            ['name' => 'التحول الرقمي', 'slug' => 'digital-transformation', 'sort_order' => 8],
        ];

        foreach ($categories as $data) {
            ProjectCategory::firstOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name'], 'sort_order' => $data['sort_order']]
            );
        }
    }
}
