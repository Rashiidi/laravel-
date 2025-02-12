<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Create a new service
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Create and store the service
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Return JSON response
        return response()->json([
            'message' => 'Service created successfully',
            'service' => $service
        ], 201);
    }
}
