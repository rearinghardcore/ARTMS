<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LateEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'reason',
    ];

    /**
     * Get the user that owns the late entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
