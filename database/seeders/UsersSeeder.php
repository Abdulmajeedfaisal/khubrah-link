<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Admin already created by AdminSeeder
        
        // Delete old test users (keep admin)
        User::where('role', 'user')->delete();
        
        $this->command->info('🗑️ تم حذف المستخدمين القدامى...');
        
        // Create realistic test users with varied profiles
        $users = [
            // مطورين ومبرمجين
            ['name' => 'أحمد محمد العتيبي', 'email' => 'ahmed.alotaibi@example.com', 'location' => 'الرياض', 'bio' => 'مطور ويب متخصص في Laravel و Vue.js مع خبرة 5 سنوات'],
            ['name' => 'محمد خالد الغامدي', 'email' => 'mohammed.alghamdi@example.com', 'location' => 'جدة', 'bio' => 'مهندس برمجيات متخصص في تطوير تطبيقات الموبايل'],
            ['name' => 'عبدالله أحمد القحطاني', 'email' => 'abdullah.alqahtani@example.com', 'location' => 'الدمام', 'bio' => 'خبير أمن سيبراني واختبار اختراق'],
            ['name' => 'يوسف إبراهيم الشهري', 'email' => 'youssef.alshehri@example.com', 'location' => 'الرياض', 'bio' => 'متخصص في الذكاء الاصطناعي والتعلم الآلي'],
            
            // مصممين وفنانين
            ['name' => 'سارة علي الحربي', 'email' => 'sara.alharbi@example.com', 'location' => 'الرياض', 'bio' => 'مصممة UI/UX مع خبرة في تصميم التطبيقات والمواقع'],
            ['name' => 'ريم محمود الزهراني', 'email' => 'reem.alzahrani@example.com', 'location' => 'جدة', 'bio' => 'فنانة رقمية متخصصة في الرسم الرقمي والجرافيك'],
            ['name' => 'هند علي العمري', 'email' => 'hind.alomari@example.com', 'location' => 'الباحة', 'bio' => 'خطاطة ومدربة خط عربي معتمدة'],
            
            // معلمي لغات
            ['name' => 'فاطمة حسن السعيد', 'email' => 'fatima.alsaeed@example.com', 'location' => 'الرياض', 'bio' => 'معلمة لغة إنجليزية معتمدة IELTS و TOEFL'],
            ['name' => 'لينا أحمد الدوسري', 'email' => 'lina.aldosari@example.com', 'location' => 'الخبر', 'bio' => 'مترجمة محترفة ومعلمة لغة فرنسية'],
            ['name' => 'نورة سعيد المطيري', 'email' => 'noura.almutairi@example.com', 'location' => 'الرياض', 'bio' => 'معلمة لغة إسبانية وتركية'],
            
            // طهاة ومتخصصي طبخ
            ['name' => 'منى عبدالرحمن الشمري', 'email' => 'mona.alshamri@example.com', 'location' => 'الرياض', 'bio' => 'شيف متخصصة في الطبخ السعودي والحلويات'],
            ['name' => 'أمل محمد العنزي', 'email' => 'amal.alanazi@example.com', 'location' => 'جدة', 'bio' => 'خبيرة في صنع الحلويات والكيك الفاخر'],
            ['name' => 'جواهر خالد الحارثي', 'email' => 'jawaher.alharthi@example.com', 'location' => 'الطائف', 'bio' => 'متخصصة في الطبخ الصحي والنباتي'],
            
            // مدربي رياضة
            ['name' => 'خالد عمر الشهراني', 'email' => 'khaled.alshahrani@example.com', 'location' => 'الرياض', 'bio' => 'مدرب لياقة بدنية معتمد مع خبرة 8 سنوات'],
            ['name' => 'فهد سعود العتيبي', 'email' => 'fahad.alotaibi@example.com', 'location' => 'جدة', 'bio' => 'مدرب كمال أجسام وتغذية رياضية'],
            ['name' => 'بدر أحمد الغامدي', 'email' => 'badr.alghamdi@example.com', 'location' => 'الدمام', 'bio' => 'مدرب سباحة معتمد للأطفال والكبار'],
            
            // معلمين أكاديميين
            ['name' => 'عمر حسين القرني', 'email' => 'omar.alqarni@example.com', 'location' => 'أبها', 'bio' => 'معلم رياضيات وفيزياء للمرحلة الثانوية'],
            ['name' => 'إبراهيم سالم الأحمدي', 'email' => 'ibrahim.alahmadi@example.com', 'location' => 'الباحة', 'bio' => 'معلم كيمياء وأحياء مع خبرة 10 سنوات'],
            ['name' => 'عبدالرحمن فهد الزهراني', 'email' => 'abdulrahman.alzahrani@example.com', 'location' => 'الباحة', 'bio' => 'محفظ قرآن كريم بالقراءات العشر'],
            
            // موسيقيين
            ['name' => 'سلطان محمد العمري', 'email' => 'sultan.alomari@example.com', 'location' => 'الرياض', 'bio' => 'عازف جيتار وبيانو محترف'],
            ['name' => 'تركي عبدالعزيز السبيعي', 'email' => 'turki.alsubaie@example.com', 'location' => 'جدة', 'bio' => 'عازف عود ومدرب موسيقى عربية'],
            
            // مصورين
            ['name' => 'مريم عبدالله الدوسري', 'email' => 'mariam.aldosari@example.com', 'location' => 'الرياض', 'bio' => 'مصورة فوتوغرافية محترفة متخصصة في تصوير المناسبات'],
            ['name' => 'شهد خالد المالكي', 'email' => 'shahad.almalki@example.com', 'location' => 'جدة', 'bio' => 'مصورة ومونتيرة فيديو احترافية'],
            ['name' => 'جود محمد الحربي', 'email' => 'joud.alharbi@example.com', 'location' => 'الدمام', 'bio' => 'متخصصة في تصوير المنتجات والإعلانات'],
            
            // متنوعين
            ['name' => 'دانة سعيد القحطاني', 'email' => 'dana.alqahtani@example.com', 'location' => 'الرياض', 'bio' => 'مدربة خطابة عامة ومهارات التواصل'],
            ['name' => 'ريان أحمد الزهراني', 'email' => 'rayan.alzahrani@example.com', 'location' => 'الباحة', 'bio' => 'مطور ألعاب ومدرب Unity'],
            ['name' => 'وليد عبدالله الشمري', 'email' => 'waleed.alshamri@example.com', 'location' => 'الرياض', 'bio' => 'محلل بيانات ومدرب Power BI و Excel'],
            ['name' => 'ليلى محمد العتيبي', 'email' => 'layla.alotaibi@example.com', 'location' => 'جدة', 'bio' => 'مدربة يوجا وتأمل معتمدة'],
            ['name' => 'ناصر خالد الغامدي', 'email' => 'nasser.alghamdi@example.com', 'location' => 'الطائف', 'bio' => 'مدرب ملاكمة ودفاع عن النفس'],
            ['name' => 'رهف سعود الحارثي', 'email' => 'rahaf.alharthi@example.com', 'location' => 'الباحة', 'bio' => 'معلمة أعمال يدوية وحرف تقليدية'],
            ['name' => 'زياد إبراهيم القرني', 'email' => 'ziyad.alqarni@example.com', 'location' => 'أبها', 'bio' => 'مدرب كرة قدم للناشئين'],
        ];

        $cities = ['الرياض', 'جدة', 'الدمام', 'الخبر', 'الطائف', 'المدينة المنورة', 'مكة المكرمة', 'أبها', 'الباحة', 'تبوك', 'بريدة', 'خميس مشيط'];

        foreach ($users as $userData) {
            // 70% في آخر 30 يوم، 30% في باقي السنة
            $daysAgo = rand(1, 100) <= 70 ? rand(0, 30) : rand(31, 365);
            
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'username' => strtolower(str_replace([' ', '.'], ['_', '_'], explode('@', $userData['email'])[0])),
                'password' => Hash::make('password'),
                'role' => 'user',
                'location' => $userData['location'] ?? $cities[array_rand($cities)],
                'bio' => $userData['bio'] ?? null,
                'phone' => '05' . rand(10000000, 99999999),
                'is_active' => rand(0, 10) > 1, // 90% active
                'email_verified_at' => now()->subDays(rand(0, $daysAgo)),
                'created_at' => now()->subDays($daysAgo),
            ]);
        }

        // Create additional random users
        $firstNames = ['محمد', 'أحمد', 'عبدالله', 'خالد', 'سعود', 'فهد', 'عمر', 'علي', 'سارة', 'نورة', 'فاطمة', 'مريم', 'هند', 'ريم', 'لينا', 'دانة'];
        $lastNames = ['العتيبي', 'الغامدي', 'القحطاني', 'الشهري', 'الحربي', 'الزهراني', 'الدوسري', 'المطيري', 'العمري', 'الشمري', 'السبيعي', 'المالكي'];
        
        for ($i = 1; $i <= 20; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $name = $firstName . ' ' . $lastName;
            
            // 70% في آخر 30 يوم، 30% في باقي السنة
            $daysAgo = rand(1, 100) <= 70 ? rand(0, 30) : rand(31, 365);
            
            User::create([
                'name' => $name,
                'email' => 'user' . $i . '@example.com',
                'username' => 'user' . $i,
                'password' => Hash::make('password'),
                'role' => 'user',
                'location' => $cities[array_rand($cities)],
                'phone' => '05' . rand(10000000, 99999999),
                'is_active' => rand(0, 10) > 1, // 90% active
                'email_verified_at' => now()->subDays(rand(0, $daysAgo)),
                'created_at' => now()->subDays($daysAgo),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . User::count() . ' مستخدم بنجاح!');
    }
}
