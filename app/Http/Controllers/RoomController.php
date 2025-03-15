<?php
// app/Http/Controllers/RoomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Land;
use App\Models\Interaction;
use App\Models\Profil;

class RoomController extends Controller
{
    // public function index()
    // {'
    //     // Récupérer toutes les chambres depuis la base de données
    //     $rooms = Room::all();

    //     // Retourner la vue avec les chambres
    //     return view('services.mon-service', compact('rooms'));
    // }
    public function index()
    {
        $rooms = room::all();
        return view('services.all-view-rooms', compact('rooms'));
    }
    /**
     * Affiche le formulaire pour créer une nouvelle chambre.
     */
    public function create()
    {
        // return view('rooms.create', compact('house'));
        $room = new Room();
        $room->fill([
            'surface' => 40,
            'price' => 20000,
            'city' => 'Cotonou',
            'postal_code' => 'BP 678',
                'available' => false,
        ]);
        return view('rooms.form',[
            'room' => $room,
            ]);
    }

    /**
     * Enregistre une nouvelle chambre dans la base de données.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
    
        // Récupérer et normaliser les données
        $input = $request->all();
        if (isset($input['type'])) {
            $input['type'] = strtolower(str_replace(' ', '_', $input['type']));
        }
    
        // Valider les données normalisées
        $validated = \Validator::make($input, [
            'type' => 'required|in:studio,chambre_salon,2_chambres_salon,3_chambres_salon,4_chambres_salon,5_chambres_salon,plus',
            'number_of_rooms' => 'required|integer|min:1',
            'surface' => 'nullable|integer|min:0',
            'number_of_beds' => 'nullable|integer|min:0',
            'bed_type' => 'nullable|string|max:50',
            'private_bathroom' => 'boolean',
            'equipments' => 'nullable|string|max:255',
            'available_from' => 'nullable|date',
            'price' => 'nullable|numeric|min:0',
            'condition' => 'nullable|string|max:50',
            'balcony' => 'boolean',
            'view' => 'nullable|string|max:50',
            'available' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ])->validate();
    
        // Handle images
        if ($request->hasFile('images')) {
            $imagesPaths = [];
            foreach ($request->file('images') as $image) {
                $imagesPaths[] = $image->store('images', 'public');
            }
            $validated['images'] = $imagesPaths;
        }
    
    
        // Ajouter l'ID de l'utilisateur
        $validated['user_id'] = $user->id;
        //dd($validated);
        // Créer la chambre
        Room::create($validated);
        $data = [
            'action_type' => 'creation',
            'property_type' => 'room',
            'property_id' => $property->id,
            'property_title' => $property->title,
            'user' => [
                'id' => auth()->user()->id,
                'email' => auth()->user()->email
            ],
            'created_at' => now()
        ];
        $user -> notify(new NewRoomNotification($room, $data));

        return redirect()->route('services.mon-service')->with('success', 'Chambre ajoutée avec succès.');
    }
    
    public function showDetails(Room $land)
    {
        // Enregistrer la vue de la propriété
        Interaction::recordView('room', $room->id, auth()->id());
        Interaction::recordClick('room', $room->id, auth()->id());

        // Récupérer l'agent qui a publié cette propriété
        $agent = $room->user;
    
        // Récupérer les autres propriétés publiées par cet agent, à l'exclusion de celle-ci
        $otherRoom = Room::where('user_id', $agent->id)
                                   ->where('id', '!=', $room->id)
                                   ->orderBy('created_at', 'desc')
                                   ->take(4)
                                   ->get();
    
        // Appeler la méthode accederFichiers pour obtenir les réponses des fichiers
        $responses = $this->accederFichiers($room);
    
        // Convertir les réponses des fichiers en un tableau associatif avec les noms de fichier comme clés
        $fichiers = [];
        foreach ($responses as $nomFichier => $response) {
            $fichiers[$nomFichier] = $response->getContent();
        }
    
        // Passer les données à la vue
        return view('room.details-room', [
            'room' => $room,
            'room' => $otherRoom,
            'fichiers' => $fichiers,
            'agent' => $agent // Ajouter les informations de l'agent à la vue
        ]);
    }

    /**
     * Affiche le formulaire pour modifier une chambre existante.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Met à jour une chambre existante dans la base de données.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'type' => 'required',
            'number_of_rooms' => 'required|integer|min=1',
            'surface' => 'nullable|integer|min=0',
            'number_of_beds' => 'nullable|integer|min=0',
            'bed_type' => 'nullable',
            'private_bathroom' => 'required|boolean',
            'equipments' => 'nullable|string',
            'available_from' => 'nullable|date',
            'price' => 'nullable|numeric|min:0',
            'condition' => 'nullable|string',
            'balcony' => 'required|boolean',
            'view' => 'nullable|string',
            'available' => 'required|boolean',
        ]);

        $room->update($request->all());

        return redirect()->route('houses.show', $room->house)->with('success', 'Chambre mise à jour avec succès.');
    }

    /**
     * Supprime une chambre de la base de données.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('houses.show', $room->house)->with('success', 'Chambre supprimée avec succès.');
    }
}
