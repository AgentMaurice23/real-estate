<x-home></x-home>

<div class="container mx-auto mt-10 py-8">
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
                        <a href="{{ url('/contacte') }}" class="flex justify-center mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-black bg-blue-50 no-underline hover:bg-blue-400">Contacter</a>
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
                    <a href="{{ url('/contacte') }}" class="inline-flex justify-center items-center px-8 py-2 text-lg font-medium text-center border-1 border-blue-900 text-black bg-blue-50 no-underline hover:bg-blue-400">Contacter</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row container mx-auto flex-row py-4">
       
        <div class="col-md-4"> 
         
            <div class="block" x-data="{ showFullBio: false }">
                <div class=" bg-white border mt-3 p-4" @click="showFullBio = !showFullBio">
                    <div class="text-gray-800 leading-tight ">
                        <p class="text-justify" >
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
                       
                    </div>
                    <div class="bg-white overflow-hidden rounded-b">
                       
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
                                <span class="font-semibold">Nom:</span>
                                <span class="text-lg font-bold">{{ $user->profil->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Prénom:</span>
                                <span class="text-lg font-bold">{{ $user->profil->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Date de naissance:</span>
                                <span class="text-lg font-bold">{{ $user->profil->birthdate }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-semibold">Email:</span>
                                <span class="text-lg font-bold">{{ $user->profil->email }}</span>
                            </div>
                            <div class="flex py-2 justify-end">
                                <a href="{{ url('/chatify') }}" class="flex justify-center mt-2 items-center px-4 py-2 text-lg font-medium text-center border-1 border-blue-900 text-black bg-blue-50 no-underline hover:bg-blue-400">Contacter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
           
        </div>
    </div>
</div>

<x-footer></x-footer>
