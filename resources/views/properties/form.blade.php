
<x-home>

</x-home>
@section('title', $property->exists ? "Editer les informations" : "Publier un nouveau logement")
<div class="w-[80%] mx-[10%] p-4">
    <div class="container mx-auto mt-14">
        <div class="mt-6 p-2"></div>
        

        <div class="row mx-auto md:flex">
            
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
           
            </div> 
            <div class="col-md-8 row items-center overflow-auto md:flex-3">
                <div class="bg-gray-900  mt-2 border-1 w-full text-white font-bold">
                    <h1 class="flex justify-center items-center text-xl font-semibold p-2">@yield('title')</h1>
                </div>
                <form id="propertyForm" class="mx-auto" action="{{ route($property->exists ? 'property.update' : 'property.store', $property) }}" method="post" enctype="multipart/form-data">
                    @csrf
                     @method($property->exists ? 'put' : 'post')
                
                    <div class="col row border py-3 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'value' => $property->title ?? ''])
                            @include('shared.input', ['name' => 'description', 'label' => 'Description', 'value' => $property->description ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'price', 'label' => 'Prix', 'value' => $property->price ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'area', 'label' => 'Surface', 'value' => $property->area ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                                @include('shared.select', [
                                    'name' => 'country',
                                    'label' => 'Pays',
                                    'options' => $countries,
                                    'selected' => $property->country ?? ''
                                ])
                            @include('shared.input', ['name' => 'city', 'label' => 'Ville','id' => 'city', 'value' => $property->city ?? ''])
                       </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'address', 'label' => 'Adresse', 'value' => $property->address ?? ''])
                            @include('shared.input', ['name' => 'postal_code', 'label' => 'Code Postal', 'value' => $property->postal_code ?? ''])
                        </div>
                      
                    </div>
                
                    <div class="col row border py-3 mt-4  bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'bedrooms', 'label' => 'Nombre de chambres', 'value' => $property->bedrooms ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'bathrooms', 'label' => 'Nombre de salles de bain', 'value' => $property->bathrooms ?? '', 'type' => 'number'])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'toilets', 'label' => 'Nombre de toilettes', 'value' => $property->toilets ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'levels', 'label' => 'Nombre de niveaux', 'value' => $property->levels ?? '', 'type' => 'number'])
                        </div>
                    </div>
                
                    
                
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'heating_type', 'label' => 'Type de chauffage', 'options' => ['Électrique', 'Gaz', 'Fioul', 'Bois'], 'value' => $property->heating_type ?? ''])
                            @include('shared.select', ['name' => 'energy_certifications', 'label' => 'Certifications énergétiques', 'options' => ['A', 'B', 'C', 'D', 'E', 'F', 'G'], 'value' => $property->energy_certifications ?? ''])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'garden_area', 'label' => 'Surface du jardin', 'value' => $property->garden_area ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'amenities', 'label' => 'Commodités', 'value' => $property->amenities ?? ''])
                        </div>
                    </div>

                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'surface', 'label' => 'Superficie', 'value' => $property->surface ?? '', 'type' => 'number'])
                            @include('shared.input', ['name' => 'construction_year', 'label' => 'Année de construction', 'value' => $property->construction_year ?? '', 'type' => 'number'])
                        </div>
                        
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'property_type', 'label' => 'Type de maison', 'options' => ['Maison', 'Appartement', 'Villa', 'Chalet'], 'value' => $property->property_type ?? ''])
                            @include('shared.select', ['name' => 'condition', 'label' => 'Condition', 'options' => ['Neuf', 'Bon état', 'À rénover'], 'value' => $property->condition ?? ''])
                        </div>
                    </div>

                    <div class="col row p-3 border mt-4  bg-gray-50">
                        
                        <div class="flex justify-between">
                            @include('shared.checkbox', ['name' => 'garage', 'label' => 'Garage', 'value' => $property->garage ?? '', 'type' => 'checkbox'])
                            @include('shared.checkbox', ['name' => 'air_conditioning', 'label' => 'Climatisation', 'value' => $property->air_conditioning ?? '', 'type' => 'checkbox'])
                            @include('shared.checkbox', ['name' => 'garden', 'label' => 'Jardin', 'value' => $property->garden ?? '', 'type' => 'checkbox'])
                            @include('shared.checkbox', ['name' => 'pool', 'label' => 'Piscine', 'value' => $property->pool ?? '', 'type' => 'checkbox'])
                        </div>
                    </div>

                    <div class="col row p-3 border mt-4  bg-gray-50">
                        <label for="availability" class="font-semibold">Disponibilité:</label>
                        <div class="flex items-center space-x-4">
                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'rent',
                                'checked' => in_array('rent', $property->availability ?? []),
                                'id' => 'rent',
                                'label' => 'À louer'
                            ])
                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'sale',
                                'checked' => in_array('sale', $property->availability ?? []),
                                'id' => 'sale',
                                'label' => 'À vendre'
                            ])
                            @include('shared.checkbox', [
                                'name' => 'availability[]',
                                'value' => 'both',
                                'checked' => in_array('both', $property->availability ?? []),
                                'id' => 'both',
                                'label' => 'Les deux'
                            ])
                        </div>
                    </div>

                    
                    <div class="mb-4">
                        <label for="documents" class="block text-sm font-medium text-gray-700">Documents</label>
                        <div id="documents-container">
                            <input type="file" name="documents[]" id="documents" multiple class="mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <button type="button" class="mt-2 btn btn-secondary" id="add-document-field">Ajouter un document</button>
                    </div>

                    <div class="col row p-2 border mt-4  bg-gray-50">
                        <div class=" hidden ">
                            @include('shared.checkbox',['name' => 'sold','label' => 'Vendu','value' => $property->sold])
                        </div>
                        <div class="border-b">
                            <h2 class="text-black flex justify-center text-2xl w-full font-semibold py-2">Ajouter des fichiers</h2>
                        </div>
                        <div id="fileInputs" class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-1 p-3 fileInputWrapper">
                                <input type="file" class="form-control-file" name="fichiers[]" id="fichiers">
                                <button type="button" class="closeButton" onclick="removeFileInput(this)">
                                    
                                </button>
                            </div>
                        </div>
                        <!-- Bouton pour ajouter un nouveau champ -->
                        <div class="flex py-2 justify-center">
                            <button type="button" class=" px-4 py-2 items-center bg-blue-500 font-medium text-white rounded-md " onclick="addFileInput()">
                                Ajouter
                            </button>  
                        </div>
                            <p class="border-b border-gray-50"></p>
                            <p class="text-gray-50 text-lg flex justify-center mb-1">Sélectionnez une image (dimensions requises: 800px x 600px)</p>
                    </div> 

            
                        <div class="d-flex justify-content-between mt-3">
                            @error('fichiers[]')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 
                            

                    <button type="submit" class=" text-xl px-3 py-2 text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-full shadow hover:bg-blue-800 hover:text-white ml-2 mb-3">
                        @if($property->exists)
                            Modifier
                        @else
                            Soumettre
                        @endif
                    </button>
                </form>

            </div>
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
            </div>
      
            
            
            <div class="w-full min-h-300px rounded-t-sm bg-center" style="background-image: url('/images/IMMAS.png'); height:300px;" >
                <div class="p-6 mt-4"></div>
                <div class="px-4 mx-auto mt-14 max-w-screen-xl text-center lg:py-20">
                    <h1 class="text-4xl flex justify-end mt-14 font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-4xl">
                         Des Solutions Immobilières Sur-Mesure pour Tous
                    </h1>
                    <p class="text-xl flex justify-end text-blue-400 font-bold">Votre Confiance, Notre Engagement</p>          
                </div>
                <div class="flex px-4 mx-auto justify-center">
                    <a href="#" class="no-underline hover:text-gray-800 items-center py-2 px-3 sm:ms-4 text-base font-medium text-center text-gray-900 rounded-full border border-gray-700 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition ease-in-out duration-300 shadow-md">
                        Contactez-nous
                    </a>  
                </div>
            </div>
        </div>
    </div>
    
</div>


<x-footer>

</x-footer>
<script>
    let currentStep = 1;
    const totalSteps = 5;

    function showStep(step) {
        document.querySelectorAll('.step-content').forEach((content, index) => {
            content.classList.add('step-hidden');
            if (index + 1 === step) {
                content.classList.remove('step-hidden');
            }
        });

        document.querySelectorAll('.step').forEach((stepElement, index) => {
            stepElement.classList.remove('active');
            stepElement.classList.remove('active');
            if (index + 1 === step) {
                stepElement.classList.add('active');
            }
        });

        currentStep = step;
    }

    function validateStep(step) {
        let valid = true;
        const stepContent = document.getElementById(`step${step}-content`);
        const inputs = stepContent.querySelectorAll('input, textarea');

        inputs.forEach(input => {
            if (!input.value.trim()) {
                valid = false;
                input.classList.add('border-red-500');
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (valid) {
            document.getElementById(`step${step}`).classList.add('completed');
            document.getElementById(`step${step}`).querySelector('.stepFull').classList.add('bg-green-100', 'border-green-300', 'text-green-700');
            if (step < totalSteps) {
                showStep(step + 1);
            }
        } else {
            alert('Veuillez remplir tous les champs.');
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    }

    function addFileInput() {
        var fileInputsDiv = document.getElementById("fileInputs");

        // Création d'un conteneur pour chaque champ de fichier et son bouton de suppression
        var fileInputWrapper = document.createElement("div");
        fileInputWrapper.className = "mb-3 mt-2 d-inline-flex align-items-center ml-2"; // Utilisation de classes Bootstrap pour disposer en ligne avec marge à droite

        var newFileInput = document.createElement("input");
        newFileInput.type = "file";
        newFileInput.className = "form-control-file";
        newFileInput.name = "fichiers[]";
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
    

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-document-field').addEventListener('click', function () {
            const container = document.getElementById('documents-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'documents[]';
            input.className = 'mt-1 block w-1/2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm';
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .step {
        cursor: pointer;
    }
    .step.completed .stepFull {
        background-color: #e6ffed;
        border-color: #b7e4b0;
        color: #34d399;
    }
    .step.active .stepFull {
        background-color: #8bc4f9;
        border-color: #218ce9;
        color: #045cff;
    }
    .step-hidden {
        display: none;
    }
</style>


