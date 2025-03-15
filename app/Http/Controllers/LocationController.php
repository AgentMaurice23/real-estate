<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Location;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $location = new Location();
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return response()->json(['message' => 'Données de localisation enregistrées avec succès!']);
    }

    public function getCountries()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody(), true);

        $countryList = [];
        foreach ($countries as $country) {
            $countryList[] = [
                'name' => $country['name']['common'],
                'code' => $country['cca2']
            ];
        }

        return response()->json($countryList);
    }

    public function getCities($countryCode)
    {
        $client = new Client();
        $response = $client->get("http://api.geonames.org/searchJSON?country=$countryCode&featureClass=P&maxRows=1000&username=demo");
        $cities = json_decode($response->getBody(), true);

        $cityList = [];
        foreach ($cities['geonames'] as $city) {
            $cityList[] = [
                'name' => $city['name']
            ];
        }

        return response()->json($cityList);
    }
}
