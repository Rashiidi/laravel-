<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalServices = Service::count();
        $totalUsers = User::count();
        return view('dashboard', compact('totalEvents', 'totalServices','totalUsers'));
    }
}