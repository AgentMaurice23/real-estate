<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Land;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Notifications\BoostSubscriptionNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Interaction;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $properties = Property::where('user_id', $user->id)->get();
        $rooms = Room::where('user_id', $user->id)->get();
        $lands = Land::where('user_id', $user->id)->get();

        return view('subscriptions.index', compact('properties', 'rooms', 'lands'));
    }
    public function showBoostedItems()
    {
        $userId = Auth::id();
    
        // Retrieve subscriptions for the authenticated user where the boost is still active
        $subscriptions = Subscription::with(['property', 'land', 'room'])
            ->where('user_id', $userId)
            ->where('end_date', '>', now())
            ->get();
    
        // Filter and group subscriptions by type
        $boostedProperties = $subscriptions->filter(function ($subscription) {
            return $subscription->property_id !== null;
        })->map->property;
    
        $boostedLands = $subscriptions->filter(function ($subscription) {
            return $subscription->land_id !== null;
        })->map->land;
    
        $boostedRooms = $subscriptions->filter(function ($subscription) {
            return $subscription->room_id !== null;
        })->map->room;
    
        return view('services.subscriptions.boostor-post', compact('boostedProperties', 'boostedLands', 'boostedRooms'));
    }
    public function show($type, $id)
    {
        $item = null;

        if ($type === 'property') {
            $item = Property::findOrFail($id);
        } elseif ($type === 'room') {
            $item = Room::findOrFail($id);
        } elseif ($type === 'land') {
            $item = Land::findOrFail($id);
        }

        return view('subscriptions.show', compact('item', 'type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:property,room,land',
            'id' => 'required|integer',
            'duration' => 'required|integer|min:1',
            'payment_method' => 'required|string',
        ]);

        $user = auth()->user();
        $duration = (int) $request->duration; // Convertir la durée en entier
        $pricePerDay = 200; // ou 100, selon votre choix
        $totalPrice = $duration * $pricePerDay;

        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->duration = $duration;
        $subscription->price = $totalPrice;

        $type = $request->type;
        $item = null;

        if ($type === 'property') {
            $subscription->property_id = $request->id;
            $item = Property::find($request->id);
        } elseif ($type === 'room') {
            $subscription->room_id = $request->id;
            $item = Room::find($request->id);
        } elseif ($type === 'land') {
            $subscription->land_id = $request->id;
            $item = Land::find($request->id);
        }

        $subscription->end_date = Carbon::now()->addDays($duration); // Ajouter la durée en jours
        $subscription->save();

       $data = [
            'action_type' => 'boost',
            'type' => $type,
            'title' => $item->title,
            'duration' => $duration,
            'price' => $totalPrice,
            'property_id' => $item->id,
            'user_id' => $user->id,
            'user_email' => $user->email,
        ];

        $user->notify(new BoostSubscriptionNotification($data));
        // Logique pour le paiement, si nécessaire

        return redirect()->route('services.mon-service')->with('success', 'Boost créé avec succès.');
    }
    public function checkBoostStatus(Request $request)
    {
        $item_id = $request->query('item_id');
        $type = $request->query('type');

        $boosting = Subscription::where($type . '_id', $item_id)
                                ->where('end_date', '>', now())
                                ->exists();

        return response()->json(['boosting' => $boosting]);
    }
}
