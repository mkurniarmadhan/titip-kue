<?php

namespace App\Http\Controllers\Outlet;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{



    public function index(Request $request)
    {
        $outlets = Outlet::paginate(5);
        return view('pages.outlet.index', compact('outlets'));
    }
    public function create(Request $request)
    {
        $outlets = Outlet::all();
        return view('pages.outlet.create');
    }
    public function edit(Outlet $outlet)
    {
        return view('pages.outlet.edit', compact('outlet'));
    }
    public function destroy(Outlet $outlet)
    {


        //delete post by ID
        $outlet->delete();


        flash()
            ->option('position', 'top-center')
            ->success('outlet created successfully!');
        return to_route('outlet.index');
    }


    public function store(Request $request)
    {

        $request->validate([

            'name' => ['required'],
            'address' => ['required'],
        ]);

        Outlet::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        flash()
            ->option('position', 'top-center')
            ->success('Product created successfully!');
        return to_route('outlet.index');
    }
    public function update(Outlet $outlet, Request $request)
    {

        $request->validate([

            'name' => ['required'],
            'address' => ['required'],
        ]);


        $outlet->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        flash()
            ->option('position', 'top-center')
            ->success('Product berhaisl di update !');
        return to_route('outlet.index');
    }
}
