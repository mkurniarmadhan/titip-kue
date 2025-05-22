<?php

use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Outlet\OutletController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Shipment\ShipmentController;
use App\Models\Shipment;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {

        $shipments = Shipment::limit(5)->get();

        return view('pages.dashboard.dashboard-general-dashboard', compact('shipments'));
    })->name('dashboard');



    Route::resource('product', ProductController::class)->middleware('auth');
    Route::resource('outlet', OutletController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('shipment', ShipmentController::class);
    Route::get('create-shipment', [ShipmentController::class, 'createShipment'])->name('create-shipment');
});

Route::fallback(fn() => to_route('dashboard'));

require __DIR__ . '/auth.php';
