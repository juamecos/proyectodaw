<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Like;
use App\Models\Stone;
use App\Models\User;


class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
{
    return [
        'stone_id' => Stone::inRandomOrder()->firstOrFail()->id,
        'user_id' => User::inRandomOrder()->firstOrFail()->id,
    ];
}
}
