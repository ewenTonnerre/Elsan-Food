<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RestaurantsController extends Controller
{
    /**
     * Give the restaurants list to the restaurants page.
     * @return View
     */
    public function getRestaurants()
    {
        $restaurants = Restaurant::all();
        return view('admin/restaurants', [
            'restaurants' => $restaurants,
        ]);
    }

    /**
     * display the form to add a restaurant.
     * @return View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin/addRestaurant', [
            'categories' => $categories
        ]);
    }

    /**
     * Handle an incoming add restaurant request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'photo' => 'required',
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'category' => 'required',
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
            Restaurant::create([
                'name' => $request->name,
                'photo' => $path,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'categoryId' => $request->category,
            ]);
        }

        return redirect('/admin/restaurants')->with('status', 'Restaurant enregistré !');;
    }

    /**
     * Handle an incoming edit category request.
     *
     * @param  Restaurant
     * @return View
     */
    public function edit($restaurant)
    {
        $categories = Category::all();
        $restaurant = Restaurant::find($restaurant);
        return view('admin/editRestaurant', [
            'restaurant' => $restaurant,
            'categories' => $categories,
        ]);
    }

    /**
     * Handle an incoming add restaurant request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $restaurant)
    {
        $restaurant = Restaurant::find($restaurant);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'category' => 'required',
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
            $restaurant->photo = $path;
        }


        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;
        $restaurant->latitude = $request->latitude;

        $restaurant->longitude = $request->longitude;
        $restaurant->categoryId = $request->category;
        $restaurant->save();

        return redirect('/admin/restaurants')->with('status', 'Restaurant modifié !');;
    }

    public function delete($restaurant)
    {
        $restaurant = Restaurant::find($restaurant);
        try{
            $restaurant->delete();
            Storage::delete($restaurant->photo);
        }catch (\Illuminate\Database\QueryException $e){
            dd($e);
            return Redirect::back()->withErrors($e->getCode());
        }
        return Redirect::back();
    }
}
