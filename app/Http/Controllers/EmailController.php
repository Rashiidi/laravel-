<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Log; // Import Log facade

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Send email logic here...

        // Log the email sending process
        Log::info('Email sent', [
            'to' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);

        // Save notification logic here...

        return back()->with('success', 'Emails sent successfully!');
    }
}
