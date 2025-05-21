<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;

    
// App\Models\Shipment.php
public function admin() { return $this->belongsTo(User::class, 'admin_id'); }
public function outlet() { return $this->belongsTo(Outlet::class); }
public function items() { return $this->hasMany(ShipmentItem::class); }
public function salesReport() { return $this->hasOne(SalesReport::class); }

}
