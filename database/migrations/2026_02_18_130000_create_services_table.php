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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('icon_svg')->nullable();
            $table->string('link')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $defaultSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m19.5,4h-1.551c-.252-2.244-2.139-4-4.449-4h-3c-2.31,0-4.197,1.756-4.449,4h-1.551C2.019,4,0,6.019,0,8.5v11c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5v-11c0-2.481-2.019-4.5-4.5-4.5Z"/></svg>';

        DB::table('services')->insert([
            [
                'title' => 'حلول الأعمال والاستشارات',
                'description' => 'نقدم استشارات استراتيجية متخصصة وتحليلات أعمال دقيقة لمساعدتك في اتخاذ القرارات الصحيحة وتحسين أداء مؤسستك ووضع خطط تنمية مستدامة.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'خدمات النمو والتوسع',
                'description' => 'نساعدك على توسيع نطاق عملك وزيادة الحصة السوقية من خلال خطط نمو مدروسة وحلول تسويقية فعّالة وشراكات استراتيجية تدعم تطورك المستمر.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'الأنظمة الإدارية والمحاسبية',
                'description' => 'نصمم وننفذ أنظمة إدارية ومحاسبية متكاملة تسهّل إدارة الموارد والمخزون والموظفين والميزانيات بدقة واحترافية مع تقارير وتحليلات فورية.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'الحلول الرقمية والبرمجية',
                'description' => 'نطور مواقع إلكترونية وتطبيقات وحلول برمجية مخصصة بأحدث التقنيات لتحويل أفكارك إلى منتجات رقمية احترافية تلبي احتياجات المستخدمين والسوق.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'الذكاء الاصطناعي (AI)',
                'description' => 'ندمج تقنيات الذكاء الاصطناعي في عملياتك لتحسين الكفاءة والتحليلات التلقائية والدعم الذكي والروبوتات البرمجية التي توفر الوقت وتدعم اتخاذ القرار.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'خدمات تكميلية ومساندة',
                'description' => 'نوفر دعمًا فنيًا مستمرًا وصيانة وتحديثات وخدمات استضافة وتدريب الفرق لضمان استمرارية عمل حلولكم بأفضل أداء وأمان.',
                'icon_svg' => $defaultSvg,
                'link' => null,
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
