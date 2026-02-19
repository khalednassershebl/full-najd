<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            // Who-we-are section on homepage (welcome.blade.php)
            $table->string('home_section_label')->default('قصتنا');
            $table->string('home_section_heading')->nullable();
            $table->text('home_section_description')->nullable();
            $table->string('home_vision_title')->default('رؤيتنا');
            $table->text('home_vision_text')->nullable();
            $table->string('home_values_title')->default('قيمنا');
            $table->text('home_values_text')->nullable();
            $table->string('home_feature_1')->nullable();
            $table->string('home_feature_2')->nullable();
            $table->string('home_feature_3')->nullable();
            // About page full content (who-we-are/about) - HTML from rich editor
            $table->longText('about_page_content')->nullable();
            $table->timestamps();
        });

        // Insert default row so there is always one record
        DB::table('about_us')->insert([
            'home_section_label' => 'قصتنا',
            'home_section_heading' => "فريق عمل متكامل\nخبراء في الإدارة والتقنية",
            'home_section_description' => '"نجد لحلول الأعمال" هي أكثر من مجرد شركة استشارات؛ نحن بيت خبرة متكامل يجمع بين الفهم العميق للسوق السعودي والإقليمي وبين أحدث التقنيات العالمية. تأسست نجد لتكون الجسر الذي يعبر به عملاؤنا نحو المستقبل، متسلحين بالخبرة والحوكمة الرشيدة.',
            'home_vision_title' => 'رؤيتنا',
            'home_vision_text' => 'الريادة في تمكين المؤسسات في الشرق الأوسط نحو اقتصاد رقمي مزدهر.',
            'home_values_title' => 'قيمنا',
            'home_values_text' => 'الالتزام بالجودة، الشفافية المطلقة، والابتكار المستمر.',
            'home_feature_1' => 'خبرة متخصصة',
            'home_feature_2' => 'حلول مبتكرة',
            'home_feature_3' => 'دعم مستمر',
            'about_page_content' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
