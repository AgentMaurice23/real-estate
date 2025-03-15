<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\User;
use App\Models\Profil;
use App\Notifications\NewAgenceNotification;

use Illuminate\Http\Request;

class AgencyController extends Controller
{

    public function index()
    {
         $users = User::all();
        return view('dashboard');
    }

    public function registerType()
    {

        return view('auth.register-type');
    }

    public function profilAgent(User $user)
    {
        Interaction::recordView('user', $user->id, auth()->id());

        // Charger les propriétés de l'utilisateur
        $properties = $user->properties;
        return view('auth.agent-profil-view', compact('user', 'properties'));
    }

    public function create()
    {
           // Récupérer l'utilisateur connecté ou tout autre utilisateur de votre base de données
           $user = auth()->user();

           // Vérifier si l'utilisateur est authentifié
           if($user){
               // Si l'utilisateur est authentifié, récupérer le nom et l'e-mail
               $name = $user->name;
               $email = $user->email;
           } else {
               // Si l'utilisateur n'est pas authentifié, définir le nom et l'e-mail sur null
               $name = null;
               $email = null;
           }
        return view('auth.agency-create',  [
            'name' => $name,
            'email' => $email
        ]);
    }


    public function store(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'registration_number' => 'required|string|max:100',
            'vat_number' => 'nullable|string|max:100',
            'agency_type' => 'required|string|max:50',
            'foundation_year' => 'required|string|max:4',
            'manager_name' => 'required|string|max:255',
            'manager_email' => 'required|email|max:255',
            'manager_phone' => 'required|string|max:20',
            'services' => 'required',
            'service_areas' => 'required|string',
            'current_listings' => 'required|integer',
            'property_types' => 'required',
            'license' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'insurance' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'opening_hours' => 'required|string',
            'description' => 'required|string',
            'terms_accepted' => 'required|boolean',
            'privacy_accepted' => 'required|boolean',
            'publish_consent' => 'required|boolean',
            'profile_photo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Accept only image files
            'identity_piece' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Accept only image files
            'profile_cover' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload files
        $licensePath = $request->file('license') ? $request->file('license')->store('licenses', 'public') : null;
        $insurancePath = $request->file('insurance') ? $request->file('insurance')->store('insurances', 'public') : null;

        // Gérer le téléchargement des fichiers
        $profilePhoto = $request->file('profile_photo');
        $identityPiece = $request->file('identity_piece');
        $profileCover = $request->file('profile_cover');

        // Enregistrer les fichiers dans un dossier
        $profilePhotoPath = $profilePhoto ? $profilePhoto->storeAs('users', 'profile_photo', 'public') : null;
        $identityPiecePath = $identityPiece ? $identityPiece->storeAs('users', 'identity_piece', 'public') : null;
        $profileCoverPath = $profileCover ? $profileCover->storeAs('users', 'profile_cover', 'public') : null;

        // Convert array fields to JSON
        $data['services'] = 'services';
        $data['property_types'] = 'property_types';
        // Set role to agency
        $data['role'] = 'agency';
        $data['profile_photo_path'] = $profilePhotoPath;
        $data['identity_piece'] = $identityPiecePath;
        $data['profile_cover_path'] = $profileCoverPath;
        $data['license'] = $licensePath;
        $data['insurance'] = $insurancePath;
        //dd($data);
        // Ajouter l'utilisateur à la table profiles
        $profil = new Profil($data);
        $profil->user_id = $user->id; // Associer le profil à l'utilisateur connecté
        $profil->save();
        $dataAgence = [
            'action_type' => 'creation',
            'type' => 'agence',
            'profil_id' => $profil->id,
            'profil_name' => $profil->name,
            'user' => [
                'id' => $user->id,
                'email' => $user->email
            ],
            'created_at' => now()
        ];

        $user -> notify(new NewAgenceNotification($profil, $dataAgence));
           return redirect()->route('services.mon-service')->with('success', 'Agence inscrite avec succès.');
    }

}
