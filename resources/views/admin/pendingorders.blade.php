@extends('admin.layouts.template')


@section('content')

<h2>Pendingorder Confirm Admin</h2>
<div class="container">
<div class="card">

	<div class="card-title"></div>
	<div class="card-body">

	  <table class="table table-bordered">
	  	<tr>
	  		<th>user Id</th>
	  		<th>Shipping info</th>
	  		<th>Product Id</th>
	  		<th>Quantity </th>
	  		<th>Price</th>
	  		
	  		<th>Status</th>
	  		<th>Action</th>

	  	</tr>
	  	@foreach($penorder_info as $confirm_order)
	  		<tr>
	  		<td>{{ $confirm_order->user_id }}</td>
	  		<td>
	  			<ul>
	  				<li>
	  					Phone Number- {{ $confirm_order->order_phone_number }}
	  				</li>
	  				
	  					City/Village- {{ $confirm_order->order_address }}
	  				</li>

	  					Postal Code- {{ $confirm_order->order_postal_code }}
	  				</li>
	  			</ul>
	  		</td>
	  		<td>{{ $confirm_order->product_name }}</td>
	  		<td>{{ $confirm_order->quantity }}</td>
	  		<td>{{ $confirm_order->total_price }}</td>
	  		
	  		<td>{{$confirm_order->status}}</td>
	  		
	  		<td><a href="{{route('approve',$confirm_order->id)}}" class="btn btn-info"> Approve</a></td>

	  	</tr>
	  	@endforeach
	  </table>
	</div>
	</div>

	</div>
    
@endsection