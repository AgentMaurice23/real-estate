<x-app-layout>
   
    {{-- <x-headerVerticale>
    </x-headerVerticale> --}}
        @foreach($users as $user)
            <div class="flex flex-col mx-4 space-x-4 mt-8 mb-4">
                <p>Nom: {{ $user->name }}</p>
                <p>E-mail: {{ $user->email }}</p>
                <p>Adresse: {{ $user->address }}</p>
                <p>Téléphone: {{ $user->phone }}</p>
                <p>Date de naissance: {{ $user->birthdate }}</p>
                <form action="{{ route('admin.approve', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class=" bg-blue-500 hidden md:block text-white px-3 py-2 flex-shrink-0 rounded-full">Approuver</button>
                </form>
                
                <a class=" bg-blue-500 hidden md:block text-white px-3 py-2 flex-shrink-0 rounded-full">Voir tous</a>
            </div>
        @endforeach
    
</x-app-layout>