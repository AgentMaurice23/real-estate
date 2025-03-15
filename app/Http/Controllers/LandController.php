<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Profil;
use App\Notifications\NewLandNotification;
use App\Models\Interaction;


class LandController extends Controller
{
    public function index()
    {
        $lands = Land::all();
        return view('services.all-view-lands', compact('lands'));
    }

    public function create()
    {
        $land = new Land();
        $land->fill([
            'surface' => 40,
            'price' => 20000,
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
        return view('lands.land-add',[
            'land' => $land,
            'countries' => $countriesList
            ]);
        // return view('lands.land-add', compact('land'));
    }
    
    public function store(Request $request)
    {
        $user = Auth()->user();
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'surface' => 'nullable|integer|min:0',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'land_type' => 'nullable|string',
            'zoning' => 'nullable|string',
            'services' => 'nullable|string',
            'topography' => 'nullable|string',
            'access' => 'nullable|string',
            'survey' => 'nullable|boolean',
            'urban_certificate' => 'required|boolean',
            'restrictions' => 'required|string',
            'amenities' => 'nullable|string',
            'availability' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data['user_id'] = auth()->id();
        // Handle images
        if ($request->hasFile('images')) {
            $imagesPaths = [];
            foreach ($request->file('images') as $image) {
                $imagesPaths[] = $image->store('images', 'public');
            }
            $data['images'] = $imagesPaths;
        }

        // Handle documents
        if ($request->hasFile('documents')) {
            $documentsPaths = [];
            foreach ($request->file('documents') as $document) {
                $documentsPaths[] = $document->store('documents', 'public');
            }
            $data['documents'] = $documentsPaths;
        }
        $land = Land::create($data);
        $landData = [
            'action_type' => 'creation',
            'property_type' => 'land',
            'property_id' => $land->id,
            'property_title' => $land->title,
            'user' => [
                'id' => auth()->user()->id,
                'email' => auth()->user()->email
            ],
            'created_at' => now()
        ];
        $user -> notify(new NewLandNotification($land,$landData));

        return redirect()->route('lands.index')->with('success', 'Land created successfully.');
    }

    public function edit(land $land)
    {
        
         // Votre logique d'édition ici
         return view('lands.land-add', [
            'land' => $land
            ]);
    }
    public function updateAvailability(Request $request, Land $land)
    {
        $land->availability = $request->availability;
        $land->save();
        return redirect()->back()->with('success', 'Disponibilité mise à jour avec succès.');
    }
    public function update(Request $request, Land $land)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'surface' => 'nullable|integer|min:0',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'land_type' => 'nullable|string',
            'zoning' => 'nullable|string',
            'services' => 'nullable|string',
            'topography' => 'nullable|string',
            'access' => 'nullable|string',
            'survey' => 'nullable|boolean',
            'urban_certificate' => 'required|boolean',
            'restrictions' => 'required|string',
            'amenities' => 'nullable|string',
            'availability' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('images')) {
            $data['images'] = array_map(function($file) {
                return $file->store('images');
            }, $request->file('images'));
        }

        if ($request->file('documents')) {
            $data['documents'] = array_map(function($file) {
                return $file->store('documents');
            }, $request->file('documents'));
        }

        $land->update($data);

        return redirect()->route('lands.index')->with('success', 'Land updated successfully.');
    }

    public function destroy(Land $land)
    {
        $land->delete();
        return redirect()->route('lands.index')->with('success', 'Land deleted successfully.');
    }

    public function showLand(Land $land)
    {

        Interaction::recordView('land', $land->id, auth()->id());
        Interaction::recordClick('land', $land->id, auth()->id());

        $agent = $land->user;
    
        // Récupérer les autres propriétés publiées par cet agent, à l'exclusion de celle-ci
        $otherLands = Land::where('user_id', $agent->id)
                           ->where('id', '!=', $land->id)
                           ->orderBy('created_at', 'desc')
                           ->take(4)
                           ->get();
        // Appeler la méthode accederImages pour obtenir les réponses des images
        $responses = $this->accederImages($land);
    
        // Passer les données à la vue
        return view('lands.detail-land', [
            'land' => $land,
            'lands' => $otherLands,
            'images' => $responses,
            'agent' => $agent // Ajouter les informations de l'agent à la vue
        ]);
    }
    

    public function accederImages(Land $land)
    {
        // Vérifier si le land a des images associés
        if (!$land->images) {
            return redirect()->back()->with('error', 'cette annonce ne contient aucun fichier.');
        }
    
        // Récupérer les chemins des images (supposons qu'ils soient stockés sous forme de tableau)
        $cheminsImages = $land->images;
    
        $responses = [];
    
        // Parcourir chaque chemin de fichier
        foreach ($cheminsImages as $chemin) {
            // Obtenir le contenu du fichier depuis le stockage
            $contenuFichier = Storage::disk('public')->get($chemin);
    
            // Extraire le nom du fichier à partir du chemin
            $nomFichier = basename($chemin);
    
            // Créer une réponse pour le fichier
            $responses[$nomFichier] = response()->stream(
                function () use ($contenuFichier) {
                    echo $contenuFichier;
                },
                200,
                [
                    'Content-Type' => Storage::disk('public')->mimeType($chemin),
                    'Content-Disposition' => 'inline; filename="' . $nomFichier . '"',
                ]
            );
        }
    
        // Retourner les réponses des images
        return $responses;
    }

}
