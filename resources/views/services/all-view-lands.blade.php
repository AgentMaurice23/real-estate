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
            <form method="GET" action="{{ route('services.all-view-lands') }}" class="space-y-4">
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
       

            <div id="land-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                @foreach($lands as $land)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('land.detail-land', $land->id) }}" target="_blank" class="block">
                        @php
                            $images = $land->images;
                        @endphp
                        <img class="w-full h-48 object-cover" style="object-position: center; object-fit: cover; width: 100%; height: 250px;" src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/land.jpg') }}" alt="Land image">
                    </a>
                    <div class="px-2 space-y-2 py-3">
                        <h3 class="text-xl  font-semibold text-gray-800 mb-2">{{ $land->title }}</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3 justify-between mb-2">
                                <span class="text-sm font-bold text-blue-600">{{ number_format($land->price, 0, ',', ' ') }} CFA</span>
                                <span class="text-sm text-gray-500">{{ $land->surface }} m²</span>
                            </div>
                            <div class="flex items-center space-x-3 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343">
                                    <path d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z"/>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $land->city }}</span>
                                <span class="text-sm text-gray-600">{{ $land->country }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            @php
                                $availability = is_array($land->availability) ? $land->availability : json_decode($land->availability, true);
                            @endphp
                            @if (in_array('both', $availability))
                                <a href="{{ route('services.rent') }}" class="bg-blue-500 no-underline text-white px-4 py-2 rounded-full text-sm font-semibold mr-2">
                                    Location
                                </a>
                                <a href="{{ route('services.buy') }}" class="bg-green-500 no-underline text-white px-4 py-2 rounded-full text-sm font-semibold">
                                    En vente
                                </a>
                            @elseif (in_array('sale', $availability))
                                <a href="{{ route('services.buy') }}" class="bg-green-500 no-underline text-white px-4 py-2 rounded-full text-sm font-semibold">
                                    En vente
                                </a>
                            @else
                                <a href="{{ route('services.rent') }}" class="bg-blue-500 no-underline text-white px-4 py-2 rounded-full text-sm font-semibold">
                                    Location
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-10 text-base">
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Previous</span>
            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
        </li>
        <li>
            <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <span class="sr-only">Next</span>
            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            </a>
        </li>
        </ul>
    </nav>
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
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q={{ urlencode($land->city . ', ' . $land->country) }}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                const latitude = data[0].lat;
                const longitude = data[0].lon;
                // Met à jour la carte avec les coordonnées spécifiques
                map.setView([latitude, longitude], 13);
                
                // Met à jour le marqueur avec les coordonnées spécifiques
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup(`<b>{{ $land->title }}</b><br>{{ $land->city }}, {{ $land->country }}`)
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