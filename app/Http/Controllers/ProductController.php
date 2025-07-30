<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('picture')->store('products', 'public');
        Product::create([
            'name'     => $request->name,
            'number' => $request->number,
            'size'     => $request->size,
            'price'    => $request->price,
            'type'     => $request->type,
            'picture'  => $path
        ]);
        return redirect()->route('dashboard.admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('picture')) {
            // حذف عکس قبلی (اگر وجود داشته باشه)
            if ($product->picture && Storage::disk('public')->exists($product->picture)) {
                Storage::disk('public')->delete($product->picture);
            }
    
            // ذخیره عکس جدید
            $path = $request->file('picture')->store('products', 'public');
    
            // آپدیت عکس جدید در مدل
            $product->picture = $path;
        }


        $product->update([
            'name'   => $request->name,
            'type'   => $request->type,
            'number' => $request->number,
            'price'  => $request->price,
            'size'   => $request->size,
            'picture' => $product->picture, // فقط در صورتی که عکس جدید اومده باشه، مقدارش تغییر کرده
        ]);
        


        return redirect()->route('dashboard.admin');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('dashboard.admin');
    }
}
