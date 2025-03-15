

@extends('home')
<x-header>

</x-header>
@section('title', $room->exists ? "Editer les informations" : "Publier une chambre")

@section('content')
<div class="w-[80%] mx-[10%] p-4">
    <div class="container mx-auto mt-14">
        <div class="mt-6 p-2"></div>
       

        <div class="row mx-auto md:flex">
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
            
            </div>
            <div class="col-md-8 items-center px-6 mx-auto overflow-auto md:flex-3">
                <div class="row bg-black mt-2 border-1 w-full text-white font-bold">
                    <h1 class="flex justify-center items-center text-xl font-semibold p-2  mx-4">@yield('title')</h1>
                </div>

                <form id="roomForm" class="row flex-col mx-auto" action="{{ route($room->exists ? 'room.update' : 'room.store', $room) }}" method="post" enctype="multipart/form-data">
                    {{-- <form id="roomForm" class="row flex-col mx-auto" action="{{ route('rooms.store', $house) }}" method="post" enctype="multipart/form-data"> --}}
                    @csrf
            
                    <div class="col row border py-3 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', [
                                'name' => 'type',
                                'label' => 'Type de Maison',
                                'options' => [
                                    'studio' => 'Studio',
                                    'chambre_salon' => 'Chambre salon',
                                    '2_chambres_salon' => '2 Chambres Salon',
                                    '3_chambres_salon' => '3 Chambres Salon',
                                    '4_chambres_salon' => '4 Chambres Salon',
                                    '5_chambres_salon' => '5 Chambres Salon',
                                    'plus' => 'Plus'
                                ],
                                'value' => old('type')
                            ])
                        
                            @include('shared.input', ['name' => 'number_of_rooms', 'label' => 'Nombre de Chambres', 'type' => 'number', 'value' => old('number_of_rooms')])
                        </div>
                        
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'surface', 'label' => 'Surface de la Chambre (m²)', 'type' => 'number', 'value' => old('surface')])
                            @include('shared.input', ['name' => 'number_of_beds', 'label' => 'Nombre de Lits', 'type' => 'number', 'value' => old('number_of_beds')])
                        </div>
                    </div>
            
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">
                            @include('shared.select', ['name' => 'bed_type', 'label' => 'Type de Lit', 'options' => [
                                'simple' => 'Simple',
                                'double' => 'Double',
                                'queen' => 'Queen',
                                'king' => 'King'
                            ], 'value' => old('bed_type')])
                            @include('shared.select', ['name' => 'condition', 'label' => 'État de la Chambre','options' => [
                                'new' => 'New',
                                'renover' => 'Refaite',
                                'vieux' => 'Vieux',
                            ], 'value' => old('condition')])
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'view', 'label' => 'Vue', 'type' => 'text', 'value' => old('view')])
                            @include('shared.input', ['name' => 'available_from', 'label' => 'Disponibilité à partir de', 'type' => 'date', 'value' => old('available_from')])
                        </div>
                    </div>
            
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col py-2">

                            @include('shared.input', ['name' => 'price', 'label' => 'Prix par Mois', 'type' => 'number', 'value' => old('price')])
                            
                        </div>
                        <div class="col py-2">
                            @include('shared.input', ['name' => 'equipments', 'label' => 'Équipements', 'type' => 'textarea', 'value' => old('equipments')])

                        </div>
                    </div>
                
                    <div class="mb-1 p-3 fileInputWrapper">

                        <div class="mb-4">
                            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                            <div id="images-container">
                                <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                            <button type="button" class="mt-2 btn btn-secondary" id="add-image-field">Ajouter une image</button>
                        </div>
                    </div>
                    <div class="col row border py-3 mt-4 bg-gray-50">
                        <div class="col flex space-x-2 justify-between py-2">
                            @include('shared.checkbox', ['name' => 'private_bathroom', 'label' => 'Salle de Bain Privée', 'value' => old('private_bathroom')])
                            @include('shared.checkbox', ['name' => 'balcony', 'label' => 'Balcon', 'value' => old('balcony')])
                            @include('shared.checkbox', ['name' => 'available', 'label' => 'Disponible', 'value' => old('available')])
                        </div>
                    </div>
            
                    <button type="submit" class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter
                    </button>
                </form>                
            
            </div>
            <div class="col-md-2 overflow-auto p-4 mb-4 md:mb-0 md:flex-1">
            
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-image-field').addEventListener('click', function () {
            const container = document.getElementById('images-container');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.className = 'mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm';
            container.appendChild(input);
        });
    });
</script>