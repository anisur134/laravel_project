@extends('admin.layouts.template')


@section('content')
    <div class="container">
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Category</h5>
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
                <form action="{{route('storecategory')}}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" />
                    </div>
                  </div>
                 
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Basic with Icons -->
    </div>
@endsection