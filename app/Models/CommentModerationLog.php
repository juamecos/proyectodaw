<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentModerationLog extends Model
{

    use HasFactory;

    protected $table = 'comment_moderation_logs';

    protected $fillable = [
        'comment_id', 'action_by', 'action_taken', 'reason'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
}