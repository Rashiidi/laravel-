<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::all(); // Fetch all feedback from the database
        return view('feedback.index', compact('feedbacks')); // Pass feedback to the view
    }


    public function store(Request $request)
{
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'comment' => 'required|string|max:1000',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    Feedback::create([
        'user_id' => Auth::id(),
        'event_id' => $request->event_id,
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);

    return redirect()->back()->with('success', 'Feedback submitted successfully.');
}
}
