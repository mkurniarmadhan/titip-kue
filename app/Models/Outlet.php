<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    /** @use HasFactory<\Database\Factories\OutletFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'address',
    ];


    // App\Models\Outlet.php
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
