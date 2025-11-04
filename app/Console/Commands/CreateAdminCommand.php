<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create 
                            {--name= : Admin name}
                            {--email= : Admin email}
                            {--password= : Admin password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔐 Creating Admin User...');
        $this->newLine();

        // Get admin details
        $name = $this->option('name') ?: $this->ask('Admin Name', 'Admin');
        $email = $this->option('email') ?: $this->ask('Admin Email', 'admin@khubrahlink.com');
        $password = $this->option('password') ?: $this->secret('Admin Password (leave empty for default: password)');

        // Use default password if empty
        if (empty($password)) {
            $password = 'password';
            $this->warn('Using default password: password');
        }

        // Validate email
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            $this->error('❌ Validation failed:');
            foreach ($validator->errors()->all() as $error) {
                $this->error('  - ' . $error);
            }
            return 1;
        }

        // Create admin user
        try {
            $admin = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);

            $this->newLine();
            $this->info('✅ Admin user created successfully!');
            $this->newLine();
            
            $this->table(
                ['Field', 'Value'],
                [
                    ['ID', $admin->id],
                    ['Name', $admin->name],
                    ['Email', $admin->email],
                    ['Password', '********'],
                    ['Is Admin', '✓ Yes'],
                ]
            );

            $this->newLine();
            $this->info('📝 Login Details:');
            $this->line("   Email: {$email}");
            $this->line("   Password: {$password}");
            $this->newLine();
            $this->warn('⚠️  Please change the password after first login!');
            $this->newLine();
            $this->info('🚀 Access admin panel at: http://localhost:8000/admin');

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Error creating admin user:');
            $this->error('  ' . $e->getMessage());
            return 1;
        }
    }
}
