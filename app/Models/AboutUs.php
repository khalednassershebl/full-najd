<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'home_section_label',
        'home_section_heading',
        'home_section_description',
        'home_vision_title',
        'home_vision_text',
        'home_values_title',
        'home_values_text',
        'home_feature_1',
        'home_feature_2',
        'home_feature_3',
        'home_section_image',
        'about_page_content',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the single AboutUs instance (singleton pattern).
     */
    public static function getInstance(): self
    {
        $instance = static::first();
        if (!$instance) {
            $instance = static::create([
                'home_section_label' => 'قصتنا',
                'home_section_heading' => "فريق عمل متكامل\nخبراء في الإدارة والتقنية",
                'home_section_description' => '"نجد لحلول الأعمال" هي أكثر من مجرد شركة استشارات؛ نحن بيت خبرة متكامل يجمع بين الفهم العميق للسوق السعودي والإقليمي وبين أحدث التقنيات العالمية.',
                'home_vision_title' => 'رؤيتنا',
                'home_vision_text' => 'الريادة في تمكين المؤسسات في الشرق الأوسط نحو اقتصاد رقمي مزدهر.',
                'home_values_title' => 'قيمنا',
                'home_values_text' => 'الالتزام بالجودة، الشفافية المطلقة، والابتكار المستمر.',
                'home_feature_1' => 'خبرة متخصصة',
                'home_feature_2' => 'حلول مبتكرة',
                'home_feature_3' => 'دعم مستمر',
            ]);
        }
        return $instance;
    }
}
