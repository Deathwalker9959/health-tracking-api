<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'notifications_enabled' => 'boolean',
            'daily_step_goal' => 'integer|min:0',
            'daily_calorie_goal' => 'integer|min:0',
        ]);

        $user = $request->user();
        $preferences = $user->preferences()->updateOrCreate([], $validated);

        return response()->json($preferences);
    }

    public function index(Request $request)
    {
        $preferences = $request->user()->preferences;

        return response()->json([
            'notifications_enabled' => $preferences->notifications_enabled ?? false,
            'daily_step_goal' => $preferences->daily_step_goal ?? 10000,
            'daily_calorie_goal' => $preferences->daily_calorie_goal ?? 2000,
        ]);
    }
}
