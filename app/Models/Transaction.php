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
}
