<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Funcion para mostrar la vista de todos los productos
    public function index(){
        return view('products.index')->with([
            'products' =>Product::all(),
        ]);
    }

    public function create(){
        return view ('products.create');
    }

    public function store(){
        if (request()->status == 'available'&& request()->stock==0) {
            session()->put('error', 'If available must have stock');

            return redirect()->back();
        }
        $product = Product::create(request()->all());
        return redirect()->route('products.index');
    }

    public function show($product){
        $product = Product::findOrFail($product);
        return view('products.show')->with(['product' => $product,]);
    }

    public function edit($product){
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }
    public function update($product){
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return $product;
    }
    public function destroy($product){
        $product = Product::findOrFail($product);

        $product->delete();
        return $product;
    }
}
