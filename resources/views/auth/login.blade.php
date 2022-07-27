<x-guest-layout>
    <x-auth-card>
        <h1 class="text-center my-2 text-4xl ">ElsanFood</h1>
        <p class="text-center mb-7 text-2xl text-yellow-500">Espace administrateur</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 px-6" :status="session('status')"></x-auth-session-status>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 px-6" :errors="$errors"></x-auth-validation-errors>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="px-6">
                <x-label for="email" :value="__('Email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4 px-6">
                <x-label for="password" :value="__('Mot de passe')"></x-label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"></x-input>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 px-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
            <!-- Register -->
            <div class="block mt-4 px-6">
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">S'inscrire</a>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button>
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
