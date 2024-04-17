<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoneModerationLog;

class StoneModerationLogSeeder extends Seeder
{
    public function run()
    {
        // Create 20 moderation log entries
        StoneModerationLog::factory()->count(20)->create();
    }
}
