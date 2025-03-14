<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;

class GoogleCalendarService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
        $this->client->addScope(Calendar::CALENDAR_EVENTS);
        
        // Charger le token d'accès (à stocker après l'authentification initiale)
        $this->client->setAccessToken(json_decode(file_get_contents(storage_path('app/google-token.json')), true));
    }

    public function createEvent($data)
    {
        $event = new Event([
            'summary' => $data['summary'],
            'start' => new EventDateTime(['dateTime' => $data['start']]),
            'end' => new EventDateTime(['dateTime' => date('c', strtotime($data['start'].' +1 hour'))]),
            'attendees' => array_map(function($attendee) {
                return ['email' => $attendee['email']];
            }, $data['attendees']),
            'reminders' => [
                'useDefault' => true,
            ],
        ]);

        $service = new Calendar($this->client);
        return $service->events->insert('primary', $event);
    }
}