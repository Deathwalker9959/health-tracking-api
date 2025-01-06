<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MealController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::parse($request->query('date', now()));
        $meals = $request->user()->meals()->whereDate('meal_date', $date)->get();
        return response()->json($meals);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'required|integer',
            'carbs' => 'nullable|numeric',
            'proteins' => 'nullable|numeric',
            'fats' => 'nullable|numeric',
            'meal_type' => 'required|in:breakfast,lunch,dinner,snack,brunch',
            'meal_date' => 'required|date',
        ]);

        $meal = $request->user()->meals()->create($validated);

        return response()->json($meal, 201);
    }
}