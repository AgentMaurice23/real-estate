<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <x-validation-errors class="mb-4" />

            <div class="mb-4 text-sm text-gray-600">
                @isset($user->two_factor_code)
                    <p>Votre code de vérification est : {{ $user->two_factor_code }}</p>
                    <p>Ce code expirera dans 10 minutes.</p>
                @else
                    <p>Aucun code de vérification n'est disponible pour le moment.</p>
                @endisset
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
