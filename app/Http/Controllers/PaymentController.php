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
     * Process a payment via Stripe.
     */
    public function processPayment(Request $request)
    {
        try {
            // 1) Check Stripe API key
            $stripeSecret = env('STRIPE_SECRET_KEY');
            if (!$stripeSecret) {
                throw new Exception("Stripe API key is not configured");
            }

            // 2) Set Stripe secret key
            Stripe::setApiKey($stripeSecret);

            // 3) Validate and sanitize input
            $amount          = (float) str_replace(['€', ','], '', $request->input('amount'));
            $paymentMethodId = $request->input('payment_method_id');
            $service         = $request->input('service');
            $clientName      = $request->input('client_name');
            $clientEmail     = $request->input('client_email');

            if (empty($paymentMethodId)) {
                throw new Exception("Payment method ID is required");
            }

            // 4) Convert amount to cents
            $amountInCents = round($amount * 100);

            // 5) Create PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount'             => $amountInCents,
                'currency'           => 'eur',
                'payment_method'     => $paymentMethodId,
                'confirmation_method'=> 'manual',
                'confirm'            => true,
                'return_url'         => url('/payment/return'),
                'metadata'           => [
                    'service'      => $service,
                    'client_name'  => $clientName,
                    'client_email' => $clientEmail,
                ],
            ]);

            // 6) Handle payment status
            if ($paymentIntent->status === 'succeeded') {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment successful',
                ]);
            }

            if ($paymentIntent->status === 'requires_action') {
                return response()->json([
                    'requires_action'              => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            }

            throw new Exception("Payment failed or requires additional action.");

        } catch (Exception $e) {
            // Log the error
            Log::error('Payment error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle return page after payment (return_url).
     */
    public function paymentReturn(Request $request)
    {
        $paymentIntentId = $request->query('payment_intent');
        $redirectStatus  = $request->query('redirect_status'); // "succeeded", "failed", etc.

        // Example: retrieve PaymentIntent if needed
        // $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        return view('payment.return', [
            'payment_intent_id' => $paymentIntentId,
            'redirect_status'   => $redirectStatus,
        ]);
    }
}
