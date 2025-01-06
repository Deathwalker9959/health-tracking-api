<?php

namespace App\Http\Controllers;

use App\Models\HealthData;
use Illuminate\Http\Request;

class HealthDataController extends Controller
{
    public function index(Request $request)
    {
        $healthData = $request->user()->healthData()
            ->whereBetween('date', [
                $request->query('start_date', now()->subDays(7)),
                $request->query('end_date', now()),
            ])
            ->get();

        return response()->json($healthData);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'steps' => 'nullable|integer',
            'calories_burned' => 'nullable|numeric',
            'heart_rate' => 'nullable|numeric',
            'kilometers_walked' => 'nullable|numeric',
            'fat_burning_minutes' => 'nullable|numeric',
            'bmi' => 'nullable|numeric',
            'blood_pressure' => 'nullable|string',
            'stress_level' => 'nullable|integer',
            'sleep_hours' => 'nullable|numeric',
            'blood_glucose' => 'nullable|numeric',
            'blood_oxygen' => 'nullable|numeric',
            'water_intake' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);

        $healthData = $request->user()->healthData()->create($validated);

        return response()->json($healthData, 201);
    }
}