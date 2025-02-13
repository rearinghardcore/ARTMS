<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LateEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'student_id',
        'date',
        'time',
        'reason',
        'status', // Add status to fillable attributes
    ];

    /**
     * Get the user that owns the late entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
