<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;
use App\Models\Skill;
use App\Models\User;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Delete old sessions (can't use truncate due to foreign keys)
        Session::query()->delete();
        $this->command->info('🗑️ تم حذف الجلسات القديمة...');

        $skills = Skill::all();
        $users = User::all();

        if ($skills->isEmpty()) {
            $this->command->warn('⚠️ لا توجد مهارات! قم بتشغيل SkillsSeeder أولاً.');
            return;
        }
        
        if ($users->count() < 2) {
            $this->command->warn('⚠️ لا يوجد مستخدمون كافيون! قم بتشغيل UsersSeeder أولاً.');
            return;
        }

        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];

        for ($i = 0; $i < 100; $i++) {
            $skill = $skills->random();
            $teacher = $skill->user;
            
            // Get a random learner (different from teacher)
            $learner = $users->where('id', '!=', $teacher->id)->random();
            
            $status = $statuses[array_rand($statuses)];
            
            // 70% في آخر 30 يوم، 30% في باقي السنة
            $daysAgo = rand(1, 100) <= 70 ? rand(0, 30) : rand(31, 365);
            
            Session::create([
                'skill_id' => $skill->id,
                'teacher_id' => $teacher->id,
                'learner_id' => $learner->id,
                'scheduled_at' => now()->addDays(rand(-30, 30))->setHour(rand(8, 20)),
                'duration' => [30, 60, 90, 120][array_rand([30, 60, 90, 120])],
                'price' => $skill->price_per_hour,
                'status' => $status,
                'payment_status' => $status === 'completed' ? 'paid' : 'pending',
                'notes' => 'جلسة تجريبية لاختبار النظام',
                'created_at' => now()->subDays($daysAgo),
                'updated_at' => now()->subDays($daysAgo),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . Session::count() . ' جلسة بنجاح!');
        $this->command->info('   - Pending: ' . Session::where('status', 'pending')->count());
        $this->command->info('   - Confirmed: ' . Session::where('status', 'confirmed')->count());
        $this->command->info('   - Completed: ' . Session::where('status', 'completed')->count());
        $this->command->info('   - Cancelled: ' . Session::where('status', 'cancelled')->count());
    }
}
