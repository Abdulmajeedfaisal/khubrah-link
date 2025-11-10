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
        
        // Create Test Users
        $users = [
            ['name' => 'أحمد محمد', 'email' => 'ahmed@example.com'],
            ['name' => 'سارة علي', 'email' => 'sara@example.com'],
            ['name' => 'محمد خالد', 'email' => 'mohammed@example.com'],
            ['name' => 'فاطمة حسن', 'email' => 'fatima@example.com'],
            ['name' => 'عبدالله أحمد', 'email' => 'abdullah@example.com'],
            ['name' => 'نورة سعيد', 'email' => 'noura@example.com'],
            ['name' => 'خالد عمر', 'email' => 'khaled@example.com'],
            ['name' => 'ريم محمود', 'email' => 'reem@example.com'],
            ['name' => 'يوسف إبراهيم', 'email' => 'youssef@example.com'],
            ['name' => 'مريم عبدالله', 'email' => 'mariam@example.com'],
            ['name' => 'عمر حسين', 'email' => 'omar@example.com'],
            ['name' => 'لينا أحمد', 'email' => 'lina@example.com'],
            ['name' => 'سلطان محمد', 'email' => 'sultan@example.com'],
            ['name' => 'هند علي', 'email' => 'hind@example.com'],
            ['name' => 'فهد سعود', 'email' => 'fahad@example.com'],
            ['name' => 'شهد خالد', 'email' => 'shahad@example.com'],
            ['name' => 'تركي عبدالعزيز', 'email' => 'turki@example.com'],
            ['name' => 'جود محمد', 'email' => 'joud@example.com'],
            ['name' => 'بدر أحمد', 'email' => 'badr@example.com'],
            ['name' => 'دانة سعيد', 'email' => 'dana@example.com'],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'role' => 'user',
                'is_active' => rand(0, 1) ? true : false,
                'created_at' => now()->subDays(rand(0, 365)), // موزعة على السنة
            ]);
        }

        // Create more random users (with focus on recent dates)
        for ($i = 1; $i <= 30; $i++) {
            // 70% في آخر 30 يوم، 30% في باقي السنة
            $daysAgo = rand(1, 100) <= 70 ? rand(0, 30) : rand(31, 365);
            
            User::create([
                'name' => 'مستخدم ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'is_active' => rand(0, 1) ? true : false,
                'created_at' => now()->subDays($daysAgo),
            ]);
        }

        $this->command->info('✅ تم إنشاء ' . User::count() . ' مستخدم بنجاح!');
    }
}
