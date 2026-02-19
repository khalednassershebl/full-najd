<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'القطاع الطبي', 'slug' => 'medical', 'sort_order' => 1],
            ['name' => 'القطاع التعليمي', 'slug' => 'educational', 'sort_order' => 2],
            ['name' => 'القطاع التجاري', 'slug' => 'commercial', 'sort_order' => 3],
            ['name' => 'القطاع الحكومي', 'slug' => 'government', 'sort_order' => 4],
            ['name' => 'القطاع الصناعي', 'slug' => 'industrial', 'sort_order' => 5],
        ];

        foreach ($categories as $data) {
            ProductCategory::firstOrCreate(
                ['slug' => $data['slug']],
                ['name' => $data['name'], 'sort_order' => $data['sort_order']]
            );
        }
    }
}
