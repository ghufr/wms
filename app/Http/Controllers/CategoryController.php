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
}
