<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Vérifier la connexion à la base de données
            DB::connection()->getPdo();
            
            // Log des données reçues
            Log::info('Données reçues:', $request->all());

            $validated = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'service' => 'required|string|max:255',
            ]);

            // Log avant la création
            Log::info('Données validées:', $validated);

            $client = Client::create($validated);

            // Log après la création
            Log::info('Client créé:', $client->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Client enregistré avec succès',
                'client' => $client
            ], 201);

        } catch (\PDOException $e) {
            Log::error('Erreur PDO: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur de base de données',
                'error' => $e->getMessage()
            ], 500);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreur de validation: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur générale: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'enregistrement du client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function checkEmail(Request $request)
    {
        try {
            $email = $request->input('email');
            $exists = Client::where('email', $email)->exists();
            
            return response()->json([
                'exists' => $exists
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la vérification de l\'email: ' . $e->getMessage());
            return response()->json([
                'error' => 'Erreur lors de la vérification de l\'email'
            ], 500);
        }
    }
}
