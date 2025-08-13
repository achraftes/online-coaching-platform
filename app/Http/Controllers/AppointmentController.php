<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;

class AppointmentController extends Controller
{
    /**
     * Afficher le formulaire avec les paramètres de l'URL.
     */
    public function showForm(Request $request)
    {
        // 1) Validation des paramètres de l'URL
        $validatedParams = $request->validate([
            'fname'  => 'required|string|max:50',
            'lname'  => 'required|string|max:50',
            'email'  => 'required|email',
            'phone'  => 'required|string|max:20',
            'result' => 'required|in:A,B',
        ]);

        // 2) Retourner la vue avec les données validées
        return view('appointment', [
            'fname'  => $validatedParams['fname'],
            'lname'  => $validatedParams['lname'],
            'email'  => $validatedParams['email'],
            'phone'  => $validatedParams['phone'],
            'result' => $validatedParams['result'],
        ]);
    }

    /**
     * Traiter la soumission du formulaire et planifier le rendez-vous.
     */
    public function scheduleAppointment(Request $request)
    {
        // 1) Validation des données du formulaire
        $validated = $request->validate([
            'fname'            => 'required|string|max:50',
            'lname'            => 'required|string|max:50',
            'email'            => 'required|email',
            'phone'            => 'required|string|max:20',
            'result'           => 'required|in:A,B',
            'appointment_date' => 'required|date',
            'comment'          => 'nullable|string|max:500',
        ]);

        // 2) Préparation des données à envoyer dans l'email
        $details = [
            'fname'            => $validated['fname'],
            'lname'            => $validated['lname'],
            'email'            => $validated['email'],
            'phone'            => $validated['phone'],
            'result'           => $validated['result'],
            'appointment_date' => $validated['appointment_date'],
            'comment'          => $request->input('comment', ''),
        ];

        // 3) Envoi de l'email
        Mail::to('achrafchikrabane@gmail.com')->send(new AppointmentMail($details));

        // 4) Redirection avec un message de succès
        return redirect()
            ->route('appointment.form', [
                'fname'  => $validated['fname'],
                'lname'  => $validated['lname'],
                'email'  => $validated['email'],
                'phone'  => $validated['phone'],
                'result' => $validated['result'],
            ])
            ->with(
                'success',
                'Votre rendez-vous a été confirmé et un email a été envoyé à achrafchikrabane@gmail.com.'
            );
    }
}
