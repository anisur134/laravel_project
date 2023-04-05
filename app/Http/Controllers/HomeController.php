<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
           $allproducts=Product::latest()->get();
             return view('frontend.home',compact('allproducts'));


    }
}
