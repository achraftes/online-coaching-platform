<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function showForm()
    {
        return view('support');
    }

    public function sendSupportEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // Remplacer 'message' par 'userMessage' pour éviter le conflit
        Mail::send('emails.support', [
            'email' => $request->email,
            'subject' => $request->subject,
            'userMessage' => $request->message, // <-- changement ici
        ], function ($mail) use ($request) {
            $mail->to('achrafchikrabane@gmail.com')
                 ->subject($request->subject)
                 ->from($request->email);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
