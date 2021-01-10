<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    // Dede
    
    protected $fillable = [
        "name",
        "location",
        "volume"
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
