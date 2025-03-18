<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
public function register(Request $request, $eventId)
{
    $user = Auth::user();

    // Redirect to login if the user is not authenticated
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to register for an event.');
    }

    // Check if the user is already registered for the event
    if (Registration::where('user_id', $user->id)->where('event_id', $eventId)->exists()) {
        return redirect()->back()->with('error', 'You are already registered for this event.');
    }

    // Create the registration
    Registration::create([
        'user_id' => $user->id,
        'event_id' => $eventId,
    ]);

    // Redirect back to the event details page with a success message
    return redirect()->back()->with('success', 'Registration successful.');
}

    public function edit($id)
    {
        $registration = Registration::findOrFail($id); // Fetch the registration by ID
        $event = $registration->event; // Fetch the associated event
    
        return view('events.edit-registration', compact('event', 'registration'));
    }

    public function cancel($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $registration->delete(); // Delete the registration

        return redirect()->route('my-registrations')->with('success', 'Registration canceled successfully.');
    }

    public function myRegistrations()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('event')->get(); // Fetch user's registrations with event details

        return view('events.my-registrations', compact('registrations'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);
    
        // Find the registration and update the associated event
        $registration = Registration::findOrFail($id);
        $event = $registration->event;
    
        $event->update([
            'title' => $request->title,
            'date' => $request->date,
            'location' => $request->location,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('dashboard', $id)->with('success', 'Registration updated successfully.');
    }


}
