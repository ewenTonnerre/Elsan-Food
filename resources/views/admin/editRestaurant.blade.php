<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification du restaurant : ' . $restaurant->name) }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-xl mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative my-4">
                    @if($errors->any())
                        <p class="ml-7 text-red-500">{{$errors->first()}}</p>
                    @endif
                    <form method="POST" enctype="multipart/form-data" class='flex flex-col justify-center items-start p-8' action="{{ route('updateRestaurant', ['restaurant' => $restaurant->id]) }}">
                        @csrf
                        <div class="flex justify-center items-center my-3">
                            <label for="name" class="mr-6 w-28">Nom</label>
                            <input type="text" name="name" id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('name') ?? $restaurant->name }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="address" class="mr-6 w-28">Adresse</label>
                            <input type="text" name="address" id="address" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('address') ?? $restaurant->address }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="description" class="mr-6 w-28">Description</label>
                            <input type="text" name="description" id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('description') ?? $restaurant->description }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="latitude" class="mr-6 w-28">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('latitude') ?? $restaurant->latitude }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="longitude" class="mr-6 w-28">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required value="{{ old('longitude') ?? $restaurant->longitude }}">
                        </div>
                        <div class="flex justify-center items-center my-3">
                            <label for="photo" class="mr-6 w-28">Photo</label>
                            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg" value="{{ old('photo') }}">
                        </div>
                        <p> Image actuelle : </p>
                        <img class="max-w-28 max-h-28" src="{{Storage::url($restaurant->photo) }}">
                        <div class="flex justify-center items-center my-3">
                            <label for="category" class="mr-6 w-28">Catégorie : </label>
                            <select type="text" name="category" id="category" class="w-48 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                @foreach($categories as $category)
                                    @if(old('category') ?? $restaurant->categoryId == $category->id)
                                        <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div id="actions" class="w-full flex justify-around mt-8">
                            <div class="w-36 bg-red-500 h-10 rounded text-white flex justify-center items-center"><a
                                    href="{{ URL::route('restaurants') }}" class="hover:cursor-pointer py-3 px-10">Annuler</a>
                            </div>
                            <button type='submit' class='w-56 px-4 py-3 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                Modifier le restaurant
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
