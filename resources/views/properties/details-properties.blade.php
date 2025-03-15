<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Demande</title>
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

@section('title', 'Détails de la Demande')

<div class="mt-16 pt-12">
    <div class="container mt-16 pt-12 mx-auto">
        <div class="py-12"></div>
        <div class="container mx-auto grid gap-4">
            <div class="mt-8">
                <img id="main-image"
                style="height: 450px; width: 50%; object-fit: cover; object-position: center;" 
                class=" max-w-full rounded-lg" src="{{ asset('storage/' .$property->fichiers[0]) ?? asset('images/property.jpg') }}" alt="Image principale de la propriété">
            </div>
            <div class="grid grid-cols-5 gap-4">
                @foreach($property->fichiers as $index => $fichier)
                    <div>
                        <img onclick="changeMainImage('{{ asset('storage/' . $fichier) }}')"
                        style="object-position: center;object-fit: cover;width: 100%;height: 200px;"
                        class="h-auto max-w-full rounded-lg cursor-pointer" src="{{ asset('storage/' . $fichier) }}" alt="Image {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-b mx-auto p-4">
            <h1 class="text-xl font-bold">{{ $property->title }}</h1>
            <div class="flex justify-start space-x-2 align-items-center">
                <p class="text-lg">{{ $property->city }}</p>
                <p class="text-lg">{{ $property->country }}</p>
                <p class="text-lg">{{ $property->created_at }}</p>
            </div>
            <div class="py-1">
                <p class="text-lg">{{ $property->price }} CFA/mois <span class="bg-blue-400 text-white p-1 space-x-1">{{ $property->getStatusLabel() }}</span></p>
            </div>
        </div>

        <div class="mx-auto row">
            <div class="col-md-8 py-2 overflow-auto">
                <h1 class="font-bold border-b py-3 text-xl">Aperçu</h1>
                <table class="w-full mt-4 text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-500 uppercase bg-blue-100">
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Type</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ $property->property_type }}</th>
                        </tr>
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Superficie</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ $property->surface }} m²</th>
                        </tr>
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Nombre de chambres</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ $property->bedrooms }}</th>
                        </tr>
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Nombre de salles de bains</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ $property->bathrooms }}</th>
                        </tr>
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Nombre d'étages</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ $property->levels ?? 'N/A' }}</th>
                        </tr>
                        <tr class="border">
                            <th scope="col" class="w-3/4 px-4 py-3">Prix</th>
                            <th scope="col" class="w-1/4 border px-4 py-3">{{ number_format($property->price, 0, ',', ' ') }} CFA</th>
                        </tr>
                    </thead>
                </table>
                
                <div class="py-4">
                    <h3 class="font-bold border-b py-3 text-xl">Description</h3>
                    <p class="text-lg py-2 px-4">{{ $property->description }}</p>
                </div>
                
                <div class="py-4">
                    <h3 class="font-bold border-b py-3 text-xl">Emplacement</h3>
                    <div class="flex items-center">
                        {{-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                        </svg> --}}
                        <div class="flex flex-wrap">
                            <p class="text-lg py-2 px-4"><strong>Ville:</strong> {{ $property->city }}</p>
                            <p class="text-lg py-2 px-4"><strong>Pays:</strong> {{ $property->country }}</p>
                            <p class="text-lg py-2 px-4"><strong>Code Postal:</strong> {{ $property->postal_code }}</p>
                        </div>                
                    </div>
                    <div class="flex justify-center mt-4">
                        <div id="map" class="w-full h-64"></div>
                    </div>
                </div>
                
                <div class="py-4">
                    <h3 class="font-bold border-b py-3 text-xl">Autres logements associés</h3>
                    <div id="property-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
            <div class="col-md-4 py-4 overflow-auto">
                <div class="shadow block overflow-auto">
                    <div class="row">
                        <div class="bg-black">
                            <h2 class="border-b-1 flex justify-center text-white text-lg p-2">Informations </h2>
                        </div>
                        <div class="flex p-4 ">
                            <div class="col border-r p-2">
                                {{-- <img class="w-64 h-24 mb-3 rounded-t-lg" src="{{ asset('images/1.png') }}" alt="property image"> --}}
                                <img class="w-24 h-24 mb-3"
                                src="{{ $property->user->profil->profile_photo_path ? asset('storage/' . $property->user->profile_photo_path) : asset('images/profil.jpg') }}" 
                                alt="{{ $property->user->profil->name }}" />
                            </div>
                            <div class="col p-2">
                                <h3 class="text-lg ">{{ $agent->name }}</h3>
                                <p> {{ $agent->phone }}</p>
                                <p>{{ $agent->email }}</p>

                                <div class="flex space-x-2 ">
                                    {{-- <i class="fa fa-eye mt-2"></i> --}}
                                    <a href="{{ route('user.agent-profil-view', $agent->id) }}" class="font-semibold w-full flex space-x-2 text-black no-underline">
                                        Voir plus
                                    </a>
                                </div>
                            </div> 
                        </div>
                        <div class="col my-4 block">
                            <a href="{{ route('user', ['id' =>  $property->user->id]) }}" target="_blank " class="flex justify-center mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-white bg-blue-500 no-underline hover:bg-blue-400">Discuter</a>
                        </div>
                    </div>
                </div>
                <div class="shadow mt-4 block overflow-auto">
                    <div class="bg-black">
                        <h2 class=" flex justify-center text-white text-lg p-2">Contacter moi!!</h2>
                    </div>
                    <div class="px-4 py-2">
                        <form action="{{ route('sendMessageToAgent') }}" method="post">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->user->id }}">
                            <div class="mb-4">
                                @include('shared.input', ['name' => 'name'])
                            </div>
                            <div class="mb-4">
                                @include('shared.input', ['name' => 'phone'])
                            </div>
                            <div class="mb-4">
                                @include('shared.input', ['name' => 'email'])
                            </div>
                            <div class="mb-4">
                                @include('shared.input', ['name' => 'message', 'type' => 'textarea'])
                            </div>
                            <button type="submit" class="py-2 w-full text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-full shadow hover:bg-blue-800 hover:text-white mb-3">Envoyer</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    function changeMainImage(newSrc) {
        document.getElementById('main-image').src = newSrc;
    }
</script>
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

<x-footer></x-footer>
</body>
</html>
