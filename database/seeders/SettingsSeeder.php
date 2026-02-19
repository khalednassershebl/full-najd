<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Seed settings from current front-end data (welcome, contacts, footer, etc.).
     * Uses updateOrInsert so running again overwrites with these defaults.
     */
    public function run(): void
    {
        $now = now();

        $defaults = [
            // Tab 1: Logos & Favicon (paths relative to asset() - front uses nagd-front/assets/images/logos/)
            ['group' => 'logos', 'key' => 'navbar_logo', 'value' => 'nagd-front/assets/images/logos/logo-dark.png', 'type' => 'image', 'sort_order' => 1],
            ['group' => 'logos', 'key' => 'big_nav_logo', 'value' => 'nagd-front/assets/images/logos/logo.png', 'type' => 'image', 'sort_order' => 2],
            ['group' => 'logos', 'key' => 'footer_logo', 'value' => 'nagd-front/assets/images/logos/logo-dark.png', 'type' => 'image', 'sort_order' => 3],
            ['group' => 'logos', 'key' => 'favicon', 'value' => 'nagd-front/assets/images/logos/icon.png', 'type' => 'image', 'sort_order' => 4],

            // Tab 2: Navbar & Mega Menu (محتوى القائمة الميجا)
            ['group' => 'navbar', 'key' => 'navbar_enabled', 'value' => '1', 'type' => 'boolean', 'sort_order' => 1],
            ['group' => 'navbar', 'key' => 'mega_menu_enabled', 'value' => '1', 'type' => 'boolean', 'sort_order' => 2],
            ['group' => 'navbar', 'key' => 'mega_menu_content', 'value' => json_encode([
                'columns' => [
                    [
                        'title' => 'الخدمات',
                        'links' => [
                            ['label' => 'جميع الخدمات', 'url' => '/services'],
                            ['label' => 'تطوير المواقع', 'url' => '/services'],
                            ['label' => 'تطبيقات الجوال', 'url' => '/services'],
                            ['label' => 'التسويق الرقمي', 'url' => '/services'],
                        ],
                    ],
                    [
                        'title' => 'الشركة',
                        'links' => [
                            ['label' => 'من نحن', 'url' => '/who-we-are/about'],
                            ['label' => 'الرؤية', 'url' => '/services'],
                            ['label' => 'فريق العمل', 'url' => '/blogs'],
                            ['label' => 'تواصل معنا', 'url' => '/contacts'],
                        ],
                    ],
                    [
                        'title' => 'المزيد',
                        'links' => [
                            ['label' => 'المدونة', 'url' => '/blogs'],
                            ['label' => 'المشاريع', 'url' => '/projects'],
                            ['label' => 'المنتجات', 'url' => '/products'],
                            ['label' => 'الشركاء', 'url' => '/parteners'],
                        ],
                    ],
                ],
            ]), 'type' => 'json', 'sort_order' => 3],

            // Tab 3: Footer (from welcome.blade.php & contacts footer)
            ['group' => 'footer', 'key' => 'description', 'value' => 'نجد لحلول الأعمال شركة سعودية متخصصة في تقديم الاستشارات والتحول المؤسسي، نصمم حلولاً متكاملة تدعم نمو الشركات وتساهم في بناء فرق عمل قادرة على المنافسة وتسريع الإنجاز.', 'type' => 'text', 'sort_order' => 1],
            ['group' => 'footer', 'key' => 'links', 'value' => '[{"label":"نظرة عامة","url":"#hero"},{"label":"رؤيتنا","url":"#vision"},{"label":"شركاؤنا","url":"#partners"},{"label":"آراء عملائنا","url":"#testimonials"},{"label":"طلب استشارة","url":"#contact"}]', 'type' => 'json', 'sort_order' => 2],
            ['group' => 'footer', 'key' => 'solutions', 'value' => '[{"title":"استراتيجيات النمو والتوسع","url":"#strategy"},{"title":"التحول الرقمي وبناء الأنظمة","url":"#digital"},{"title":"مكاتب إدارة المشاريع PMO","url":"#pmo"},{"title":"التسويق وتطوير الهوية","url":"#marketing"},{"title":"تأهيل الفرق وتمكين القادة","url":"#training"}]', 'type' => 'json', 'sort_order' => 3],

            // Tab 4: Contacts (from contacts.blade.php & welcome CTA)
            ['group' => 'contacts', 'key' => 'phone', 'value' => '(+20) 1007056732', 'type' => 'string', 'sort_order' => 1],
            ['group' => 'contacts', 'key' => 'whatsapp_number', 'value' => '201007056732', 'type' => 'string', 'sort_order' => 2],
            ['group' => 'contacts', 'key' => 'email', 'value' => 'info@nagd.com', 'type' => 'string', 'sort_order' => 3],
            ['group' => 'contacts', 'key' => 'address', 'value' => 'السعودية - الرياض - شارع الخليفة', 'type' => 'text', 'sort_order' => 4],
            ['group' => 'contacts', 'key' => 'social_media_links', 'value' => '{"facebook":"#","instagram":"#","tiktok":"#","linkedin":"#"}', 'type' => 'json', 'sort_order' => 5],
            ['group' => 'contacts', 'key' => 'map_embed', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.7714703432!2d46.67529531500078!3d24.71340798413638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba76d13d7b8c5f1d!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1234567890" width="100%" height="400" style="border:0;border-radius:12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 'type' => 'text', 'sort_order' => 6],

            // Tab 5: Service select (from contacts form - اختر موضوع الرسالة)
            ['group' => 'services_form', 'key' => 'service_options', 'value' => '[{"value":"consultation","label":"استشارة مجانية"},{"value":"development","label":"تطوير المواقع"},{"value":"design","label":"تصميم الجرافيك"},{"value":"marketing","label":"التسويق الرقمي"},{"value":"support","label":"دعم فني"},{"value":"other","label":"موضوع آخر"}]', 'type' => 'json', 'sort_order' => 1],
            ['group' => 'services_form', 'key' => 'select_label', 'value' => 'اختر موضوع الرسالة', 'type' => 'string', 'sort_order' => 2],
            ['group' => 'services_form', 'key' => 'select_placeholder', 'value' => 'اختر موضوع الرسالة', 'type' => 'string', 'sort_order' => 3],

            // Tab 6: SEO (from front meta tags)
            ['group' => 'seo', 'key' => 'meta_title', 'value' => 'نجد لحلول الأعمال', 'type' => 'string', 'sort_order' => 1],
            ['group' => 'seo', 'key' => 'meta_description', 'value' => 'نجد لحلول الأعمال - شركة سعودية متخصصة في الاستشارات والتحول المؤسسي وحلول الأعمال.', 'type' => 'text', 'sort_order' => 2],
            ['group' => 'seo', 'key' => 'meta_keywords', 'value' => 'نجد، حلول الأعمال، استشارات، تحول مؤسسي، السعودية، الرياض', 'type' => 'string', 'sort_order' => 3],
            ['group' => 'seo', 'key' => 'og_image', 'value' => null, 'type' => 'image', 'sort_order' => 4],
            ['group' => 'seo', 'key' => 'og_title', 'value' => 'نجد لحلول الأعمال', 'type' => 'string', 'sort_order' => 5],
            ['group' => 'seo', 'key' => 'og_description', 'value' => 'نجد لحلول الأعمال - شركة سعودية متخصصة في الاستشارات والتحول المؤسسي وحلول الأعمال.', 'type' => 'text', 'sort_order' => 6],
            ['group' => 'seo', 'key' => 'twitter_card', 'value' => 'summary_large_image', 'type' => 'string', 'sort_order' => 7],
            ['group' => 'seo', 'key' => 'canonical_base', 'value' => null, 'type' => 'string', 'sort_order' => 8],
        ];

        foreach ($defaults as $row) {
            $exists = DB::table('settings')
                ->where('group', $row['group'])
                ->where('key', $row['key'])
                ->exists();

            if ($exists) {
                DB::table('settings')
                    ->where('group', $row['group'])
                    ->where('key', $row['key'])
                    ->update([
                        'value' => $row['value'],
                        'type' => $row['type'],
                        'sort_order' => $row['sort_order'],
                        'updated_at' => $now,
                    ]);
            } else {
                DB::table('settings')->insert([
                    'group' => $row['group'],
                    'key' => $row['key'],
                    'value' => $row['value'],
                    'type' => $row['type'],
                    'sort_order' => $row['sort_order'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
