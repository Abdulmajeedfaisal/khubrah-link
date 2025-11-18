<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists
        $adminExists = User::where('email', 'admin@khubrahlink.com')->exists();

        if ($adminExists) {
            $this->command->info('Admin user already exists!');
            return;
        }

        // Create admin user
        User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@khubrahlink.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'role' => 'admin',
            'location' => 'الرياض',
            'bio' => 'مدير منصة خبرة لينك',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@khubrahlink.com');
        $this->command->info('Password: password');
        $this->command->warn('⚠️  Please change the password after first login!');
    }
}
