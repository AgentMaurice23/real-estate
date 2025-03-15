<!DOCTYPE html svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
 "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Lien vers la bibliothèque Font Awesome via un CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-HfhHKw0p2idb8H4yLQQA8u+1euQZ2sQJUDmN3pbWVY25E3m8lVTdLzRpt0TJRUoICZOa7aV72hFGG7ZfW8JPhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0" rel="stylesheet">
        <link rel="stylesheet" href="/vendor/intl-tel-input/build/css/intlTelInput.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBntMoriLF9fADg8H5DGdSrtw1T3V1E5p5W9iLgD2z10z9Q6A9yy9e49Itge5zRPV3A35P6cVyxBz9STU0A==" crossorigin=""/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/IMS.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <title>@yield('title')</title>
    </head>
<body>
    <x-header :notifications="$notifications" :unreadNotificationsCount="$unreadNotificationsCount" />

    {{-- <x-header :notifications="$notifications ?? []" :unread-notifications-count="$unreadNotificationsCount ?? 0" /> --}}

<div class=" bg-white ">
       
    @if(session('success'))
    <div id="success-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50">
      <div class="py-12"></div>
        <div class="flex items-center justify-center min-h-screen">
          <div class="bg-white  p-8 rounded shadow-lg">
              <div class="mb-4 text-blue-600">
                  <!-- Afficher le message de succès ici -->
                  {{ session('success') }}
              </div>
              <button id="closed-modal" class="block mx-auto px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Fermer</button>
          </div>
      </div>
    </div>
    @endif
        <div class="">
            @yield('content')
        </div>
</div>
<!-- Script JavaScript pour afficher la boîte de dialogue modale -->
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
  
              {{-- @include('shared.footer') --}}
      <style>
         
          .nav-link {
              color: #ffffff; /* Couleur par défaut du texte */
              font-weight: bold; /* Rendre le texte gras */
          }
      
          .nav-link:hover {
              color: #000000; /* Couleur du texte au survol */
          }

          #map {
            height: 400px;
            width: 100%;
        }
      
      </style>
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
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-VJSJ6xauFv0RTP0tOIl9P4P3BydFZI4eF2gV1UH1e5m9YNx1z2O+n7Pf4TzPy3U" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyW+MpDAHpG5EqvqOgT9A" crossorigin="anonymous"></script>
  
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-S2ATCxxOko6r3F0uK/yb3wz4Q3twVeqke9cM7GDR9Qy3EBZ1PnCTv3p1k2R8QQTbd87GLKghE1BfYTyVEFhyyQ==" crossorigin=""></script>


</body>
</html>

