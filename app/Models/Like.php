<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['stone_id', 'user_id'];

    /**
     * Get the user that liked a stone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the stone that was liked.
     */
    public function stone()
    {
        return $this->belongsTo(Stone::class);
    }
}
