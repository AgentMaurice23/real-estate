
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maisons et chambres disponible</title>
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
<div class="py-14">
    <div class="container mx-auto">
        <div class="py-8"></div>
        <!-- Formulaire de filtre -->
        <form method="GET" action="{{ route('lands.index') }}" class=" mt-8 mb-4 space-y-4">
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

        <div id="property-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                <div class="col">
                    <div class="w-full overflow-hidden bg-transparent rounded-lg">
                        <a href="{{ route('property.details-properties', $property->id) }}" target="_blank" class="no-underline property-click" data-property-id="{{ $property->id }}">
                            <div class="flex flex-col">
                                <img class="w-full h-34 mb-3 rounded-t-lg" style="object-position: center; object-fit: cover; width: 100%; height: 250px;" src="{{ asset('storage/' . ($property->fichiers[0] ?? 'images/property.jpg')) }}" alt="Property image"/>
                                
                                <a href="{{ route('user.agent-profil-view', $property->user->id) }}" target="_blank" class="no-underline">
                                    <div class="flex justify-between px-2">
                                        <div class="flex space-x-2">
                                            <img class="w-8 h-8 rounded-full" src="{{ $property->user->profil ? asset('storage/' . $property->user->profil->profile_photo_path) : asset('images/profil.jpg') }}" alt="{{ $property->user->profil ? $property->user->profil->name : $property->user->name }}" />
                                            <span class="text-sm font-semibold text-gray-600">
                                                {{ $property->user->profil ? $property->user->profil->name : 'Profil non disponible' }}
                                            </span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <div class="flex">
                                                <span class="text-sm font-semibold text-gray-600">{{ $property->bedrooms }} 
                                                </span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666">
                                                    <path d="M192-144v-456l288-216 288 216v456H192Zm72-72h264v-120H264v120Zm336 0h96v-120h-96v120ZM264-408h120v-120H264v120Zm192 0h240v-120H456v120ZM313-600h334L480-726 313-600Z"/>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-600">{{ $property->levels }} Étages</span>
                                        </div>
                                    </div>
                                </a>
                                
                                <h2 class="mb-1 mt-2 text-lg px-2 font-medium text-gray-900">{{ $property->property_type }}</h2>
                                <div class="flex mt-2 justify-between md:mt-6">
                                    <div class="flex space-x-2">
                                        <h3 class="ms-2 text-sm font-medium text-gray-900">{{ $property->city }}</h3>
                                        <h3 class="ms-2 text-sm font-medium text-gray-900">{{ $property->country }}</h3>
                                    </div>
                                    <div class="flex space-x-2">
                                        <h3 class="ms-2 text-sm font-medium text-gray-900">{{ $property->price }} £</h3>
                                        <p class="text-sm text-gray-600 px-1">{{ $property->surface }} m²</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
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
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q={{ urlencode($property->city . ', ' . $property->country) }}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const latitude = data[0].lat;
                    const longitude = data[0].lon;
                    // Met à jour la carte avec les coordonnées spécifiques
                    map.setView([latitude, longitude], 13);
                    
                    // Met à jour le marqueur avec les coordonnées spécifiques
                    L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(`<b>{{ $property->title }}</b><br>{{ $property->city }}, {{ $property->country }}`)
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