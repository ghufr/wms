<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Warehouse;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // Ghufron

    public function sub(Request $req)
    {

        $user = Auth::user();
        $stock_id = $req->id;

        $stock = Stock::find($stock_id);
        $product = Product::find($stock->product_id);
        $warehouse = Warehouse::find($stock->warehouse_id);


        $transaction = Transaction::create([
            "user_id" => $user->id,
            "warehouse_id" => $warehouse->id,
            "warehouse_name" => $warehouse->name,
            "warehouse_location" => $warehouse->location,

            "supplier_id" => 0,
            "supplier_name" => '',
            "supplier_address_city" => '',

            "product_id" => $product->id,
            "product_name" => $product->item_name,
            "product_volume" => $product->volume,
            "product_category" => $product->category,
            "price" => 0,
            "qty" => $req->qty,
            "total" => 0,
            "volume" => $product->volume * $req->qty,
            "type" => 'outbound'
        ]);
        if (!isset($transaction)) {
            return back()->withErrors(['Gagal membuat transaksi']);
        }

        if ($req->qty > $stock->qty) {
            return back()->withErrors(['Qty melebihi stock']);
        }
        $stock->qty -= $req->qty;
        if ($stock->qty == 0) {
            $stock->price = 0;
        }

        $stock->save();

        return redirect(route('transactions'));
    }

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
            "user_id" => $user->id,
            "warehouse_id" => $warehouse->id,
            "warehouse_name" => $warehouse->name,
            "warehouse_location" => $warehouse->location,

            "supplier_id" => $supplier->id,
            "supplier_name" => $supplier->name,
            "supplier_address_city" => $supplier->address_city,

            "product_id" => $product->id,
            "product_name" => $product->item_name,
            "product_volume" => $product->volume,
            "product_category" => $product->category,
            "price" => $req->price,
            "qty" => $req->qty,
            "total" => $req->price * $req->qty,
            "volume" => $product->volume * $req->qty,
            "type" => 'inbound'
        ]);

        if (!isset($transaction)) {
            return back()->withErrors(['Gagal membuat transaksi']);
        }

        // Input Stock
        $stock = Stock::where('product_id', $product->id)
            ->where('warehouse_id', $warehouse->id)
            ->first();
        if ($req->query('type') == 'inbound') {
            if (null !== $stock) {
                $stock->qty += $req->qty;
                $stock->price = (($stock->price + $req->price) / 2);
                $stock->save();
            } else {
                Stock::create([
                    "warehouse_id" => $warehouse->id,
                    "product_id" => $product->id,
                    "category" => $product->category,
                    "qty" => $req->qty,
                    "price" => $req->price
                ]);
            }
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

    public function inbound()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $warehouses = [];
        if ($user->role == 'manager') {
            $warehouses = Warehouse::all();
        } else {
            $warehouses = $user->warehouse()->get();
        }

        $data = [
            'products' => $products,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses
        ];

        return view("transaction_inbound", $data);
    }

    public function outbound(Request $req)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $warehouses = [];
        if ($user->role == 'manager') {
            $warehouses = Warehouse::all();
        } else {
            $warehouses = $user->warehouse()->get();
        }

        $choosen = $req->query('choosen');
        $stocks = [];
        if ($choosen) {
            $stocks = Stock::where('warehouse_id', $choosen)->where('qty', '>', 0)->get();
        } else {
            $stocks = Stock::where('qty', '>', 0)->get();
        }
        //user bisa milih dari berbagai product_id
        //user masukin qty aja
        //price udah otomatis terlihat

        return view("transaction_outbound", ['stocks' => $stocks, 'warehouses' => $warehouses]);
    }
}
