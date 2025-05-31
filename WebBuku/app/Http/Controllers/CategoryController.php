<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
    public function AddCategoryAction(Request $request)
    {
        DB::table('category')->insert([
            'NamaCategory'=> $request->NamaCategory,
            'Description'=> $request->Description,
            'CreateAt'=> date ('Y-m-d'),
            'CreateBy'=> '1',
        ]);
        return redirect()->route('index.Category');
    }

    public function EditCategory(category $id){
        return view('category.EditCategory', compact('id'));
    }

    public function EditCategoryAction(Request $request, string $id)
    {
        DB::table('category')->where('id', $id)->update([
            'NamaCategory'=> $request->NamaCategory,
            'Description'=> $request->Description,
            'CreateAt'=> date ('Y-m-d'),
            'CreateBy'=> '1',
        ]);
        return redirect()->route('index.Category');
    }

    public function DeleteCategoryAction(category $id)
    {
        $id->delete();
        return redirect()->route('index.Category');
    }
    
}

