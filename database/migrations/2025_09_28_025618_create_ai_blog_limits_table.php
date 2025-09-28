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
        Schema::create('ai_blog_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('month_year', 7); // Format: 2025-09
            $table->integer('usage_count')->default(0);
            $table->integer('monthly_limit')->default(20);
            $table->timestamps();

            // İndeksler
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'month_year']); // Aynı kullanıcı aynı ay için tek kayıt
            $table->index('month_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_blog_limits');
    }
};
