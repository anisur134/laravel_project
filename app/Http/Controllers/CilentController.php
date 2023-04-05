<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CilentController extends Controller
{
    public function CategoryPage($id,$slug){
                $category=Category::findOrFail($id);
                $products=Product::where('product_category_id',$id)->latest()->get();
              return view('userpage.category',compact('category','products'));
    }

    public function SingleProduct($id,$slug){
        $product=Product::findOrFail($id);
        $subcatId=Product::where('id',$id)->value('product_subcategory_id');
        $reletedproducts=Product::where('product_subcategory_id',$subcatId)->latest()->get();
        return view('userpage.singproduct',compact('product','reletedproducts'));
    }

    public function AddToCart(){
        $userId=Auth::id();
       $cartItems=Cart::where('user_id',$userId)->get();
        return view('userpage.addtocart',compact('cartItems'));
    }
    public function ProductAddToCart(Request $request){

        $price=$request->price;
        $quantity=$request->quantity;

        $product_price=$price*$quantity;
        Cart::insert([
          'product_id'=>$request->product_id,
          'user_id'=>Auth::id(),
          'quantity'=>$quantity,
          'price'=>$product_price

        ]);
    return redirect()->route('addtocart')->with('message','Your  CArt Item Added');


    }
    public function PendingOrder(){
        $userId=Auth::id();
         $order_info=Order::where('user_id',$userId)->where('status','pending')->get();
        return view('userpage.pendingOrder',compact('order_info'));
    }

    public function History(){
        return view('userpage.history');
    }
   
    public function RemoveCart($id){
        Cart::findOrFail($id)->delete();

        return redirect()->route('addtocart')->with('message','Your  CArt Item Remove');


    }
    public function ShippingAddress(){
        return view('userpage.shippingaddress');
    }
    public function Shipping_Address_Add(Request $request){
        $validateData=$request->validate([

            'phone_number'=>'required',
          'address_name'=>'required',
          'postal_code'=>'required'

        ]);
        
        ShippingAddress::insert([
          
          'user_id'=>Auth::id(),
          'phone_number'=>$request->phone_number,
          'address_name'=>$request->address_name,
          'postal_code'=>$request->postal_code

        ]);
    return redirect()->route('checkout');


    }
     public function CancelOrder(){


     }
     public function Placed_Order(){
       $userId=Auth::id();
        $shippingaddress_info=ShippingAddress::where('user_id',$userId)->first();
        $cartItems=Cart::where('user_id',$userId)->get();
         
        foreach($cartItems as $item){
        Order::insert([

           'user_id'=>Auth::id(),
          'order_phone_number'=>$shippingaddress_info->phone_number,
          'order_address'=>$shippingaddress_info->address_name,
          'order_postal_code'=>$shippingaddress_info->postal_code,
          'product_name'=>$item->product_id,
          'quantity'=>$item->quantity,
          'total_price'=>$item->price
          
        ]);
        $id=$item->id;
        Cart::findOrFail($id)->delete();

        }

        ShippingAddress::where('user_id',$userId)->first()->delete();


 return redirect()->route('pendingorders')->with('message','Your  item Placed successfully');
     }

    public function CheckoutPage(){
        $userId=Auth::id();
        $shippingaddress_info=ShippingAddress::where('user_id',$userId)->first();
        $cartItems=Cart::where('user_id',$userId)->get();
        return view('userpage.checkout',compact('shippingaddress_info','cartItems'));
    }
    public function UserProfile(){
      $userId=Auth::id();
      $orderItems=Order::where('user_id',$userId)->where('status','confirm')->get();
        return view('userpage.userprofile',compact('orderItems'));
    }





}
