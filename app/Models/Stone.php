<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',  // Assuming 'image' is the field used, not 'image_path'
        'title',
        'description',
        'latitude',
        'longitude',
        'active',
        'abuse',
        'code',
        'distance',
        'user_id'
    ];

    protected $hidden = [
        'abuse',
        'active',
        'code',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'active' => 'boolean',
        'abuse' => 'boolean',
        'distance' => 'float',
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    protected $attributes = [
        'abuse' => false,
    ];

    /**
     * Get the user that owns the stone.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user:id');
    }
}
