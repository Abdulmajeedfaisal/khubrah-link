<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Session;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get only completed sessions
        $completedSessions = Session::where('status', 'completed')->get();

        if ($completedSessions->isEmpty()) {
            $this->command->warn('⚠️ لا توجد جلسات مكتملة! قم بتشغيل SessionsSeeder أولاً.');
            return;
        }

        $comments = [
            // تقييمات إيجابية (4-5 نجوم)
            [
                'rating' => 5,
                'comments' => [
                    'معلم ممتاز! الشرح كان واضح ومفصل. استفدت كثيراً من الجلسة.',
                    'تجربة رائعة جداً. المعلم محترف وملم بالموضوع بشكل كامل.',
                    'أفضل جلسة حضرتها! الأستاذ صبور ويشرح بطريقة سهلة ومفهومة.',
                    'ممتاز جداً! حصلت على معلومات قيمة وأمثلة عملية مفيدة.',
                    'معلم محترف ومتمكن. أنصح الجميع بالتعلم معه.',
                ]
            ],
            [
                'rating' => 4,
                'comments' => [
                    'جلسة جيدة جداً. الشرح واضح لكن كنت أتمنى المزيد من الأمثلة العملية.',
                    'معلم جيد وملتزم بالوقت. استفدت من الجلسة.',
                    'تجربة جيدة بشكل عام. المعلم متعاون ويجيب على جميع الأسئلة.',
                    'جلسة مفيدة. الشرح كان جيد لكن الوقت كان قصيراً بعض الشيء.',
                    'معلم جيد ومحترم. أسلوب الشرح واضح ومنظم.',
                ]
            ],
            // تقييمات متوسطة (3 نجوم)
            [
                'rating' => 3,
                'comments' => [
                    'جلسة عادية. الشرح كان جيد لكن كنت أتوقع أكثر.',
                    'تجربة متوسطة. المعلم يحتاج لتحسين طريقة الشرح.',
                    'جلسة مقبولة. استفدت لكن ليس بالقدر المتوقع.',
                ]
            ],
            // تقييمات سلبية (1-2 نجوم)
            [
                'rating' => 2,
                'comments' => [
                    'الجلسة لم تكن بالمستوى المتوقع. الشرح كان سريعاً وغير واضح.',
                    'تجربة غير مرضية. المعلم لم يكن مستعداً بشكل جيد.',
                ]
            ],
        ];

        $reviewCount = 0;

        // Create reviews for 70% of completed sessions
        foreach ($completedSessions as $session) {
            // 70% chance to have a review
            if (rand(1, 100) > 70) continue;

            // 80% positive (4-5 stars), 15% neutral (3 stars), 5% negative (1-2 stars)
            $rand = rand(1, 100);
            if ($rand <= 80) {
                // Positive review (4-5 stars)
                $ratingGroup = rand(0, 1); // 0 for 5 stars, 1 for 4 stars
            } elseif ($rand <= 95) {
                // Neutral review (3 stars)
                $ratingGroup = 2;
            } else {
                // Negative review (1-2 stars)
                $ratingGroup = 3;
            }

            $selectedComments = $comments[$ratingGroup]['comments'];
            $overallRating = $comments[$ratingGroup]['rating'];
            
            // Add some variation to ratings
            if ($overallRating === 5 && rand(1, 100) <= 20) {
                $overallRating = 4; // 20% of 5-star reviews become 4-star
            }

            Review::create([
                'session_id' => $session->id,
                'reviewer_id' => $session->learner_id,
                'reviewee_id' => $session->teacher_id,
                'overall_rating' => $overallRating,
                'communication_rating' => max(1, $overallRating + rand(-1, 0)),
                'knowledge_rating' => max(1, $overallRating + rand(-1, 1)),
                'punctuality_rating' => max(1, $overallRating + rand(-1, 0)),
                'professionalism_rating' => max(1, $overallRating + rand(-1, 0)),
                'comment' => $selectedComments[array_rand($selectedComments)],
                'is_approved' => rand(1, 100) <= 95, // 95% approved
                'created_at' => $session->completed_at ?? $session->updated_at,
                'updated_at' => $session->completed_at ?? $session->updated_at,
            ]);

            $reviewCount++;
        }

        $this->command->info('✅ تم إنشاء ' . $reviewCount . ' تقييم بنجاح!');
        $this->command->info('   - 5 نجوم: ' . Review::where('overall_rating', 5)->count());
        $this->command->info('   - 4 نجوم: ' . Review::where('overall_rating', 4)->count());
        $this->command->info('   - 3 نجوم: ' . Review::where('overall_rating', 3)->count());
        $this->command->info('   - 2 نجوم: ' . Review::where('overall_rating', 2)->count());
        $this->command->info('   - 1 نجمة: ' . Review::where('overall_rating', 1)->count());
        $this->command->info('   - معتمدة: ' . Review::where('is_approved', true)->count());
        $this->command->info('   - قيد المراجعة: ' . Review::where('is_approved', false)->count());
    }
}
