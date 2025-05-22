<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesReport;
use App\Models\SalesReportItem;

use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{

    public function index()
    {

        return view('pages.laporan.index');
    }
        public function store(Request $request)
    {
        $validated = $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'staff_id' => 'required|exists:users,id',
            'report_date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity_sold' => 'required|integer|min:0',
            'items.*.quantity_remaining' => 'required|integer|min:0'
        ]);

        return DB::transaction(function () use ($validated) {
            $total_payment = 0;
            foreach ($validated['items'] as $item) {
                $product = \App\Models\Product::findOrFail($item['product_id']);
                $total_payment += $item['quantity_sold'] * $product->unit_price;
            }

            $report = SalesReport::create([
                'shipment_id' => $validated['shipment_id'],
                'staff_id' => $validated['staff_id'],
                'report_date' => $validated['report_date'],
                'total_payment' => $total_payment
            ]);

            foreach ($validated['items'] as $item) {
                SalesReportItem::create([
                    'sales_report_id' => $report->id,
                    'product_id' => $item['product_id'],
                    'quantity_sold' => $item['quantity_sold'],
                    'quantity_remaining' => $item['quantity_remaining']
                ]);
            }

            return response()->json($report->load('items'), 201);
        });
    }
}
