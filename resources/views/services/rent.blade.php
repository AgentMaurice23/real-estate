<x-home></x-home>

@section('title', 'Rent Property')

<div class="container mx-auto mt-16 pt-12">
    <h1 class="text-xl font-bold">Rent Property</h1>
    <form action="{{ route('process.rent') }}" method="POST">
        @csrf
        <div class="mb-4">
            @include('shared.input', ['name' => 'name', 'label' => 'Name'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'phone', 'label' => 'Phone'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'email', 'label' => 'Email'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'message', 'type' => 'textarea', 'label' => 'Message'])
        </div>
        <button type="submit" class="py-2 w-full text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-full shadow hover:bg-blue-800 hover:text-white mb-3">Submit</button>
    </form>
</div>

<x-footer></x-footer>
