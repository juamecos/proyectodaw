<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'stone_id', 'user_id', 'content', 'active', 'abuse', 'moderation_status', 'report_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stone()
    {
        return $this->belongsTo(Stone::class);
    }
}

