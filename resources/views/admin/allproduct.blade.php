@extends('admin.layouts.template')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Product</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">All Category</h5>
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Product Description</th>
              <th>Product Price</th>
              <th>Product Image</th>
             
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach($products as $product)
            <tr>
              <td>{{$product->product_name}}</td>
              <td>{{$product->product_long_des}}</td>
              <td>{{$product->product_price}}</td>
             <td><img  style="width:100px;" src="{{asset($product->product_img)}}" alt="" /> <br>
            
                 <a href="{{route('editproductImg',$product->id)}}" class="btn btn-primary">Update Image</a>
            </td>
              <td>
                
                 
                    <a href="{{route('editproduct',$product->id)}}" class="btn btn-success"> Edit</a>
                    <a href="{{route('delete-product',$product->id)}}" class="btn btn-danger" >Delete</a>
                 
              </td>
            </tr>
            @endforeach
@endsection