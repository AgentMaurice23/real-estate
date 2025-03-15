<x-home></x-home>

<div class="mt-8"></div>
<div class="py-12">
    <div class="bg-cover bg-center p-4 w-full mb-6 bg-white hidden md:flex justify-center items-end">
        <div class="container mx-auto ">
            <form action="{{ route('property.searchAll') }}" method="get" class="flex gap-4 justify-center items-end">
                <!-- Utilisation de flex et justify-center pour aligner horizontalement les éléments -->
                <div class="relative">
                  {{-- <input type="text" id="type_chambre" name="type_chambre" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /> --}}
                  <select id="type_chambre" name="type_chambre" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                    <!-- Groupe Maison -->
                    <optgroup label="Maison" class="space-y-1 bg-gray-100 ">
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                        <option value="villa">Villa</option>
                        <option value="chalet">Chalet</option>
                    </optgroup>
                    <!-- Groupe Terrain -->
                    <optgroup label="Terrain" class="space-y-1 border-y">
                        <option value="plat">Plat</option>
                        <option value="en_pente">En pente</option>
                        <option value="collinaire">Collinaire</option>
                    </optgroup>
                    <!-- Groupe Chambres -->
                    <optgroup label="Chambres" class="space-y-1 bg-gray-100">
                        <option value="studio">Studio</option>
                        <option value="chambre_salon">Chambre salon</option>
                        <option value="2_chambres_salon">2 Chambres Salon</option>
                        <option value="3_chambres_salon">3 Chambres Salon</option>
                        <option value="4_chambres_salon">4 Chambres Salon</option>
                        <option value="5_chambres_salon">5 Chambres Salon</option>
                        <option value="plus">Plus</option>
                    </optgroup>
                </select>
                  <label for="type_chambre" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Type de Chambre</label>
                </div>

                <div class="relative">
                  <select type="text" id="country" name="country" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    @foreach($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                  </select>
                  
                  <label for="country" value="" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Pays</label>
                </div>

                <div class="relative">
                  <input type="text" id="city" name="city" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="city" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ville</label>
                </div>

                <div class="relative flex items-center max-w-[16rem]">
                  <button type="button" onclick="decrement()" class="bg-white  dark:hover:bg-gray-600 dark:border-gray-600 border border-gray-300 rounded-l-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                    </svg>
                  </button>
                  <input type="number" id="price" name="price" value="0" min="0" step="1000" class="bg-white border-l-0 border-r-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999"  />
                  <button type="button" onclick="increment()" class="bg-white   dark:hover:bg-gray-600 dark:border-gray-600 border border-gray-300 rounded-r-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                  </button>
                </div>
                <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded-md">Rechercher</button>
            </form>
        </div>
    </div>
    <section class="bg-gray-100">
        <div class="container mx-auto pt-10 relative">
            <!-- Bouton de défilement gauche -->
            <button onclick="scrollLeft('properties')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8592;
            </button>
                <div id="property-auto" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($boostedProperties as $property)
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
            <!-- Bouton de défilement droit -->
            <button onclick="scrollRight('properties')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8594;
            </button>
    
            <!-- Repeated for Lands -->
            <button onclick="scrollLeft('lands')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8592;
            </button>
                <div id="land--auto" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                    @foreach($boostedLands as $land)
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
            <button onclick="scrollRight('lands')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8594;
            </button>
    
            <!-- Repeated for Rooms -->
            <button onclick="scrollLeft('rooms')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8592;
            </button>
                <div id="rooms" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 overflow-x-auto whitespace-nowrap">
                    @foreach($boostedRooms as $room)
                        <div class="bg-white rounded-sm border p-4 inline-block">
                            <img class="w-full h-48 object-cover mb-4" 
                                src="{{ asset('storage/' . $room->images[0]) }}" 
                                alt="{{ $room->title }}"/>
                            <h3 class="text-xl">{{ $room->title }}</h3>
                            <p>{{ $room->description }}</p>
                        </div>
                    @endforeach
                </div>
            <button onclick="scrollRight('rooms')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                &#8594;
            </button>
        </div>
    </section>
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto py-6">
            @if ($searchPerformed)
                @if ($items->isEmpty())
                    <h3 class="mx-auto flex justify-center py-4">Aucun résultat trouvé</h3>
                @else
                    <h3 class="mx-auto flex justify-center py-4">Résultats de la recherche</h3>
                @endif
            @endif 
            <div class="row flex-row md:justify-center space-y-2 bg-gray-50 mt-2 p-2">
                <div id="items-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($items as $item)
                        @if ($item instanceof App\Models\Property)
                            <div class="col">
                                
                                <div class="w-full bg-white shadow-md overflow-hidden bg-transparent rounded-lg">
                                    <a href="{{ route('property.details-properties', $item->id) }}" target="_blank" class="no-underline property-click" data-property-id="{{ $item->id }}">
                                        <div class="flex flex-col">
                                            <img class="w-full h-34 mb-3 rounded-t-lg" style="object-position: center; object-fit: cover; width: 100%; height: 250px;" src="{{ asset('storage/' . ($item->fichiers[0] ?? 'images/property.jpg')) }}" alt="Property image"/>
                                            <a href="{{ route('user.agent-profil-view', $item->user->id) }}" target="_blank" class="no-underline">
                                                <div class="flex justify-between px-2">
                                                    <div class="flex space-x-2">
                                                        <img class="w-8 h-8 rounded-full" src="{{ $item->user->profil ? asset('storage/' . $item->user->profil->profile_photo_path) : asset('images/profil.jpg') }}" alt="{{ $item->user->profil ? $item->user->profil->name : $item->user->name }}" />
                                                        <span class="text-sm font-semibold text-gray-600">
                                                            {{ $item->user->profil ? $item->user->profil->name : 'Profil non disponible' }}
                                                        </span>
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <div class="flex">
                                                            <span class="text-sm font-semibold text-gray-600">{{ $item->bedrooms }} 
                                                            </span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666">
                                                                <path d="M192-144v-456l288-216 288 216v456H192Zm72-72h264v-120H264v120Zm336 0h96v-120h-96v120ZM264-408h120v-120H264v120Zm192 0h240v-120H456v120ZM313-600h334L480-726 313-600Z"/>
                                                            </svg>
                                                        </div>
                                                        <span class="text-sm font-semibold text-gray-600">{{ $item->levels }} Étages</span>
                                                    </div>
                                                </div>
                                            </a>
                                        
                                            <h2 class="mb-1 mt-2 text-lg px-2 font-medium text-gray-900">{{ $item->property_type }}</h2>
                                            <div class="flex mt-2 justify-between md:mt-6">
                                                <div class="flex items-center space-x-3 mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343">
                                                        <path d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z"/>
                                                    </svg>
                                                    <span class="text-sm text-gray-600">{{ $item->city }}</span>
                                                    <span class="text-sm text-gray-600">{{ $item->country }}</span>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <h3 class="ms-2 text-sm font-medium text-gray-900">{{ $item->price }} CFA</h3>
                                                    <p class="text-sm text-gray-600 px-1">{{ $item->surface }} m²</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif ($item instanceof App\Models\Land)
                            <div class="col">
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <a href="{{ route('land.detail-land', $item->id) }}" target="_blank" class="block">
                                        @php
                                            $images = $item->images;
                                        @endphp
                                        <img class="w-full h-48 object-cover" style="object-position: center; object-fit: cover; width: 100%; height: 250px;" src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/land.jpg') }}" alt="Land image">
                                    </a>
                                    <div class="px-2 space-y-2 py-3">
                                        <h3 class="text-xl  font-semibold text-gray-800 mb-2">{{ $item->title }}</h3>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3 justify-between mb-2">
                                                <span class="text-sm font-bold text-blue-600">{{ number_format($item->price, 0, ',', ' ') }} CFA</span>
                                                <span class="text-sm text-gray-500">{{ $item->surface }} m²</span>
                                            </div>
                                            <div class="flex items-center space-x-3 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343">
                                                    <path d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z"/>
                                                </svg>
                                                <span class="text-sm text-gray-600">{{ $item->city }}</span>
                                                <span class="text-sm text-gray-600">{{ $item->country }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            @php
                                                $availability = is_array($item->availability) ? $item->availability : json_decode($item->availability, true);
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
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if ($searchPerformed && !$items->isEmpty())
                {{-- <h3 class="mx-auto py-4">Voici d'autres logements qui pourraient vous intéresser</h3> --}}
                <!-- Afficher ici d'autres logements, par exemple, en sélectionnant des propriétés aléatoires ou les plus récentes -->
            @endif
        </div>   
    </section>
</div>
<script>
    // Défilement automatique des sections
    function autoScroll(sectionId) {
        let container = document.getElementById(sectionId);
        let scrollAmount = container.scrollWidth - container.clientWidth;
        let currentPosition = container.scrollLeft;
        let targetPosition = currentPosition + 1; // Ajustez la vitesse en modifiant cette valeur

        // Si on atteint le bout de la section, revenir au début
        if (targetPosition > scrollAmount) {
            targetPosition = 0;
        }

        // Animation de défilement fluide
        container.scrollTo({
            left: targetPosition,
            behavior: 'smooth'
        });
    }

    // Démarrer le défilement automatique au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(function() {
            autoScroll('property-auto'); // Remplacez 'property-grid' par l'ID de votre grille de propriétés
        }, 3000); // Définissez l'intervalle de défilement en millisecondes (ici toutes les 3 secondes)
    });
</script>
