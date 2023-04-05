@extends('admin.layouts.template')


@section('content')
    <div class="container">
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">edit ProductImg</h5>
                <small class="text-muted float-end">Default label</small>
              </div>
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action="{{route('updateproductImg',$productimg_info->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                
               
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Img</label>
                    <div class="col-sm-10">
                        <img  style="width:100px;" src="{{asset($productimg_info->product_img)}}" alt="" />
                    </div>
                  </div>
                 <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Product Img</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="product_img" id="product_img"  />
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update ProductImg</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
          <!-- Basic with Icons -->
    </div>
@endsection