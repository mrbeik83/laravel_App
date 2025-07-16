<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id){
        $pro = Product::findOrFail($id);

        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $pro->name,
                'price' => $pro->price,
                'image' => $pro->picture,
                'quantity' => 1
            ];
        }
        session()->put('cart',$cart);

        return redirect()->back()->with('success','محصول به سبد خرید اضافه شد');
        
    }
    public function index(){
        $cart = session()->get('cart',[]);
        return view('Cart.index',compact('cart'));
        
    }
    public function remove($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect()->route('cart.index');
    }
    public function increase($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] += 1;
        }
        session()->put('cart',$cart);
        return redirect()->route('cart.index');
    }
    public function decrease($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] -= 1;
        }
        session()->put('cart',$cart);
        return redirect()->route('cart.index');
    }
}
