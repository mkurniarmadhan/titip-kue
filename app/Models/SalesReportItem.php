<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReportItem extends Model
{
    /** @use HasFactory<\Database\Factories\SalesReportItemFactory> */
    use HasFactory;


    // App\Models\SalesReportItem.php
    public function salesReport()
    {
        return $this->belongsTo(SalesReport::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
