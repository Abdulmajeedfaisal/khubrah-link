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

        $reportsData = [
            [
                'reason' => 'عدم الالتزام بالمواعيد',
                'description' => 'المستخدم لم يحضر الجلسة المحددة ولم يقم بإلغائها مسبقاً. تم الانتظار لمدة 30 دقيقة دون أي رد.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'جودة الخدمة سيئة',
                'description' => 'المعلم لم يكن ملماً بالموضوع بشكل كافٍ. الشرح كان غير واضح ولم أستفد من الجلسة.',
                'status' => 'reviewing',
            ],
            [
                'reason' => 'سلوك غير احترافي',
                'description' => 'تعامل المعلم كان غير احترافي وكان يستخدم هاتفه أثناء الجلسة بشكل متكرر.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'طلب معلومات شخصية',
                'description' => 'المستخدم طلب مني التواصل خارج المنصة وطلب رقم هاتفي الشخصي بشكل متكرر.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'عدم الاستجابة للرسائل',
                'description' => 'أرسلت عدة رسائل للمعلم لتحديد موعد الجلسة لكنه لم يرد منذ أسبوع.',
                'status' => 'rejected',
            ],
            [
                'reason' => 'محتوى غير مناسب',
                'description' => 'المستخدم أرسل رسائل غير لائقة وغير مناسبة في المحادثة الخاصة.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'انتهاك الشروط والأحكام',
                'description' => 'المعلم يطلب الدفع خارج المنصة ويرفض استخدام نظام الحجز الرسمي.',
                'status' => 'reviewing',
            ],
            [
                'reason' => 'إلغاء متكرر للجلسات',
                'description' => 'المعلم ألغى الجلسة 3 مرات متتالية في اللحظة الأخيرة دون سبب واضح.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'معلومات مضللة',
                'description' => 'المهارة المعلن عنها لا تطابق ما تم تقديمه في الجلسة. المعلم ليس لديه الخبرة المذكورة.',
                'status' => 'pending',
            ],
            [
                'reason' => 'مضايقة',
                'description' => 'المستخدم يرسل رسائل متكررة بعد انتهاء الجلسة رغم طلبي بالتوقف.',
                'status' => 'reviewing',
            ],
            [
                'reason' => 'تأخير متكرر',
                'description' => 'المعلم يتأخر عن موعد الجلسة بشكل متكرر (15-20 دقيقة) مما يؤثر على وقتي.',
                'status' => 'rejected',
            ],
            [
                'reason' => 'عدم الالتزام بالمحتوى',
                'description' => 'المعلم لم يلتزم بالمحتوى المتفق عليه وقام بتغيير الموضوع أثناء الجلسة.',
                'status' => 'pending',
            ],
            [
                'reason' => 'سلوك غير لائق',
                'description' => 'المستخدم استخدم ألفاظاً غير لائقة عندما طلبت إعادة جدولة الجلسة.',
                'status' => 'resolved',
            ],
            [
                'reason' => 'جودة الاتصال سيئة',
                'description' => 'الجلسة عن بُعد كانت سيئة جداً بسبب ضعف الإنترنت لدى المعلم ولم يتم إكمالها.',
                'status' => 'rejected',
            ],
            [
                'reason' => 'طلب تقييم إيجابي',
                'description' => 'المعلم طلب مني إعطاءه تقييم 5 نجوم مقابل خصم في الجلسة القادمة.',
                'status' => 'reviewing',
            ],
        ];

        // Status distribution: 40% resolved, 30% reviewing, 20% pending, 10% rejected
        $statusWeights = [
            'resolved' => 40,
            'reviewing' => 30,
            'pending' => 20,
            'rejected' => 10,
        ];

        foreach ($reportsData as $reportData) {
            $reporter = $users->random();
            $reported = $users->where('id', '!=', $reporter->id)->random();
            
            $daysAgo = rand(0, 30);
            
            Report::create([
                'reporter_id' => $reporter->id,
                'reported_user_id' => $reported->id,
                'reason' => $reportData['reason'],
                'description' => $reportData['description'],
                'status' => $reportData['status'],
                'created_at' => now()->subDays($daysAgo),
                'updated_at' => now()->subDays(max(0, $daysAgo - rand(0, 5))),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . Report::count() . ' بلاغ بنجاح!');
        $this->command->info('   - Pending: ' . Report::where('status', 'pending')->count());
        $this->command->info('   - Reviewing: ' . Report::where('status', 'reviewing')->count());
        $this->command->info('   - Resolved: ' . Report::where('status', 'resolved')->count());
        $this->command->info('   - Rejected: ' . Report::where('status', 'rejected')->count());
    }
}
