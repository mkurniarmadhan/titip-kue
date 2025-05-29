<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;




    protected $fillable = [
        'outlet_id',
        'kode',
        'shipment_date'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode = self::generateKode();
        });
    }


    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function items()
    {
        return $this->hasMany(ShipmentItem::class);
    }
    public function salesReport()
    {
        return $this->hasOne(SalesReport::class);
    }

    protected static function generateKode()
    {
        do {
            // Menghasilkan angka acak 4 digit, leading zero disertakan
            $kode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (self::where('kode', $kode)->exists());

        return $kode;
    }
}
