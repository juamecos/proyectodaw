<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    use HasFactory;

    protected $fillable = ['stone_id', 'user_id', 'latitude', 'longitude'];
    

    public function stone()
    {
        return $this->belongsTo(Stone::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
