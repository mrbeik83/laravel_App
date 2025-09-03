<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $customersToday = User::whereDate('created_at',Carbon::today())->get()->count();
        $products = Product::latest()->get();
        $productCount = Product::count();
        $customerCount = User::get()->where('isAdmin',null)->count();
        $customers = User::get()->where('isAdmin',null);
        $sliders = Slider::get();
        return view('admin.dashboard',compact(['products','productCount','customerCount','customers','sliders','customersToday']));
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
    }
    public function showCustomers(){
        $customers = User::get()->where('isAdmin',null);
        dd($customers);
    }
}
