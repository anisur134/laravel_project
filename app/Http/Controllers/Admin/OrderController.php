<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
         $penorder_info=Order::where('status','pending')->get();
        return view('admin.pendingorders',compact('penorder_info'));

    }

    public function Approve_Order($id){
     $order=Order::findorFail($id);
     if($order->status=='pending'){
     	$order->status='confirm';
     	$order->save();
     }
     return redirect('/admin/pending-order');

             
    }
    
}
