<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Mot de pass') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            
            <div class="flex justify-center items-center space-x-4 mt-4 py-4">
                <div class="block">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Mot de pass oublié?') }}
                    </a>
                @endif
              
            </div>
            <div class="font-semibold mt-4">
                <x-button1 class=" w-full">
                    {{ __('Connexion') }}
                </x-button1>
                
            </div>
            <p class=" mt-4 text-gray-700 text-sm">
                    En continuant avec un compte basé dans le pays suivant : 
                    <a href="/" class="underline">Pays</a>, tu acceptes nos 
                    <a href="/" class="underline">Conditions d'utilisation</a>
                    et reconnais avoir lu notre 
                    <a href="/" class="underline">Politique de confidentialité</a> .
            </p>
            <div class="flex w-full border-t justify-center items-center space-x-4 mt-4">

                <p class="text-lg ">
                    Tu n'as de compte ?
                </p>
              
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-red-600 text-lg underline">Inscription</a>
                @endif
                     
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
