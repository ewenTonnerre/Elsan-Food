<x-guest-layout>
    <x-auth-card>
        <h1 class="text-center my-2 text-4xl ">ElsanFood</h1>
        <p class="text-center mb-7 text-2xl text-yellow-500">Espace administrateur</p>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 px-6" :errors="$errors"></x-auth-validation-errors>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Lastname -->
            <div class="px-6">
                <x-label for="lastname" :value="__('Nom')"></x-label>

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus></x-input>
            </div>

            <!-- Firstname -->
            <div class="px-6">
                <x-label for="firstname" :value="__('Prénom')"></x-label>

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus></x-input>
            </div>

            <!-- Email Address -->
            <div class="mt-4 px-6">
                <x-label for="email" :value="__('Email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4 px-6">
                <x-label for="password" :value="__('Mot de passe')"></x-label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"></x-input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 px-6">
                <x-label for="password_confirmation" :value="__('Confirmez le mot de passe')"></x-label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required></x-input>
            </div>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 w-full px-6" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>
            <x-button class="mt-5">
                {{ __('S\'inscrire') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
