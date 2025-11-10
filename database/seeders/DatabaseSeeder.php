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

        // Create reports
        $this->call(ReportsSeeder::class);

        $this->command->info('');
        $this->command->info('🎉 تم تعبئة قاعدة البيانات بنجاح!');
    }
}
