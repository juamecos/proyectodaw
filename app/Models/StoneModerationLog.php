<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoneModerationLog extends Model
{
    use HasFactory;

    // Fields that are mass assignable
    protected $fillable = [
        'stone_id',    // ID of the associated stone
        'action_by',   // ID of the user who took the action
        'action_taken',// Type of action taken (report || moderation)
        'reason'       // Reason for the moderation action
    ];

    /**
     * Relationship to the Stone model.
     * Indicates that each log entry belongs to a stone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stone()
    {
        return $this->belongsTo(Stone::class, 'stone_id');
    }

    /**
     * Relationship to the User model.
     * Indicates that each log entry is associated with a user,
     * specifically the one who performed the moderation action.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'action_by');
    }

    //TODO create a restriction in controller or policy that only vissible by admin and moderator
}
