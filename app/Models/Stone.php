<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'latitude',
        'longitude',
        'distance',
        'user_id'
        // No incluyas 'code' en fillable para evitar asignación masiva.
    ];

    protected $hidden = [
        // 'code' inicialmente está en hidden para evitar que se muestre en las serializaciones JSON por defecto
        'code',
        'abuse',
        'active',
        'moderation_status',
        'report_count'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'active' => 'boolean',
        'abuse' => 'boolean',
        'distance' => 'float',
        'id' => 'integer',
        'user_id' => 'integer',
        'report_count' => 'integer'
    ];

    protected $attributes = [
        'abuse' => false,
        'active' => true,
        'moderation_status' => 'pending',
        'report_count' => 0
    ];

    /**
     * Get the user that owns the stone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Customize the visible attributes for a given user.
     *
     * @param User|null $user
     * @return $this
     */
    public function makeVisibleForUserOrAdmin($user = null)
    {
        if ($user && ($this->user_id === $user->id || $user->role === 'admin')) {
            $this->makeVisible('code');
        }

        return $this;
    }

    public function makeVisibleForAdminOrModerator($user = null)
    {
        if ($user && ($user->role === 'admin' || $user->role === 'moderator')) {
            $this->makeVisible(['abuse', 'active', 'moderation_status', 'report_count']);
        }

        return $this;
    }
}
