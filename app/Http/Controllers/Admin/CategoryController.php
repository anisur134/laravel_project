<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    public function Index()
    {
        $categories=Category::latest()->get();
        return view('admin.allcategory',compact('categories'));

    }
    public function AddCategory(){

        return view('admin.addcategory');
    }

    public function StoreCategory (Request $request){

               $validateData=$request->validate([
                    'category_name'=>'required|unique:categories',

               ]);

              Category::insert([
                'category_name'=>$request->category_name,
                'slug'=>strtolower(str_replace(' ','-',$request->category_name))

              ]);

              return redirect()->route('allcategory')->with('message','Category Insert Successfully');
    }

    public function EditCategory($id){

        $category_info=Category::findorFail($id);

        return view('admin.edit_category',compact('category_info'));


    }
    public function UpdateCategory(Request $request){

          $category_id=$request->category_id;
          $updateData=$request->validate([
            'category_name'=>'required|unique:categories',

       ]);

      Category::findorFail($category_id)->update([

        'category_name'=>$request->category_name,

        'slug'=>strtolower(str_replace(' ','-',$request->category_name))

      ]);

      return redirect()->route('allcategory')->with('message','Category Updated Successfully');

    }
    public function DeleteCategory($id){

        Category::findorFail($id)->delete();
        
        return redirect()->route('allcategory')->with('message','Category Deleted Successfully');
        
    }
}
