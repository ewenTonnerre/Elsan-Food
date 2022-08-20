<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un plat') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative my-4">
                    @if($errors->any())
                        <p class="ml-7 text-red-500">{{$errors->first()}}</p>
                    @endif
                    <form method="POST" enctype="multipart/form-data" class='flex flex-col justify-center items-start p-8' action="{{ route('createDish', ['restaurantId' => $restaurant]) }}">
                        @csrf
                        <div class="flex justify-center items-center my-3">
                            <label for="name" class="mr-6 w-28">Nom</label>
                            <input type="text" name="name" id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('name') }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="description" class="mr-6 w-28">Description</label>
                            <input type="text" name="description" id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('description') }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="price" class="mr-6 w-28">Prix</label>
                            <input type="text" name="price" id="price" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('price') }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="photo" class="mr-6 w-28">Photo</label>
                            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg" required value="{{ old('photo') }}">
                        </div>
                        <div id="actions" class="w-full flex justify-around mt-8">
                            <div class="w-36 bg-red-500 h-10 rounded text-white flex justify-center items-center"><a
                                    href="{{ URL::route('dishes', ['restaurantId' => $restaurant]) }}" class="hover:cursor-pointer py-3 px-10">Annuler</a>
                            </div>
                            <button type='submit' class='w-56 px-4 py-3 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                Ajouter le plat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
