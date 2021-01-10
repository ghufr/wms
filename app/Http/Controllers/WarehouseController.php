<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    // TODO: Control CRUD
    // Dede

    public function create(Request $req)
    {
        Warehouse::create([
            'name' => $req->name,
            'location' => $req->location,
            'volume' => $req->volume
        ]);

        return $this->list();
    }
    public function edit(Request $req, $id)
    {
        $warehouse = Warehouse::find($id);

        $warehouse->name = $req->name;
        $warehouse->location = $req->location;
        $warehouse->volume = $req->volume;
        $warehouse->save();

        $arr = array(
            "id" => ""
        );
        $arr["id"] = $id;

        $request = new \Illuminate\Http\Request($arr);
        return $this->show($request);
    }

    public function list()
    {
        $warehouses = Warehouse::all();
        return view('warehouse', ['warehouses' => $warehouses]);
    }
    public function show(Request $id) 
    {
        $warehouse = Warehouse::find($id->id);
        $users = User::find($warehouse->name);
        $stocks = Stock::all();

        return view('warehouse_detail', ['warehouse' => $warehouse, 'users' => $users, 'stocks' => $stocks]);
    }
}
