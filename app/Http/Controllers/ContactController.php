<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User; // Assurez-vous d'importer le modèle User si ce n'est pas déjà fait
use App\Notifications\ContactRequestNotification;

class ContactController extends Controller
{
    public function sendMessageToAgent(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save the message to the database
        $contact = Contact::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'message' => $data['message'],
            'recipient_type' => 'agent', // Utilisez un champ pour distinguer le destinataire
            'user_id' => $request->user()->id,
        ]);

        // Envoi de la notification à l'agent
        $agent = User::find($request->user()->id); // Remplacez par la logique pour trouver l'agent approprié
        $agent->notify(new ContactRequestNotification($contact));

        return back()->with('success', 'Message sent to the agent.');
    }

    public function sendMessageToPlatform(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        // Save the message to the database
        $contact = Contact::create([
            'name' => $request->user()->name,
            'phone' => $request->user()->phone,
            'email' => $request->user()->email,
            'message' => $data['message'],
            'recipient_type' => 'platform', // Utilisez un champ pour distinguer le destinataire
            'user_id' => $request->user()->id,
        ]);

        // Envoi de la notification à la plateforme
        // Exemple: vous pouvez envoyer une notification à l'administrateur de la plateforme
        //  $admin = User::where('role', 'admin')->first();
        //  $admin->notify(new ContactRequestNotification($contact));
        return back()->with('success', 'Message sent to the platform.');
    }
}
