<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images','mainCategory','subCategory','brand')->get();
        return response()->json($products);
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
        // Validate the incoming request
        $data = Request::validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'offer_price' => 'nullable|numeric',
            'description' => 'required|string',
            'main_category_id' => 'required|exists:main_categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'brand_id' => 'required',
            'images' => 'required|array',
        ]);

        // Create the product
        $product = Product::create($data);

        $images = $data['images'];
        $imageData = [];
        foreach ($images as $image){
                $imageData[] = [
                    'url'=> '/storage/'.$image['file']->store('uploads','public'),
                    'product_id' => $product->id
                ];
        }

        Image::insert($imageData);

        return response()->json([
            'status' => 'success',
            'message' => 'Product Added Succesfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id',$id)->with('images','mainCategory','subCategory','brand')->first();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id',$id)->with('images','mainCategory','subCategory','brand')->first();
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $product = Product::find($id);
        $data = Request::validate([
            'title'=>'required',
            'price'=>'required',
            'offer_price'=>'nullable',
            'description'=>'required',
            'main_category_id'=>'required|exists:main_categories,id',
            'sub_category_id'=>'nullable|exists:sub_categories,id',
            'brand_id' => 'required',
            'newImages'=>'nullable',
        ]);
        if(isset($data['newImages'])){
            $images = $data['newImages'];
            $imageData = [];

            foreach( $images as $image){
                $imageData[] = [
                    'url' => '/storage/'.$image['file']->store('uploads', 'public'),
                    'product_id' => $product->id
                ];
            }
            Image::insert($imageData);
        }
        $product->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Product Updated Successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product){
            $images = $product->images;
            foreach ($images as $image){
                $imagePath = str_replace('/storage', 'public', $image->url);
                Storage::delete($imagePath);
                $image->delete();
            }
            $product->delete();
        }
    }
    /**
     * Single Image Delete from storage.
     */
    public function deleteImage($id) {
        $image = Image::find($id);
        $imagePath = str_replace('/storage', 'public', $image->URL);

        Storage::delete($imagePath);
        $image->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Image Deleted Successfully'
        ]);
    }
}
