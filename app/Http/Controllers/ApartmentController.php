<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Interaction;
use App\Notifications\NewApartmentNotification;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('services.all-view-apartments', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartment = new Apartment();
        $apartment->fill([
            'surface' => 40,
            'price' => 20000,
            'city' => 'Cotonou',
            'postal_code' => 'BP 678',
                'sold' => false,
        ]);
        return view('apartments.form',[
            'apartment' => $apartment,
            ]);  
        
    }
    public function updateAvailability(Request $request)
    {
        $request->validate([
            'apartments' => 'required|array',
            'availability' => 'required|boolean',
        ]);

        Apartments::whereIn('id', $request->apartments)->update(['availability' => $request->availability]);

        return redirect()->route('services.mon-service', $apartments->id)->with('success', 'Disponibilité mise à jour avec succès.');
    }
    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request, Apartment $apartment = null)
     {
         $user = auth()->user();
     
         $data = $request->validate([
             'title' => 'required|string',
             'description' => 'required|string',
             'surface' => 'nullable|integer|min:0',
             'sold' => ['required', 'boolean'],
             'address' => 'required|string',
             'city' => 'required|string',
             'postal_code' => 'required|string',
             'country' => 'required|string',
             'price' => 'required|numeric',
             'area' => 'required|numeric',
             'floor' => 'nullable|numeric',
             'total_floors' => 'nullable|numeric',
             'bedrooms' => 'required|numeric',
             'bathrooms' => 'required|numeric',
             'toilets' => 'required|numeric',
             'elevator' => 'nullable|boolean',
             'balcony' => 'nullable|boolean',
             'balcony_area' => 'nullable|numeric',
             'construction_year' => 'nullable|numeric',
             'heating_type' => 'nullable|string',
             'air_conditioning' => 'nullable|boolean',
             'energy_certifications' => 'nullable|string',
             'amenities' => 'nullable|string',
             'availability' => 'nullable|array',
             'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
             'documents.*' => 'file|mimes:pdf,doc,docx',
         ]);
     
         $documentPaths = [];
         $imagePaths = [];
     
         if ($request->hasFile('documents')) {
             foreach ($request->file('documents') as $document) {
                 $documentPaths[] = $document->store('documents', 'public');
             }
         }
     
         if ($request->hasFile('images')) {
             foreach ($request->file('images') as $image) {
                 $imagePaths[] = $image->store('images', 'public');
             }
         }
     
         $data['user_id'] = $user->id;
         $data['images'] = $imagePaths;  // Convertir en JSON avant d'enregistrer
         $data['documents'] = $documentPaths;  // Convertir en JSON avant d'enregistrer
         
         dd($data);
         Apartment::create($data);
        $apartmentData = [
            'action_type' => 'creation',
            'property_type' => 'logement',
            'property_id' => $property->id,
            'property_title' => $property->title,
            'user' => [
                'id' => auth()->user()->id,
                'email' => auth()->user()->email
            ],
            'created_at' => now()
        ];
         $user -> notify(new NewApartmentNotification($property,$apartmentData));

         return redirect()->route('services.mon-service')->with('success', 'Appartement ajouté avec succès');
     }
     
    /**
     * Display the specified resource.
     */
    public function showDetails(Apartment $apartment,$id)
    {
        // Enregistrer la vue de la propriété
        Interaction::recordView('apartment', $apartment->id, auth()->id());
        Interaction::recordClick('apartment', $apartment->id, auth()->id());

        // Récupérer l'agent qui a publié cette propriété
        $agent = $apartment->user;
    
        // Récupérer les autres propriétés publiées par cet agent, à l'exclusion de celle-ci
        $otherApartment = Apartment::where('user_id', $agent->id)
                                   ->where('id', '!=', $apartment->id)
                                   ->orderBy('created_at', 'desc')
                                   ->take(4)
                                   ->get();
    
        // Appeler la méthode accederFichiers pour obtenir les réponses des fichiers
        $responses = $this->accederFichiers($apartment);
    
        // Convertir les réponses des fichiers en un tableau associatif avec les noms de fichier comme clés
        $fichiers = [];
        foreach ($responses as $nomFichier => $response) {
            $fichiers[$nomFichier] = $response->getContent();
        }
    
        // Passer les données à la vue
        return view('apartment.details-apartment', [
            'apartment' => $apartment,
            'apartment' => $otherApartment,
            'fichiers' => $fichiers,
            'agent' => $agent // Ajouter les informations de l'agent à la vue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'action_type' => 'modify',
            'property_type' => 'apartment',
            'property_id' => $property->id,
            'property_title' => $property->title,
            'user' => [
                'id' => auth()->user()->id,
                'email' => auth()->user()->email
            ],
            'created_at' => now()
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
