<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
