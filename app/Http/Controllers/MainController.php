<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        //sirve para no detener el script
        // dump($name);
        //dump of die (stop of aplication)
        // dd();

        return view('welcome')->with([
            'products'=>Product::all(),
        ]);
    }
}
