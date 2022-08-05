<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-row">
<div class="min-h-screen bg-orange-400 flex flex-col">
    <h1 class="text-center my-2 text-4xl text-white px-10">ElsanFood</h1>
    <h2 class="text-center my-2 text-m text-gray-200 px-10 pb-3">Administration</h2>
    <hr class="bg-white w-full my-3">
    <!-- Navigation Links -->
    <x-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
        {{ __('Accueil') }}
    </x-nav-link>
    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')">
        {{ __('Categories') }}
    </x-nav-link>
</div>
<div class="min-h-screen bg-gray-100 flex-1">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
