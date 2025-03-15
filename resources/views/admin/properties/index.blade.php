@extends('home')

@section('title', 'Tous les Biens ')

@section('content')

<div class="w-[80%] mx-[20%] p-6 bg-blue-50">

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1> 
        <a href="{{ route('property.create') }}" class="px-4 py-2 text-blue-500 bg-blue-200 border-2 border-blue-400 rounded-full shadow hover:bg-blue-700 hover:text-white no-underline ml-2 mb-3">Nouvelle chambre</a>
    </div> 

    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-500 uppercase bg-blue-100">
            <tr class="property-row">
                <th scope="col" class="px-6 py-3">
                    
                </th>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    Surface
                </th>
                <th scope="col" class="px-6 py-3">
                    Prix
                </th>
                <th scope="col" class="px-6 py-3">
                    Ville
                </th>
                <th scope="col" class="px-6 py-3">
                    Statut
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td class="px-6 py-4 bg-blue-50">
                        {{ $property->id }}
                    </td>
                    <td class="px-6 py-4 bg-white">
                        {{ $property->title }}
                    </td>
                    <td class="px-6 py-4 bg-blue-50">
                        {{ $property->surface }} m²
                    </td>
                    <td class="px-6 py-4 bg-white">
                        {{ number_format($property->price, 0, ',', ' ') }} €
                    </td>
                    <td class="px-6 py-4 bg-blue-50">
                        {{ $property->city }}
                    </td>
                    <td class="px-6 py-4 bg-white">
                        @if ($property->sold)
                            <span class="badge bg-danger">Vendu</span>
                        @else
                            <span class="badge bg-success">En vente</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 bg-blue-50">
                        <div class="flex">                                                
                            <a href="{{ route('property.details', $property->id) }}" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a>
                       
                        <div class="flex gap-2 w-100 mt-4 justify-end">
                            <form action="{{ route('property.edit', $property->id) }}" method="get">
                                @csrf
                                @method('delete')
                                <button class="px-4 py-2 text-yellow-700 bg-yellow-200 border-2 border-yellow-400 rounded-md shadow hover:bg-yellow-800 hover:text-black no-underline ml-2 mb-3">Editer</button>
                            </form>
                            <form action="{{ route('property.destroy', $property->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="px-4 py-2 text-red-700 bg-red-200 border-2 border-red-500 rounded-md shadow hover:bg-red-800 hover:text-white no-underline ml-2 mb-3">Supprimer</button>
                            </form>
                            <form action="{{ route('property.statutProperty', $property->id) }}" method="post">
                                @csrf
                                @include('shared.checkbox' ,['type' =>'submit','name' => 'sold','label' => 'Statut','value' => $property->sold])
                            </form>
                        </div>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $properties->links() }}

</div>

@endsection
