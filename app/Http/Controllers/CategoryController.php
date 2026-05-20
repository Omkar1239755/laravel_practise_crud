<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function addCategory(request $request){

            $request->validate([
                'name'=>'required',
                'image' =>'required',
            ]);

            $imagePath  = $request->file('image')->store('category_image','public');
            
            $data = Category::create([
                'name'=>$request->name,
                'image'=>$imagePath
            ]);

            return response([
                'status'=>true,
                'message'=>"Category inserted succesfully",
                'data'=>$data
            ]);
    }



    public function updateCategory(request $request , $id){
        
        $category = Category::find($id);

        if(!$category){
            return response([
                'status' => false,
                'message' => 'Category not found'
            ],404);
        }

        if($category->filled('name')){

          $category->name = $request->name;

        }

        if($category->hasFile('image')){

            if($category->image && Storage::disk('public')->exist($category->image)){
               Storage::disk('public')->delete($category->image);
            }
            
            $imagePath = $request->file('image')->store('category_image','public');

            $category->image = $imagePath;

        }

        $category->save();


        return response()->json([
            'status' => true,
            'message' => 'Category Data updated successfully',
            'data' => $category
        ]);

    }



    public function deleteCategory($id)
   {
    try {
        $category = Category::findOrFail($id);

        // Image storage se hatao
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Category deleted successfully',
        ]);

    } catch (Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => $e->getMessage()
        ], 500);
    }
}


















}
