<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'notifications_enabled',
        'daily_step_goal',
        'daily_calorie_goal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}