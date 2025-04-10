<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\EmailLog;
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

            $emails = EmailLog::orderBy('created_at', 'desc')->get();

        return view('trainers.dashboard', compact('events','emails'));
    }

    // View Participants
    public function participants($id)
{
    // Fetch event assigned to the trainer
    $event = Event::where('id', $id)->where('trainer_id', auth()->id())->firstOrFail();

    // Retrieve participants
    $participants = $event->participants()->get(); 

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
    public function reports(Request $request)
    {
        // Get trainer's events with participants and registrations
        $query = Event::where('trainer_id', auth()->id())->with(['participants', 'registrations']);
    
        // Apply date range filter
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }
    
        // Get events data
        $events = $query->get();
    
        // Ensure collections
        $events->each(function ($event) {
            $event->participants = collect($event->participants);
            $event->registrations = collect($event->registrations);
        });
    
        // Calculate statistics
        $totalEvents = $events->count();
        $totalParticipants = $events->sum(fn($event) => $event->participants->count());
        $averageParticipants = $totalEvents > 0 ? round($totalParticipants / $totalEvents) : 0;
    
        // Attendance statistics
        $totalAttended = $events->sum(fn($event) => $event->registrations->where('attended', true)->count());
        $attendanceRate = $totalParticipants > 0 ? round(($totalAttended / $totalParticipants) * 100, 2) : 0;
    
        return view('trainers.events.reports', compact(
            'events', 'totalEvents', 'totalParticipants', 'averageParticipants', 'totalAttended', 'attendanceRate'
        ));
    }
    

}
