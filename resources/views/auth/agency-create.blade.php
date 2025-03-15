<!-- resources/views/agent/create.blade.php -->

<x-home>
    <!-- Autres balises head... -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script> --}}
</x-home>
   
   @section('title','Formulaire d\'Inscription - Agence Immobilière')
<div class="container mt-10 py-8">

    <div class="mt-6 p-2"></div>
    <div class="bg-gray-900 mt-2 border-1 w-full text-white font-bold">
        <h1 class="flex justify-center items-center text-xl font-semibold p-2  mx-4">@yield('title')</h1>
    </div>

    <div class="flex flex-col md:flex-row mb-4 gap-4">
        <div class="bg-white mt-8 col overflow-auto p-6 border-1 min-h-screen">
            <h2 class="text-xl font-semibold mb-4">Cher(e) utilisateur(trice),</h2>
            <p class="mb-4">
                Nous vous prions de bien vouloir remplir toutes les étapes de ce formulaire avec la plus grande attention. Chaque information fournie est essentielle pour le bon traitement de votre demande.
            </p>
            <p class="mb-4">
                Nous vous remercions pour votre coopération et votre diligence.
            </p>
            <p class="font-semibold">
                Cordialement,<br>
                L'Équipe de <span class="font-bold text-xl">IMMAS</span> 
            </p>
        </div>
    </div>
    <form action="{{ route('agency.store') }}" method="post" enctype="multipart/form-data">
                @csrf
        <div class="row mx-auto md:flex">
        
            <div class="col-md-8 items-center px-6 mx-auto overflow-auto md:flex-3">
                <!-- Informations de Base -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations de Base</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'name', 'label' => "Nom de l'Agence", 'required' => true])
                            @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'required' => true])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'postal_code', 'label' => 'Code Postal', 'required' => true])
                            @include('shared.input', ['name' => 'city', 'label' => 'Ville', 'required' => true]) 
                        </div>
                    </div>
            
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'country', 'label' => 'Pays', 'required' => true])
                            @include('shared.input', ['name' => 'phone', 'label' => 'Numéro de Téléphone', 'type' => 'tel', 'required' => true])
                        </div>
                        <div class="col py-2">

                            @include('shared.input', ['name' => 'email', 'label' => 'Adresse E-mail', 'type' => 'email', 'required' => true])
                            @include('shared.input', ['name' => 'website', 'label' => 'Site Web', 'type' => 'url'])
                        </div>
                    </div>
                </fieldset>

                <!-- Informations sur l'Entreprise -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations sur l'Entreprise</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                    <div class="col py-2">
                            @include('shared.input', ['name' => 'registration_number', 'label' => "Numéro d'Enregistrement", 'required' => true])
                            @include('shared.input', ['name' => 'vat_number', 'label' => 'Numéro de TVA'])
                        </div> 
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'agency_type', 'label' => 'Type d\'Agence', 'type' => 'select', 'options' => [
                                'location' => 'Location',
                                'vente' => 'Vente',
                                'gestion' => 'Gestion de biens',
                                'estimation' => 'Estimation'
                            ], 'required' => true])
                            @include('shared.input', ['name' => 'foundation_year', 'label' => 'Année de Création', 'required' => true])
                        </div>
                        
                    </div>

                </fieldset>

                <!-- Informations sur le Responsable -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations sur le Responsable</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'manager_name', 'label' => 'Nom du Responsable', 'required' => true])
                            @include('shared.input', ['name' => 'manager_email', 'label' => 'E-mail du Responsable', 'type' => 'email', 'required' => true])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'manager_phone', 'label' => 'Téléphone du Responsable', 'type' => 'tel', 'required' => true])
                        </div>
                    </fieldset>

                <!-- Informations sur les Services -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations sur les Services</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'services', 'label' => 'Types de Services Offerts', 'type' => 'select', 'options' => [
                                'vente' => 'Vente',
                                'location' => 'Location',
                                'gestion' => 'Gestion de biens',
                                'estimation' => 'Estimation'
                            ], 'required' => true])
                            @include('shared.input', ['name' => 'service_areas', 'label' => 'Zones Géographiques Couvertes', 'type' => 'textarea', 'required' => true])
                        </div>
                    </fieldset>


                <!-- Informations sur les Annonces -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations sur les Annonces</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'current_listings', 'label' => "Nombre d'Annonces Actuelles", 'type' => 'number', 'required' => true])
                            @include('shared.select', ['name' => 'property_types', 'label' => 'Types de Biens Proposés', 'type' => 'select', 'options' => [
                                'appartements' => 'Appartements',
                                'maisons' => 'Maisons',
                                'locaux_commerciaux' => 'Locaux commerciaux',
                                'terrains' => 'Terrains'
                            ], 'required' => true])
                        </div>
                    </div>
                </fieldset>

                <!-- Documents Requis -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Documents Requis</legend>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'license', 'label' => "Licence ou Autorisation d'Exercice", 'type' => 'file', 'required' => true])
                            @include('shared.input', ['name' => 'insurance', 'label' => 'Assurance Responsabilité Civile Professionnelle', 'type' => 'file', 'required' => true])
                        </div>
                        {{-- <div class="col py-2">
                            @include('shared.input', ['name' => 'photos', 'label' => 'Photos et Logos', 'type' => 'file', 'accept' => 'image/*'])
                        </div> --}}
                    </div>
                </fieldset>

                <!-- Informations Supplémentaires -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Informations Supplémentaires</legend>
                    @include('shared.input', ['name' => 'opening_hours', 'label' => "Horaires d'Ouverture", 'required' => true])
                    @include('shared.input', ['name' => 'description', 'label' => "Description de l'Agence", 'type' => 'textarea', 'required' => true])
                </fieldset>

                <!-- Consentements et Autorisations -->
                <fieldset class="mb-6">
                    <legend class="text-lg font-semibold">Consentements et Autorisations</legend>
                    @include('shared.checkbox', ['name' => 'terms_accepted', 'label' => "J'accepte les conditions d'utilisation", 'type' => 'checkbox', 'required' => true])
                    @include('shared.checkbox', ['name' => 'privacy_accepted', 'label' => "J'accepte la politique de confidentialité", 'type' => 'checkbox', 'required' => true])
                    @include('shared.checkbox', ['name' => 'publish_consent', 'label' => "J'autorise la publication des informations et annonces de l'agence sur ce site", 'type' => 'checkbox', 'required' => true])
                </fieldset>
            </div>
            <div class="col-md-4 overflow-auto p-4  mb-4 md:mb-0 md:flex-1">
                
                <div class="block">
                    <div class="bg-white border mt-2 p-2">
                   
                        <div class="mt-4">
                            <x-label for="identity" :value="__('Logo')" />
                            <input type="file" name="identity_piece" id="identity" accept=".jpg ,.png ,.jpeg">
                            
                            {{-- <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Cliquer pour choisir</span> ou glisser et déposer</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="identity_piece" id="identity" accept=".jpg ,.png ,.jpeg" class="hidden" />
                                </label>
                            </div>  --}}

                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="bg-white border mt-3 p-2">
                   
                        <div class="mt-4">
                            <x-label for="profile_photo" :value="__('Photo de profil')" />
                            <input type="file" name="profile_photo" id="profile_photo" accept=".jpg ,.png ,.jpeg">
                            
                            {{-- <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Cliquer pour choisir</span> ou glisser et déposer</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="profile_photo" id="profile_photo" accept=".jpg ,.png ,.jpeg" class="hidden" />
                                </label>
                            </div>  --}}

                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="bg-white border mt-3 p-2">
                
                        <div class="mt-4">
                            <x-label for="cover" :value="__('Photo de couverture')" />
                            <input type="file" name="profile_cover" id="profile_cover" accept=".jpg ,.png ,.jpeg">
                            
                            {{-- <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Cliquer pour choisir</span> ou glisser et déposer</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="profile_cover" id="profile_cover" accept=".jpg ,.png ,.jpeg" class="hidden" />
                                </label>
                            </div>  --}}

                        </div>
                    </div>
                </div>
            </div>       
        </div>
        
        <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Soumettre
            </button>
        </div> 

    </form>
    <x-immas></x-immas>
        
</div>

<x-footer></x-footer>
