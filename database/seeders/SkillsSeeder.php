<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\User;
use App\Models\Category;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $categories = Category::all();
        $users = User::where('role', 'user')->get();

        if ($categories->isEmpty()) {
            $this->command->warn('⚠️ لا توجد فئات! قم بتشغيل CategorySeeder أولاً.');
            return;
        }

        if ($users->isEmpty()) {
            $this->command->warn('⚠️ لا يوجد مستخدمون! قم بتشغيل UsersSeeder أولاً.');
            return;
        }

        $skills = [
            ['title' => 'تطوير تطبيقات الويب', 'description' => 'تعلم تطوير تطبيقات الويب باستخدام Laravel و Vue.js', 'price' => 150],
            ['title' => 'تصميم واجهات المستخدم', 'description' => 'تعلم تصميم واجهات مستخدم احترافية باستخدام Figma', 'price' => 120],
            ['title' => 'البرمجة بلغة Python', 'description' => 'تعلم أساسيات البرمجة بلغة Python', 'price' => 100],
            ['title' => 'تطوير تطبيقات الموبايل', 'description' => 'تعلم تطوير تطبيقات iOS و Android باستخدام Flutter', 'price' => 180],
            ['title' => 'التسويق الرقمي', 'description' => 'تعلم استراتيجيات التسويق الرقمي الحديثة', 'price' => 130],
            ['title' => 'إدارة المشاريع', 'description' => 'تعلم إدارة المشاريع باستخدام منهجية Agile', 'price' => 140],
            ['title' => 'تحليل البيانات', 'description' => 'تعلم تحليل البيانات باستخدام Excel و Power BI', 'price' => 160],
            ['title' => 'الأمن السيبراني', 'description' => 'تعلم أساسيات الأمن السيبراني وحماية الأنظمة', 'price' => 200],
            ['title' => 'التصوير الفوتوغرافي', 'description' => 'تعلم فن التصوير الفوتوغرافي الاحترافي', 'price' => 110],
            ['title' => 'المونتاج والإخراج', 'description' => 'تعلم مونتاج الفيديو باستخدام Adobe Premiere', 'price' => 150],
            ['title' => 'الكتابة الإبداعية', 'description' => 'تعلم فنون الكتابة الإبداعية والقصصية', 'price' => 90],
            ['title' => 'اللغة الإنجليزية', 'description' => 'تحسين مهارات اللغة الإنجليزية للمحادثة', 'price' => 100],
            ['title' => 'الرسم الرقمي', 'description' => 'تعلم الرسم الرقمي باستخدام Procreate', 'price' => 120],
            ['title' => 'تطوير الألعاب', 'description' => 'تعلم تطوير الألعاب باستخدام Unity', 'price' => 190],
            ['title' => 'الذكاء الاصطناعي', 'description' => 'مقدمة في الذكاء الاصطناعي والتعلم الآلي', 'price' => 220],
            ['title' => 'التجارة الإلكترونية', 'description' => 'تعلم إنشاء وإدارة متجر إلكتروني ناجح', 'price' => 140],
            ['title' => 'المحاسبة المالية', 'description' => 'تعلم أساسيات المحاسبة المالية', 'price' => 130],
            ['title' => 'إدارة وسائل التواصل', 'description' => 'تعلم إدارة حسابات وسائل التواصل الاجتماعي', 'price' => 110],
            ['title' => 'البرمجة بلغة Java', 'description' => 'تعلم البرمجة الكائنية بلغة Java', 'price' => 150],
            ['title' => 'تصميم الجرافيك', 'description' => 'تعلم تصميم الجرافيك باستخدام Adobe Illustrator', 'price' => 130],
            ['title' => 'الطبخ والحلويات', 'description' => 'تعلم فنون الطبخ وصنع الحلويات', 'price' => 80],
            ['title' => 'اليوجا واللياقة', 'description' => 'تعلم تمارين اليوجا واللياقة البدنية', 'price' => 70],
            ['title' => 'العزف على الجيتار', 'description' => 'تعلم العزف على الجيتار للمبتدئين', 'price' => 100],
            ['title' => 'التخطيط المالي', 'description' => 'تعلم التخطيط المالي الشخصي والاستثمار', 'price' => 150],
            ['title' => 'الخطابة العامة', 'description' => 'تحسين مهارات الخطابة والتحدث أمام الجمهور', 'price' => 120],
        ];

        foreach ($skills as $skillData) {
            $user = $users->random();
            $category = $categories->random();

            Skill::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => $skillData['title'],
                'description' => $skillData['description'],
                'price_per_hour' => $skillData['price'],
                'is_active' => rand(0, 10) > 2, // 80% active
                'created_at' => now()->subDays(rand(0, 45)),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . Skill::count() . ' مهارة بنجاح!');
    }
}
