<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XpEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tenant_id',
        'xp',
    ];

    /**
     * Get the user that owns the XP entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
