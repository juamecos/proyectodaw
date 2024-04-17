<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentModerationLog extends Model
{
    use HasFactory;

    // Specify the database table used by the model
    protected $table = 'comment_moderation_logs';

    // Fields that are mass assignable
    protected $fillable = [
        'comment_id',  // ID of the comment being moderated
        'action_by',   // ID of the user who took the moderation action
        'action_taken',// Type of action taken (e.g., 'approved', 'rejected')
        'reason'       // Reason for the moderation action
    ];

    // Define the relationship to the Comment model
    // This function establishes that each log entry belongs to a specific comment
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    // Define the relationship to the User model
    // Indicates that each log entry is associated with a user who performed the action
    public function user()
    {
        return $this->belongsTo(User::class, 'action_by');
    }

    // TODO: Create a restriction in the controller or policy that only allows visibility by admin and moderator
}