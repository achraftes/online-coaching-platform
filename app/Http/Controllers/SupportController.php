<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    // Affiche le formulaire de support
    public function showForm()
    {
        return view('support');
    }

    // Envoie l'email au support
    public function sendSupportEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // Ici on enverrait l'email
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('achrafchikrabane@gmail.com') 
                 ->subject($request->subject)
                 ->from($request->email);
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
