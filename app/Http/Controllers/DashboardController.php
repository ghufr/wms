<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function view(Request $req)
    {
        // TODO: Query database

        // Query All Warehouse

        $warehouse_count = Warehouse::all()->count();

        // Query All inbound and outbound

        // Get Product
        $product_count = Product::all()->count();

        // Get All Users
        $users = User::where('email', '!=', Auth::user()->email)->get(['id', 'name', 'email', 'role']);

        $data = [
            'product_count' => $product_count,
            'warehouse_count' => $warehouse_count,
            'users' => $users
        ];

        return view('dash', $data);
    }
}
