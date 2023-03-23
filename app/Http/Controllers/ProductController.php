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
        $rules =[
            'title'=>['required','max:255'],
            'description'=>['required','max:1000'],
            'price'=>['required','min:1'],
            'stock'=>['required','min:0'],
            'status'=>['required','in:available, unavailable'],
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0) {
            session()->flash('error', 'If available must have stock');
            return redirect()->back()->withInput(request()->all());
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
        $rules =[
            'title'=>['required','max:255'],
            'description'=>['required','max:1000'],
            'price'=>['required','min:1'],
            'stock'=>['required','min:0'],
            'status'=>['required','in:available, unavailable'],
        ];

        request()->validate($rules);

        $product->update(request()->all());
        return $product;
    }
    public function destroy($product){
        $product = Product::findOrFail($product);

        $product->delete();
        return $product;
    }
}
