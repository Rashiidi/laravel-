<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function register(Request $request, $activityId)
    {
        $user = Auth::user();

        // Check if the user is already registered
        $existingRegistration = Registration::where('user_id', $user->id)
            ->where('activity_id', $activityId)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You are already registered for this activity.');
        }

        // Register the user for the activity
        Registration::create([
            'user_id' => $user->id,
            'activity_id' => $activityId,
        ]);

        return redirect()->back()->with('success', 'You have successfully registered for the activity.');
    }
}