<?php

namespace Database\Factories;

use App\Models\CommentModerationLog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory for creating comment moderation logs.
 * Ensures that creators cannot moderate or report their own comments.
 *
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
        // Select a random comment
        $comment = Comment::inRandomOrder()->first();

        // Select a random user who is not the creator of the comment
        $user = User::where('id', '!=', $comment->user_id)->inRandomOrder()->first();

        // Determine the action based on the user role
        $actionTaken = $user->role === 'user' ? 'report' : $this->faker->randomElement(['report', 'moderation']);

        return [
            'comment_id' => $comment->id,
            'action_by' => $user->id,
            'action_taken' => $actionTaken,
            'reason' => $this->faker->sentence
        ];
    }
}

