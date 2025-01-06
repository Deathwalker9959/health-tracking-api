<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'steps',
        'calories_burned',
        'heart_rate',
        'kilometers_walked',
        'fat_burning_minutes',
        'bmi',
        'blood_pressure',
        'stress_level',
        'sleep_hours',
        'blood_glucose',
        'blood_oxygen',
        'water_intake',
        'weight',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
