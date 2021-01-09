<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // TODO: Control CRUD
    // Hisyam
    public function create(Request $request)
    {
        Product::create([
            'sku' => "",
            'item_name' =>  $request->item_name,
            'category' =>  $request->category,
            'desc' =>  $request->desc,
            'img'   =>  "",
            'volume' =>  $request->volume
        ]);
        return redirect(route('products'));
    }
    public function list()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function edit (Request $request, $id)
    {
        $products = Product::find($id);
        return view("products", ['product_detail' => $products]);
    }

    public function delete (Request $request, $id)
    {
            Product::destroy($id);
            return redirect(route('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($products) {
            $products -> name = $request->name;
            $products -> category = $request->category;
            $products->save();
        }
        return redirect(route('products'));
    }
}
