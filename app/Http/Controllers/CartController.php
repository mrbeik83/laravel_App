<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
    public function checkout(){
        $cart = session()->get('cart',[]);
        if(!$cart || count($cart) == 0){
            return redirect()->route('cart.index')->with('error','سبد خرید شما خالی است');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => collect($cart)->sum(fn($item)=>$item['price']*$item['quantity']),
            'status' => 'درحال بررسی'
        ]);

        foreach($cart as $productId => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'number' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success','سفارش با موفقیت ثبت شد');
    }
    public function myOrders(){
        $orders = auth()->user()->orders()->with('items.products')->latest()->get();
        
        return view('cart.my_orders',compact('orders'));
    }
}
