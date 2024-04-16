<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stone;

class ClearStonesTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // This will delete al registers and reset the autoincrement counter
        Stone::truncate();
    }
}
