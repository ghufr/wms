<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Ghufron

    public function create(Request $req)
    {
        $user = Auth::user();

        // Get Product
        $product = Product::find($req->product);

        if ($product == null or !isset($product)) {
            return back()->withErrors(['Produk tidak ditemukan']);
        }

        $supplier = Supplier::find($req->supplier);

        if ($supplier == null or !isset($supplier)) {
            return back()->withErrors(['Supplier tidak ditemukan']);
        }

        $warehouse = Warehouse::find($req->warehouse);

        if ($warehouse == null or !isset($warehouse)) {
            return back()->withErrors(['Warehouse tidak ditemukan']);
        }


        // Input Transaction
        $transaction = Transaction::create([
            "product_id" => $product->id,
            "user_id" => $user->id,
            "warehouse_id" => $warehouse->id,
            "price" => $req->price,
            "qty" => $req->qty,
            "total" => $req->price * $req->qty,
            "volume" => $product->volume * $req->qty,
            "type" => $req->query('type')
        ]);

        if (!isset($transaction)) {
            return back()->withErrors(['Gagal membuat transaksi']);
        }
        return redirect(route("transactions"));
    }

    public function list()
    {
        $transactions = Transaction::all();

        $inbound = [];
        $outbound = [];

        if (!$transactions) {
            return view('transactions');
        }

        foreach ($transactions as $transaction) {
            if ($transaction->type === 'inbound') {
                array_push($inbound, $transaction);
            } else {
                array_push($outbound, $transaction);
            }
        }
        //
        return view('transactions', ['inbound' => $inbound, 'outbound' => $outbound]);
    }

    public function input()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();

        $data = [
            'products' => $products,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses
        ];

        return view("transaction_detail", $data);
    }
}
