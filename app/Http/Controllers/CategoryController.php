<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // TODO: Control CRUD
    // Fildzah
    public function create(Request $req)

    {
        Category::create([
            'name' => $req->name,
            'description' => $req->description
        ]);
        return view('categories');
    }

    public function list()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function edit(Request $req, $id)
    {
        $category = Category::find($id);
        return view("category_detail", ['category' => $category]);
    }

    public function delete(Request $req, $id)
    {
        Category::destroy($id);
        return redirect(route('categories'));
    }
    public function update(Request $req, $id) 
    {
        $category = Category::find($id);

        if ($category) {
            $category->name = $req->name;
            $category->description = $req->description;
            $category->save();
        }
        return redirect(route('categories'));
    }
}
