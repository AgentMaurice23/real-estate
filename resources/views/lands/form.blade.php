

@extends('home')

@section('title', $land->exists ? "Editer les informations" : "Publier un appartement")
@section('content')
<div class="w-[80%] mx-[10%] p-4">
    <div class="container mx-auto mt-14">
     

        {{-- <div class="flex flex-col md:flex-row mb-4 gap-4">
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
            <div class="bg-white col mt-8 overflow-auto p-6 border-1  min-h-screen">
                <h2 class="text-xl font-semibold mb-4">Cher(e) utilisateur(trice),</h2>
                <p class="mb-4">
                    Avant de soumettre votre formulaire, nous vous invitons à vérifier soigneusement toutes les informations saisies. En cas d'erreur, veuillez suivre les étapes indiquées pour corriger et compléter le formulaire conformément à nos règles de soumission.
                </p>
                
                <p class="font-semibold">
                    Nous vous remercions pour votre compréhension et votre attention.<br>
                    Cordialement,<br>
                    L'Équipe de <span class="font-bold text-xl">IMMAS</span> 
                </p>
            </div>
        </div> --}}
        <div class="row mx-auto md:flex">
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
            
            </div>
            <div class="col-md-8 items-center px-6 mx-auto overflow-auto md:flex-3">
                <div class="mt-6 p-2"></div>
                <div class="bg-gray-900 row mt-2 border-1 w-full text-white font-bold">
                    <h1 class="flex justify-center items-center text-xl font-semibold p-2  mx-4">@yield('title')</h1>
                </div>
                <form id="landForm" class=" row flex-col mx-auto" action="{{ route($land->exists ? 'land.update' : 'land.store', $land) }}" method="post" enctype="multipart/form-data">
                    @csrf
                     @method($land->exists ? 'put' : 'post')
                 
                
                    <div class="col row border md:flex-col py-3 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'value' => $land->title ?? ''])
                            @include('shared.input', ['name' => 'description', 'label' => 'Description', 'value' => $land->description ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'price', 'label' => 'Prix', 'value' => $land->price ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'area', 'label' => 'Surface', 'value' => $land->area ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'country', 'label' => 'Pays', 'value' => $land->country ?? ''])
                            @include('shared.input', ['name' => 'city', 'label' => 'Ville', 'value' => $land->city ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'value' => $land->address ?? ''])
                            @include('shared.input', ['name' => 'postal_code', 'label' => 'Code Postal', 'value' => $land->postal_code ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'type', 'label' => 'Type de terrain', 'options' => ['Agricole', 'Résidentiel', 'Commercial', 'Industriel'], 'value' => $land->type ?? ''])
                            @include('shared.input', ['name' => 'frontage', 'label' => 'Façade', 'value' => $land->frontage ?? '', 'type' => 'number'])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'depth', 'label' => 'Profondeur', 'value' => $land->depth ?? '', 'type' => 'number'])
                            @include('shared.select', ['name' => 'terrain_type', 'label' => 'Type de terrain', 'options' => ['Plat', 'En pente', 'Collinaire'], 'value' => $land->terrain_type ?? ''])
                        </div>
                    </div>
                
                    <div class="col row border md:flex-col py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'building_type', 'label' => 'Type de construction', 'value' => $land->building_type ?? ''])
                            @include('shared.input', ['name' => 'surface', 'label' => 'Superficie', 'value' => $property->surface ?? '', 'type' => 'number'])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'terrain_direction', 'label' => 'Direction du terrain', 'value' => $land->terrain_direction ?? ''])
                            @include('shared.input', ['name' => 'utilities', 'label' => 'Services publics', 'value' => $land->utilities ?? ''])
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="availability" class="font-semibold">Disponibilité:</label>
                        <div class="flex items-between space-x-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="rent" {{ in_array('rent', $land->availability ?? []) ? 'checked' : '' }} id="rent">
                                <label for="rent" class="ml-2">À louer</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="sale" {{ in_array('sale', $land->availability ?? []) ? 'checked' : '' }} id="sale">
                                <label for="sale" class="ml-2">À vendre</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="availability[]" value="both" {{ in_array('both', $land->availability ?? []) ? 'checked' : '' }} id="both">
                                <label for="both" class="ml-2">Les deux</label>
                            </div>
                            @include('shared.checkbox', ['name' => 'construction_permitted', 'label' => 'Construction permise', 'value' => $land->construction_permitted ?? '', 'type' => 'checkbox'])
                        </div>
                    </div>
                   

                    <div class="mb-4">
                        <label for="documents" class="block text-sm font-medium text-gray-700">Documents</label>
                        <div id="documents-container">
                            <input type="file" name="documents[]" id="documents" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2 btn btn-secondary" id="add-document-field">Ajouter un document</button>
                    </div>
                    
                    {{-- <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                        <div id="images-container">
                            <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2 btn btn-secondary" id="add-image-field">Ajouter une image</button>
                    </div> --}}
                    <div class="col row p-2 border mt-4  bg-gray-50">
                        
                        <div class="border-b">
                            <h2 class="text-black flex justify-center text-2xl w-full font-semibold py-2">Ajouter des images</h2>
                        </div>
                        <div id="fileInputs" class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-1 p-3 fileInputWrapper">
                                <input type="file" name="images[] form-control-file" id="images">
                                {{-- @include('shared.input', ['class' => 'form-control-file','type' => 'file', 'label' => 'images', 'name' => 'images[]']) --}}
                                <button type="button" class="closeButton" onclick="removeFileInput(this)">
                                    
                                </button>
                            </div>
                        </div>
                        <!-- Bouton pour ajouter un nouveau champ -->
                        <div class="flex justify-center">
                            <button type="button" class="text-xl px-2 py-2 text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-md shadow hover:bg-blue-800 hover:text-white ml-2 mb-3" onclick="addFileInput()">
                                <i class="fas fa-plus"></i> 
                            </button>  
                        </div>
                        <p class="border-b border-gray-50"></p>
                        <p class="text-gray-50 text-lg flex justify-center mb-1">Sélectionnez une image (dimensions requises: 800px x 600px)</p>
                    </div>
            
                    <div class="d-flex justify-content-between mt-3">
                        @error('images[]')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                            
                <div class="flex justify-start">
                      <button type="submit" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ isset($land) ? 'Mettre à jour' : 'Ajouter' }}
                    </button>
                </div>
                  
                </form>
                
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<Script>
    function addFileInput() {
        var fileInputsDiv = document.getElementById("fileInputs");

        // Création d'un conteneur pour chaque champ de fichier et son bouton de suppression
        var fileInputWrapper = document.createElement("div");
        fileInputWrapper.className = "mb-3  d-inline-flex align-items-center ml-2"; // Utilisation de classes Bootstrap pour disposer en ligne avec marge à droite

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
    
</Script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-document-field').addEventListener('click', function () {
            const container = document.getElementById('documents-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'documents[]';
            input.className = 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm';
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