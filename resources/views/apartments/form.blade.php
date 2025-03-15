

@extends('home')
<x-header>

</x-header>
@section('title', $apartment->exists ? "Editer les informations" : "Publier un appartement")
@section('content')
<div class="w-[80%] mx-[10%] p-4">
    <div class="container mx-auto mt-14">
        <div class="mt-6 p-2"></div>
        <div class="bg-black mt-2 border-1 w-full text-white font-bold">
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
            {{-- <div class="bg-white col mt-8 overflow-auto p-6 border-1  min-h-screen">
                <h2 class="text-xl font-semibold mb-4">Cher(e) utilisateur(trice),</h2>
                <p class="mb-4">
                    Avant de soumettre votre formulaire, nous vous invitons à vérifier soigneusement toutes les informations saisies. En cas d'erreur, veuillez suivre les étapes indiquées pour corriger et compléter le formulaire conformément à nos règles de soumission.
                </p>
                
                <p class="font-semibold">
                    Nous vous remercions pour votre compréhension et votre attention.<br>
                    Cordialement,<br>
                    L'Équipe de <span class="font-bold text-xl">IMMAS</span> 
                </p>
            </div> --}}
        </div>
        <div class="row mx-auto md:flex">
            <div class="col-md-3 overflow-auto p-4 bg-blue-200 mb-4 md:mb-0 md:flex-1">
            
            </div>
            <div class="col-md-8 items-center px-6 mx-auto overflow-auto md:flex-3">
                <form id="apartmentForm" class="mx-auto" action="{{ route($apartment->exists ? 'apartments.update' : 'apartments.store', $apartment) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method($apartment->exists ? 'put' : 'post')
                
                    <!-- Titre et description -->
                    <div class="col row border py-3 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'value' => $apartment->title ?? ''])
                            @include('shared.input', ['name' => 'description', 'label' => 'Description', 'value' => $apartment->description ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'price', 'label' => 'Prix', 'value' => $apartment->price ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'area', 'label' => 'Surface', 'value' => $apartment->area ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <!-- Adresse -->
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'country', 'label' => 'Pays', 'value' => $apartment->country ?? ''])
                            @include('shared.input', ['name' => 'city', 'label' => 'Ville', 'value' => $apartment->city ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'value' => $apartment->address ?? ''])
                            @include('shared.input', ['name' => 'postal_code', 'label' => 'Code Postal', 'value' => $apartment->postal_code ?? ''])
                        </div>
                    </div>
                
                    <!-- Informations sur l'appartement -->
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'floor', 'label' => 'Étage', 'value' => $apartment->floor ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'total_floors', 'label' => 'Nombre d\'étages', 'value' => $apartment->total_floors ?? '', 'type' => 'number'])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'bedrooms', 'label' => 'Nombre de chambres', 'value' => $apartment->bedrooms ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'bathrooms', 'label' => 'Nombre de salles de bain', 'value' => $apartment->bathrooms ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <!-- Toilettes et balcon -->
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'toilets', 'label' => 'Nombre de toilettes', 'value' => $apartment->toilets ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'balcony_area', 'label' => 'Surface du balcon', 'value' => $apartment->balcony_area ?? '', 'type' => 'number'])
                        </div>
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'energy_certifications', 'label' => 'Certifications énergétiques', 'options' => ['A', 'B', 'C', 'D', 'E', 'F', 'G'], 'value' => $apartment->energy_certifications ?? ''])
                            @include('shared.select', ['name' => 'heating_type', 'label' => 'Type de chauffage', 'options' => ['Électrique', 'Gaz', 'Fioul', 'Bois'], 'value' => $apartment->heating_type ?? ''])
                        </div>
                    </div>
                
                    <!-- Superficie et commodités -->
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'surface', 'label' => 'Superficie', 'value' => $apartment->surface ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'amenities', 'label' => 'Commodités', 'value' => $apartment->amenities ?? ''])
                        </div>
                    </div>
                
                    <!-- Equipements -->
                    <div class="col row p-3 border mt-4 bg-gray-50">
                        <div class="flex justify-between">
                            @include('shared.checkbox', ['name' => 'elevator', 'label' => 'Ascenseur', 'value' => $apartment->elevator ?? '', 'type' => 'checkbox'])
                            @include('shared.checkbox', ['name' => 'balcony', 'label' => 'Balcon', 'value' => $apartment->balcony ?? '', 'type' => 'checkbox'])
                            @include('shared.checkbox', ['name' => 'air_conditioning', 'label' => 'Climatisation', 'value' => $apartment->air_conditioning ?? '', 'type' => 'checkbox'])
                        </div>
                    </div>
                
                    <!-- Disponibilité -->
                    <div class="mb-4">
                        <label for="availability" class="font-semibold">Disponibilité:</label>
                        <div class="flex items-between space-x-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="rent" {{ in_array('rent', $apartment->availability ?? []) ? 'checked' : '' }} id="rent">
                                <label for="rent" class="ml-2">À louer</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="sale" {{ in_array('sale', $apartment->availability ?? []) ? 'checked' : '' }} id="sale">
                                <label for="sale" class="ml-2">À vendre</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="both" {{ in_array('both', $apartment->availability ?? []) ? 'checked' : '' }} id="both">
                                <label for="both" class="ml-2">Les deux</label>
                            </div>
                        </div>
                    </div>
                
                    <!-- Documents -->
                    <div class="mb-4">
                        <label for="documents" class="block text-sm font-medium text-gray-700">Documents</label>
                        <div id="documents-container">
                            <input type="file" name="documents[]" id="documents" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2 btn btn-secondary" id="add-document-field">Ajouter un document</button>
                    </div>
                
                    <!-- Images -->
                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                        <div id="images-container">
                            <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2 btn btn-secondary" id="add-image-field">Ajouter une image</button>
                    </div>
                
                    <button type="submit" class=" text-xl px-3 py-2 text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-full shadow hover:bg-blue-800 hover:text-white ml-2 mb-3">
                        @if($apartment->exists)
                            Modifier
                        @else
                            Soumettre
                        @endif
                    </button>
                </form>
                              
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-document-field').addEventListener('click', function () {
            const container = document.getElementById('documents-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'documents[]';
            input.className = 'mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm';
            container.appendChild(input);
        });

        document.getElementById('add-image-field').addEventListener('click', function () {
            const container = document.getElementById('images-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.className = 'mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm';
            container.appendChild(input);
        });
    });
</script>