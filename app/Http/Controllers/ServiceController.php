<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Land;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use App\Models\Interaction;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index()
    {
        //
    }

    public function monService()
    {
        // Récupérer l'utilisateur connecté
        $userId = auth()->id();
    
        // Comptage des propriétés par statut pour l'utilisateur connecté
        $propertiesCount = [
            'approuver' => Property::where('user_id', $userId)->where('status', 'approuver')->count(),
            'rejeter' => Property::where('user_id', $userId)->where('status', 'rejeter')->count(),
            'en_attente' => Property::where('user_id', $userId)->where('status', 'en_attente')->count(),
            'total' => Property::where('user_id', $userId)->count(),
        ];
    
        // Comptage des terrains par statut pour l'utilisateur connecté
        $landsCount = [
            'approuver' => Land::where('user_id', $userId)->where('status', 'approuver')->count(),
            'rejeter' => Land::where('user_id', $userId)->where('status', 'rejeter')->count(),
            'en_attente' => Land::where('user_id', $userId)->where('status', 'en_attente')->count(),
            'total' => Land::where('user_id', $userId)->count(),
        ];
   
        // Récupérer les propriétés et terrains de l'utilisateur connecté
        $properties = Property::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(25);
        $lands = Land::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(25);
        // Get all subscriptions for the authenticated user
        $subscriptions = Subscription::where('user_id', $userId)
            ->where('end_date', '>=', now())
            ->with(['property', 'room', 'land'])
            ->get();
        // Récupérer les interactions
        $interactions = $this->getUserInteractions();
        // Préparer les données pour le graphique
        list($interactionDates, $viewCounts, $clickCounts) = $this->prepareInteractionData($interactions);
   
        return view('services.mon-service', [
            'subscriptions' =>$subscriptions,
            'properties' => $properties,
            'lands' => $lands,
            'propertiesCount' => $propertiesCount,
            'landsCount' => $landsCount,
            'interactions' => $interactions,
            'interactionDates' => $interactionDates,
            'viewCounts' => $viewCounts,
            'clickCounts' => $clickCounts,
            ]);
    }
    public function getUserInteractions()
    {
        $userId = Auth::id();

        // Retrieve interactions for the authenticated user
        return Interaction::where('user_id', $userId)
            ->with(['property', 'room', 'apartment', 'land', 'profile'])
            ->get();
    }
    public function prepareInteractionData($interactions)
    {
        // Initialize arrays to hold the data
        $interactionDates = [];
        $viewCounts = [];
        $clickCounts = [];

        // Group interactions by date
        $groupedInteractions = $interactions->groupBy(function($interaction) {
            return Carbon::parse($interaction->created_at)->format('Y-m-d');
        });

        // Loop through each date and calculate the counts
        foreach ($groupedInteractions as $date => $dailyInteractions) {
            $interactionDates[] = $date;
            $viewCounts[] = $dailyInteractions->where('interaction_type', 'view')->count();
            $clickCounts[] = $dailyInteractions->where('interaction_type', 'click')->count();
        }

        return [$interactionDates, $viewCounts, $clickCounts];
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
