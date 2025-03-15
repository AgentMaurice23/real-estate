<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCode;
use Carbon\Carbon;

class TwoFactorAuthController extends Controller
{
    public function sendTwoFactorCode()
    {
        $user = Auth::user();
        $user->two_factor_code = rand(100000, 999999);
        $user->two_factor_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new TwoFactorCode($user));

        return redirect()->route('two-factor.login')->with('success', 'Le code de vérification a été envoyé à votre adresse email.');
    }

    public function showTwoFactorForm()
    {
        return view('auth.two-factor-challenge');
    }

    public function verifyTwoFactorCode(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
        ]);

        $user = Auth::user();

        if ($user->two_factor_code === $request->input('code') && $user->two_factor_expires_at->isFuture()) {
            $user->resetTwoFactorCode();
            return redirect()->intended('/')->with('success', 'Authentification à deux facteurs réussie.');
        }

        return redirect()->route('two-factor.login')->with('error', 'Le code de vérification est invalide ou a expiré.');
    }
}
