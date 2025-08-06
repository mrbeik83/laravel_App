<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        $productCount = Product::count();
        $customerCount = User::get()->where('isAdmin',null)->count();
        return view('admin.dashboard',compact(['products','productCount','customerCount']));
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
    }
}
