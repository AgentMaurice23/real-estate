<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Land;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class HomeController extends Controller
{
    public function welcome(Request $request)
    {
        $searchData = $this->search($request);

        $data = $this->getCommonData();
        $data['searchPerformed'] = $searchData['searchPerformed'];
        $data['items'] = $searchData['items'];

        return view('welcome', $data);
    }

    public function allView(Request $request)
    {
        $searchData = $this->search($request);

        $data = $this->getCommonData();
        $data['searchPerformed'] = $searchData['searchPerformed'];
        $data['items'] = $searchData['items'];

        return view('services.all-view', $data);
    }

    protected function search(Request $request)
    {
        $this->validateSearch($request);

        $query = $this->buildQuery($request);
        $properties = $query->get();
        $countriesList = $this->getCountriesList();
        $lands = Land::with('user')->get();
        $agents = Profil::whereIn('role', ['agent', 'agency'])->take(6)->get();
        list($boostedProperties, $boostedLands, $boostedRooms) = $this->getBoostedItems();

        $items = $properties->concat($lands)->shuffle();
        $searchPerformed = $request->hasAny(['type_chambre', 'country', 'city', 'price']);

        // Vérifier s'il y a des résultats correspondant aux critères de recherche
        if ($properties->isEmpty() && !$searchPerformed) {
            $items = collect(); // Retourner une collection vide si aucune propriété trouvée et aucun critère de recherche
        }

        return [
            'items' => $items,
            'agents' => $agents,
            'countries' => $countriesList,
            'searchPerformed' => $searchPerformed,
            'boostedProperties' => $boostedProperties,
            'boostedLands' => $boostedLands,
            'boostedRooms' => $boostedRooms,
        ];
    }

    protected function validateSearch(Request $request)
    {
        $request->validate([
            'type_chambre' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'price' => 'nullable|integer|min:0',
            'city' => 'nullable|string|max:255',
        ]);
    }

    protected function buildQuery(Request $request)
    {
        $query = Property::with('user');

        if ($request->filled('type_chambre')) {
            $query->where('property_type', 'like', '%' . $request->type_chambre . '%');
        }

        if ($request->filled('country')) {
            $query->where('country', 'like', '%' . $request->country . '%');
        }

        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        return $query;
    }

    protected function getCountriesList()
    {
        $countries = countries();
        $countriesList = [];

        if (is_array($countries)) {
            foreach ($countries as $country) {
                if (isset($country['name'])) {
                    $countriesList[] = $country['name'];
                }
            }

            sort($countriesList);
        }

        return $countriesList;
    }

    protected function getCommonData()
    {
        // Récupérer les propriétés avec leurs utilisateurs
        $properties = Property::with('user.profil')->take(12)->get();
        $lands = Land::with('user.profil')->take(12)->get();
        
        // Combiner les deux collections
        $items = $properties->concat($lands);
        // Mélanger la collection combinée
        $items = $items->shuffle();
    
        // Récupérer les agents et agences
        $agents = Profil::whereIn('role', ['agent', 'agency'])->take(6)->get();
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
    
        // Récupérer les annonces boostées
        list($boostedProperties, $boostedLands, $boostedRooms) = $this->getBoostedItems();
    
        return [
            'items' => $items,
            'agents' => $agents,
            'countries' => $countriesList,
            'boostedProperties' => $boostedProperties,
            'boostedLands' => $boostedLands,
            'boostedRooms' => $boostedRooms,
        ];
    }
    
        
    public function getBoostedItems()
    {
        $userId = Auth::id(); // Access the current authenticated user's ID

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

        return [$boostedProperties, $boostedLands, $boostedRooms];
    }
}
