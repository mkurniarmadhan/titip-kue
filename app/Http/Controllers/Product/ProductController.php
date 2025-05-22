<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::paginate(5);
        return view('pages.product.index', compact('products'));
    }
    public function create(Request $request)
    {
        $products = Product::all();
        return view('pages.product.create');
    }
    public function edit(Product $product)
    {
        return view('pages.product.edit', compact('product'));
    }
    public function destroy(Product $product)
    {


        //delete post by ID
        $product->delete();

       
        flash()
            ->option('position', 'top-center')
            ->success('Product created successfully!');
        return to_route('product.index');

    }


    public function store(Request $request)
    {

        $request->validate([

            'name' => ['required'],
            'price' => ['required'],
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        flash()
            ->option('position', 'top-center')
            ->success('Product created successfully!');
        return to_route('product.index');
    }
    public function update(Product $product, Request $request)
    {

        $request->validate([

            'name' => ['required'],
            'price' => ['required'],
        ]);


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        flash()
            ->option('position', 'top-center')
            ->success('Product berhaisl di update !');
        return to_route('product.index');
    }
}
