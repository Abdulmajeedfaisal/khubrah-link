<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_ar' => 'التقنية والبرمجة',
                'name_en' => 'Technology & Programming',
                'slug' => 'technology-programming',
                'icon' => 'code',
                'color' => 'blue',
                'description' => 'تعلم البرمجة وتطوير المواقع والتطبيقات والذكاء الاصطناعي',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name_ar' => 'الفنون والحرف',
                'name_en' => 'Arts & Crafts',
                'slug' => 'arts-crafts',
                'icon' => 'paint-brush',
                'color' => 'green',
                'description' => 'الرسم والتصميم والأعمال اليدوية والحرف التقليدية',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name_ar' => 'اللغات',
                'name_en' => 'Languages',
                'slug' => 'languages',
                'icon' => 'language',
                'color' => 'purple',
                'description' => 'تعلم اللغات الأجنبية والترجمة والمحادثة',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name_ar' => 'الطبخ والمأكولات',
                'name_en' => 'Cooking & Culinary',
                'slug' => 'cooking-culinary',
                'icon' => 'cake',
                'color' => 'orange',
                'description' => 'فنون الطبخ والحلويات والمأكولات العالمية',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name_ar' => 'الرياضة واللياقة',
                'name_en' => 'Sports & Fitness',
                'slug' => 'sports-fitness',
                'icon' => 'trophy',
                'color' => 'red',
                'description' => 'التمارين الرياضية واللياقة البدنية والألعاب الرياضية',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name_ar' => 'التعليم والتدريس',
                'name_en' => 'Education & Teaching',
                'slug' => 'education-teaching',
                'icon' => 'academic-cap',
                'color' => 'pink',
                'description' => 'التدريس والدروس الخصوصية والتعليم الأكاديمي',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name_ar' => 'الموسيقى',
                'name_en' => 'Music',
                'slug' => 'music',
                'icon' => 'musical-note',
                'color' => 'indigo',
                'description' => 'تعلم العزف على الآلات الموسيقية والغناء والتلحين',
                'is_active' => true,
                'order' => 7,
            ],
            [
                'name_ar' => 'التصوير',
                'name_en' => 'Photography',
                'slug' => 'photography',
                'icon' => 'camera',
                'color' => 'yellow',
                'description' => 'التصوير الفوتوغرافي وتحرير الصور والفيديو',
                'is_active' => true,
                'order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
