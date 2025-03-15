<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IMMAS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/IMS.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Lien vers la bibliothèque Font Awesome via un CDN -->
        <!-- Scripts -->
        @vite('resources/css/app.css')

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
     
        {{-- @include('components.header', [
                'notifications' => $notifications ?? [],
                'unreadNotificationsCount' => $unreadNotificationsCount ?? 0
            ])

            <div class="min-h-screen bg-blue-500">
                @livewire('navigation-menu')
            <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                
                
                @livewire('notifications')
                @livewire('database-notifications')
            </div> 
        --}}
        @livewire('navigation-menu')
            <!-- Page Content -->
                {{ $slot }}

        <div class=" bg-white">
            @if(session('success'))
            <div id="success-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50">
              <div class="flex items-center justify-center min-h-screen">
                  <div class="bg-white p-8 rounded shadow-lg">
                      <div class="mb-4 text-blue-600">
                          <!-- Afficher le message de succès ici -->
                          {{ session('success') }}
                      </div>
                      <button id="closed-modal" class="block mx-auto px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Fermer</button>
                  </div>
              </div>
            </div>
            @endif
               
        </div>
        @stack('modals')


        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
      
          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;
      
          var pusher = new Pusher('7719b426af05112fc0e0', {
            cluster: 'eu'
          });
      
          var channel = pusher.subscribe('my-channel');
          channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
          });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
              // Vérifier si le message de succès est présent dans la session
              var successMessage = "{{ session('success') }}";
              if (successMessage) {
                  // Afficher la boîte de dialogue modale
                  document.getElementById('success-modal').classList.remove('hidden');
              }
          
              // Écouteur d'événement pour le bouton de fermeture de la boîte de dialogue modale
              document.getElementById('closed-modal').addEventListener('click', function() {
                  // Masquer la boîte de dialogue modale
                  document.getElementById('success-modal').classList.add('hidden');
              });
            });
          </script>
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
        {{-- @livewireScripts --}}
        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
