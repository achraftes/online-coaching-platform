<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        try {
            // 1) Vérifier si la clé API est définie
            $stripeSecret = env('STRIPE_SECRET_KEY');
            if (!$stripeSecret) {
                throw new Exception('La clé API Stripe n\'est pas configurée');
            }

            // 2) Définir la clé API
            Stripe::setApiKey($stripeSecret);

            // 3) Validation et nettoyage des données
            $amount = (float) str_replace(['€', ','], '', $request->input('amount'));
            $paymentMethodId = $request->input('payment_method_id');
            $service = $request->input('service');

            if (empty($paymentMethodId)) {
                throw new Exception('ID de méthode de paiement manquant');
            }

            // 4) Convertir le montant en centimes et arrondir
            $amountInCents = round($amount * 100);

            // 5) Créer l'intention de paiement
            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInCents,
                'currency' => 'eur',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,

                // *** IMPORTANT : fournir le return_url ***
                'return_url' => url('/payment/return'),

                'metadata' => [
                    'service' => $service,
                    'client_name' => $request->input('client_name'),
                    'client_email' => $request->input('client_email')
                ],
            ]);

            // 6) Vérifier le statut du paiement
            if ($paymentIntent->status === 'succeeded') {
                // Paiement réussi directement
                return response()->json([
                    'success' => true,
                    'message' => 'Paiement réussi',
                ]);
            } else if ($paymentIntent->status === 'requires_action') {
                // Stripe indique qu'une action (3D Secure ou redirection) est requise
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret
                ]);
            } else {
                // Autres cas : échec ou statut inattendu
                throw new Exception('Le paiement a échoué ou nécessite une action supplémentaire.');
            }
        } catch (Exception $e) {
            // Journaliser l'erreur et renvoyer une réponse 500
            Log::error('Erreur de paiement: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Méthode d'exemple pour le "return_url"
     * Vous pouvez renvoyer sur une vue de confirmation ou vérifier l'état du PaymentIntent.
     */
    public function paymentReturn(Request $request)
    {
        // Stripe renverra ici le client après la redirection
        // Exemple : Récupérer l'ID du PaymentIntent
        $paymentIntentId = $request->query('payment_intent');
        $redirStatus     = $request->query('redirect_status'); // may be 'succeeded', 'failed', etc.

        // Vous pouvez faire ici une vérification supplémentaire
        // $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        return view('payment.return', [
            'payment_intent_id' => $paymentIntentId,
            'redirect_status'   => $redirStatus,
            ]);
        }
}
