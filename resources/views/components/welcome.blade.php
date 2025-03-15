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
                          <input type="text" id="type_chambre" name="type_chambre" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                          <label for="type_chambre" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Type de Chambre</label>
                        </div>

                        <div class="relative">
                          <input type="text" id="pays" name="pays" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                          <label for="pays" value="Bénin" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Pays</label>
                        </div>

                        <div class="relative flex items-center max-w-[16rem]">
                          <button type="button" onclick="decrement()" class="bg-white  dark:hover:bg-gray-600 dark:border-gray-600 border border-gray-300 rounded-l-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                          </button>
                          <input type="number" id="prix" name="prix" value="0" min="0" step="1000" class="bg-white border-l-0 border-r-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999"  />
                          <button type="button" onclick="increment()" class="bg-white   dark:hover:bg-gray-600 dark:border-gray-600 border border-gray-300 rounded-r-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                          </button>
                        </div>
                        
                        <div class="relative">
                          <input type="text" id="ville" name="ville" class="block px-2.5 pb-2.5 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                          <label for="ville" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Ville</label>
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

{{--         <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>--}}
<section class="py-10 bg-gray-100">
    <div class="container mx-auto py-6">
        @if ($searchPerformed)
            @if ($properties->isEmpty())
                <h3 class="mx-auto flex justify-center py-4">Aucun résultat trouvé</h3>
            @else
                <h3 class="mx-auto flex justify-center py-4">Résultats de la recherche</h3>
            @endif
        @else
            <h3 class="mx-auto flex justify-center py-4">Logements disponibles chez IMMAS</h3>
        @endif

        <div class="row flex-row md:justify-center space-y-4 bg-gray-50 mt-4 p-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($properties as $property)
                    <div class="col">
                        <div class="w-full overflow-hidden bg-transparent rounded-lg">
                            <a href="{{ route('property.details-properties', $property->id) }}" target="_blank" class="no-underline">
                                <div class="flex flex-col">
                                    <img class="w-full h-34 mb-3 rounded-t-lg" src="{{ asset('images/1.png') }}" alt="Bonnie image"/>
                                    <a href="{{ route('user.agent-profil-view', $property->user->id) }}" target="_blank" class="no-underline">
                                        <div class="flex justify-between px-2">
                                            <div class="flex space-x-2">
                                                <img class="w-8 h-8 rounded-full" 
                                                    src="{{ $property->user->profile_photo_path ? asset('storage/' . $property->user->profile_photo_path) : asset('images/profil.jpg') }}" 
                                                    alt="{{ $property->user->name }}" />
                                                <span class="text-sm font-semibold text-gray-600">{{ $property->user->name }}</span>
                                            </div>
                                            <div class="flex space-x-2">
                                                <span class="text-sm font-semibold text-gray-600">{{ $property->rooms }} Chambres</span>
                                                <span class="text-sm font-semibold text-gray-600">{{ $property->floor }} Etages</span>
                                            </div>
                                        </div>
                                    </a>
                                    <h2 class="mb-1 mt-2 text-lg px-2 font-medium text-gray-900">{{ $property->type }}</h2>
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

        @if ($searchPerformed && !$properties->isEmpty())
            <h3 class="mx-auto py-4">Voici d'autres logements qui pourraient vous intéresser</h3>
            <!-- Afficher ici d'autres logements, par exemple, en sélectionnant des propriétés aléatoires ou les plus récentes -->
        @endif
    </div>   
</section>



<section class="py-14 bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="space-y-8">
            <h3 class="flex text-lg justify-start mx-8">Voici des terrains qui pourraient être bien pour vos projets</h3>
            {{-- <p class="flex justify-center">Achat/Louer</p> --}}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            
            @foreach($lands as $land)
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                    <div class="block">
                        <a href="#">
                            <img class="rounded-t-lg w-full" src="{{ asset('images/land.jpg') }}" alt="land image">
                        </a>
                        <figcaption class="">
                            <div class="bg-white rounded-b-lg px-2 py-2 text-lg text-gray-800">
                                <span>{{ $land->title }}</span>
                                <div class="flex space-x-4">
                                    <span class="py-1">{{ $land->city }}</span>
                                    <span class="py-1">{{ $land->price }}€</span>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            @endforeach
        </div>
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
            <a href="{{route('auth.agent-create')}}" class="inline-flex justify-center no-underline items-center py-3 px-5 text-base font-medium text-center text-white rounded-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Devenir agent
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="{{route('auth.agent-create')}}" class="inline-flex justify-center no-underline hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-full border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Maintenant
            </a>  
        </div>
    </div>
</section>
<section class="py-14 bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="space-y-8">
            <h3 class="flex justify-center mx-auto">Etendu de IMMAS</h3>
            <p class="flex justify-center">
                Les villes que Immas controle actuellement 
            </p> 

        </div>
        <div class="mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">

            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <a href="#">
                    <img class="rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png" alt="image description">
                </a>
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
            
            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <a href="#">
                <img class="rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png" alt="image description">
                </a>
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
            
            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <a href="#">
                <img class="rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png" alt="image description">
                </a>
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="bg-gray-100">
    <div class="container mx-auto py-10 p-8">
        <div class="space-y-8">
            <h3 class="flex justify-center">Nouveaux agents chez IMMAS</h3>
            <p class="flex justify-center mb-8">
                Inspecter leurs profils, discuter avec eux 
            </p> 
        </div>

        <div class="row flex mt-14 mb-8 border border-gray-200 rounded-lg shadow-sm md:mb-12 md:grid-cols-2 bg-white">
            @foreach ($agents as $agent)
            <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 md:rounded-se-lg">
                <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $agent->name }}</h3>
                    <p class="my-4">{{ $agent->description }}</p> <!-- Assurez-vous que chaque agent a une description -->
                </blockquote>
                <figcaption class="flex items-center justify-center">
                    <img class="rounded-full w-9 h-9" src="{{ asset('images/profil.jpg')}}" alt="profile picture"> <!-- Suppose que chaque agent a une image de profil -->
                    <div class="space-y-0.5 font-medium text-left rtl:text-right ms-3">
                        <div>{{ $agent->name }}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $agent->role }}</div> <!-- Suppose que chaque agent a un titre de poste -->
                    </div>
                </figcaption>    
            </figure>
            @endforeach
        </div>
    </div>
</section>
<section class="relative py-14 bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="mx-auto flex justify-center">Les agents certifiés chez IMMAS</h2>
        <p class="flex justify-center">
            Plus de 10 satifactions de la clientelle
        </p> 
        <div class="">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($agents as $agent)
                    <div class="w-full max-w-sm flex justify-center bg-white border border-gray-200 rounded-lg  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('images/profil.jpg')}}" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{ $agent->name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $agent->role }}</span>
                            <div class="flex mt-4 md:mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</a>
                                <a href="{{ route('chatify')}}" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700  ">Discuter</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
