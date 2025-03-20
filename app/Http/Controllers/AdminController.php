<?php
namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Activity;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function assignActivityForm()
    {
        $trainers = Trainer::all();
        $activities = Activity::all();

        return view('admin.assign-activity', compact('trainers', 'activities'));
    }

    public function assignActivity(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'activity_id' => 'required|exists:activities,id',
        ]);

        $trainer = Trainer::findOrFail($request->trainer_id);
        $trainer->activities()->attach($request->activity_id);

        return redirect()->back()->with('success', 'Activity assigned to trainer successfully.');
    }
}