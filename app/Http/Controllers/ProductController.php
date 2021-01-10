<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hisyam
    public function create(Request $request)
    {

        $category = Category::find($request->category);

        Product::create([
            'sku' => "",
            'item_name' =>  $request->item_name,
            'category' => $category->name,
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

    public function input(Request $request)
    {
        $categories = Category::all();
        return view("product_detail", ['categories' => $categories]);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            return redirect('product')->withErrors(['Product tidak ditemukan']);
        }
        return view("product_detail", ['product' => $product, 'categories' => $categories]);
    }

    public function delete(Request $request, $id)
    {
        Product::destroy($id);
        return redirect(route('products'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $category = Category::find($request->category);

        if ($product) {
            $product->item_name =  $request->item_name;
            $product->category =  $category->name;
            $product->desc =  $request->desc;
            $product->img   =  "";
            $product->volume =  $request->volume;
            $product->save();
        }
        return redirect(route('products'));
    }
}
