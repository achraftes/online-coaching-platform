<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    /**
     * Envoyer un email avec le résultat du test.
     */
    public function sendTestEmail(Request $request)
    {
        // 1) Validation des données reçues
        $data = $request->validate([
            'fname'  => 'required|string',
            'lname'  => 'required|string',
            'email'  => 'required|email',
            'phone'  => 'required',
            // 'service' => 'required|string', // Peut être activé si nécessaire
            'result' => 'required|string',
        ]);

        // 2) Détermination du sujet de l'email
        $subject = $data['result'] === 'A'
            ? "Votre bilan personnalisé - Coaching Confiance en Soi"
            : "Votre bilan personnalisé - Coaching Gestion du Stress et des Émotions";

        // 3) Envoi de l'email
        Mail::send('emails.test_result', ['data' => $data], function ($message) use ($data, $subject) {
            $message->to($data['email'])
                    ->subject($subject);
        });

        // 4) Réponse JSON
        return response()->json(['success' => true]);
    }
}
