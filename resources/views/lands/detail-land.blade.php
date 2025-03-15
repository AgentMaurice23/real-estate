<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du terrain</title>
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

@section('title', 'Détails sur le terrain')

<div class="mt-16 pt-12">
    <div class="container mt-16 pt-12 mx-auto">
      
        <div class="py-12"></div>
        <div class="container mx-auto grid gap-4">
            <div class="mt-8">
                <img id="main-image" 
                    style="height: 450px; width: 50%; object-fit: cover; object-position: center;" 
                    class="max-w-full rounded-lg" 
                    src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/land.jpg') }}" 
                    alt="Image principale de la propriété">
            </div>
            <div class="grid grid-cols-5 gap-4">
                @foreach($images as $index => $image)
                    <div>
                        <img onclick="changeMainImage('{{ asset('storage/' . $image) }}')" class="h-auto max-w-full rounded-lg cursor-pointer" 
                        src="{{ asset('storage/' . $image) }}" alt="Image {{ (int)$index + 1 }}">
                    </div>
                @endforeach
            </div>
        </div>
    
        <div class="border-b mx-auto p-4">
            <h1 class="text-xl font-bold">{{ $land->title }}</h1>
            <div class="flex justify-start space-x-2 align-items-center">
                <p class="text-lg">{{ $land->city }}</p>
                <p class="text-lg">{{ $land->country }}</p>
                <p class="text-lg">{{ $land->created_at }}</p>
            </div>
            <div class="py-1">
                <p class="text-lg">{{ $land->price }} CFA/mois 
                  
                    <div class="flex px-1 space-x-4">
                        @php
                            $availability = is_array($land->availability) ? $land->availability : json_decode($land->availability, true);
                        @endphp
                        @if (in_array('both', $availability))
                            <a href="{{ route('services.rent') }}">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded">Location</button>
                            </a>
                            <a href="{{ route('services.buy') }}">
                                <button class="bg-green-500 text-white px-2 py-1 rounded">En vente</button>
                            </a>
                        @elseif (in_array('sale', $availability))
                            <a href="{{ route('services.buy') }}">
                                <button class="bg-green-500 text-white px-2 py-1 rounded">En vente</button>
                            </a>
                        @else
                            <a href="{{ route('services.rent') }}">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded">Location</button>
                            </a>
                        @endif
                    </div>                    
                </p>
            </div>            
        </div>
        <div class=" mx-auto row">
            <div class="col-md-8 py-2 overflow-auto">
                <h1 class="font-bold border-b py-3 text-xl">Aperçu</h1>
                <div id="land-details" class="bg-white p-6 rounded-lg shadow-md">
                    <table class="w-full mt-4 text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-500 uppercase bg-blue-100">
                            <tr class="border">
                                <th scope="col" class="w-3/4 px-4 py-3">Type</th>
                                <th scope="col" class="w-1/4 border px-4 py-3">{{ $land->land_type ?? 'N/A' }}</th>
                            </tr>
                            <tr class="border">
                                <th scope="col" class="w-3/4 px-4 py-3">Superficie</th>
                                <th scope="col" class="w-1/4 border px-4 py-3">{{ $land->surface }} m²</th>
                            </tr>
                            <tr class="border">
                                <th scope="col" class="w-3/4 px-4 py-3">Localisation</th>
                                <th scope="col" class="w-1/4 border px-4 py-3">{{ $land->longitude }}, {{ $land->latitude }}</th>
                            </tr>
                            <tr class="border">
                                <th scope="col" class="w-3/4 px-4 py-3">Prix</th>
                                <th scope="col" class="w-1/4 border px-4 py-3">{{ number_format($land->price, 0, ',', ' ') }} CFA</th>
                            </tr>
                        </thead>
                    </table>
                
                    <div class="py-4">
                        <h3 class="font-bold border-b py-3 text-xl">Description</h3>
                        <p class="text-lg py-2 px-4">{{ $land->description }}</p>
                    </div>
                
                    <div class="py-4">
                        <h3 class="font-bold border-b py-3 text-xl">Emplacement</h3>
                        <div class="flex flex-wrap">
                            <p class="text-lg py-2 px-4"><strong>Ville:</strong> {{ $land->city }}</p>
                            <p class="text-lg py-2 px-4"><strong>Pays:</strong> {{ $land->country }}</p>
                            <p class="text-lg py-2 px-4"><strong>Code Postal:</strong> {{ $land->postal_code }}</p>
                        </div>
                        <div class="flex justify-center mt-4">
                            <div id="map" class="w-full h-64"></div>
                        </div>
                    </div>
                </div>
                
                <div class="py-4">
                    <h3 class="font-bold border-b py-3 text-xl">Autres terrains associés</h3>
                    <div id="land-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                        @foreach($lands as $otherland)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <a href="{{ route('land.detail-land', $otherland->id) }}" target="_blank" class="block">
                                    @php
                                        $images = $otherland->images;
                                    @endphp
                                    <img class="w-full h-48 object-cover" style="object-position: center; object-fit: cover; width: 100%; height: 250px;" src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/land.jpg') }}" alt="Land image">
                                </a>
                                <div class="px-2 space-y-2 py-3">
                                    <h3 class="text-xl  font-semibold text-gray-800 mb-2">{{ $otherland->title }}</h3>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3 justify-between mb-2">
                                            <span class="text-sm font-bold text-blue-600">{{ number_format($otherland->price, 0, ',', ' ') }} CFA</span>
                                            <span class="text-sm text-gray-500">{{ $otherland->surface }} m²</span>
                                        </div>
                                        <div class="flex items-center space-x-3 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343">
                                                <path d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z"/>
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $otherland->city }}</span>
                                            <span class="text-sm text-gray-600">{{ $otherland->country }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between">
                                        @php
                                            $availability = is_array($otherland->availability) ? $otherland->availability : json_decode($otherland->availability, true);
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
            </div>
            <div class="col-md-4 py-4 overflow-auto">
                <div class="shadow block overflow-auto">
                    <div class="row">
                        <div class="bg-black">
                            <h2 class="border-b-1 flex justify-center text-white text-lg p-2">Profil</h2>
                        </div>
                        <div class="flex p-4 ">
                            <div class="col border-r p-2">
                                {{-- <img class="w-64 h-24 mb-3 rounded-t-lg" src="{{ asset('images/1.png') }}" alt="land image"> --}}
                                <img class="w-24 h-24 mb-3"
                                src="{{ $land->user->profil->profile_photo_path ? asset('storage/' . $land->user->profil->profile_photo_path) : asset('images/profil.jpg') }}" 
                                alt="{{ $land->user->profil->name }}" />
                            </div>
                            <div class="col p-2">
                                <h3 class="text-lg ">{{ $agent->name }}</h3>
                                <p> {{ $agent->phone }}</p>
                                <p>{{ $agent->email }}</p>

                                <div class="flex space-x-2 ">
                                    {{-- <i class="fa fa-eye mt-1"></i> --}}
                                    <a href="{{ route('user.agent-profil-view', $land->user->id) }}" class="font-semibold flex space-x-2 text-black no-underline">
                                        Voir plus
                                    </a>
                                </div>
                            </div> 
                        </div>
                        <div class="col my-4 block">
                            <a href="{{ route('user', ['id' =>  $land->user->id]) }}" target="_blank " class="flex justify-center mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-white bg-blue-500 no-underline hover:bg-blue-400">Contacter</a>
                        </div>
                    </div>
                </div>
                <div class="shadow mt-4 block overflow-auto">
                    <div class="bg-black">
                        <h2 class=" flex justify-center text-white text-lg p-2">Contacter-moi !</h2>
                    </div>
                    <div class="px-4 py-2">
                        <form action="{{ route('sendMessageToAgent') }}" method="post">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $land->user->id }}">
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

<x-footer></x-footer>

<script>
    function changeMainImage(newSrc) {
        document.getElementById('main-image').src = newSrc;
    }
</script>

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