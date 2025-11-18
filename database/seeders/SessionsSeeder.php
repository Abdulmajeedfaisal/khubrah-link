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

        // Status distribution: 60% completed, 20% confirmed, 10% pending, 10% cancelled
        $statusWeights = [
            'completed' => 60,
            'confirmed' => 20,
            'pending' => 10,
            'cancelled' => 10,
        ];

        $locations = [
            'مقهى ستاربكس - شارع التحلية',
            'مكتبة جرير - الرياض بارك',
            'مركز الملك عبدالله المالي',
            'مقهى كوستا - العليا',
            'مكتبة الملك فهد الوطنية',
            'جامعة الملك سعود',
            'مركز غرناطة مول',
            'مقهى نجران - حي السليمانية',
            'مكتبة العبيكان',
            'مركز الأعمال - برج الفيصلية',
        ];

        $notes = [
            'أرغب في تعلم الأساسيات بشكل مكثف',
            'لدي خبرة بسيطة وأريد التطوير',
            'أحتاج مساعدة في مشروع محدد',
            'أريد التحضير لمقابلة عمل',
            'أبحث عن جلسة تدريبية شاملة',
            'أرغب في التركيز على الجانب العملي',
            'لدي أسئلة محددة أريد الإجابة عليها',
            'أحتاج إلى مراجعة شاملة للموضوع',
        ];

        for ($i = 0; $i < 100; $i++) {
            $skill = $skills->random();
            $teacher = $skill->user;
            
            // Get a random learner (different from teacher)
            $learner = $users->where('id', '!=', $teacher->id)->random();
            
            // Select status based on weights
            $rand = rand(1, 100);
            if ($rand <= 60) {
                $status = 'completed';
            } elseif ($rand <= 80) {
                $status = 'confirmed';
            } elseif ($rand <= 90) {
                $status = 'pending';
            } else {
                $status = 'cancelled';
            }
            
            // 70% في آخر 30 يوم، 30% في باقي السنة
            $daysAgo = rand(1, 100) <= 70 ? rand(0, 30) : rand(31, 365);
            
            // Session type: 60% online, 40% in-person
            $sessionType = rand(1, 100) <= 60 ? 'online' : 'in-person';
            
            $meetingLink = $sessionType === 'online' ? 'https://meet.google.com/' . \Str::random(10) : null;
            $location = $sessionType === 'in-person' ? $locations[array_rand($locations)] : null;
            
            // Determine scheduled date based on status
            if ($status === 'completed') {
                // Completed sessions are in the past
                $scheduledAt = now()->subDays(rand(1, $daysAgo))->setHour(rand(8, 20))->setMinute([0, 30][array_rand([0, 30])]);
            } elseif ($status === 'cancelled') {
                // Cancelled sessions could be past or future
                $scheduledAt = now()->addDays(rand(-$daysAgo, 30))->setHour(rand(8, 20))->setMinute([0, 30][array_rand([0, 30])]);
            } else {
                // Pending and confirmed sessions are in the future
                $scheduledAt = now()->addDays(rand(1, 30))->setHour(rand(8, 20))->setMinute([0, 30][array_rand([0, 30])]);
            }
            
            Session::create([
                'skill_id' => $skill->id,
                'teacher_id' => $teacher->id,
                'learner_id' => $learner->id,
                'scheduled_at' => $scheduledAt,
                'duration' => [60, 90, 120][array_rand([60, 90, 120])], // Most sessions are 60-120 minutes
                'session_type' => $sessionType,
                'meeting_link' => $meetingLink,
                'location' => $location,
                'price' => $skill->price_per_hour,
                'status' => $status,
                'payment_status' => $status === 'completed' ? 'paid' : 'pending',
                'notes' => $notes[array_rand($notes)],
                'completed_at' => $status === 'completed' ? $scheduledAt->copy()->addMinutes(rand(60, 120)) : null,
                'cancelled_at' => $status === 'cancelled' ? now()->subDays(rand(0, $daysAgo)) : null,
                'cancelled_by' => $status === 'cancelled' ? [$teacher->id, $learner->id][array_rand([$teacher->id, $learner->id])] : null,
                'cancellation_reason' => $status === 'cancelled' ? ['ظرف طارئ', 'تعارض في المواعيد', 'تغيير في الخطط'][array_rand(['ظرف طارئ', 'تعارض في المواعيد', 'تغيير في الخطط'])] : null,
                'created_at' => now()->subDays($daysAgo),
                'updated_at' => now()->subDays(max(0, $daysAgo - rand(0, 5))),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . Session::count() . ' جلسة بنجاح!');
        $this->command->info('   - Pending: ' . Session::where('status', 'pending')->count());
        $this->command->info('   - Confirmed: ' . Session::where('status', 'confirmed')->count());
        $this->command->info('   - Completed: ' . Session::where('status', 'completed')->count());
        $this->command->info('   - Cancelled: ' . Session::where('status', 'cancelled')->count());
    }
}
