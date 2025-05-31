<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::all();
        return view('category.index', compact('category'));

        return view(view: 'category.index');
    }
    public function AddCategory(){
        return view(view: 'category.AddCategory');
    }
}
