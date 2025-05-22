<?php

namespace App\Http\Controllers\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Shipment;
use App\Models\ShipmentItem;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{



    public function show(Shipment $shipment)
    {

        $shipment->load('items.product');
        $subTotal = $shipment->items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        return view('pages.shipment.show', compact('shipment', 'subTotal'));
    }

    public function createShipment()
    {

        return  view('pages.shipment.create-shipment');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'outlet_id' => 'required|exists:outlets,id',
            'shipment_date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        return DB::transaction(function () use ($validated) {
            $shipment = Shipment::create([
                'outlet_id' => $validated['outlet_id'],
                'shipment_date' => $validated['shipment_date']
            ]);

            foreach ($validated['items'] as $item) {
                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity']
                ]);
            }

            return response()->json([
                'url' =>  route('shipment.show', $shipment)
            ], 201);
        });
    }
}
