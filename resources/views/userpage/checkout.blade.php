@extends('frontend.layouts.template')

@section('maincontent')

<div class="row">
    <div class="col-8">
     <div class="box_main">
        <h3>product will  at send</h3>
        <p>City/Village- {{$shippingaddress_info->address_name}}</p>
        <p>Postal Code-{{$shippingaddress_info->postal_code}}</p>
        <p>Phone Number-{{$shippingaddress_info->phone_number}}</p>
     </div>
    </div>



    <div class="col-4">
     <div class="box_main">
        <h3>Your Final Product at</h3>
        <div class="table-responsive">
            <table class="table">
              
              <tr>

            <th> Product Name</th>
            <th>Product Price </th>
            <th> Product Quantity</th>

                </tr>
          

 @php
                $total=0;
                @endphp

  @foreach($cartItems as $item)
                <tr>
@php
 $productName=App\Models\Product::where('id',$item->product_id)->value('product_name');
@endphp
                    <td>{{$productName}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>

                </tr>
                  @php

                $total=$total+$item->price*$item->quantity;
                @endphp

 @endforeach

 <tr>
             <td></td>
             <td></td>
             <td>Total</td>
             <td>{{$total}}</td>
             
                </tr>


            </table>

        </div>
     </div>
    </div>

    <a href="{{route('home')}}" class="btn btn-danger"> Cancel Order</a>

    <form action="{{route('orderplace')}}" method="POST">
        @csrf
        <input type="submit" class="btn btn-primary" value="place order" />
    </form>
</div>



@endsection