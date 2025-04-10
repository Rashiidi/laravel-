<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function freeTrial()
    {
        return view('landing.free-trial');
    }

    
    public function submitTrial(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);
    
        // Save to DB or send email...
    
        return redirect()->route('free.trial')->with('success', 'You are now enrolled in the free trial!');
    }
    
}
