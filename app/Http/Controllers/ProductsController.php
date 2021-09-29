<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // $products = Products::all();

        // return view('products.index', compact('products'));
        $products = Products::where([
            ['name', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request -> term)){
                    $query->orWhere('name','LIKE', '%' . $term . '%') ->get();
                }
            }]
        ])

        ->orderBy("id",'desc')
        ->paginate(10);
        // $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'publish' => 'required'
        ]);

        Products::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Products $product)
    {
        return view('products.show',compact('product'));
    }


    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Products $product) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'publish' => 'required'
        ]);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy(Products $product) {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully');
    }
}
