@extends('frontend.layouts.profile_template')

@section('profilecontent')



<h2>Pendingorder See User</h2>
@if(session()->has('message'))

<div class="alert alert-success">

 {{ session()->get('message') }}
</div>


@endif
<div class="container">
<div class="card">

	<div class="card-title"></div>
	<div class="card-body">

	  <table class="table table-bordered">

	  	<tr>
	  		
	  		<th>Product Name</th>
	  		<th>Quantity </th>
	  		<th>Price</th>
	  		

	  	</tr>
	  	 @php
                $total=0;
                $price=0;
                @endphp
	  	@foreach($order_info as $order)
	  		<tr>
	  			@php

       $productName=App\Models\Product::where('id',$order->product_name)->value('product_name');
           @endphp
	  		<td>{{$productName}}</td>
	  		<td>{{$order->quantity}}</td>
	  		<td>{{$order->total_price}}</td>
	  		
	  		

	  	</tr>
	  	 @php

                $total=$total+$order->quantity;
                $price=$price+$order->total_price;

                @endphp
	  	@endforeach

	  	<tr>
             <td></td>
             <td>Total Quantity: {{$total}}</td>
             <td>Total Price: {{$price}}</td>
            
                </tr>
	  </table>
	</div>
	</div>

	</div>




@endsection