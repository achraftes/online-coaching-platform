<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Google\Client;
use Google\Service\Calendar;

class GetGoogleToken extends Command
{
    protected $signature = 'google:token';
    protected $description = 'Generate Google OAuth token';

    public function handle()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->addScope(Calendar::CALENDAR_EVENTS);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Génération de l'URL d'autorisation
        $authUrl = $client->createAuthUrl();
        $this->info("Ouvrez ce lien dans votre navigateur :");
        $this->line($authUrl);

        // Récupération du code d'autorisation
        $authCode = $this->ask('Entrez le code d\'autorisation de la page Google');

        // Échange du code contre un token
        try {
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            file_put_contents(storage_path('app/google-token.json'), json_encode($accessToken));
            $this->info("Token généré avec succès !");
        } catch (\Exception $e) {
            $this->error("Erreur : " . $e->getMessage());
        }
    }
}
