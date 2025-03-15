

@extends('home')
<x-header>

</x-header>
@section('title', $land->exists ? "Editer les informations" : "Publier un terrain")
@section('content')
<div class="w-[80%] mx-[10%] p-4">
    <div class="container mx-auto mt-14">

        <div class="row mx-auto md:flex">
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
            
            </div>
            <div class="col-md-8 items-center px-6 mx-auto overflow-auto md:flex-3">
                <div class="mt-6 p-2"></div>
                <div class="bg-gray-900 row mt-2 border-1 w-full text-white font-bold">
                    <h1 class="flex justify-center items-center text-xl font-semibold p-2  mx-4">@yield('title')</h1>
                </div>
                <form id="landForm" class="row flex-col mx-auto" action="{{ route($land->exists ? 'lands.update' : 'lands.store', $land->exists ? $land->id : '') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method($land->exists ? 'put' : 'post')
                
                    <div class="col row border md:flex-col py-3 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'value' => $land->title ?? ''])
                            @include('shared.input', ['name' => 'description', 'label' => 'Description', 'value' => $land->description ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'price', 'label' => 'Prix', 'value' => $land->price ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'surface', 'label' => 'Surface', 'value' => $land->surface ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', [
                                'name' => 'country',
                                'label' => 'Pays',
                                'options' => $countries,
                                'selected' => $property->country ?? ''
                            ])

                            @include('shared.input', ['name' => 'city', 'label' => 'Ville', 'value' => $land->city ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'value' => $land->address ?? ''])
                            @include('shared.input', ['name' => 'postal_code', 'label' => 'Code Postal', 'value' => $land->postal_code ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'land_type', 'label' => 'Type de terrain', 'options' => ['Agricole', 'Résidentiel', 'Commercial', 'Industriel'], 'value' => $land->land_type ?? ''])
                            @include('shared.select', ['name' => 'zoning', 'label' => 'Zonage', 'options' => ['Zone A', 'Zone B', 'Zone C'], 'value' => $land->zoning ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'services', 'label' => 'Services', 'value' => $land->services ?? ''])
                            @include('shared.input', ['name' => 'topography', 'label' => 'Topographie', 'value' => $land->topography ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'access', 'label' => 'Accès', 'value' => $land->access ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'area', 'label' => 'Surface de construction', 'value' => $land->area ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'restrictions', 'label' => 'Restrictions', 'value' => $land->restrictions ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'amenities', 'label' => 'Aménagements', 'value' => $land->amenities ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <label for="availability" class="font-semibold">Disponibilité:</label>
                        <div class="flex justify-between">
                            
                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'rent','checked' => in_array('rent', $property->availability ?? []),'id' => 'rent','label' => 'À louer'
                            ])

                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'sale','checked' => in_array('sale', $property->availability ?? []),'id' => 'sale','label' => 'À vendre'
                            ])
                            
                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'both','checked' => in_array('both', $property->availability ?? []),'id' => 'both','label' => 'Les deux'
                            ])
                            @include('shared.checkbox', ['name' => 'survey', 'label' => 'Terrain arpenter', 'value' => $land->survey ?? ''])
                            @include('shared.checkbox', ['name' => 'urban_certificate', 'label' => 'Certificat d\'urbanisme', 'value' => $land->urban_certificate ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <label for="documents" class="block text-lg font-semibold text-gray-700">Documents</label>
                        <div id="documents-container" class="flex space-x-2">
                            <input type="file" name="documents[]" id="documents" multiple class="mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2  btn btn-secondary" id="add-document-field">Ajouter un document</button>
                    </div>
                
                    <div class="col row p-2 border mt-4 bg-gray-50">
                        <div class="border-b">
                            <h2 class="text-black flex justify-center text-lg w-full font-semibold py-2">Ajouter des images</h2>
                        </div>
                        <div id="fileInputs" class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-1 p-3 fileInputWrapper">
                                <input type="file" name="images[]" class="form-control-file" id="images">
                                <button type="button" class="closeButton" onclick="removeFileInput(this)"></button>
                            </div>
                        </div>
                        <div class="flex py-2 justify-center">
                            <button type="button" class=" px-4 py-2 items-center bg-blue-500 font-medium text-white rounded-md " onclick="addFileInput()">
                                Ajouter
                            </button>  
                        </div>
                        <p class="border-b border-gray-50"></p>
                        <p class="text-gray-50 text-lg flex justify-center mb-1">Sélectionnez une image (dimensions requises: 800px x 600px)</p>
                    </div>
                
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ $land->exists ? 'Mettre à jour' : 'Somettre' }}
                        </button>
                    </div>
                </form>                
          
                
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<script>
    function addFileInput() {
        var fileInputsDiv = document.getElementById("fileInputs");

        // Création d'un conteneur pour chaque champ de fichier et son bouton de suppression
        var fileInputWrapper = document.createElement("div");
        fileInputWrapper.className = "mb-3 mt-2 d-inline-flex align-items-center ml-2"; // Utilisation de classes Bootstrap pour disposer en ligne avec marge à droite

        var newFileInput = document.createElement("input");
        newFileInput.type = "file";
        newFileInput.className = "form-control-file";
        newFileInput.name = "images[]";
        newFileInput.accept = ".jpg, .jpeg, .png, .pdf";
        
        var removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.className = "closeButton ml-2"; // Utilisation de classes Bootstrap pour styler le bouton
        removeButton.innerHTML = '<i class="fas fa-times"></i>';
        removeButton.onclick = function() {
            fileInputsDiv.removeChild(fileInputWrapper);
        };
        
        fileInputWrapper.appendChild(newFileInput);
        fileInputWrapper.appendChild(removeButton);
        fileInputsDiv.appendChild(fileInputWrapper);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-document-field').addEventListener('click', function () {
            const container = document.getElementById('documents-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'documents[]';
            input.className = 'mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm d-inline-flex align-items-center sm:text-sm';
            container.appendChild(input);
        });
    });


</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[name="availability[]"]');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== this) {
                            cb.checked = false;
                        }
                    });
                }
            });
        });
    
        // Ensure only one checkbox is checked initially if multiple are checked
        let checkedCount = 0;
        checkboxes.forEach(cb => {
            if (cb.checked) {
                checkedCount++;
                if (checkedCount > 1) {
                    cb.checked = false;
                }
            }
        });
    });
</script>