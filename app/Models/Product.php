<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Hisyam
    
    protected $fillable = [
        "sku",
        "item_name",
        "category",
        "desc",
        "img",
        "volume"
    ];

    public function category()
    {
        return $this->hasOne(category::class);
    }
}
