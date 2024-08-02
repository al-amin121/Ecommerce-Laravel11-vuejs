<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request as HttpRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
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
    public function store()
    {
        $data = Request::validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);
        if (Request::hasFile('image')){
            $path = '/storage/'.Request::file('image')->store('uploads','public');
            $data['image'] = $path;
        }
        Brand::create($data);
        return response()->json([
            'status' => 'success',
            'message' => 'Brand Add Successfully'
        ]);
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
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $id)
    {
        $brand = Brand::find($id);
        $data = Request::validate([
            'name' => 'required',
            'image' => 'required'
        ]);
        if (Request::hasFile('image')){
            $path = '/storage/'.Request::file('image')->store('uploads','public');
            $data['image']= $path;
        }
        $brand->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Brand updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $image = $brand->image;

        if ($image){
            $imagePath = str_replace('/storage','public',$image);
            Storage::delete($imagePath);
        }
        $brand->delete();
        return response()->json([
            'status' => 'success',
            'message' =>'Brand Delete Successfully'
        ]);
    }
}
