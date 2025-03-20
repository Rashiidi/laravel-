<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch registered events
        $registrations = $user->registrations()->with('event')->get();

        // Fetch counts for dashboard stats
        $totalEvents = Event::count();
        $totalServices = Service::count();
        $totalUsers = User::count();

        return view('dashboard', compact('registrations', 'totalEvents', 'totalServices', 'totalUsers'));
    }
}
