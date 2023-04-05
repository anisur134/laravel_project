@extends('admin.layouts.template')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Category</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">All Category</h5>
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>SubCategory Name</th>
              <th>Category Name</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              @foreach($subcategories as $subcategory)
            <tr>
              <td>{{$subcategory->id}}</td>
              <td>{{$subcategory->subcategory_name}}</td>
             
              <td>{{$subcategory->category_name}}</td>
              <td>100</td>
             
             
              <td>
                
                 
                <a href="{{route('editsubcategory',$subcategory->id)}}" class="btn btn-success"> Edit</a>
                <a href="{{route('deletesubcategory',$subcategory->id)}}" class="btn btn-danger">Delete</a>
                 
              </td>
            </tr>
            @endforeach
@endsection