<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Import the Service model

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Retrieve all services from the database
        return view('services', compact('services'));
    }
}
