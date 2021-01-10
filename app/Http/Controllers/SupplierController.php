<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Cantika
    public function create(Request $req)
    {
        Supplier::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'address_city' => $req->address_city,
            'address_street' => $req->address_street
        ]);
        return redirect(route('suppliers'));
    }
    public function list()
    {
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);
    }
    public function edit(Request $req, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return redirect('suppliers')->withErrors(['Supplier tidak ditemukan']);
        }
        return view("supplier_detail", ['supplier' => $supplier]);
    }
    public function delete(Request $req, $id)
    {
        $is_destroyed = Supplier::destroy($id);
        return redirect(route('suppliers'));
    }
    public function update(Request $req, $id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->name = $req->name;
            $supplier->phone = $req->phone;
            $supplier->address_street = $req->address_street;
            $supplier->address_city = $req->address_city;

            $supplier->save();
        }

        return redirect(route('suppliers'));
    }
}
