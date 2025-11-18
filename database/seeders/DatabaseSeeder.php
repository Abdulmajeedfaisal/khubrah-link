<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 بدء تعبئة قاعدة البيانات...');
        
        // Create admin user
        $this->call(AdminSeeder::class);

        // Create categories
        $this->call(CategorySeeder::class);

        // Create test users
        $this->call(UsersSeeder::class);

        // Create skills
        $this->call(SkillsSeeder::class);

        // Create sessions
        $this->call(SessionsSeeder::class);

        // Create reviews
        $this->call(ReviewsSeeder::class);

        // Create reports
        $this->call(ReportsSeeder::class);
        
        // Note: Messages and Notifications seeders are disabled
        // These features are under development for Version 2

        $this->command->info('');
        $this->command->info('🎉 تم تعبئة قاعدة البيانات بنجاح!');
        $this->command->info('');
        $this->command->info('📊 الإحصائيات النهائية:');
        $this->command->info('   - المستخدمين: ' . \App\Models\User::where('role', 'user')->count() . ' (+ 1 مدير)');
        $this->command->info('   - الفئات: ' . \App\Models\Category::count());
        $this->command->info('   - المهارات: ' . \App\Models\Skill::count());
        $this->command->info('   - الجلسات: ' . \App\Models\Session::count());
        $this->command->info('   - التقييمات: ' . \App\Models\Review::count());
        $this->command->info('   - البلاغات: ' . \App\Models\Report::count());
        $this->command->info('');
        $this->command->info('⏳ ميزات معطلة (الإصدار الثاني):');
        $this->command->info('   - المحادثات والرسائل (قيد التطوير)');
        $this->command->info('   - الإشعارات الفورية (قيد التطوير)');
        $this->command->info('');
        $this->command->info('🔐 بيانات تسجيل الدخول:');
        $this->command->info('   Admin: admin@khubrahlink.com / password');
        $this->command->info('   Users: أي بريد من القائمة / password');
    }
}
