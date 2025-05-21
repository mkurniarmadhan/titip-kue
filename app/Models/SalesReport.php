<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    /** @use HasFactory<\Database\Factories\SalesReportFactory> */
    use HasFactory;

    
// App\Models\SalesReport.php
public function staff() { return $this->belongsTo(User::class, 'staff_id'); }
public function shipment() { return $this->belongsTo(Shipment::class); }
public function items() { return $this->hasMany(SalesReportItem::class); }

}
