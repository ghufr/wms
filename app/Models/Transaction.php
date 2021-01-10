<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    // Ghufron

    protected $fillable = [
        "qty",
        "price",
        "volume",
        "total",
        "product_name",
        "product_volume",
        "product_category",
        "supplier_name",
        "supplier_address_city",
        "warehouse_name",
        "warehouse_location",
        "supplier_id",
        "user_id",
        "product_id",
        "warehouse_id",
        "type"
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class);
    }
    public function supplier()
    {
        return $this->hasOne(Warehouse::class);
    }
}
