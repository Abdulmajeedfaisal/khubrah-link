<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Profile Information
            $table->string('username')->unique()->nullable()->after('name');
            $table->text('bio')->nullable()->after('email');
            $table->string('location')->nullable()->after('bio');
            $table->string('phone', 20)->nullable()->after('location');
            $table->string('avatar')->nullable()->after('phone');
            
            // User Type Flags
            $table->boolean('is_provider')->default(false)->after('avatar');
            $table->boolean('is_learner')->default(false)->after('is_provider');
            
            // Statistics
            $table->integer('total_sessions')->default(0)->after('is_learner');
            $table->decimal('average_rating', 3, 2)->default(0.00)->after('total_sessions');
            $table->integer('response_rate')->default(0)->after('average_rating');
            
            // Indexes for performance
            $table->index('username');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex(['username']);
            $table->dropIndex(['location']);
            
            // Drop columns
            $table->dropColumn([
                'username',
                'bio',
                'location',
                'phone',
                'avatar',
                'is_provider',
                'is_learner',
                'total_sessions',
                'average_rating',
                'response_rate',
            ]);
        });
    }
};
