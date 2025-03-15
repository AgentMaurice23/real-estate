
<nav class="bg-white border-b border-gray-200 w-full fixed top-0 z-50">
   
    <div class="container flex flex-wrap justify-between items-center max-w-screen-xl ">
        <a href="{{ url('/') }}" class="flex items-center rtl:space-x-reverse">
          <span class="self-center text-2xl text-gray-700 font-bold whitespace-nowrap ">
              <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                  width="100px" height="70px" viewBox="0 0 800.000000 600.000000"
                  preserveAspectRatio="xMidYMid meet">
                  
                  <g transform="translate(0.000000,600.000000) scale(0.100000,-0.100000)"
                  fill="#000000" stroke="none">
                  <path d="M3595 4399 c-854 -64 -1651 -275 -2470 -657 -66 -31 -124 -59 -128
                  -63 -7 -5 91 -219 109 -238 2 -2 85 34 186 79 784 355 1526 551 2288 605 1059
                  76 2119 -132 3178 -622 78 -36 144 -64 146 -62 6 6 116 228 116 234 0 2 -35
                  21 -77 41 -1011 473 -1964 697 -2958 692 -154 0 -329 -5 -390 -9z"/>
                  <path d="M6294 3366 c-132 -30 -238 -105 -282 -199 -31 -67 -39 -159 -19 -228
                  36 -122 130 -183 392 -250 215 -55 265 -88 251 -163 -23 -124 -281 -142 -504
                  -35 -46 22 -85 39 -87 37 -2 -2 -22 -43 -45 -92 -31 -69 -38 -92 -29 -102 21
                  -25 134 -73 225 -96 119 -29 329 -32 419 -4 170 51 267 156 282 302 11 107
                  -30 196 -120 258 -62 42 -99 56 -282 103 -169 43 -218 63 -241 98 -38 58 9
                  141 93 164 94 26 251 6 362 -47 l60 -29 35 84 c19 45 36 91 38 100 4 22 -78
                  64 -172 89 -88 22 -296 28 -376 10z"/>
                  <path d="M1190 2795 l0 -565 130 0 130 0 0 565 0 565 -130 0 -130 0 0 -565z"/>
                  <path d="M1720 2795 l0 -565 125 0 125 0 2 325 3 324 160 -264 160 -265 60 0
                  60 0 165 277 165 278 3 -338 2 -337 126 0 127 0 -7 38 c-3 20 -6 274 -6 565
                  l0 527 -107 0 -108 0 -204 -345 c-113 -190 -207 -345 -211 -345 -4 0 -101 155
                  -215 345 l-208 345 -109 0 -108 0 0 -565z"/>
                  <path d="M3260 2795 l0 -565 125 0 125 0 2 326 3 327 160 -264 161 -264 60 -3
                  61 -3 164 276 164 276 3 -335 2 -336 125 0 125 0 0 438 c0 240 -3 495 -7 565
                  l-6 128 -105 -3 -106 -3 -72 -120 c-39 -66 -132 -223 -207 -348 l-135 -228
                  -210 348 -210 348 -111 3 -111 3 0 -566z"/>
                  <path d="M5151 3338 c-5 -13 -116 -261 -246 -553 -130 -291 -239 -536 -242
                  -542 -4 -10 26 -13 130 -13 l135 0 48 120 49 120 265 0 265 0 49 -120 48 -120
                  138 0 138 0 -115 258 c-64 141 -177 394 -252 562 l-137 305 -132 3 c-130 3
                  -132 2 -141 -20z m232 -455 l85 -208 -89 -3 c-49 -1 -129 -1 -178 0 l-89 3 86
                  208 c47 114 89 207 92 207 4 0 45 -93 93 -207z"/>
                  <path d="M1050 1725 l0 -135 2955 0 2955 0 0 135 0 135 -2955 0 -2955 0 0
                  -135z"/>
                  </g>
                  </svg>
          </span>
        </a>
        <div class="flex items-center md:order-2 space-x-4 md:space-x-0 rtl:space-x-reverse">
                @auth
                    <?php 
                        $user = Auth::user()->profil;
                    ?>
                    <button type="button" class="flex text-sm bg-gray-50 border rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <!-- Placeholder image for user photo -->
                        {{-- <img class="w-8 h-8 rounded-full" 
                                src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/profil.png') }}" 
                                alt="{{ $user->name }}" /> --}}
                            @if ($user)
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/profil.png') }}"
                                    alt="{{ $user->name }}" />
                            @else
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ asset('images/profil.png') }}"
                                    alt="Default Profile" />
                            @endif

                            <svg class="w-7 h-7 px-1 mt-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>    
                    </button>
                @else
                    <ul class="flex my-2 items-center justify-center">

                        <li>
                            <a href="{{ route('login') }}" class="text-blue-500 font-semibold hidden md:block px-3 py-2 flex-shrink-0 rounded-full no-underline">Connexion</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="text-blue-700 font-semibold bg-blue-100 border-2 border-blue-700 hidden md:block px-3 py-2 flex-shrink-0 rounded-full no-underline">Devenir agent</a>
                        </li>
                    </ul>
                @endauth
           
            <!-- Dropdown menu -->
            <div class="z-20 hidden my-2 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
               
               
                @if(auth()->check())
                    <div class="px-4 py-3">
                        <?php 
                        $user = Auth::user()->profil;
                        if ($user) {
                            $name = $user->name;
                            $email = $user->email;
                        } else {
                            $user = Auth::user();

                            $name = $user->name;
                            $email = $user->email;
                        }
                        ?>
                
                        <span class="block text-sm text-gray-900 ">{{$name}}</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{$email}}</span>
                    </div>
                @endif
            
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ url('/') }}" class=" block py-2 text-sm  text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 no-underline">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show') }}" class=" block py-2 text-sm  text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 no-underline">Mon profil</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <div class="flex py-2">
                                <button class=" text-sm text-black hover:text-blue-500 font-semibold" type="submit">
                                    Déconnexion
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            @auth
                    <!-- Bouton pour afficher les parametres -->
                <button id="parametreToggleBtn" type="button" class=" text-gray-800 focus:outline-none rounded-lg text-sm p-2.5 me-1">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="sr-only">Paramètre</span>
                </button>
            @endauth
           

            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="items-center flex flex-col font-medium md:p-0 my-2 rounded-lg bg-transparent e md:space-x-5 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  ">
                <li>
                    <a href="/" class="block py-2 px-3 no-underline text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 " aria-current="page">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('services.all-view')}}" class="block py-2 px-3 no-underline text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Bien Immobilier</a>
                </li>
                <li>
                    <a href="{{ route('services.all-view')}}" class="block py-2 px-3 no-underline text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Notre équipe</a>
                </li>
              
            
                
                @auth
                    {{-- @if(Auth::check() && (Auth::user()->role === 'agent' || Auth::user()->role === 'agency')) --}}
                    @if(Auth::check() && Auth::user()->profil && Auth::user()->profil->role !== 'standard')
                        <li class="flex space-x-4 ">
                            <a href="{{ route('services.mon-service') }}" class="bg-blue-500 hidden md:block text-white px-3 py-2 flex-shrink-0 rounded-full no-underline">Nouveau</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('auth.register-type') }}" class="bg-blue-500 hidden md:block text-white px-3 py-2 flex-shrink-0 rounded-full no-underline">Devenir agent</a>
                        </li>
                    @endif

                    <li>
                        <!-- Bouton pour activer le champ de notification -->
                        <button id="alerteToggleBtn" type="button" class="text-black focus:outline-none rounded-lg text-sm p-2.5 me-1 relative">
                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                            </svg>
                            <span class="sr-only">Notification</span>
                            @if($unreadNotificationsCount > 0)
                                <span class="absolute top-0 right-0 bg-blue-500 text-white rounded-full px-2 py-1 text-xs">{{ $unreadNotificationsCount }}</span>
                            @endif
                        </button>
                    </li>
                    
               
                    <li>
                        <!-- Bouton pour activer le champ de recherche -->
                        <button id="searchToggleBtn" type="button" class=" text-black focus:outline-none rounded-lg text-sm p-2.5 me-1">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </li>
                  
                   
                @else
                    <li>
                        <a href="{{ route('login') }}" class=" bg-blue-500 md:hidden text-white px-3 py-2 flex-shrink-0 rounded-full no-underline">Connexion</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<!-- Modal -->
<div id="myModal" class="fixed top-0 right-0 w-72 h-full bg-gray-800 bg-opacity-75 z-50 hidden">
  <div class="absolute top-0 right-0 w-full h-full bg-white">
      <button id="alerteCloseBtn" type="button" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
        </svg>        
      </button>
      <div class="border-x h-full">
          <div class="w-full max-w-xs">
              <ul class="flex mt-10 space-x-8">
                  <li>
                      <button id="tabMessage" class="text-gray-900 text-lg font-semibold hover:text-blue-500 py-2 w-full flex justify-center items-center focus:outline-none border-b border-gray-400">Message</button>
                        @if($unreadMessagesCount > 0)
                            <span class=" bg-blue-500 text-white rounded-full px-2 py-1 text-xs">{{ $unreadMessagesCount }}</span>
                        @endif
                    </li>
                  <li>
                    <button id="tabNotification" class="text-gray-900 text-lg font-semibold space-x-1 hover:text-blue-500 py-2 w-full flex justify-center items-center focus:outline-none">
                        Notification
                        @if($unreadNotificationsCount > 0)
                            <span class=" bg-blue-500 text-white rounded-full px-2 py-1 text-xs">{{ $unreadNotificationsCount }}</span>
                        @endif
                    </button>
                  </li>
              </ul>
          </div>
          <div class="flex justify-center mt-2">
                <div id="messageContent" class="">
                    <div id="toast-notification" class="w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-300" role="alert">
                        <div class="flex items-center mb-3">
                            <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">New notification</span>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0">
                                <img class="w-12 h-12 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Jese Leos image"/>
                                <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
                                        <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"/>
                                        <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"/>
                                    </svg>
                                    <span class="sr-only">Message icon</span>
                                </span>
                            </div>
                            <div class="ms-3 text-sm font-normal">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</div>
                                <div class="text-sm font-normal">commented on your photo</div> 
                                <span class="text-xs font-medium text-blue-600 dark:text-blue-500">a few seconds ago</span>   
                            </div>
                        </div>
                    </div>
                    <ul>
                        @foreach ($messages as $message)
                            <li>
                                Vous avez reçu un message de {{ $message->sender->name }}: {{ $message->body }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="notificationContent" class="hidden p-3">
                    <div class="overflow-auto" style="max-height: 400px;">
                        @foreach($notifications as $notification)
                            <div class="notification-item {{ $notification->read_at ? '' : 'unread' }}">
                                <div class="flex items-center bg-white border-y shadow-md p-3">
                                    <div class="ms-3 text-sm font-normal">
                                        <div class="notification-message">
                                            @if($notification->data['action_type'] == 'creation')
                                                @if(in_array($notification->data['property_type'], ['property', 'land', 'room']))
                                                    Nouvelle {{ ucfirst($notification->data['property_type']) }} ajoutée : {{ $notification->data['property_title'] }}
                                                @elseif($notification->data['type'] == 'agency')
                                                    Nouvelle Agence créée : {{ $notification->data['profil_name'] }}
                                                @endif
                                            @elseif($notification->data['action_type'] == 'modification')
                                                @if(in_array($notification->data['property_type'], ['property', 'land', 'room']))
                                                    {{ ucfirst($notification->data['property_type']) }} mise à jour : {{ $notification->data['property_title'] }}
                                                @elseif($notification->data['type'] == 'agency')
                                                    Agence mise à jour : {{ $notification->data['profil_name'] }}
                                                @endif
                                            @elseif($notification->data['action_type'] == 'suppression')
                                                @if(in_array($notification->data['property_type'], ['property', 'land', 'room']))
                                                    {{ ucfirst($notification->data['property_type']) }} supprimée : {{ $notification->data['property_title'] }}
                                                @endif
                                            @elseif($notification->data['action_type'] == 'boost')
                                                @if(in_array($notification->data['type'], ['property', 'room', 'land']))
                                                    {{ ucfirst($notification->data['type']) }} boostée : {{ $notification->data['title'] }}
                                                    pour {{ $notification->data['duration'] }} jours à {{ $notification->data['price'] }} 
                                                @endif
                                            @endif
                                            <a href="{{ route('notifications.redirect', ['id' => $notification->id]) }}" class="text-xs font-medium text-blue-600 dark:text-blue-500">
                                                Voir 
                                            </a>
                                            @if($notification->read_at)
                                                <span class="text-xs font-medium text-green-500 ml-2">(Lu)</span>
                                            @endif
                                        </div>
                                        <div class="text-xs font-medium text-gray-600">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>                
                </div>                
          </div>
        </div>
  </div>
</div>

<div id="menuModal" class="fixed top-0 right-0 w-75 h-full bg-gray-800 bg-opacity-75 z-50 hidden">
  <div class="absolute top-0 right-0 w-full h-full bg-gray-100">
    <div class="flex flex-col items-center justify-center ">
        <span class="font-semibold flex justify-center mt-4">Profil</span>
        <button id="menuCloseBtn" type="button" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>        
        </button>
    </div>
      <!-- Vos liens de menu -->
    <ul class="mt-8 py-6 mx-auto w-full">
        @auth
            <li class="px-4 py-3 text-sm space-x-2 flex rounded-sm bg-gray-50 w-full"> 
                <svg class="w-5 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/>
                </svg>
                
                @if(auth()->check() && optional(Auth::user()->profil)->role === 'agent')
                    <a href="{{ route('services.mon-service') }}" class="text-gray-900 font-semibold flex no-underline">
                        Mon service
                    </a>
                @else
                    <a href="{{ route('profile.show') }}" class="text-gray-900 font-semibold flex no-underline">Mon profil</a>
                @endif
            </li>
            <div class="mt-3">
                <li class="px-4 py-3 text-sm flex space-x-2  border-b rounded-sm bg-gray-50 w-full">
                    <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                    </svg>
                    <a href="#" class="text-gray-900 font-semibold flex no-underline">
                       Historique
                    </a>
                </li>
                <li class="px-4 py-3 text-sm flex space-x-2  border-b rounded-sm bg-gray-50 w-full ">
                    <svg class="w-5 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                        <path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/>
                    </svg>
                    <a href="{{ url('/my-favorite') }}" class="text-gray-900 font-semibold hover:text-blue-500 no-underline">Favoris</a>
                </li>
            
                <li class="px-4 py-3 text-sm space-x-2 flex border-b rounded-sm bg-gray-50 w-full">
                    <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z"/>
                    </svg>
                    <a href="{{url('/contacte')}}" class="text-gray-900 font-semibold flex space-x-2 no-underline">
                        Messenger
                    </a>
                </li> 
            </div>
            <div class="mt-3">
                <li class="px-4 py-3 text-sm space-x-2  flex border-b rounded-sm bg-gray-50 w-full ">
                    <svg class="w-5 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                        <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/>
                    </svg>
                    <a href="{{ url('/') }}" class="text-gray-900 font-semibold hover:text-blue-500 no-underline">
                        Paramètre
                    </a>
                </li>
                <li class="px-4 py-3 text-sm border-b flex space-x-2  rounded-sm bg-gray-50 w-full">
                    <svg class="w-5 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                        <path d="M478-240q21 0 35.5-14.5T528-290q0-21-14.5-35.5T478-340q-21 0-35.5 14.5T428-290q0 21 14.5 35.5T478-240Zm-36-154h74q0-33 7.5-52t42.5-52q26-26 41-49.5t15-56.5q0-56-41-86t-97-30q-57 0-92.5 30T342-618l66 26q5-18 22.5-39t53.5-21q32 0 48 17.5t16 38.5q0 20-12 37.5T506-526q-44 39-54 59t-10 73Zm38 314q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                    </svg>
                    <a href="{{url('/immas-service-help')}}" class="text-gray-900 font-semibold flex no-underline">
                       Centre d'aide
                    </a>
                </li>
                <!-- Formulaire de déconnexion -->
                <li class="px-4 py-3 rounded-sm bg-gray-50 w-full">
                
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <div class="flex space-x-2 ">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                            </svg>
                            <button class="no-underline text-sm text-black hover:text-blue-500 font-semibold" type="submit">
                                Déconnexion
                            </button>
                        </div>
                    </form>
                </li>
            </div>
        @endauth
        <!-- Ajoutez autant de liens que nécessaire -->
        <li class="flex justify-center items-center">
            @auth
                <a href="{{ route('auth.register-type') }}" class="no-underline w-full">
                    <button class="bg-blue-500 mt-2 text-white w-full px-3 py-2 flex-shrink-0 md:block rounded-full">Devenir agent</button>
                </a>
            @endauth
        </li>
    </ul>
  </div>
</div>
<!-- Contenu du champ de recherche -->
<div id="searchModal" class="fixed top-0 mt-10 left-0 w-full bg-gray-100 bg-opacity-25 z-50 hidden">
    <div class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 max-w-md w-full p-1 rounded-lg">
        <div class="bg-white w-full p-1 rounded-lg">
            <div class="relative">
                <!-- Bouton de fermeture -->
                <button id="searchCloseBtn" type="button" class="p-2 text-gray-500 hover:text-gray-700 focus:outline-none absolute top-0 right-0">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 8.586l2.828-2.829 1.414 1.415L11.414 10l2.828 2.829-1.414 1.414L10 11.414l-2.828 2.828-1.415-1.414L8.586 10 5.757 7.172l1.415-1.415L10 8.586zM1 10c0-4.418 3.582-8 8-8s8 3.582 8 8-3.582 8-8 8-8-3.582-8-8z" fill="currentColor"/>
                    </svg>
                </button>
                <!-- Formulaire de recherche -->
                <form id="searchForm" class="relative">
                    <div class="relative flex items-center">
                        <input type="text" id="search-navbar" class="block w-full max-w-xs p-2 ps-10 text-sm text-gray-900 rounded-full hover:focus-none focus:outline-none" placeholder="Search...">
                        <button type="submit" class="absolute top-0 right-0 p-2 mt-1 mr-1 text-sm font-medium h-full text-white bg-blue-500 border border-blue-700 hover:focus-none focus:outline-none rounded-full" style="width: 35px; height: 35px;">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchToggleBtn = document.getElementById('searchToggleBtn');
        const searchModal = document.getElementById('searchModal');
        const searchCloseBtn = document.getElementById('searchCloseBtn');

        // Fonction pour basculer la visibilité du champ de recherche
        function toggleSearchModal() {
            searchModal.classList.toggle('hidden');
        }

        // Écouteur d'événement pour le clic sur le bouton de recherche
        searchToggleBtn.addEventListener('click', toggleSearchModal);

        // Écouteur d'événement pour le clic sur le bouton de fermeture
        searchCloseBtn.addEventListener('click', toggleSearchModal);
    });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const parametreToggleBtn = document.getElementById('parametreToggleBtn');
      const menuModal = document.getElementById('menuModal');
      const menuCloseBtn = document.getElementById('menuCloseBtn');

     

      parametreToggleBtn.addEventListener('click', function () {
          menuModal.classList.toggle('hidden');
      });

  
      menuCloseBtn.addEventListener('click', function () {
          menuModal.classList.add('hidden');
      });

  });

    // Récupérer les éléments du DOM
    var modal = document.getElementById("myModal");
    var tabMessage = document.getElementById("tabMessage");
    var tabNotification = document.getElementById("tabNotification");
    var messageContent = document.getElementById("messageContent");
    var notificationContent = document.getElementById("notificationContent");
    var alerteCloseBtn = document.getElementById("alerteCloseBtn");

    // Fonction pour ouvrir le modal
    function openModal() {
        modal.classList.remove("hidden");
    }

    // Fonction pour fermer le modal
    function closeModal() {
        modal.classList.add("hidden");
    }

    // Fonction pour afficher le contenu de l'onglet message
    function openMessageTab() {
        messageContent.classList.remove("hidden");
        notificationContent.classList.add("hidden");
    }

    // Fonction pour afficher le contenu de l'onglet notification
    function openNotificationTab() {
        messageContent.classList.add("hidden");
        notificationContent.classList.remove("hidden");
    }

    // Ajouter les écouteurs d'événements pour les clics sur les boutons d'onglet
    tabMessage.addEventListener("click", openMessageTab);
    tabNotification.addEventListener("click", openNotificationTab);
    alerteCloseBtn.addEventListener("click", closeModal);

    // Lorsque l'utilisateur clique en dehors du modal, le fermer
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Afficher le modal lorsqu'on clique sur le bouton de notification
    document.getElementById("alerteToggleBtn").addEventListener("click", openModal);

</script>

{{-- @auth
    <div class="fixed z-50 w-full md:hidden h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <button id="home" data-tooltip-target="tooltip-home" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-5 h-5 mb-1 text-gray-500  group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                <span class="sr-only">Home</span>
            </button>
            <div id="tooltip-home" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button data-tooltip-target="tooltip-Notification" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-6 h-6 mb-1 text-gray-500  group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"/>
                </svg>
                <span class="sr-only">Notification</span>
            </button>
            <div id="tooltip-Notification" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Notification
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div class="flex items-center justify-center">
                <a href="{{ route('properties.form') }}" class="no-underline">
                <button  data-tooltip-target="tooltip-new"  type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    <span class="sr-only">New </span>
                </button>
                </a>
            </div>
            <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Ajouter un logement
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="{{ url('/') }}" class="no-underline inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <button data-tooltip-target="tooltip-settings" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500  group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
                    </svg>
                    <span class="sr-only">Settings</span>
                </button>
            </a>
            <div id="tooltip-settings" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Settings
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="{{ route('profile.show')}}" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group no-underline">
                <button data-tooltip-target="tooltip-profile" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500  group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                    <span class="sr-only">Profile</span>
                </button>
            </a>
            <div id="tooltip-profile" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Profile
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
@endauth --}}
