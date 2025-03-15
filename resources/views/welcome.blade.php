
      
    <x-home></x-home>
       <p id="status"></p>

       <div class=" mt-9 py-8">
        
        <div x-data="{ ... }" >

            <section class="py-14 bg-blue-500 bg-cover bg-fixed bg-center relative" style="background-image: url('/images/image13.jpg'); height:400px;">
                
                <!-- Superposition -->
                <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
                
                <div class="container mx-auto flex flex-col justify-center items-center relative">
                    <h1 class="py-12 mt-8 font-semibold  text-white text-center relative">
                        Que recherchez-vous sur IMMAS ?
                    </h1>
                    
                    <div class="bg-cover bg-center p-4 w-full mb-6 bg-white hidden md:flex justify-center items-end">
                        <div class="container mx-auto ">
                            <form action="{{ route('property.search') }}" method="get" class="flex gap-4 justify-center items-end">
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
                        
                    <div class="bg-white md:hidden block w-full max-w-md p-2 rounded-lg">
                        <!-- Formulaire de recherche pour les appareils mobiles -->
                        <form id="searchForm" class="relative">
                            <div class="relative flex items-center">
                                <input type="text" id="search-navbar" class="block w-full p-3 ps-10 text-sm text-gray-900 rounded-full hover:focus-none focus:outline-none" placeholder="Search...">
                                <button type="submit" class="absolute flex items-center top-0 right-0 p-2 mt-2 mr-1 text-sm font-medium h-full text-white bg-blue-500 border border-blue-700 hover:focus-none focus:outline-none rounded-full" style="width: 35px; height: 35px;">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <section class="py-10 bg-white">
            <div class="container mx-auto py-6">
                <div class="flex md:flex space-x-4 border-y py-4">
                    <div class="w-1/2 flex justify-between border-x px-1">
                        <!-- Filtre par catégorie -->
                        <div>
                            <label for="categorie" class="form-label block text-gray-700 font-medium">Filtrer par catégorie :</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-filter text-gray-500"></i>
                                </span>
                                <select id="categorie" name="categorie" class="block w-full py-2 pl-10 pr-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Tous</option>
                                    <optgroup label="Maison">
                                        <option value="maison">Maison</option>
                                        <option value="appartement">Appartement</option>
                                        <option value="villa">Villa</option>
                                        <option value="chalet">Chalet</option>
                                    </optgroup>
                                    <optgroup label="Terrain" class="border-y bg-gray-100 py-2 ">
                                        <option value="plat">Plat</option>
                                        <option value="en_pente">En pente</option>
                                        <option value="collinaire">Collinaire</option>
                                    </optgroup>
                                    <optgroup label="Chambres">
                                        <option value="studio">Studio</option>
                                        <option value="chambre_salon">Chambre salon</option>
                                        <option value="2_chambres_salon">2 Chambres Salon</option>
                                        <option value="3_chambres_salon">3 Chambres Salon</option>
                                        <option value="4_chambres_salon">4 Chambres Salon</option>
                                        <option value="5_chambres_salon">5 Chambres Salon</option>
                                        <option value="plus">Plus</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <!-- Filtre par price -->
                        <div class="">
                            <label for="price" class="form-label block text-gray-700 font-medium">Filtrer par price :</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-dollar-sign text-gray-500"></i>
                                </span>
                                <select id="price" name="price" class="block w-full py-2 pl-10 pr-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Tous</option>
                                    <option value="0-50000">0 - 50 000</option>
                                    <option value="50001-100000">50 001 - 100 000</option>
                                    <option value="100001-150000">100 001 - 150 000</option>
                                    <option value="150001-200000">150 001 - 200 000</option>
                                    <option value="200001-300000">200 001 - 300 000</option>
                                    <option value="300001-plus">300 001 et plus</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 border-r px-1">
                        <!-- Liens vers les services -->
                        <div class="flex justify-between space-x-4">
                            <!-- Logements -->
                            <div class="flex flex-col items-center">
                                <a href="{{ route('services.all-view-properties') }}" target="_blank" rel="noopener noreferrer" class="no-underline text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="54px" viewBox="0 -960 960 960" width="54px" fill='#3B82F6' class="text-blue-500">
                                        <path d="M120-120v-560h240v-80l120-120 120 120v240h240v400H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm240 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm240 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"/>
                                    </svg>
                                    Logements
                                </a>
                            </div>
                    
                            <!-- Terrains -->
                            <div class="flex flex-col items-center">
                                <a href="{{ route('services.all-view-lands') }}" target="_blank" rel="noopener noreferrer" class="no-underline text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="54px" viewBox="0 -960 960 960" width="54px" fill='#3B82F6' class="text-blue-500">
                                        <path d="m40-240 240-320 180 240h300L560-586 460-454l-50-66 150-200 360 480H40Zm521-80Zm-361 0h160l-80-107-80 107Zm0 0h160-160Z"/>
                                    </svg>
                                    Terrains
                                </a>
                            </div>
                    
                            <!-- Chambres -->
                            <div class="flex flex-col items-center">
                                
                                <a href="{{ route('services.all-view-rooms') }}" target="_blank" rel="noopener noreferrer" class="no-underline text-blue-500">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" height="54px" viewBox="0 -960 960 960" width="54px" fill='#3B82F6' class="text-blue-500">
                                        <path d="M160-120v-480l320-240 320 240v480H160Zm80-80h280v-120H240v120Zm360 0h120v-120H600v120ZM240-400h120v-119H240v119Zm200 0h280v-119H440v119ZM292-599h376L480-740 292-599Z"/>
                                    </svg> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" height="54px" viewBox="0 -960 960 960" width="54px" fill='#3B82F6' class="text-blue-500">
                                        <path d="M120-120v-80h80v-640h400v40h160v600h80v80H680v-600h-80v600H120Zm160-640v560-560Zm160 320q17 0 28.5-11.5T480-480q0-17-11.5-28.5T440-520q-17 0-28.5 11.5T400-480q0 17 11.5 28.5T440-440ZM280-200h240v-560H280v560Z"/>
                                    </svg>
                                    Chambres
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-100">
            <div class="container mx-auto pt-10 relative">
                <!-- Bouton de défilement gauche -->
                <button onclick="scrollLeft('properties')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full shadow-md">
                    &#8592;
                </button>
                    <div id="property-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                    <div id="land-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
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

        <section class=" bg-gray-100">

            <div class="container mx-auto w-full bg-no-repeat justify-center min-h-300px rounded-t-sm bg-center" style="background-image: url('/images/IMMAS.png'); height:300px;" >
                <div class="mt-14 p-4"></div>
                <div class="px-4 mx-auto mt-14 max-w-screen-xl text-center lg:py-20">
                    <h1 class="mb-4 text-2xl flex justify-center font-extrabold tracking-tight leading-none text-white md:text-4xl lg:text-5xl">
                        Trouvez votre bien immobilier idéal avec IMMAS
                    </h1>
                </div>
                <div class="flex flex-col mt-4 space-y-4 p-6 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="{{ route('auth.agent-create')}}" class="inline-flex justify-center no-underline items-center py-3 px-5 text-base font-medium text-center text-white rounded-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Devenir agent
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="{{ route('auth.agent-create')}}" class="inline-flex justify-center no-underline hover:text-black items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-full border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                        Maintenant
                    </a>  
                </div>
            </div>
        </section>
        <section class="relative py-14 bg-gray-100">
            <div class="container mx-auto p-8">
                <h2 class="mx-auto text-lg flex justify-center">Les agents certifiés chez IMMAS</h2>

                <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($agents as $agent)
                            <div class="w-full max-w-sm flex justify-center bg-white border border-gray-200 rounded-lg">
                                <div class="flex flex-col items-center pb-10">
                                    @php
                                        $profilePhotoPath = $agent->profile_photo_path ? asset('storage/' . $agent->profile_photo_path) : asset('images/profil.jpg');
                                    @endphp
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $profilePhotoPath }}" alt="Profil image"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $agent->name }}</h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $agent->role }}</span>
                                    <div class="flex mt-4 md:mt-6">
                                        <a href="{{ route('user.agent-profil-view', ['user' => $agent->user->id]) }}" class="no-underline inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Voir</a>
                                        <a href="{{ route('user', ['id' => $agent->user->id]) }}" target="_blank" class="no-underline py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700">Discuter</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(getLocationInfo, showError);
                } else {
                    console.log("La géolocalisation n'est pas supportée par ce navigateur.");
                }

                function getLocationInfo(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    const apiKey = '6b5b4c508d10464e8f93104bc6fcb040';
                    const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            if (data.results && data.results.length > 0) {
                                const components = data.results[0].components;
                                const city = components.city || components.town || components.village || '';
                                const country = components.country || '';

                                document.getElementById('city').value = city;
                                document.getElementById('country').value = country;
                            } else {
                                console.log('Aucun résultat trouvé');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                        });
                }

                function showError(error) {
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            console.log("L'utilisateur a refusé la demande de géolocalisation.");
                            break;
                        case error.POSITION_UNAVAILABLE:
                            console.log("Les informations de localisation ne sont pas disponibles.");
                            break;
                        case error.TIMEOUT:
                            console.log("La demande de localisation a expiré.");
                            break;
                        case error.UNKNOWN_ERROR:
                            console.log("Une erreur inconnue s'est produite.");
                            break;
                    }
                }
            });
        </script>

         <script>
             document.addEventListener("DOMContentLoaded", function() {
                 if (navigator.geolocation) {
                     navigator.geolocation.getCurrentPosition(sendPosition, showError);
                 } else {
                     document.getElementById("status").innerHTML = "La géolocalisation n'est pas supportée par ce navigateur.";
                 }
     
                 function sendPosition(position) {
                     const latitude = position.coords.latitude;
                     const longitude = position.coords.longitude;
     
                     fetch('/save-location', {
                         method: 'POST',
                         headers: {
                             'Content-Type': 'application/json',
                             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                         },
                         body: JSON.stringify({
                             latitude: latitude,
                             longitude: longitude
                         })
                     })
                     .then(response => response.json())
                     .then(data => {
                         document.getElementById("status").innerHTML = data.message;
                     })
                     .catch(error => {
                         console.error('Erreur:', error);
                     });
                 }
     
                 function showError(error) {
                     switch(error.code) {
                         case error.PERMISSION_DENIED:
                             document.getElementById("status").innerHTML = "L'utilisateur a refusé la demande de géolocalisation."
                             break;
                         case error.POSITION_UNAVAILABLE:
                             document.getElementById("status").innerHTML = "Les informations de localisation ne sont pas disponibles."
                             break;
                         case error.TIMEOUT:
                             document.getElementById("status").innerHTML = "La demande de localisation a expiré."
                             break;
                         case error.UNKNOWN_ERROR:
                             document.getElementById("status").innerHTML = "Une erreur inconnue s'est produite."
                             break;
                     }
                 }
             
            });
        
            function scrollLeft(id) {
                document.getElementById(id).scrollBy({
                    left: -300, // Ajustez la valeur pour définir la quantité de défilement
                    behavior: 'smooth'
                });
            }
        
            function scrollRight(id) {
                document.getElementById(id).scrollBy({
                    left: 300, // Ajustez la valeur pour définir la quantité de défilement
                    behavior: 'smooth'
                });
            }
        </script>
        
        <x-footer>

        </x-footer>

    {{-- </body>
</html> --}}
