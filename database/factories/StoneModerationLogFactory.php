<?php

namespace Database\Factories;

use App\Models\StoneModerationLog;
use App\Models\User;
use App\Models\Stone;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentModerationLog>
 */
class StoneModerationLogFactory extends Factory
{
    protected $model = StoneModerationLog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Select a random stone
        $stone = Stone::inRandomOrder()->first();

        // Select a random user who is not the creator of the stone
        $user = User::where('id', '!=', $stone->user_id)->inRandomOrder()->first();

        // Determine the action based on the user role
        $actionTaken = $user->role === 'user' ? 'report' : $this->faker->randomElement(['report', 'moderation']);

        return [
            'stone_id' => $stone->id,
            'action_by' => $user->id,
            'action_taken' => $actionTaken,
            'reason' => $this->faker->sentence
        ];
    }
}
