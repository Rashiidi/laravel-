<?php
namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function dashboard()
{
    // Fetch the logged-in user's activities (assuming the user is a trainer)
    $activities = Activity::whereHas('trainers', function ($query) {
        $query->where('trainer_id', Auth::id());
    })->get();

    // Fetch registrations for the activities
    $registrations = [];
    foreach ($activities as $activity) {
        foreach ($activity->registrations as $registration) {
            $registrations[] = $registration;
        }
    }

    return view('trainers.dashboard', compact('activities', 'registrations'));
}

public function reports()
{
    $trainer = Auth::user();
    $activities = $trainer->activities ?? collect(); // Ensure $activities is a collection

    // Handle case where no activities are assigned
    if ($activities === null || $activities->isEmpty()) {
        return view('trainers.reports', [
            'totalParticipants' => 0,
            'attendanceRate' => 0,
        ]);
    }

    // Calculate total participants
    $totalParticipants = $activities->sum(function ($activity) {
        return $activity->registrations->count();
    });

    // Calculate attendance rate
    $totalAttended = $activities->sum(function ($activity) {
        return $activity->registrations->where('attended', true)->count();
    });

    $attendanceRate = $totalParticipants > 0
        ? round(($totalAttended / $totalParticipants) * 100, 2)
        : 0;

    return view('trainers.reports', compact('totalParticipants', 'attendanceRate'));
}

public function markAttendance(Request $request, $registrationId)
{
    $registration = Registration::findOrFail($registrationId);

    $registration->update([
        'attended' => $request->has('attended'),
    ]);

    return redirect()->back()->with('success', 'Attendance updated successfully.');
}
}
