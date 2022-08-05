<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     Liste des categories
                </div>
                <div class="overflow-x-auto relative my-4">
                    <table class="w-3/4 mx-auto py-2 text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nom
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Image
                            </th>
                            <th scope="col" class="py-3">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="border-b bg-gray-100 border-gray-400">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-700 whitespace-nowrape">
                                    {{$category->name}}
                                </th>
                                <td class="py-4 px-6">
                                    <img class="w-20 h-20" src="{{$category->photo}}">
                                </td>
                                <td class="py-4 px-2 h-32 flex items-center">
                                    <x-gmdi-edit class="w-6 h-6"/>
                                    <x-gmdi-delete class="w-6 h-6"/>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
