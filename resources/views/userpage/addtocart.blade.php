@extends('frontend.layouts.template')

@section('maincontent')

@if(session()->has('message'))

<div class="alert alert-success">

 {{ session()->get('message') }}
</div>


@endif

<h1>Add to cart Page</h1>

<div class="row">
   <div class="col-12">
    <div class="box_main">
        <div class="table-responsive">
            <table class="table">
              <tr>
            <th> Product Image</th>
            <th> Product Name</th>
            <th>Product Price </th>
            <th> Product Quantity</th>
            <th> Action </th>
                </tr>
                @php
                $total=0;
                @endphp

            @foreach ($cartItems as $item)


                <tr>
                    @php

                    $productName=App\Models\Product::where('id',$item->product_id)->value('product_name');
                    $productImg=App\Models\Product::where('id',$item->product_id)->value('product_img');
                    @endphp
                    <td><img src="{{$productImg}}" style="height:60px"/></td>
                    <td>{{$productName}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
            <td><a href="{{route('cartremove',$item->id)}}" class="btn btn-warning">Remove</a></td>
                </tr>

                @php

                $total=$total+$item->price;
                @endphp
                @endforeach
               @if($total>0)
                <tr>
             <td></td>
             <td></td>
             <td>Total</td>
             <td>{{$total}}</td>
             <td> <a href="{{route('shippingaddress')}}">CheckOut Now</a> </td>
                </tr>
                @endif
            </table>

        </div>

    </div>

   </div>
</div>


@endsection