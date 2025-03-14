<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\GoogleCalendarService;

class AppointmentController extends Controller
{
    protected $calendar;

    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }

    public function showForm(Request $request)
    {
        return view('appointment.form', [
            'user' => $request->all()
        ]);
    }

    public function schedule(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'result' => 'required',
            'appointment_date' => 'required|date|after:now'
        ]);

        try {
            // Création de l'événement dans Google Calendar
            $event = $this->calendar->createEvent([
                'start' => $validated['appointment_date'],
                'summary' => 'Coaching '.($validated['result'] === 'A' ? " Votre bilan personnalisé - Coaching Confiance en Soi" :  " Votre bilan personnalisé - Coaching Gestion du Stress et des Émotions"),
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

            return redirect()->back()->with('success', 'RDV confirmé! Un email de confirmation a été envoyé.');

        } catch (\Exception $e) {
            return back()->with('error', 'Erreur: '.$e->getMessage());
        }
    }
}