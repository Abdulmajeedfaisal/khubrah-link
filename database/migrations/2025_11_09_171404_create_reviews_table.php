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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('skill_sessions')->onDelete('cascade');
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reviewee_id')->constrained('users')->onDelete('cascade');
            $table->integer('overall_rating')->comment('1-5 stars');
            $table->integer('communication_rating')->nullable()->comment('1-5 stars');
            $table->integer('knowledge_rating')->nullable()->comment('1-5 stars');
            $table->integer('punctuality_rating')->nullable()->comment('1-5 stars');
            $table->integer('professionalism_rating')->nullable()->comment('1-5 stars');
            $table->text('comment')->nullable();
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
            
            // Unique constraint: one review per session
            $table->unique('session_id');
            
            // Indexes
            $table->index('reviewer_id');
            $table->index('reviewee_id');
            $table->index('overall_rating');
            $table->index('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
