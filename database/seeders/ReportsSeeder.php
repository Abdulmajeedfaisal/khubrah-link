<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Models\User;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $users = User::where('role', 'user')->get();

        if ($users->count() < 2) {
            $this->command->warn('⚠️ لا يوجد مستخدمون كافيون! قم بتشغيل UsersSeeder أولاً.');
            return;
        }

        $reasons = [
            'سلوك غير لائق',
            'محتوى غير مناسب',
            'احتيال أو نصب',
            'عدم الالتزام بالمواعيد',
            'جودة الخدمة سيئة',
            'طلب معلومات شخصية',
            'مضايقة أو تحرش',
            'انتهاك الشروط والأحكام',
        ];

        $descriptions = [
            'المستخدم لم يلتزم بموعد الجلسة المحدد',
            'محتوى غير مناسب في الرسائل',
            'طلب معلومات شخصية خارج المنصة',
            'سلوك غير احترافي أثناء الجلسة',
            'محاولة احتيال مالي',
            'جودة التدريس سيئة جداً',
            'عدم الاستجابة للرسائل',
            'انتهاك سياسات المنصة',
        ];

        $statuses = ['pending', 'reviewing', 'resolved', 'rejected'];

        for ($i = 0; $i < 15; $i++) {
            $reporter = $users->random();
            $reported = $users->where('id', '!=', $reporter->id)->random();
            
            Report::create([
                'reporter_id' => $reporter->id,
                'reported_user_id' => $reported->id,
                'reason' => $reasons[array_rand($reasons)],
                'description' => $descriptions[array_rand($descriptions)],
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now()->subDays(rand(0, 30)),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . Report::count() . ' بلاغ بنجاح!');
        $this->command->info('   - Pending: ' . Report::where('status', 'pending')->count());
        $this->command->info('   - Reviewing: ' . Report::where('status', 'reviewing')->count());
        $this->command->info('   - Resolved: ' . Report::where('status', 'resolved')->count());
        $this->command->info('   - Rejected: ' . Report::where('status', 'rejected')->count());
    }
}
