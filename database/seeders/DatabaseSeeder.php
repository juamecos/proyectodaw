<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(UserSeeder::class);
        $this->call(StoneSeeder::class);
        $this->call(StoneModerationLogSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(CommentModerationLogSeeder::class);
        $this->call(FoundSeeder::class);
        
    }
}
