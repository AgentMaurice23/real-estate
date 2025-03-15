<x-home></x-home>

<div class=" container mx-auto mt-10 py-8">
    <div class="p-6"></div>
    
    <div class="w-full hidden bg-blue-300 md:block min-h-300px" style="height: 300px; position: relative;">
        <img style="height: 100%; width: 100%; object-fit: cover;"
             src="{{ $user->profil->profile_cover_path ? asset('storage/' . $user->profil->profile_cover_path) : asset('/images/IMMAS2.png') }}" 
             alt="{{ $user->profil->name }}" />
    </div>
    <div class="w-full md:hidden bg-blue-300 min-h-200px" style="height: 200px; position: relative;">
        <img style="height: 100%; width: 100%; object-fit: cover;"
             src="{{ $user->profil->profile_cover_path ? asset('storage/' . $user->profil->profile_cover_path) : asset('/images/IMMAS2.png') }}" 
             alt="{{ $user->profil->name }}" />
    </div>
    <div class="hidden md:block md:py-20">
        <div class="bg-white border-1 py-14 w-full">
            <div class="mx-auto max-w-screen-xl text-center">
                <div class="flex flex-col items-center relative">
                    <!-- Profil image -->
                    <img class="mb-3 rounded-full hidden md:block absolute border-4 border-white w-56 h-56" style="top: 30%; left: 30%; transform: translate(-50%, -50%);"
                         src="{{ $user->profil->profile_photo_path ? asset('storage/' . $user->profil->profile_photo_path) : asset('images/profil.jpg') }}" 
                         alt="{{ $user->profil->name }}" />
                </div>
            </div>
            <div class="p-6">
                <div class="row flex">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 block">
                        <div class="flex space-x-1 mt-1 justify-center">
                            <h2 class="font-bold text-2xl ">{{ $user->profil->name }}</h2>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#3b82f6">
                                   <path d="m347-72-75-124-141-32 13-144-96-108 96-108-13-144 141-32 75-124 133 57 133-57 75 124 141 32-13 144 96 108-96 108 13 144-141 32-75 124-133-57-133 57Zm29-91 104-44 104 44 58-97 110-25-10-111 74-84-74-84 10-111-110-25-58-97-104 44-104-44-58 97-110 24 10 112-74 84 75 84-11 112 110 25 58 96Zm104-317Zm-51 144 238-237-51-51-187 186-85-84-51 51 136 135Z"/>
                                </svg>
                            </span>
                        </div>
                        <p class="flex justify-center space-x-3 text-sm">
                            @if($user->isOnline())
                                <span class="text-green-500">En ligne</span>
                            @else
                                <span class=" text-gray-700 mr-4">Dernière connexion:</span>
                                <span class="text-sm">{{ $user->timeSinceLastLogin() }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4 block">
                        <a href="{{ route('user', ['id' => $user->id]) }}" target="_blank " class="flex justify-center mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-black bg-blue-50 no-underline hover:bg-blue-400">Contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
        <div class="md:hidden md:py-20">
            <div class="bg-white border-1 py-4 w-full min-h-[400px]">
                <div class="mx-auto max-w-screen-xl text-center">
                    <div class="flex flex-col items-center">
                        <img class="mb-3 rounded-full border-4 border-white w-36 h-36" src="{{ $user->profil->profile_photo_path }}" alt="{{ $user->name }}">
                    </div>
                </div>
                <div class="flex flex-col justify-center space-y-4 px-8 md:mt-24">
                    <h2 class="font-bold text-xl flex justify-center">{{ $user->profil->name }}</h2>
                    <a href="{{ route('user', ['id' => $user->id]) }}" target="_blank " class="inline-flex justify-center items-center px-8 py-2 text-lg font-medium text-center border-1 border-blue-900 text-black bg-blue-50 no-underline hover:bg-blue-400">Contacter</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row container mx-auto flex-row py-4">
       
        <div class="col-md-4"> 
            <div class="block" x-data="{ showFullBio: false }">
                <div class=" bg-white border mt-3 p-4" @click="showFullBio = !showFullBio">
                    <div class="text-gray-800 leading-tight ">
                        <p class="text-justify">
                            <span x-show="!showFullBio">
                                {{ Str::limit($user->profil->biographie, 150, '...') ?? 'Biographie de l\'agent non disponible.' }}
                            </span>
                        </p>
                        <p class="text-justify">
                            <span x-show="showFullBio" x-cloak>
                                {{ $user->profil->biographie ?? 'Biographie de l\'agent non disponible.' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="block">
                <div class="bg-white border mt-8">
                    <div class="flex justify-center bg-black border-b py-2">
                        <h2 class="font-semibold text-xl text-white leading-tight p-2">
                            Statistique agent
                        </h2>
                    </div>
                    <div class="bg-white overflow-hidden rounded-b">
                        <span class="text-gray-800 mt-2 border-b flex justify-center font-semibold leading-tight p-2">
                             Disponible sur IMMAS 
                        </span>
                        <div class="font-semibold space-y p-4">
                            <div class="flex justify-between">
                                <span class="font-semibold">Avis positifs</span>

                                <span class="text-lg font-bold">5</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Avis négatifs</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Temps de réponse moy.</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Taux de prise en charge</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Taux de complétion</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Respect des délais</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Ventes au total</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Vendeur depuis</span>
                                
                                <span class="text-lg font-bold">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block">
                <div class="bg-white overflow-auto  border mt-8">
                    <div class="flex justify-center bg-black border-b py-2">
                        <h2 class="font-semibold text-xl text-white leading-tight p-2">
                            Informations
                        </h2>
                    </div>
                    <div class="bg-white rounded-b p-4">
                        <div class="font-semibold space-y">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold">Nom:</span>
                                <span class="text-sm font-semibold">{{ $user->profil->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-lg font-bold">Prénom:</span>
                                <span class="text-sm font-semibold">{{ $user->profil->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-lg font-bold ">Date de naissance:</span>
                                <span class="text-sm font-semibold">{{ $user->profil->birthdate }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-lg font-bold">Email:</span>
                                <span class="text-sm font-semibold">{{ $user->profil->email }}</span>
                            </div>
                            <div class="flex py-2 ">
                                <a href="{{ route('user',['id' => $user->id]) }}" target="_blank " class="flex justify-center w-full mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-white bg-blue-500 no-underline hover:bg-blue-400">Contacter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="block">
                <div class="border overflow-hidden mt-3 bg-gray-50">
                    <div class="flex justify-center border-b">
                        <h2 class="font-semibold text-xl py-3 text-gray-800 leading-tight">
                            Biens publiés
                        </h2>
                    </div>
                    <div class="row flex-row md:justify-center space-y-4 bg-gray-50 mt-4 p-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                            @foreach($properties as $property)
                                <div class="w-full max-w-sm flex justify-center">
                                    <a href="{{ route('property.details-properties', $property->id) }}" target="_blank" class="no-underline">
                                        <div class="flex flex-col">
                                            <img class="w-full h-34 mb-3 rounded-t-lg"
                                            style="object-position: center;object-fit: cover;width: 100%;height: 250px;"
                                            src="{{ asset('storage/' .$property->fichiers[0]) ?? asset('images/property.jpg') }}" alt="Property image">
                                            <a href="{{ route('user.agent-profil-view', $property->user->id) }}" target="_blank" class="no-underline">
                                                <div class="flex justify-between px-2">
                                                    <div class="flex space-x-2">
                                                        <img class="w-8 h-8 rounded-full mr-2" 
                                                        src="{{ $property->user->profil->profile_photo_path ? asset('storage/' . $property->user->profil->profile_photo_path) : asset('images/profil.jpg') }}" 
                                                        alt="{{ $property->user->profil->name }}" />
                                                        <span class="text-sm font-semibold text-gray-600">{{ $property->user->name }}</span>
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <span class="text-sm font-semibold text-gray-600">{{ $property->rooms }} 
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666">
                                                                <path d="M192-144v-456l288-216 288 216v456H192Zm72-72h264v-120H264v120Zm336 0h96v-120h-96v120ZM264-408h120v-120H264v120Zm192 0h240v-120H456v120ZM313-600h334L480-726 313-600Z"/>
                                                            </svg>
                                                        </span>
                                                        <span class="text-sm font-semibold text-gray-600">{{ $property->floor }} Etages</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <h2 class="mb-1 mt-2 text-lg px-2 font-medium text-gray-900">{{ $property->type }}</h2>
                                            <div class="flex mt-2 justify-between md:mt-6">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666">
                                                        <path d="M480-307q96-79 144-151.5t48-135.1q0-86.68-53.5-142.54Q565-792 480-792t-138.5 56Q288-680 288-594.06 288-532 336-460t144 153Zm0 91Q346-317 281-410.61q-65-93.6-65-183.39 0-118.01 73.56-194 73.56-76 190.5-76t190.44 76Q744-712.01 744-594q0 89.79-65 183.39Q614-317 480-216Zm.21-312Q510-528 531-549.21t21-51Q552-630 530.79-651t-51-21Q450-672 429-650.79t-21 51Q408-570 429.21-549t51 21ZM216-96v-72h528v72H216Zm264-504Z"/>
                                                    </svg>
                                                    <h3 class=" ms-2 text-sm font-medium text-gray-900">{{ $property->city }}</h3>
                                                    <h3 class=" ms-2 text-sm font-medium text-gray-900">{{ $property->country }}</h3>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <h3 class="ms-2 text-sm font-medium text-gray-900">{{ $property->price }} CFA</h3>
                                                    <p class="text-sm text-gray-600 px-1">{{ $property->surface }} m²</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>
