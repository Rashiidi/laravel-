<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $registrations = $user->registrations()->with('event')->get(); // Fetch registered events
        $totalEvents = Event::count(); // Example to get total events
        $totalServices = Service::count(); // Example to get total services
        $totalUsers = User::count(); // Example to get total users

        return view('dashboard', compact('registrations', 'totalEvents', 'totalServices', 'totalUsers'));
    }
}
