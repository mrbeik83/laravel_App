<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.dashboard',compact('products'));
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        
    }
}
