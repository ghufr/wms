<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "warehouse_id",
        "product_id",
        "category",
        "qty",
        "price"
    ];
    
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}

