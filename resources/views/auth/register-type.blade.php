<!-- resources/views/agent/create.blade.php -->

<x-home>

    
</x-home>
{{-- <x-header>

</x-header> --}}
{{-- <div class="hidden md:block">

</div> --}}
<div class="min-h-screen h-full w-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="py-12 md:hidden"></div>
    <div class="sm:max-w-md md:py-8 mt-6 mb-6 px-6 py-4 bg-blue-200 shadow-md overflow-hidden sm:rounded-lg">
        
        <div class="max-w-md w-full  p-8 rounded">
            <h1 class="text-2xl font-bold mb-4 text-center">Inscription</h1>
            <div class="flex flex-col space-y-4">
                <a href="{{ route('auth.profil-complet') }}" class="bg-blue-500 px-2 no-underline hover:bg-blue-600 text-white font-semibold py-2 rounded">
                    <span class="flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm1 0a6 6 0 1012 0A6 6 0 004 10zm5-7a1 1 0 00-2 0v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2V3a1 1 0 00-2 0v1h-2V3zM5 13a1 1 0 011-1h8a1 1 0 010 2H6a1 1 0 01-1-1zm9-7a1 1 0 10-2 0v1h2V6z" clip-rule="evenodd" />
                        </svg>
                        Inscription en tant qu'Agent
                    </span>
                </a>
                <a href="{{ route('auth.agency-create') }}" class="bg-green-500 px-2 no-underline hover:bg-green-600 text-white font-semibold py-2 rounded">
                    <span class="flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 10a7 7 0 1114 0 7 7 0 01-14 0zm1 0a6 6 0 1012 0A6 6 0 004 10zm5-7a1 1 0 00-2 0v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2V3a1 1 0 00-2 0v1h-2V3zM5 13a1 1 0 011-1h8a1 1 0 010 2H6a1 1 0 01-1-1zm9-7a1 1 0 10-2 0v1h2V6z" clip-rule="evenodd" />
                        </svg>
                        Inscription en tant qu'Agence
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
