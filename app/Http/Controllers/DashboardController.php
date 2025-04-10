<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Mail\TrainerNotification;
use App\Models\Notification;
use App\Models\Registration;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

         // Fetch unread notifications for the logged-in user
    $notifications = Notification::where('user_id', Auth::id())->where('is_read', false)->get();

        // Fetch registered events
        $registrations = $user->registrations()->with('event')->get();

        // Fetch counts for dashboard stats
        $totalEvents = Event::count();
        $totalServices = Service::count();
        $totalUsers = User::count();

        return view('dashboard', compact('registrations', 'totalEvents', 'totalServices', 'totalUsers','notifications'));

    }


    public function sendEmailToTrainers(Request $request)
{
    $request->validate([
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    $subject = $request->subject;
    $messageBody = $request->message;

    // Assuming trainers have a 'role' column in the users table
    $trainers = User::where('role', 'trainer')->pluck('email');

    foreach ($trainers as $trainerEmail) {
        Mail::to($trainerEmail)->send(new TrainerNotification($subject, $messageBody));
    }

    return back()->with('success', 'Emails sent successfully to all trainers!');
}
}
