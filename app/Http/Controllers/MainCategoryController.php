<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request as HttpRequest;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $mainCategories = MainCategory::all();
       return response()->json($mainCategories);
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

        MainCategory::create($data);
        return response()->json([
           'status' => 'success',
           'message' => 'Category Add Successfully'
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
        $mainCategory = MainCategory::find($id);
       return response()->json($mainCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $id)
    {
       $mainCategory = MainCategory::find($id);
       $data = Request::validate([
          'name' => 'required',
          'image' => 'required'
       ]);
       if (Request::hasFile('image')){
           $path = '/storage/'.Request::file('image')->store('uploads','public');
          $data['image']= $path;
       }
       $mainCategory->update($data);

       return response()->json([
           'status' => 'success',
           'message' => 'MainCategory updated Successfully'
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $mainCategory = MainCategory::find($id);
       $image = $mainCategory->image;

       if ($image){
           $imagePath = str_replace('/storage','public',$image);
           Storage::delete($imagePath);
       }
       $mainCategory->delete();
       return response()->json([
          'status' => 'success',
          'message' =>'Category Delete Successfully'
       ]);
    }
}
