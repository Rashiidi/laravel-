<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        // Example data, replace with actual calculations
        $totalRevenue = Event::sum('revenue');
        $totalParticipants = Event::sum('participants');

        return view('reports.index', compact('totalRevenue', 'totalParticipants'));
    }

    public function activityPerformance()
    {
        // Example data, replace with actual calculations
        $events = Event::all();

        return view('reports.activityPerformance', compact('events'));
    }
}