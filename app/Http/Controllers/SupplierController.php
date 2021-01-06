<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // TODO: Control CRUD
    // Cantika
    public function create(Request $req)
    {
        Supplier::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address
        ]);
        return view('suppliers');
    }
    public function list()
    {
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);
    }
}
