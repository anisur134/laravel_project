@extends('admin.layouts.template')


@section('content')
<div class="container">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add Product</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" />
                </div>
              </div>
             
              
             
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea name="product_short_des" id="product_short_des" class="form-control"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_long_des">Product Long Description</label>
                <div class="col-sm-10">
                  <textarea name="product_long_des" id="product_long_des" class="form-control"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="product_quantity" id="product_quantity" placeholder="Enter Product Quantity" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product under Category</label>
                <div class="col-sm-10">
                <select class="form-select" name="product_category_id" id="product_category_id">
                  <option selected>Open this select menu</option>
                 @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                 @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product under Sub</label>
                <div class="col-sm-10">
                <select class="form-select" name="product_subcategory_id" id="product_subcategory_id">
                  <option selected>Open this select menu</option>
                 
                  @foreach($subcategories as $subcategory)
                  <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                 @endforeach
                
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Img</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="product_img" id="product_img"  />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Basic with Icons -->
</div>
@endsection