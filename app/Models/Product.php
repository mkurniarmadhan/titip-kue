<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    
    protected $fillable=[
        'name','price'
    ];


// App\Models\Product.php
public function shipmentItems() { return $this->hasMany(ShipmentItem::class); }
public function salesReportItems() { return $this->hasMany(SalesReportItem::class); }

}
