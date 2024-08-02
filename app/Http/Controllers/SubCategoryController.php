<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request as HttpRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SubCategory = SubCategory::with('mainCategory')->get();
        return response()->json($SubCategory);
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
            'main_category_id' => 'required',
        ]);
        if(Request::hasFile('image')){
            $path = '/storage/'.Request::file('image')->store('uploads', 'public');
            $data['image'] = $path;
        }

        SubCategory::create($data);

        return response()->json([
           'status' => 'success',
           'message' => 'SubCategory Add Successfully'
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
        $subCategory = SubCategory::find($id);
        return response()->json($subCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $subCategory = SubCategory::find($id);
        $data = Request::validate([
            'name' => 'required',
            'image' => 'required|image',
            'main_category_id' => 'required',
        ]);
        if (Request::hasFile('image')){
            $path = '/storage/'.Request::file('image')->store('uploads', 'public');
            $data['image']= $path;
        }
        $subCategory->update($data);
        return response()->json([
           'status' => 'success',
           'message' => 'SubCategory Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);
        $image = $subCategory->image;
        if ($image){
            $imagePath = str_replace('/storage', 'public',$image);
            Storage::delete($imagePath);

        }
        $subCategory->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'SubCategory Delete Successfully'
        ]);
    }
}
