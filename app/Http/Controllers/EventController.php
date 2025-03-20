<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function front()
    {
        $events = Event::paginate(6);
        return view('events.front', compact('events'));
    }

    public function create()
    {
        return view('events.createForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $existingEvent = Event::where('title', $request->title)
            ->where('location', $request->location)
            ->first();

        if ($existingEvent) {
            return redirect('/events')->with('error', 'Event already exists.');
        }

        $event = Event::create($request->all());

        return redirect('/events')->with('success', 'Event has been created successfully');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.editForm', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function register(Request $request, $eventId)
    {
        $user = Auth::user();

        // Check if the user is already registered
        $existingRegistration = Registration::where('user_id', $user->id)
            ->where('event_id', $eventId)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        // Register the user for the event
        Registration::create([
            'user_id' => $user->id,
            'event_id' => $eventId,
        ]);

        return redirect()->back()->with('success', 'You have successfully registered for the event.');
    }

 
}