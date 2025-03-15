<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property; // Add this line
use App\Http\Requests\PropertyFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Reponse;
use App\Models\Land;
use Rinvex\Country\CountryLoader;
use App\Models\Interaction;
use App\Models\Profil;
use Carbon\Carbon;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPropertyNotification;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
    
        if ($properties->isEmpty()) {
            // Handle the case when there are no properties
            return view('services.all-view-properties', [
                'properties' => [], // Pass an empty array or any other data you need
                'message' => 'No properties found', // Optional: pass a message to the view
            ]);
        }
    
        return view('services.all-view-properties', [
            'properties' => $properties
        ]);
    }
    

    public function create()
    {
        $property = new Property();
    
        $property->fill([
            'surface' => 40,
            'bedrooms' => 1,
            'floor' => 0,
            'price' => 10000,
            'postal_code' => 'BP 678',
            'sold' => false,
        ]);
    
        $countries = countries();
    
        $countriesList = [];
    
        if (is_array($countries)) {
            // Pluck only the country names
            foreach ($countries as $country) {
                if (isset($country['name'])) {
                    $countriesList[] = $country['name'];
                }
            }
    
            // Sort the country names alphabetically
            sort($countriesList);
        }
    
        return view('properties.form', [
            'property' => $property,
            'countries' => $countriesList
        ]);
    }

    public function fetchCities($query)
    {
        // Remplacez 'YOUR_API_KEY' par votre clé d'API de géolocalisation
        $apiKey = '6b5b4c508d10464e8f93104bc6fcb040';
        $url = "https://api.opencagedata.com/geocode/v1/json?q={$query}&maxRows=10&username={$apiKey}";
    
        $response = Http::get($url);
    
        if ($response->successful()) {
            $cities = $response->json()['geonames'];
            return response()->json($cities);
        } else {
            return response()->json(['error' => 'Failed to fetch cities'], 500);
        }
        
        return view('properties.form', compact('reponse'));
    }    


    public function getCities($countryCode)
    {
        $cities = []; // Remplacez ceci par votre propre logique pour obtenir les citys
        return response()->json($cities);
    }

    public function home()
    {
        return view('home');
    }

  
    public function filter(Request $request)
    {
        $categorie = $request->input('categorie');
        $price = $request->input('price');
    
        $propertiesQuery = Property::query();
        $landsQuery = Land::query();
    
        if ($categorie) {
            $propertiesQuery->where('type', $categorie);
            $landsQuery->where('type', $categorie);
        }
    
        if ($price) {
            [$minPrice, $maxPrice] = explode('-', $price);
            $propertiesQuery->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
            $landsQuery->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
        }
    
        $properties = $propertiesQuery->get();
        $lands = $landsQuery->get();
    
        return response()->json([
            'properties' => $properties,
            'lands' => $lands,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        try {
            // Commencer la transaction
            DB::beginTransaction();
            
            // Récupérer l'utilisateur connecté
            $user = auth()->user();
            //dd($request);

            // Traiter les fichiers téléchargés et obtenir les chemins des fichiers
            $cheminsDocuments = [];
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $document) {
                    $cheminsDocuments[] = $document->store('properties', 'public');
                }
            }
            $cheminsFichiers = [];
            if ($request->hasFile('fichiers')) {
                foreach ($request->file('fichiers') as $fichier) {
                    $cheminsFichiers[] = $fichier->store('properties', 'public');
                }
            }
          
            //dd($cheminsDocuments,$cheminsFichiers);
            // Créer la propriété
            $property = Property::create(array_merge($request->validated(), [
                'documents' => $cheminsDocuments,
                'fichiers' => $cheminsFichiers,
                'user_id' => $user->id,
            ]));


            // Valider la transaction
            DB::commit();
            $data = [
                'action_type' => 'creation',
                'property_type' => 'property',
                'property_id' => $property->id,
                'property_title' => $property->title,
                'user' => [
                    'id' => auth()->user()->id,
                    'email' => auth()->user()->email
                ],
                'created_at' => now()
            ];
            //event(new PropertyPublished($property));
            $user -> notify(new NewPropertyNotification($property, $data));
            return redirect()->route('services.mon-service')->with('success', 'Le bien a bien été créé');
        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();
            
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }
    
    public function showDetails(Property $property)
    {
        // Vérifiez si l'utilisateur est authentifié
        $userId = auth()->id();
        if ($userId) {
            // Enregistrer la vue de la propriété
            Interaction::recordView('property', $property->id, $userId);
            Interaction::recordClick('property', $property->id, $userId);
        } else {
            // Ajouter un message de débogage
            \Log::debug('Utilisateur non authentifié. Impossible d\'enregistrer les interactions.');
        }
    
        // Récupérer l'agent qui a publié cette propriété
        $agent = $property->user;
    
        // Récupérer les autres propriétés publiées par cet agent, à l'exclusion de celle-ci
        $otherProperties = Property::where('user_id', $agent->id)
                                   ->where('id', '!=', $property->id)
                                   ->orderBy('created_at', 'desc')
                                   ->take(4)
                                   ->get();
    
        // Appeler la méthode accederFichiers pour obtenir les réponses des fichiers
        $responses = $this->accederFichiers($property);
    
        // Convertir les réponses des fichiers en un tableau associatif avec les noms de fichier comme clés
        $fichiers = [];
        foreach ($responses as $nomFichier => $response) {
            $fichiers[$nomFichier] = $response->getContent();
        }
    
        // Passer les données à la vue
        return view('properties.details-properties', [
            'property' => $property,
            'properties' => $otherProperties,
            'fichiers' => $fichiers,
            'agent' => $agent // Ajouter les informations de l'agent à la vue
        ]);
    }
    

    public function accederFichiers(Property $property)
    {
        // Vérifier si le property a des fichiers associés
        if (!$property->fichiers) {
            return redirect()->back()->with('error', 'Le poste ne contient aucun fichier.');
        }

        // Décoder le tableau des chemins des fichiers
        $cheminsFichiers = $property->fichiers;

        $responses = [];

        // Parcourir chaque chemin de fichier
        foreach ($cheminsFichiers as $chemin) {
            // Obtenir le contenu du fichier depuis le stockage
            $contenuFichier = Storage::get($chemin);

            // Extraire le nom du fichier à partir du chemin
            $nomFichier = basename($chemin);

            // Créer une réponse pour le fichier
            $responses[$nomFichier] = response()->stream(
                function () use ($contenuFichier) {
                    echo $contenuFichier;
                },
                200,
                [
                    'Content-Type' => Storage::mimeType($chemin),
                    'Content-Disposition' => 'inline; filename="' . $nomFichier . '"',
                ]
            );
        }

        // Retourner les réponses des fichiers
        return $responses;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        
         // Votre logique d'édition ici
         return view('properties.form', [
            'property' => $property
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Votre logique de mise à jour ici
        $property->update($request->validated());
        return redirect()->route('services.mon-service')->with('success', 'Modification bien faite');
    }

    public function updateAvailability(Request $request, Property $property)
    {
        $property->availability = $request->availability;
        $property->save();

        return redirect()->back()->with('success', 'Disponibilité mise à jour avec succès.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        // Votre logique de suppression ici
        $property = Property::find($id);
        $property->delete();
        return redirect()->route('services.mon-service')->with('success', 'Suppression bien faite');
    }
}
