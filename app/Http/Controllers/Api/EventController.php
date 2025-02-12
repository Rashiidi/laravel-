<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Create a new service
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
           
        ]);

        // Create and store the service
        $event = event::create([
            'title'=> $request->title,
            'location'=> $request->location,
        ]);

        // Return JSON response
        return response()->json([
            'message' => 'events created successfully',
            'events' => $event
        ], 201);
    }
}
