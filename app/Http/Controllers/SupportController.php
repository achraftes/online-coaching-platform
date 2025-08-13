<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    /**
     * Afficher le formulaire de support.
     */
    public function showForm()
    {
        return view('support');
    }

    /**
     * Envoyer un email au support.
     */
    public function sendSupportEmail(Request $request)
    {
        // 1) Validation des données
        $request->validate([
            'email'   => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // 2) Envoi de l'email
        Mail::send('emails.support', [
            'email'       => $request->email,
            'subject'     => $request->subject,
            'userMessage' => $request->message, // Évite le conflit avec la variable "message"
        ], function ($mail) use ($request) {
            $mail->to('achrafchikrabane@gmail.com')
                 ->subject($request->subject)
                 ->from($request->email);
        });

        // 3) Retour avec message de succès
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
