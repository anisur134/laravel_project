@extends('admin.layouts.template')


@section('content')
    <div class="container">
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update SubCategory</h5>
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
                <form action="{{route('updatesubcategory')}}" method="POST">
                  @csrf
                  <input type="hidden" class="form-control"  name="subcategory_id" value="{{$subcategory_info->id}}" />
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" value="{{$subcategory_info->subcategory_name}}"  />
                    </div>
                  </div>
                 
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update SubCategory</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Basic with Icons -->
    </div>
@endsection