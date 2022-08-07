<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert" id="alert">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-bold">{{ session('status') }}</p>
                </div>
                <button class="bg-transparent text-2xl font-semibold leading-none right-0 top-0 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                    <span>×</span>
                </button>
            </div>
        </div>
    @endif

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-end">
                    <div class="w-44 bg-orange-400 h-10 rounded text-white flex items-center justify-center"><a
                            href="{{ URL::route('addCategory') }}" class="hover:cursor-pointer p-3">Créer une catégorie</a></div>
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
                                    <img class="max-w-28 max-h-28" src="{{ Storage::url($category->photo) }}">
                                </td>
                                <td class="py-4 px-2 h-32 flex items-center">
                                    <x-gmdi-edit class="w-6 h-6 hover:text-orange-400 hover:cursor-pointer"/>
                                    <x-gmdi-delete class="w-6 h-6 hover:text-orange-400 hover:cursor-pointer"/>
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

<script>
    function closeAlert(event){
        const alert = document.getElementById('alert');
        alert.parentElement.removeChild(alert);
    }
</script>
