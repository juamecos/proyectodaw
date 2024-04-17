<?php

namespace Database\Seeders;

use App\Models\Found;
use Illuminate\Database\Seeder;

class FoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Found::factory()->count(101)->create();
    }
}
