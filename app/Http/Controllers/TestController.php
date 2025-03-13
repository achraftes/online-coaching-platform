<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sendTestEmail(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            // 'service' => 'required|string',
            'result' => 'required|string',
        ]);
        
        $subject = $data['result'] === 'A' ? " Votre bilan personnalisé - Coaching Confiance en Soi" : " Votre bilan personnalisé - Coaching Gestion du Stress et des Émotions";

        Mail::send('emails.test_result', ['data' => $data], function ($message) use ($data, $subject) {
            $message->to($data['email'])
                    ->subject($subject);
        });

        return response()->json(['success' => true]);
    }
}
