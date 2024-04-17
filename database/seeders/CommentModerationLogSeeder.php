<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\CommentModerationLog;

class CommentModerationLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommentModerationLog::factory()->count(10)->create();
    }
}
