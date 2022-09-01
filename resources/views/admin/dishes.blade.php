<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plats du restaurant : ' . $restaurant->name) }}
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
                    <div class="w-48 bg-orange-400 h-10 rounded text-white flex items-center justify-center"><a
                            href="{{ URL::route('addDish', ['restaurantId' => $restaurant->id]) }}" class="hover:cursor-pointer p-3">Ajouter un plat</a></div>
                </div>
                <div class="overflow-x-auto relative my-4 flex flex-wrap px-3 py-3 justify-center">
                    @foreach($dishes as $dish)
                        <div class="mx-3 my-3 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div>
                                <img class="rounded-t-lg" src="{{ Storage::url($dish->photo)}}" alt="" />
                            </div>
                            <div class="flex flex-col justify-between p-5">
                                <div class="h-44">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$dish->name}}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($dish->description, 100, $end='...') }}</p>
                                    <p class="mb-3 font-normal text-gray-800 dark:text-gray-200">{{ $dish->price }} €</p>
                                </div>
                                <div class="py-1 px-1 flex items-end justify-end">
                                    <a href="{{ URL::route('editDish', ['dishId' => $dish->id, 'restaurantId' => $restaurant->id]) }}"><x-gmdi-edit class="w-6 h-6 text-white hover:text-orange-400 hover:cursor-pointer"/></a>
                                    <a href="{{ URL::route('deleteDish', ['dishId' => $dish->id, 'restaurantId' => $restaurant->id]) }}"><x-gmdi-delete class="w-6 h-6 text-white hover:text-orange-400 hover:cursor-pointer"/></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
