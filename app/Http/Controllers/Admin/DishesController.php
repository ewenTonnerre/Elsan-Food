<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DishesController extends Controller
{
    /**
     * Give the dishes list of a restaurant to the dishes page.
     * @return View
     */
    public function getDishes($restaurant)
    {
        $restaurant = Restaurant::find($restaurant);
        $dishes = Dish::where('restaurantId', $restaurant->id)->get();
        return view('admin/dishes', [
            'restaurant' => $restaurant,
            'dishes' => $dishes,
        ]);
    }

    /**
     * display the form to add a dish.
     * @return View
     */
    public function create($restaurant)
    {
        return view('admin/addDish', [
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Handle an incoming add dish request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $restaurant)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'photo' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('photo')){
            $filename = time() . '.' . $request->photo->extension();
            $file = $request->file('photo');
            $path = $file->storeAs('images', $filename, 'public');
            Dish::create([
                'name' => $request->name,
                'photo' => $path,
                'description' => $request->description,
                'price' => $request->price,
                'restaurantId' => $restaurant,
            ]);
        }

        return redirect('/admin/restaurants/' . $restaurant . '/dishes')->with('status', 'Plat enregistré !');;
    }

    /**
     * Handle an incoming edit dish request.
     *
     * @param  Restaurant
     * @return View
     */
    public function edit($restaurant, $dish)
    {
        $dish = Dish::find($dish);
        return view('admin/editDish', [
            'restaurant' => $restaurant,
            'dish' => $dish,
        ]);
    }

    /**
     * Handle an incoming add dish request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $restaurant, $dish)
    {
        $dish = Dish::find($dish);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file('photo')){
            $filename = time() . '.' . $request->photo->extension();
            $file = $request->file('photo');
            $path = $file->storeAs('images', $filename, 'public');
            $dish->photo = $path;
        }


        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->save();

        return redirect('/admin/restaurants/' . $restaurant . '/dishes')->with('status', 'Plat modifié !');
    }

    public function delete($restaurant, $dish)
    {
        $dish = Dish::find($dish);
        try{
            $dish->delete();
            Storage::delete($dish->photo);
        }catch (\Illuminate\Database\QueryException $e){
            return Redirect::back()->withErrors($e->getCode());
        }
        return Redirect::back()->with('status', 'Plat supprimé !');
    }
}
