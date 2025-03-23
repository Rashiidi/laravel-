<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Registration;

class TrainerController extends Controller
{
    // Trainer Dashboard
    public function dashboard()
    {
        // Fetch events assigned to the logged-in trainer along with their participants
        $events = Event::where('trainer_id', auth()->id())
            ->with('participants') // Eager load participants
            ->get();

        return view('trainers.dashboard', compact('events'));
    }

    // View Participants
    public function participants($id)
    {
        $event = Event::where('id', $id)->where('trainer_id', auth()->id())->firstOrFail();
        $participants = $event->participants; // Fetch registered users

        return view('trainers.events.participants', compact('event', 'participants'));
    }

    // Mark Attendance
    public function markAttendance(Request $request, $id)
    {
        $event = Event::where('id', $id)->where('trainer_id', auth()->id())->firstOrFail();

        foreach ($request->participants as $userId => $status) {
            $registration = $event->registrations()->where('user_id', $userId)->first();
            if ($registration) {
                $registration->attended = $status;
                $registration->save();
            }
        }

        return redirect()->route('trainer.participants', $id)->with('success', 'Attendance updated successfully!');
    }

    // Generate Reports
    public function reports()
    {
        $events = Event::where('trainer_id', auth()->id())->with('participants')->get();

        return view('trainers.events.reports', compact('events'));
    }
}