<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function showBuyForm()
    {
        return view('services.buy');
    }

    public function showRentForm()
    {
        return view('services.rent');
    }

    public function processPurchase(Request $request)
    {
        // Validez et traitez les données de la demande d'achat
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'message' => 'nullable|string',
        ]);

        // Créez un PaymentIntent pour le paiement
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => 5000, // Montant en centimes (50.00 EUR)
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);

        $clientSecret = $paymentIntent->client_secret;

        return view('services.buy', compact('clientSecret'));
    }

    public function processRent(Request $request)
    {
        // Validez et traitez les données de la demande de location
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'message' => 'nullable|string',
        ]);

        // Créez un PaymentIntent pour le paiement
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => 5000, // Montant en centimes (50.00 EUR)
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);

        $clientSecret = $paymentIntent->client_secret;

        return view('services.rent', compact('clientSecret'));
    }

    public function handlePayment(Request $request)
    {
        // Logique pour gérer la réponse de Stripe après le paiement
        return redirect()->route('welcome')->with('success', 'Payment successful.');
    }
}
