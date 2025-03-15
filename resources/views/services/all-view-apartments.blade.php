<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terrains disponibles</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>

<x-home></x-home>

<div class="mt-8"></div>
<div class="py-12">
    <div class="container mt-6 mx-auto">
         <!-- Formulaire de filtre -->
            <form method="GET" action="{{ route('services.all-view-apartments') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">Tous</option>
                            <option value="sale">En vente</option>
                            <option value="rent">Location</option>
                        </select>
                    </div>
                    <div>
                        <label for="price_min" class="block text-sm font-medium text-gray-700">Prix minimum (€)</label>
                        <input type="number" id="price_min" name="price_min" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="price_max" class="block text-sm font-medium text-gray-700">Prix maximum (€)</label>
                        <input type="number" id="price_max" name="price_max" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="surface_min" class="block text-sm font-medium text-gray-700">Surface minimum (m²)</label>
                        <input type="number" id="surface_min" name="surface_min" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="surface_max" class="block text-sm font-medium text-gray-700">Surface maximum (m²)</label>
                        <input type="number" id="surface_max" name="surface_max" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="neighborhood" class="block text-sm font-medium text-gray-700">Quartier</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" id="city" name="city" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                        <input type="text" id="country" name="country" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Filtrer</button>
                </div>
            </form>
       

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            @foreach($apartments as $apartment)
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                    <div class="block">
                        <a href="{{ route('apartment.detail-apartment', $apartment->id) }}" target="_blank" class="no-underline">
                            @php
                                // Assurez-vous que $apartment->images est un tableau
                                $images = $apartment->images;
                            @endphp
                            <img class="rounded-t-lg w-full"
                            style="object-position: center;object-fit: cover;width: 100%;height: 200px;" 
                            src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/apartment.jpg') }}" alt="apartment image">
                        </a>
                        <figcaption class="">
                            <div class="bg-white rounded-b-lg px-2 py-2 text-lg text-gray-800">
                                <span class="flex px-4 py-3 text-lg font-semibold space-x-4">{{ $apartment->title }}</span>
                                <div class="flex py-1 rounded-sm bg-blue-500 justify-center">                                            
                                    <span class="py-1 text-white text-sm font-semibold">{{ $apartment->price }}CFA</span>
                                </div>
                                <div class="flex px-4 py-2 space-x-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                                    </svg>
                                      
                                    <span class="py-1 text-sm font-semibold">{{ $apartment->city }},{{ $apartment->country }}</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    @php
                                        $availability = is_array($apartment->availability) ? $apartment->availability : json_decode($apartment->availability, true);
                                    @endphp
                                    @if (in_array('both', $availability))
                                        <a href="{{ route('services.rent') }}" class="bg-blue-500 no-underline text-white px-2 py-1 rounded">
                                            Location
                                        </a>
                                        <a href="{{ route('services.buy') }}" class="bg-green-500 no-underline text-white px-2 py-1 rounded">
                                            En vente
                                        </a>
                                    @elseif (in_array('sale', $availability))
                                        <a href="{{ route('services.buy') }}" class="bg-green-500 text-white px-2 py-1 rounded">
                                            En vente
                                        </a>
                                    @else
                                        <a href="{{ route('services.rent') }}" class="bg-blue-500 text-white px-2 py-1 rounded">
                                            Location
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            @endforeach
        </div>
    </div>
</div>
<x-footer></x-footer>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Coordonnées par défaut (par exemple, Paris, France)
    const defaultLatitude = 48.8566;
    const defaultLongitude = 2.3522;

    // Initialise la carte avec les coordonnées par défaut
    const map = L.map('map').setView([defaultLatitude, defaultLongitude], 13);

    // Ajoute une couche de tuiles OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ajoute un marqueur par défaut
    L.marker([defaultLatitude, defaultLongitude]).addTo(map)
        .bindPopup(`<b>Localisation par défaut</b><br>Paris, France`)
        .openPopup();

    // Utilisez un service de géocodage pour obtenir les coordonnées spécifiques
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q={{ urlencode($apartment->city . ', ' . $apartment->country) }}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                const latitude = data[0].lat;
                const longitude = data[0].lon;
                // Met à jour la carte avec les coordonnées spécifiques
                map.setView([latitude, longitude], 13);
                
                // Met à jour le marqueur avec les coordonnées spécifiques
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup(`<b>{{ $apartment->title }}</b><br>{{ $apartment->city }}, {{ $apartment->country }}`)
                    .openPopup();
            } else {
                alert('Impossible de trouver la localisation spécifiée. Affichage de la carte par défaut.');
            }
        })
        .catch(error => {
            console.error('Erreur lors de la requête de géocodage:', error);
            alert('Erreur lors de la requête de géocodage. Affichage de la carte par défaut.');
        });
});
</script>
</body>
</html>