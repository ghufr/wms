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
    public function edit(Request $req, $id)
    {
        $supplier = Supplier::find(id);
        return view("supplier_detail", ['supplier' => $supplier]);
    }
    public function delete(Request $req, $id) 
    {
        Supplier::destroy($id);
        return redirect(route('suplliers'));
    }
    public function update(Request $req, $id) 
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->name = $req->name;
            $supplier->phone = $req->phone;
            $supplier->address = $req->address;
            $supplier->save();
        }

        return redirect(route('suppliers'));
    }
}
