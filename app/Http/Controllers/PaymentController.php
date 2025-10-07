<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Traiter un paiement via Stripe.
     */
    public function processPayment(Request $request)
    {
        try {
            // 1) Vérifier la présence de la clé API Stripe
            $stripeSecret = env('STRIPE_SECRET_KEY');
            if (!$stripeSecret) {
                throw new Exception("La clé API Stripe n'est pas configurée");
            }

            // 2) Configurer Stripe
            Stripe::setApiKey($stripeSecret);

            // 3) Validation et nettoyage des données
            $amount           = (float) str_replace(['€', ','], '', $request->input('amount'));
            $paymentMethodId  = $request->input('payment_method_id');
            $service          = $request->input('service');
            $clientName       = $request->input('client_name');
            $clientEmail      = $request->input('client_email');

            if (empty($paymentMethodId)) {
                throw new Exception("ID de méthode de paiement manquant");
            }

            // 4) Conversion du montant en centimes
            $amountInCents = round($amount * 100);

            // 5) Création de l'intention de paiement
            $paymentIntent = PaymentIntent::create([
                'amount'             => $amountInCents,
                'currency'           => 'eur',
                'payment_method'     => $paymentMethodId,
                'confirmation_method'=> 'manual',
                'confirm'            => true,
                'return_url'         => url('/payment/return'),
                'metadata'           => [
                    'service'       => $service,
                    'client_name'   => $clientName,
                    'client_email'  => $clientEmail,
                ],
            ]);

            // 6) Gestion des statuts de paiement
            if ($paymentIntent->status === 'succeeded') {
                return response()->json([
                    'success' => true,
                    'message' => 'Paiement réussi',
                ]);
            }

            if ($paymentIntent->status === 'requires_action') {
                return response()->json([
                    'requires_action'              => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            }

            throw new Exception("Le paiement a échoué ou nécessite une action supplémentaire.");

        } catch (Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur de paiement : ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Page de retour après paiement (return_url).
     */
    public function paymentReturn(Request $request)
    {
        $paymentIntentId = $request->query('payment_intent');
        $redirectStatus  = $request->query('redirect_status'); // "succeeded", "failed", etc.

        // Exemple : récupération du PaymentIntent si nécessaire
        // $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        return view('payment.return', [
            'payment_intent_id' => $paymentIntentId,
            'redirect_status'   => $redirectStatus,
        ]);
    }
}
