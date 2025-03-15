<!-- resources/views/agent/create.blade.php -->

<x-home>
    <!-- Autres balises head... -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script> --}}
</x-home>

   
<div class="container mt-10 py-8">
    <form method="POST" action="{{ route('agents.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row flex-row py-12">
            <div class="flex mx-auto justify-center items-center">

                <ol class="flex items-center w-full">
                    <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                        <span class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                            <svg class="w-3.5 h-3.5 text-blue-600 lg:w-4 lg:h-4 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                            </svg>
                        </span>
                    </li>
                    <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                        <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                            <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                            </svg>
                        </span>
                    </li>
                    <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                        <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                            <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                            </svg>
                        </span>
                    </li>
                    <li class="flex items-center w-full">
                        <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                           
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </li>
                </ol>
    
            </div>
            <div class="col-md-7 ">
            
                {{-- <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> --}}

                <div class="block">
                    <div class="flex justify-center bg-blue-100 border-b rounded-t-lg mt-6 p-2">
                        <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                            Completer votre profil
                        </h1>
                    </div>
                        
                    <div class="bg-blue-100 overflow-hidden shadow-xl rounded-b p-6">
                        <div class="step shadow p-2">
                            <div>
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$name" required autofocus autocomplete="name" />
                            </div>
                
                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$email" required autocomplete="username" />
                            </div>

                            <!-- Champs d'adresse, téléphone, et date de naissance -->
                            <div class="mt-4">
                                <x-label for="address" value=" {{ __('Adresse ') }}" />
                                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
                            </div>
                        </div>
                        <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>


                        <div class="step shadow p-2">
                            <div class="mt-4">
                                <x-label for="profession" value="{{ __('Profession') }}" />
                                <x-input id="profession" class="block mt-1 w-full" type="tel" name="profession" :value="old('profession')" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="phone" value="{{ __('Téléphone') }}" />
                                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="country" value=" {{ __('Pays ') }}" />
                                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus />
                            </div>
                        </div>
                        <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

                        <div class="step shadow p-2">
                            <div class="mt-4">
                                <x-label for="city" value=" {{ __('Ville ') }}" />
                                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="birthdate" value="{{ __('Date de naissance') }}" />
                                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
                            </div>
                        </div>
                  
                        <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

                        <div class=" items-center hidden md:block justify-end mt-4">
                            <x-button1 type='submit'>
                                Soumettre                
                            </x-button1>
                            {{-- <button class="btn btn-primary" type="submit ">Soumettre</button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="step col-md-5 p-2 ">
                <div class="block">
                    <div class="bg-white border mt-3 p-2">
                   
                        <div class="mt-4">
                            <x-label for="identity" :value="__('Pièce d\'identité')" />
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
                <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

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
                <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

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
                <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

                <div class="block">
                    <div class="bg-white border mt-3 p-2">
                        
                        <div class="mt-4">
                            <x-label for="biographie" value=" {{ __('Biographie ') }}" />
                            <textarea id="biographie" name="biographie" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your bio here..."></textarea>
                            {{ old('biographie') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="border-1 mt-2 mb-2 border-blue-600 bg-blue-500"></div>

            </div>
            {{-- <div class="flex items-center md:hidden justify-end mt-4">
                <x-button1 type='submit'>
                    Soumettre                
                </x-button1>
            </div> --}}
        </div>
    </form>
    <x-immas>

    </x-immas>
</div>

<x-footer>

</x-footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('birthdate').addEventListener('change', function() {
            var birthdate = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            var birthMonth = birthdate.getMonth();
            var todayMonth = today.getMonth();

            if (todayMonth < birthMonth || (todayMonth == birthMonth && today.getDate() < birthdate.getDate())) {
                age--;
            }

            if (age < 18) {
                alert('Vous devez avoir au moins 18 ans.');
                 
            }
        }); 
        document.getElementById('birthdate').classList.add('border-red-500');
                
        document.getElementById('birthdate').classList.remove('border-green-500');
        document.getElementById('birthdate').focus(); // Facultatif : mettre le focus sur le champ de date de naissance pour une meilleure expérience utilisateur
    });
</script>
