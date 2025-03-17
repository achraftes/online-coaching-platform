<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\GoogleCalendarService;

class AppointmentController extends Controller
{
    protected $calendar;

    // Injection du service Google Calendar
    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }

    // Afficher le formulaire de RDV avec pré-remplissage des données utilisateur
    public function showForm(Request $request)
    {
        // Validation des paramètres de l'URL
        $validatedParams = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'result' => 'required|in:A,B' 
        ]);

        return view('appointment.form', [
            'user' => $validatedParams // Données sécurisées
        ]);
    }

    // Traiter la soumission du formulaire
    public function schedule(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'result' => 'required|in:A,B',
            'appointment_date' => 'required|date|after:now',
            'comment' => 'nullable|string|max:500' 
        ]);

        try {
            // Création de l'événement Google Calendar
            $event = $this->calendar->createEvent([
                'start' => $validated['appointment_date'],
                'summary' => 'Coaching '.($validated['result'] === 'A' 
                    ? "Confiance en Soi" 
                    : "Gestion du Stress"),
                'description' => $validated['comment'] ?? 'Aucun commentaire',
                'attendees' => [
                    ['email' => $validated['email']],
                    ['email' => config('MAIL_FROM_ADDRESS')]
                ]
            ]);

            // Envoi email à l'admin
            Mail::send('emails.admin_notification', [
                'data' => $validated,
                'event' => $event
            ], function($message) use ($validated) {
                $message->to(config('MAIL_FROM_ADDRESS'))
                        ->subject('Nouveau RDV - '.$validated['fname']);
            });

            return redirect()->back()
                ->with('success', 'RDV confirmé! Un email de confirmation a été envoyé.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Erreur: '.$e->getMessage());
        }
    }
}