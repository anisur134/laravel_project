<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function Index(){
        $products=Product::latest()->get();

        return view('admin.allproduct',compact('products'));

    }
    public function AddProduct(){
        $categories=Category::latest()->get();
        $subcategories=SubCategory::latest()->get();
        return view('admin.addproduct',compact('categories','subcategories'));
    }
    public function StoreProduct(Request $request){

                     
        $validateData=$request->validate([
            'product_name'=>'required|unique:products',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'product_category_id'=>'required',
            'product_subcategory_id'=>'required',
            'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


              ]);

                   $image=$request->file('product_img');
                   $imgName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                   $request->product_img->move(public_path('productImg'),$imgName);
                   $imgUrl='productImg/'.$imgName;

                   $categoryId=$request->product_category_id;
                   $subcategoryId=$request->product_subcategory_id;
                   $category_name=Category::where('id',$categoryId)->value('category_name');
                   $subcategory_name=SubCategory::where('id',$subcategoryId)->value('subcategory_name');

                   Product::insert([
                    'product_name'=>$request->product_name,
                    'product_short_des'=>$request->product_short_des,
                    'product_long_des'=>$request->product_long_des,
                    'product_price'=>$request->product_price,
                    'product_quantity'=>$request->product_quantity,
                    'product_category_name'=>$category_name,
                    'product_subcategory_name'=>$subcategory_name,
                    'product_category_id'=>$categoryId,
                    'product_subcategory_id'=>$subcategoryId,
                    'product_img'=>$imgUrl,
                    'slug'=>strtolower(str_replace(' ','-',$request->product_name))
           
                  ]);

                  Category::where('id',$categoryId)->increment('product_count',1);
                  SubCategory::where('id',$subcategoryId)->increment('product_count',1);

       return redirect()->route('allproduct')->with('message','Product Insert Successfully');
}

                    public function EditProductImg($id){
                        $productimg_info=Product::findOrFail($id);
                      return view('admin.edit_productImg',compact('productimg_info'));

                            }

                            public function UpdateProductImg(Request $request,$id){
                                      
                                $validateData=$request->validate([
                                    
                                    'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        
                        
                                      ]);
                                        
                                           $image=$request->file('product_img');
                                           $imgName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                                           $request->product_img->move(public_path('productImg'),$imgName);
                                           $imgUrl='productImg/'.$imgName;

                                      Product::findOrFail($id)->update(['product_img'=>$imgUrl]);
                                      return redirect()->route('allproduct')->with('message','Product ImageUpdate Successfully');
                            }

                                    public function EditProduct($id){
                                        $categories=Category::latest()->get();
                                        $subcategories=SubCategory::latest()->get();
                                        $product_info=Product::findOrFail($id);
                                        return view('admin.edit_product',compact('product_info','categories','subcategories'));

                                }

                                public function UpdateProduct(Request $request){

                                                                                
                                        $product_id=$request->product_id;
                                        $updateData=$request->validate([
                                            'product_name'=>'required|unique:products',
                                            'product_short_des'=>'required',
                                            'product_long_des'=>'required',
                                            'product_price'=>'required',
                                            'product_quantity'=>'required',

                                    ]);
                                    $categoryId=$request->product_category_id;
                                    $subcategoryId=$request->product_subcategory_id;
                                    $category_name=Category::where('id',$categoryId)->value('category_name');
                                    $subcategory_name=SubCategory::where('id',$subcategoryId)->value('subcategory_name');

                                    Product::findorFail($product_id)->update([

                                        'product_name'=>$request->product_name,
                                        'product_short_des'=>$request->product_short_des,
                                        'product_long_des'=>$request->product_long_des,
                                        'product_price'=>$request->product_price,
                                        'product_quantity'=>$request->product_quantity,
                                        'product_category_id'=> $categoryId,
                                         'product_subcategory_id'=> $subcategoryId,
                                         'product_category_name'=>$category_name,
                                         'product_subcategory_name'=>$subcategory_name,
                                        'slug'=>strtolower(str_replace(' ','-',$request->product_name))

                                    ]);

                                    Category::where('id',$categoryId)->increment('product_count',1);
                                    SubCategory::where('id',$subcategoryId)->increment('product_count',1);

                                    return redirect()->route('allproduct')->with('message','Product Updated Successfully');


                            }

                            public function DeleteProduct($id){

                                $catId=Product::where('id',$id)->value('product_category_id');
                                $subcatId=Product::where('id',$id)->value('product_subcategory_id');

                                Product::findorFail($id)->delete();
                               Category::where('id',$catId)->decrement('product_count',1);
                               SubCategory::where('id',$subcatId)->decrement('product_count',1);
                               return redirect()->route('allproduct')->with('message','Product Deleted Successfully');
                               
                              }
}
