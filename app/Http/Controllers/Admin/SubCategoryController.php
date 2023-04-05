<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function Index(){
        $subcategories=SubCategory::latest()->get();
        return view('admin.allsubcategory',compact('subcategories'));

    }
    public function AddSubCategory(){
        $categories=Category::latest()->get();

        return view('admin.addsubcategory',compact('categories'));
        
    }

    public function StoreSubCategory (Request $request){

        $validateData=$request->validate([

             'subcategory_name'=>'required|unique:sub_categories',
             'category_id'=>'required'

        ]);

        $categoryId=$request->category_id;
        $category_name=Category::where('id',$categoryId)->value('category_name');
          SubCategory::insert([
         'subcategory_name'=>$request->subcategory_name,
         'category_id'=>$categoryId,
         'category_name'=>$category_name,
         'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name))

       ]);
       Category::where('id',$categoryId)->increment('subcategory_count',1);

       return redirect()->route('allsubcategory')->with('message','SubCategory Insert Successfully');
}

public function EditSubCategory($id){

 $subcategory_info=SubCategory::findorFail($id);

 return view('admin.edit_subcategory',compact('subcategory_info'));


}
public function UpdateSubCategory(Request $request){

   $subcategory_id=$request->subcategory_id;
   $updateData=$request->validate([
     'subcategory_name'=>'required|unique:sub_categories',

]);

SubCategory::findorFail($subcategory_id)->update([

 'subcategory_name'=>$request->subcategory_name,

 'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name))

]);

return redirect()->route('allsubcategory')->with('message','SubCategory Updated Successfully');

}
public function DeleteSubCategory($id){
  $catId=SubCategory::where('id',$id)->value('category_id');
  SubCategory::findorFail($id)->delete();
 Category::where('id',$catId)->decrement('subcategory_count',1);
 return redirect()->route('allsubcategory')->with('message','SubCategory Deleted Successfully');
 
}
}
