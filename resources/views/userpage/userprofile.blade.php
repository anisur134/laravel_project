@extends('frontend.layouts.profile_template')

@section('profilecontent')

<h2>User Confirm Order Dashboard</h2>

<div class="row">
   <div class="col-12">
    <div class="box_main">
        <div class="table-responsive">
            <table class="table">
              <tr>
            <th>userId</th>
            <th> Product Name</th>
            <th>Product Price </th>
            <th> Product Quantity</th>
            <th>Status</th>
            
            </tr>
               

           

          @foreach($orderItems as $item)
                <tr>
                     @php

                    $productName=App\Models\Product::where('id',$item->product_name)->value('product_name');
                   
                    @endphp
                    <td>{{$item->user_id}}</td>
                    <td>{{$productName}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->quantity}}</td>
                      <td>{{$item->status}}</td>
            
                </tr>

               @endforeach
              
           
            </table>

        </div>

    </div>

   </div>
</div>



@endsection