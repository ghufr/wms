<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    // Cantika
    protected $fillable = [
        "name",
        "phone",
        "address_street",
        "address_city"
    ];
}
