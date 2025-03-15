<x-home></x-home>
<div class="container mx-auto pt-10">
    <div class="flex flex-col items-center justify-center">
        <h1>Annonces Boostées</h1>

        <h2>Propriétés</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach($boostedProperties as $property)
                <div class="bg-white rounded-sm border p-4">
                    <img class="w-full h-48 object-cover mb-4" 
                        src="{{ asset('storage/' . $property->fichiers[0]) }}" 
                        alt="{{ $property->title }}"/>
                    <h3 class="text-xl">{{ $property->title }}</h3>
                    <p>{{ $property->description }}</p>
                </div>
            @endforeach
        </div>

        <h2>Terrains</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach($boostedLands as $land)
                <div class="bg-white rounded-sm border p-4">
                    <img class="w-full h-48 object-cover mb-4" 
                        src="{{ asset('storage/' . $land->images[0]) }}" 
                        alt="{{ $land->title }}"/>
                    <h3 class="text-xl">{{ $land->title }}</h3>
                    <p>{{ $land->description }}</p>
                </div>
            @endforeach
        </div>

        <h2>Chambres</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach($boostedRooms as $room)
                <div class="bg-white rounded-sm border p-4">
                    <img class="w-full h-48 object-cover mb-4" 
                        src="{{ asset('storage/' . $room->images[0]) }}" 
                        alt="{{ $room->title }}"/>
                    <h3 class="text-xl">{{ $room->title }}</h3>
                    <p>{{ $room->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<x-footer></x-footer>