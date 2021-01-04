<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    // Ghufron

    public function create(Request $req)
    {
        // $sess = $req->session();

        // TODO: Get user detail

        // $product = Product::find(1);


        // print($sess);

        // $transaction = Transaction::create([
        //     "item_id" => "",
        //     "product_id" => "",
        //     "user_id" => "",
        //     "price" => 0,
        //     "qty" => 0
        // ]);
        return redirect(route("transactions.list"));
    }

    public function list(Request $req)
    {
        $transactions = Transaction::find();

        $inbound = [];
        $outbound = [];

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

    public function get(Request $req, $id)
    {
        // $transaction = Transaction::find($id);
        $transaction = [];
        return view('transaction_detail', ['transaction' => $transaction]);
    }

    public function input(Request $req)
    {
        Log::info($req->session()->all());
        return view('transaction_detail');

        // $products = Product::find();
        // $categories = Category::find();
        // $suppliers = Supplier::find();

        // return view("transactions_detail", ['products' => $products, 'categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function edit(Request $req, $id)
    {
        $transaction = Transaction::find($id);
        return view("transaction_detail", ['transaction' => $transaction]);
    }
}
