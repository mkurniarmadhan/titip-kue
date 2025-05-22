<?php

use App\Http\Controllers\Shipment\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/shipments',[ShipmentController::class,'store']);

Route::get('outlets', function () {

    return \App\Models\Outlet::select('id', 'name')->get();
});
Route::get('/items', function (Request $request) {


    $query =  \App\Models\Product::query();
    if ($search = $request->get('q')) {
        $query->where('name', 'like', "%$search%");
    }

    return $query->select('id', 'name', 'price')->limit(10)->get();
});
