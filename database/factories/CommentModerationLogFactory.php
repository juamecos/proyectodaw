<?php

namespace Database\Factories;

use App\Models\CommentModerationLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentModerationLog>
 */
class CommentModerationLogFactory extends Factory
{

    protected $model = CommentModerationLog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment_id' => Comment::inRandomOrder()->firstOrFail()->id,
            'action_by' => User::inRandomOrder()->firstOrFail()->id,
            'action_taken' => $this->faker->randomElement(['moderation', 'report']),
            'reason' => $this->faker->sentence
        ];
    }
}
