<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $slider = $request->validated();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('Slider', 'public');
        }
        $slider['image'] = $path;
        Slider::create($slider);

        return redirect()->route('dashboard.admin');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if($slider->image && Storage::disk('public')->exists($slider->image)){
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('dashboard.admin')->with('success','اسلایدر با موفقیت حذف شد');
    }
}
