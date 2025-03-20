<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from('votre_email@gmail.com')
                    ->to('achrafchikrabane@gmail.com') // Adresse email statique
                    ->subject('📅 Nouveau Rendez-vous Confirmé')
                    ->view('emails.appointment')
                    ->with('details', $this->details);
    }
}
