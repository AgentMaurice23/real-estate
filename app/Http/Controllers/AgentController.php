<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profil;
use App\Models\Interaction;

use App\Mail\ProfileCompletedNotification;


use Illuminate\Support\Facades\Mail;


class AgentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {    
        // Rediriger l'utilisateur vers une page de confirmation ou autre
        return redirect()->route('home')->with('success', 'Votre profil a été créé avec succès et vous êtes maintenant connecté.');
    }
    
    public function profilAgent(User $user)
    {
        Interaction::recordView('user', $user->id, auth()->id());

        // Charger les propriétés de l'utilisateur
        $properties = $user->properties;
        return view('auth.agent-profil-view', compact('user', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    
        // Passer les informations de l'utilisateur à la vue
        return view('auth.profil-complet', [
            'name' => $name,
            'email' => $email
        ]);
    }
    public function agentCreate(){
        // Passer les informations de l'utilisateur à la vue
        return view('auth.agent-create');   
    }
    
    public function dashboard()
    {
        // Récupérer tous les utilisateurs qui ont demandé l'autorisation
        $users = Profil::whereNotNull('address')
                     ->whereNotNull('phone')
                     ->whereNotNull('birthdate')
                     ->whereNotNull('country')
                     ->whereNotNull('city')
                     ->get();

        return view('admin.dashboard', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */   
   
     public function store(Request $request)
     {
         // Valider les données
         $data = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'address' => ['required', 'string'],
             'phone' => ['required', 'string'],
             'birthdate' => ['required', 'date'],
             'country' => ['required', 'string'],
             'city' => ['required', 'string'],
             'profile_photo' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'], // Accept only image files
             'identity_piece' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'], // Accept only image files
             'profile_cover' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
             'profession' => ['required', 'string'],
             'biographie' => ['required', 'string'],
         ]);
     
         // Gérer le téléchargement des fichiers
         $profilePhoto = $request->file('profile_photo');
         $identityPiece = $request->file('identity_piece');
         $profileCover = $request->file('profile_cover');
     
         // Enregistrer les fichiers dans un dossier
         $profilePhotoPath = $profilePhoto ? $profilePhoto->storeAs('users', 'profile_photo_' . auth()->id(), 'public') : null;
         $identityPiecePath = $identityPiece ? $identityPiece->storeAs('users', 'identity_piece_' . auth()->id(), 'public') : null;
         $profileCoverPath = $profileCover ? $profileCover->storeAs('users', 'profile_cover_' . auth()->id(), 'public') : null;
     
         // Récupérer l'utilisateur connecté
         $user = auth()->user();
     
         // Créer un nouveau profil pour l'utilisateur
         $profile = new Profil([
             'user_id' => $user->id, // Associer le profil à l'utilisateur connecté
             'name' => $data['name'],
             'email' => $data['email'],
             'address' => $data['address'],
             'phone' => $data['phone'],
             'birthdate' => $data['birthdate'],
             'country' => $data['country'],
             'city' => $data['city'],
             'profession' => $data['profession'],
             'biographie' => $data['biographie'],
             'profile_photo_path' => $profilePhotoPath,
             'identity_piece_path' => $identityPiecePath,
             'profile_cover_path' => $profileCoverPath,
         ]);
     
         $profile->save();
     
         // Envoyer des notifications si nécessaire
         if ($this->isProfileCompleted($user)) {
             Mail::to('adminImmas@gmail.com')->send(new ProfileCompletedNotification($user));
             Mail::to('Immas@gmail.com')->send(new ProfileCompletedNotification($user));
         }
     
         // Rediriger l'utilisateur vers une page de confirmation ou autre
         return redirect()->route('home')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
     

    protected function isProfileCompleted($user)
    {
        // Vérifier si les champs obligatoires du profil de l'utilisateur sont remplis
        return !empty($user->address) && !empty($user->phone) && !empty($user->birthdate);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    
