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
        Schema::create('stone_moderation_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stone_id')->constrained()->onDelete('cascade');
            $table->foreignId('action_by')->constrained('users')->onDelete('cascade');
            $table->string('action_taken');
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stone_moderation_logs');
    }
};
