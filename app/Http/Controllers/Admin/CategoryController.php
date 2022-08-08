<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Give the categories list to the categories page.
     * @return View
     */
    public function getCategories()
    {
        $categories = Category::all();
        return view('admin/categories', [
            'categories' => $categories,
        ]);
    }

    /**
     * display the form to add a category.
     * @return View
     */
    public function create()
    {
        return view('admin/addCategory');
    }

    /**
     * Handle an incoming add category request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category|max:255',
            'photo' => 'required',
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
            Category::create([
                'name' => $request->name,
                'photo' => $path,
            ]);
        }

        return redirect('/admin/categories')->with('status', 'Catégorie enregistrée !');;
    }

    /**
     * Handle an incoming edit category request.
     *
     * @param  Category
     * @return View
     */
    public function edit($category)
    {
        $category = Category::find($category);
        return view('admin/editCategory', [
            'category' => $category,
        ]);
    }

    /**
     * Handle an incoming add category request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $category)
    {
        $category = Category::find($category);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category|max:255',
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
            $category->photo = $path;
        }

        $category->name = $request->name;
        $category->save();

        return redirect('/admin/categories')->with('status', 'Catégorie enregistrée !');;
    }

    public function delete($category)
    {
        $category = Category::find($category);
        try{
            $category->delete();
            Storage::delete($category->photo);
        }catch (\Illuminate\Database\QueryException $e){
            return Redirect::back()->withErrors($e->getCode());
        }
        return Redirect::back();
    }
}
