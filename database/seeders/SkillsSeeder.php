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
        $users = User::where('role', 'user')->get();

        if ($users->isEmpty()) {
            $this->command->warn('⚠️ لا يوجد مستخدمون! قم بتشغيل UsersSeeder أولاً.');
            return;
        }

        // Get categories by slug for accurate mapping
        $techCategory = Category::where('slug', 'technology-programming')->first();
        $artsCategory = Category::where('slug', 'arts-crafts')->first();
        $languagesCategory = Category::where('slug', 'languages')->first();
        $cookingCategory = Category::where('slug', 'cooking-culinary')->first();
        $sportsCategory = Category::where('slug', 'sports-fitness')->first();
        $educationCategory = Category::where('slug', 'education-teaching')->first();
        $musicCategory = Category::where('slug', 'music')->first();
        $photographyCategory = Category::where('slug', 'photography')->first();

        // Skills organized by category
        $skillsByCategory = [
            // التقنية والبرمجة
            $techCategory?->id => [
                ['title' => 'تطوير تطبيقات الويب', 'description' => 'تعلم تطوير تطبيقات الويب باستخدام Laravel و Vue.js', 'price' => 150],
                ['title' => 'البرمجة بلغة Python', 'description' => 'تعلم أساسيات البرمجة بلغة Python للمبتدئين', 'price' => 100],
                ['title' => 'تطوير تطبيقات الموبايل', 'description' => 'تعلم تطوير تطبيقات iOS و Android باستخدام Flutter', 'price' => 180],
                ['title' => 'تحليل البيانات', 'description' => 'تعلم تحليل البيانات باستخدام Excel و Power BI', 'price' => 160],
                ['title' => 'الأمن السيبراني', 'description' => 'تعلم أساسيات الأمن السيبراني وحماية الأنظمة', 'price' => 200],
                ['title' => 'تطوير الألعاب', 'description' => 'تعلم تطوير الألعاب باستخدام Unity', 'price' => 190],
                ['title' => 'الذكاء الاصطناعي', 'description' => 'مقدمة في الذكاء الاصطناعي والتعلم الآلي', 'price' => 220],
                ['title' => 'البرمجة بلغة Java', 'description' => 'تعلم البرمجة الكائنية بلغة Java', 'price' => 150],
                ['title' => 'قواعد البيانات SQL', 'description' => 'تعلم إدارة قواعد البيانات باستخدام MySQL', 'price' => 130],
            ],
            
            // الفنون والحرف
            $artsCategory?->id => [
                ['title' => 'تصميم واجهات المستخدم', 'description' => 'تعلم تصميم واجهات مستخدم احترافية باستخدام Figma', 'price' => 120],
                ['title' => 'الرسم الرقمي', 'description' => 'تعلم الرسم الرقمي باستخدام Procreate', 'price' => 120],
                ['title' => 'تصميم الجرافيك', 'description' => 'تعلم تصميم الجرافيك باستخدام Adobe Illustrator', 'price' => 130],
                ['title' => 'الرسم بالألوان المائية', 'description' => 'تعلم فن الرسم بالألوان المائية للمبتدئين', 'price' => 90],
                ['title' => 'الخط العربي', 'description' => 'تعلم فن الخط العربي وأنواعه المختلفة', 'price' => 110],
                ['title' => 'الأعمال اليدوية', 'description' => 'تعلم صناعة الحرف اليدوية والديكورات المنزلية', 'price' => 80],
            ],
            
            // اللغات
            $languagesCategory?->id => [
                ['title' => 'اللغة الإنجليزية', 'description' => 'تحسين مهارات اللغة الإنجليزية للمحادثة', 'price' => 100],
                ['title' => 'اللغة الفرنسية', 'description' => 'تعلم اللغة الفرنسية من الصفر', 'price' => 110],
                ['title' => 'اللغة الإسبانية', 'description' => 'تعلم أساسيات اللغة الإسبانية', 'price' => 100],
                ['title' => 'اللغة التركية', 'description' => 'تعلم اللغة التركية للمبتدئين', 'price' => 95],
                ['title' => 'الترجمة الاحترافية', 'description' => 'تعلم فنون الترجمة من العربية للإنجليزية', 'price' => 140],
            ],
            
            // الطبخ والمأكولات
            $cookingCategory?->id => [
                ['title' => 'الطبخ السعودي', 'description' => 'تعلم طبخ الأكلات السعودية التقليدية', 'price' => 80],
                ['title' => 'صنع الحلويات', 'description' => 'تعلم صنع الحلويات والكيك الاحترافي', 'price' => 90],
                ['title' => 'المعجنات والفطائر', 'description' => 'تعلم صنع المعجنات والفطائر بأنواعها', 'price' => 85],
                ['title' => 'الطبخ الإيطالي', 'description' => 'تعلم طبخ الباستا والبيتزا الإيطالية', 'price' => 100],
                ['title' => 'الطبخ الصحي', 'description' => 'تعلم إعداد وجبات صحية ومتوازنة', 'price' => 95],
            ],
            
            // الرياضة واللياقة
            $sportsCategory?->id => [
                ['title' => 'اليوجا واللياقة', 'description' => 'تعلم تمارين اليوجا واللياقة البدنية', 'price' => 70],
                ['title' => 'كمال الأجسام', 'description' => 'تعلم تمارين كمال الأجسام وبناء العضلات', 'price' => 120],
                ['title' => 'السباحة', 'description' => 'تعلم السباحة للمبتدئين والمتقدمين', 'price' => 100],
                ['title' => 'الملاكمة', 'description' => 'تعلم أساسيات الملاكمة والدفاع عن النفس', 'price' => 110],
                ['title' => 'كرة القدم', 'description' => 'تحسين مهارات كرة القدم والتكتيكات', 'price' => 90],
            ],
            
            // التعليم والتدريس
            $educationCategory?->id => [
                ['title' => 'الرياضيات', 'description' => 'دروس خصوصية في الرياضيات لجميع المراحل', 'price' => 100],
                ['title' => 'الفيزياء', 'description' => 'شرح مبسط للفيزياء مع حل المسائل', 'price' => 110],
                ['title' => 'الكيمياء', 'description' => 'تعلم الكيمياء بطريقة سهلة وممتعة', 'price' => 105],
                ['title' => 'القرآن الكريم', 'description' => 'تحفيظ وتجويد القرآن الكريم', 'price' => 0],
                ['title' => 'الخطابة العامة', 'description' => 'تحسين مهارات الخطابة والتحدث أمام الجمهور', 'price' => 120],
            ],
            
            // الموسيقى
            $musicCategory?->id => [
                ['title' => 'العزف على الجيتار', 'description' => 'تعلم العزف على الجيتار للمبتدئين', 'price' => 100],
                ['title' => 'العزف على البيانو', 'description' => 'تعلم العزف على البيانو وقراءة النوتة الموسيقية', 'price' => 130],
                ['title' => 'العزف على العود', 'description' => 'تعلم العزف على العود العربي', 'price' => 120],
                ['title' => 'الغناء', 'description' => 'تحسين الصوت وتعلم تقنيات الغناء', 'price' => 110],
            ],
            
            // التصوير
            $photographyCategory?->id => [
                ['title' => 'التصوير الفوتوغرافي', 'description' => 'تعلم فن التصوير الفوتوغرافي الاحترافي', 'price' => 110],
                ['title' => 'المونتاج والإخراج', 'description' => 'تعلم مونتاج الفيديو باستخدام Adobe Premiere', 'price' => 150],
                ['title' => 'تصوير المنتجات', 'description' => 'تعلم تصوير المنتجات للتجارة الإلكترونية', 'price' => 130],
                ['title' => 'تحرير الصور', 'description' => 'تعلم تحرير الصور باستخدام Photoshop', 'price' => 120],
                ['title' => 'التصوير السينمائي', 'description' => 'تعلم أساسيات التصوير السينمائي والإضاءة', 'price' => 160],
            ],
        ];

        $totalSkills = 0;
        
        foreach ($skillsByCategory as $categoryId => $skills) {
            if (!$categoryId) continue; // Skip if category doesn't exist
            
            foreach ($skills as $skillData) {
                $user = $users->random();

                Skill::create([
                    'user_id' => $user->id,
                    'category_id' => $categoryId,
                    'title' => $skillData['title'],
                    'description' => $skillData['description'],
                    'price_per_hour' => $skillData['price'],
                    'is_active' => rand(0, 10) > 2, // 80% active
                    'created_at' => now()->subDays(rand(0, 45)),
                ]);
                
                $totalSkills++;
            }
        }

        $this->command->info('✅ تم إنشاء ' . $totalSkills . ' مهارة بنجاح!');
        $this->command->info('   - التقنية والبرمجة: ' . Skill::where('category_id', $techCategory?->id)->count());
        $this->command->info('   - الفنون والحرف: ' . Skill::where('category_id', $artsCategory?->id)->count());
        $this->command->info('   - اللغات: ' . Skill::where('category_id', $languagesCategory?->id)->count());
        $this->command->info('   - الطبخ والمأكولات: ' . Skill::where('category_id', $cookingCategory?->id)->count());
        $this->command->info('   - الرياضة واللياقة: ' . Skill::where('category_id', $sportsCategory?->id)->count());
        $this->command->info('   - التعليم والتدريس: ' . Skill::where('category_id', $educationCategory?->id)->count());
        $this->command->info('   - الموسيقى: ' . Skill::where('category_id', $musicCategory?->id)->count());
        $this->command->info('   - التصوير: ' . Skill::where('category_id', $photographyCategory?->id)->count());
    }
}
