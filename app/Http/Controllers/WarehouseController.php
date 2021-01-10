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
        return $this->show($req, $id);
    }

    public function list()
    {
        $warehouses = Warehouse::all();
        return view('warehouse', ['warehouses' => $warehouses]);
    }
    public function show(Request $req, $id)
    {
        $warehouse = Warehouse::find($id);
        // $warehouse->users()->attach("2");
        $staff = $warehouse->users()->get();

        // $users = User::whereHas('warehouse', function ($q) {
        //     $q->whereIn('id', [1]);
        // });

        $ids = DB::table('user_warehouse')
            ->where('warehouse_id', $warehouse->id)
            ->get('user_id')->toArray();

        $user_ids = [];
        foreach ($ids as $id) {
            array_push($user_ids, $id->user_id);
        }

        $users = User::whereNotIn('id', $user_ids)->where('role', 'staff')->get(['id', 'name']);

        $stocks = Stock::all();

        return view('warehouse_detail', ['warehouse' => $warehouse, 'users' => $users, 'staff' => $staff, 'stocks' => $stocks]);
    }

    public function addStaff(Request $req, $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return back()->withErrors(['Warehouse tidak ditemukan']);
        }

        $user = User::find($req->user);

        if (!$user) {
            return back()->withErrors(['User tidak ditemukan']);
        }

        $warehouse->users()->attach($user);
        return back();
    }

    public function deleteStaff(Request $req, $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return back()->withErrors(['Warehouse tidak ditemukan']);
        }

        $warehouse->users()->detach($req->user);
        return back();
    }
}
